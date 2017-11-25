<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace yii\gii\generators\crud;

use common\utils\controller\Controller;
use common\utils\helpers\StringHelper;
use Yii;
use yii\db\ActiveRecord;
use yii\db\BaseActiveRecord;
use yii\db\Schema;
use yii\gii\CodeFile;
use yii\helpers\Inflector;
use yii\helpers\VarDumper;

/**
 * Generates CRUD
 *
 * @property array $columnNames Model column names. This property is read-only.
 * @property string $controllerID The controller ID (without the module ID prefix). This property is
 * read-only.
 * @property array $searchAttributes Searchable attributes. This property is read-only.
 * @property boolean|\yii\db\TableSchema $tableSchema This property is read-only.
 * @property mixed $nameAttribute
 * @property string $name
 * @property string $deleteAttribute
 * @property string $viewPath The controller view path. This property is read-only.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class Generator extends \yii\gii\Generator {
	public $modelClass = 'backend\models\\';
	public $controllerClass = 'backend\controllers\\';
	public $viewPath = '';
	public $baseControllerClass = Controller::class;
	public $indexWidgetType = 'grid';
	public $searchModelClass = '';
	public $isFilter = true;
	public $isModule = false;
	public $hasDetail = false;
	public $hasSubDetail = false;
	public $isIndexFixed = false;
	public $messageCategory = 'yii';
	public $subTableName = '';
	public $subDetailTableName = '';
	public $detailColumns = [];
	public $subDetailColumns = [];
	public $defaultLanguage = 'vi';
	public $skippedColumns = 'created_date, modified_date, created_by, modified_by, status, id';
	public $requireColumns = 'name, code';
	public $skippedIndexColumns = 'created_date, modified_date, created_by, modified_by, status, id, note';
	public $exportDetail = false;
	public $exportAll = false;
	public $moreOption = true;
	public $actionCol = true;
	public $isModal = false;

	/**
	 * @var boolean whether to wrap the `GridView` or `ListView` widget with the `yii\widgets\Pjax` widget
	 * @since 2.0.5
	 */
	public $enablePjax = false;

	/**
	 * @inheritdoc
	 */
	public function getName() {
		return 'CRUD Generator';
	}

	/**
	 * @inheritdoc
	 */
	public function getDescription() {
		return 'Tạo file controller và views thực hiện chức năng Thêm Xóa Sửa Xem cho một model';
	}

	/**
	 * @inheritdoc
	 */
	public function rules() {
		return array_merge( parent::rules(), [
			[ [ 'controllerClass', 'modelClass', 'searchModelClass', 'baseControllerClass' ], 'filter', 'filter' => 'trim' ],
			[ [ 'modelClass', 'controllerClass', 'baseControllerClass', 'indexWidgetType' ], 'required' ],
			[ [ 'searchModelClass' ], 'compare', 'compareAttribute' => 'modelClass', 'operator' => '!==', 'message' => 'Search Model Class must not be equal to Model Class.' ],
			[
				[ 'modelClass', 'controllerClass', 'baseControllerClass', 'searchModelClass' ],
				'match',
				'pattern' => '/^[\w\\\\]*$/',
				'message' => 'Only word characters and backslashes are allowed.'
			],
			[ [ 'modelClass' ], 'validateClass', 'params' => [ 'extends' => BaseActiveRecord::className() ] ],
//			[ [ 'baseControllerClass' ], 'validateClass', 'params' => [ 'extends' => Controller::className() ] ],
			[ [ 'controllerClass' ], 'match', 'pattern' => '/Controller$/', 'message' => 'Controller class name must be suffixed with "Controller".' ],
			[ [ 'controllerClass' ], 'match', 'pattern' => '/(^|\\\\)[A-Z][^\\\\]+Controller$/', 'message' => 'Controller class name must start with an uppercase letter.' ],
			[ [ 'controllerClass', 'searchModelClass' ], 'validateNewClass' ],
			[ [ 'indexWidgetType' ], 'in', 'range' => [ 'grid', 'list' ] ],
			[ [ 'modelClass' ], 'validateModelClass' ],
			[ [ 'enableI18N', 'enablePjax' ], 'boolean' ],
			[ [ 'messageCategory' ], 'validateMessageCategory', 'skipOnEmpty' => false ],
			[
				[
					'skippedColumns',
					'skippedIndexColumns',
					'viewPath',
					'isFilter',
					'isModule',
					'hasDetail',
					'hasSubDetail',
					'isIndexFixed',
					'subTableName',
					'subDetailTableName',
					'defaultLanguage',
					'exportDetail',
					'exportAll',
					'requireColumns',
					'moreOption',
					'actionCol',
				],
				'safe'
			],
		] );
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return array_merge( parent::attributeLabels(), [
			'modelClass'          => 'Tên model class',
			'controllerClass'     => 'Tên controller class',
			'viewPath'            => 'Đường dẫn folder view của module',
			'baseControllerClass' => 'Base Controller Class',
			'indexWidgetType'     => 'Widget Used in Index Page',
			'searchModelClass'    => 'Search Model Class',
			'enablePjax'          => 'Enable Pjax',
			'isIndexFixed'        => 'Fixed column',
			'isFilter'            => 'Tìm kiếm',
			'enableI18N'          => 'Đa ngôn ngữ',
			'messageCategory'     => 'Tên category nếu kích hoạt đa ngôn ngữ',
			'isModule'            => 'Tạo file cho module',
			'hasDetail'           => 'Sử dụng table con cấp 1',
			'hasSubDetail'        => 'Sử dụng table con cấp 2',
			'subTableName'        => 'Tên table con cấp 1',
			'subDetailTableName'  => 'Tên table con cấp 2',
			'defaultLanguage'     => 'Ngôn ngữ mặc định',
			'exportAll'           => 'Xuất excel',
			'requireColumns'      => 'Cột bắt buộc',
			'skippedColumns'      => 'Các cột bỏ qua',
			'skippedIndexColumns' => 'Các cột bỏ qua',
			'actionCol'           => 'Cột hành động',
		] );
	}

	/**
	 * @inheritdoc
	 */
	public function hints() {
		return array_merge( parent::hints(), [
			'modelClass'          => 'This is the ActiveRecord class associated with the table that CRUD will be built upon.
                You should provide a fully qualified class name, e.g., <code>app\models\Post</code>.',
			'controllerClass'     => 'This is the name of the controller class to be generated. You should
                provide a fully qualified namespaced class (e.g. <code>app\controllers\PostController</code>),
                and class name should be in CamelCase with an uppercase first letter. Make sure the class
                is using the same namespace as specified by your application\'s controllerNamespace property.',
			'viewPath'            => 'Specify the directory for storing the view scripts for the controller. You may use path alias here, e.g.,
                <code>material/views/product</code>. If not set, it will default to <code>@backend/views/ControllerID</code>',
			'baseControllerClass' => 'This is the class that the new CRUD controller class will extend from.
                You should provide a fully qualified class name, e.g., <code>yii\web\Controller</code>.',
			'indexWidgetType'     => 'This is the widget type to be used in the index page to display list of the models.
                You may choose either <code>GridView</code> or <code>ListView</code>',
			'searchModelClass'    => 'This is the name of the search model class to be generated. You should provide a fully
                qualified namespaced class name, e.g., <code>app\models\PostSearch</code>.',
			'enablePjax'          => 'This indicates whether the generator should wrap the <code>GridView</code> or <code>ListView</code>
                widget on the index page with <code>yii\widgets\Pjax</code> widget. Set this to <code>true</code> if you want to get
                sorting, filtering and pagination without page refreshing.',
		] );
	}

	/**
	 * @inheritdoc
	 */
	public function requiredTemplates() {
		return [ 'controller.php' ];
	}

	/**
	 * @inheritdoc
	 */
	public function stickyAttributes() {
		return array_merge( parent::stickyAttributes(), [ 'baseControllerClass', 'indexWidgetType', 'isModal' ] );
	}

	/**
	 * Checks if model class is valid
	 */
	public function validateModelClass() {
		/* @var $class ActiveRecord */
		$class = $this->modelClass;
		$pk    = $class::primaryKey();
		if ( empty( $pk ) ) {
			$this->addError( 'modelClass', "The table associated with $class must have primary key(s)." );
		}
	}

	/**
	 * @inheritdoc
	 * @throws \yii\base\InvalidConfigException
	 * @throws \yii\base\InvalidParamException
	 */
	public function generate() {
		$controllerFile = Yii::getAlias( '@' . str_replace( '\\', '/', ltrim( $this->controllerClass, '\\' ) ) . '.php' );
		if ( $this->hasDetail ) {
			$this->detailColumns = $this->getTableSchema( 'backend\models\\' . Inflector::camelize( $this->subTableName ) )->columns;
			if ( $this->hasSubDetail ) {
				$this->subDetailColumns = $this->getTableSchema( 'backend\models\\' . Inflector::camelize( $this->subDetailTableName ) )->columns;
			}
		}
		$files = [
			new CodeFile( $controllerFile, $this->render( 'controller.php', [ 'isModal' => $this->isModal ] ) ),
		];

		$viewPath        = $this->getViewPath();
		$templatePhpPath = $this->getTemplatePath() . '/views';
		foreach ( scandir( $templatePhpPath ) as $file ) {
			if ( ( ! $this->isFilter && $file === '_search.php' )
			     || ( ! $this->hasSubDetail && $file === '_modal_sub_detail.php' )
			     || ( ! $this->hasSubDetail && $file === '_modal_view_sub_detail.php' )
			) {
				continue;
			}
			if ( is_file( $templatePhpPath . '/' . $file ) && pathinfo( $file, PATHINFO_EXTENSION ) === 'php' ) {
				$files[] = new CodeFile( "$viewPath/$file", $this->render( "views/$file" ) );
			}
		}

		return $files;
	}

	/**
	 * @return string the controller ID (without the module ID prefix)
	 */
	public function getControllerID() {
		$pos   = strrpos( $this->controllerClass, '\\' );
		$class = substr( substr( $this->controllerClass, $pos + 1 ), 0, - 10 );

		return Inflector::camel2id( $class );
	}

	/**
	 * @return string the controller view path
	 * @throws \yii\base\InvalidParamException
	 */
	public function getViewPath() {
		if ( $this->isModule ) {
			return Yii::getAlias( '@backend/modules/' . $this->viewPath );
		}

		if ( empty( $this->viewPath ) ) {
			return Yii::getAlias( '@app/views/' . $this->getControllerID() );
		}

		return Yii::getAlias( $this->viewPath );
	}

	public function getNameAttribute() {
		foreach ( $this->getColumnNames() as $name ) {
			if ( StringHelper::endsWith( $name, 'name' ) || StringHelper::endsWith( $name, 'code' ) ) {
				return $name;
			}
		}
		/* @var $class \yii\db\ActiveRecord */
		$class = $this->modelClass;
		$pk    = $class::primaryKey();

		return $pk[0];
	}

	public function getDeleteAttribute() {
		return 'status';
	}

	/**
	 * Generates code for active field
	 *
	 * @param string $attribute
	 *
	 * @return string
	 * @throws \yii\base\InvalidConfigException
	 */
	public function generateActiveField( $attribute ) {
		$tableSchema = $this->getTableSchema();
		if ( $tableSchema === false || ! isset( $tableSchema->columns[ $attribute ] ) ) {
			if ( preg_match( '/^(password|pass|passwd|passcode)$/i', $attribute ) ) {
				return "\$form->field(\$model, '$attribute')->passwordInput()";
			}

			return "\$form->field(\$model, '$attribute')";
		}
		$column = $tableSchema->columns[ $attribute ];
		if ( $column->phpType === 'boolean' ) {
			return "\$form->field(\$model, '$attribute')->checkbox()";
		}

		if ( $column->type === 'text' ) {
			return "\$form->field(\$model, '$attribute')->textarea(['rows' => 6])";
		}

		if ( preg_match( '/^(password|pass|passwd|passcode)$/i', $column->name ) ) {
			$input = 'passwordInput';
		} else {
			$input = 'textInput';
		}
		if ( is_array( $column->enumValues ) && count( $column->enumValues ) > 0 ) {
			$dropDownOptions = [];
			foreach ( $column->enumValues as $enumValue ) {
				$dropDownOptions[ $enumValue ] = Inflector::humanize( $enumValue );
			}

			return "\$form->field(\$model, '$attribute')->dropDownList("
			       . preg_replace( "/\n\s*/", ' ', VarDumper::export( $dropDownOptions ) ) . ", ['prompt' => ''])";
		}

		if ( $column->phpType !== 'string' || $column->size === null ) {
			return "\$form->field(\$model, '$attribute')->$input()";
		}

		return "\$form->field(\$model, '$attribute')->$input(['maxlength' => true])";
	}

	/**
	 * Generates code for active search field
	 *
	 * @param string $attribute
	 *
	 * @return string
	 * @throws \yii\base\InvalidConfigException
	 */
	public function generateActiveSearchField( $attribute ) {
		$tableSchema = $this->getTableSchema();
		if ( $tableSchema === false ) {
			return "\$form->field(\$model, '$attribute')";
		}
		$column = $tableSchema->columns[ $attribute ];
		if ( $column->phpType === 'boolean' ) {
			return "\$form->field(\$model, '$attribute')->checkbox()";
		}

		return "\$form->field(\$model, '$attribute')";
	}

	/**
	 * Generates column format
	 *
	 * @param \yii\db\ColumnSchema $column
	 *
	 * @return string
	 */
	public function generateColumnFormat( $column ) {
		if ( $column->phpType === 'boolean' ) {
			return 'boolean';
		}

		if ( $column->type === 'text' ) {
			return 'ntext';
		}

		if ( stripos( $column->name, 'time' ) !== false && $column->phpType === 'integer' ) {
			return 'datetime';
		}

		if ( stripos( $column->name, 'email' ) !== false ) {
			return 'email';
		}

		if ( stripos( $column->name, 'url' ) !== false ) {
			return 'url';
		}

		return 'text';
	}

	/**
	 * Generates validation rules for the search model.
	 * @return array the generated validation rules
	 * @throws \yii\base\InvalidConfigException
	 */
	public function generateSearchRules() {
		if ( ( $table = $this->getTableSchema() ) === false ) {
			return [ "[['" . implode( "', '", $this->getColumnNames() ) . "'], 'safe']" ];
		}
		$types = [];
		foreach ( $table->columns as $column ) {
			switch ( $column->type ) {
				case Schema::TYPE_SMALLINT:
				case Schema::TYPE_INTEGER:
				case Schema::TYPE_BIGINT:
					$types['integer'][] = $column->name;
					break;
				case Schema::TYPE_BOOLEAN:
					$types['boolean'][] = $column->name;
					break;
				case Schema::TYPE_FLOAT:
				case Schema::TYPE_DOUBLE:
				case Schema::TYPE_DECIMAL:
				case Schema::TYPE_MONEY:
					$types['number'][] = $column->name;
					break;
				case Schema::TYPE_DATE:
				case Schema::TYPE_TIME:
				case Schema::TYPE_DATETIME:
				case Schema::TYPE_TIMESTAMP:
				default:
					$types['safe'][] = $column->name;
					break;
			}
		}

		$rules = [];
		foreach ( $types as $type => $columns ) {
			$rules[] = "[['" . implode( "', '", $columns ) . "'], '$type']";
		}

		return $rules;
	}

	/**
	 * @return array searchable attributes
	 * @throws \yii\base\InvalidConfigException
	 */
	public function getSearchAttributes() {
		return $this->getColumnNames();
	}

	/**
	 * Generates the attribute labels for the search model.
	 * @return array the generated attribute labels (name => label)
	 * @throws \yii\base\InvalidConfigException
	 */
	public function generateSearchLabels() {
		/* @var $model \yii\base\Model */
		$model           = new $this->modelClass();
		$attributeLabels = $model->attributeLabels();
		$labels          = [];
		foreach ( $this->getColumnNames() as $name ) {
			if ( isset( $attributeLabels[ $name ] ) ) {
				$labels[ $name ] = $attributeLabels[ $name ];
			} else {
				if ( ! strcasecmp( $name, 'id' ) ) {
					$labels[ $name ] = 'ID';
				} else {
					$label = Inflector::camel2words( $name );
					if ( ! empty( $label ) && substr_compare( $label, ' id', - 3, 3, true ) === 0 ) {
						$label = substr( $label, 0, - 3 ) . ' ID';
					}
					$labels[ $name ] = $label;
				}
			}
		}

		return $labels;
	}

	/**
	 * Generates search conditions
	 * @return array
	 * @throws \yii\base\InvalidConfigException
	 */
	public function generateSearchConditions() {
		$columns = [];
		if ( ( $table = $this->getTableSchema() ) === false ) {
			$class = $this->modelClass;
			/* @var $model \yii\base\Model */
			$model = new $class();
			foreach ( $model->attributes() as $attribute ) {
				$columns[ $attribute ] = 'unknown';
			}
		} else {
			foreach ( $table->columns as $column ) {
				$columns[ $column->name ] = $column->type;
			}
		}

		$likeConditions = [];
		$hashConditions = [];
		foreach ( $columns as $column => $type ) {
			switch ( $type ) {
				case Schema::TYPE_SMALLINT:
				case Schema::TYPE_INTEGER:
				case Schema::TYPE_BIGINT:
				case Schema::TYPE_BOOLEAN:
				case Schema::TYPE_FLOAT:
				case Schema::TYPE_DOUBLE:
				case Schema::TYPE_DECIMAL:
				case Schema::TYPE_MONEY:
				case Schema::TYPE_DATE:
				case Schema::TYPE_TIME:
				case Schema::TYPE_DATETIME:
				case Schema::TYPE_TIMESTAMP:
					$hashConditions[] = "'{$column}' => \$this->{$column},";
					break;
				default:
					$likeConditions[] = "->andFilterWhere(['like', '{$column}', \$this->{$column}])";
					break;
			}
		}

		$conditions = [];
		if ( ! empty( $hashConditions ) ) {
			$conditions[] = "\$query->andFilterWhere([\n"
			                . str_repeat( ' ', 12 ) . implode( "\n" . str_repeat( ' ', 12 ), $hashConditions )
			                . "\n" . str_repeat( ' ', 8 ) . "]);\n";
		}
		if ( ! empty( $likeConditions ) ) {
			$conditions[] = '$query' . implode( "\n" . str_repeat( ' ', 12 ), $likeConditions ) . ";\n";
		}

		return $conditions;
	}

	/**
	 * Generates URL parameters
	 * @return string
	 */
	public function generateUrlParams() {
		/* @var $class ActiveRecord */
		$class             = $this->modelClass;
		$pks               = $class::primaryKey();
		$modelVariableName = Inflector::variablize( StringHelper::basename( $this->modelClass ) );
		if ( count( $pks ) === 1 ) {
			if ( is_subclass_of( $class, 'yii\mongodb\ActiveRecord' ) ) {
				return "'id' => (string)\${$modelVariableName}->{$pks[0]}";
			}

			return "'id' => \${$modelVariableName}->{$pks[0]}";
		} else {
			$params = [];
			foreach ( $pks as $pk ) {
				if ( is_subclass_of( $class, 'yii\mongodb\ActiveRecord' ) ) {
					$params[] = "'$pk' => (string)\${$modelVariableName}->$pk";
				} else {
					$params[] = "'$pk' => \${$modelVariableName}->$pk";
				}
			}

			return implode( ', ', $params );
		}
	}

	/**
	 * Generates action parameters
	 * @return string
	 */
	public function generateActionParams() {
		/* @var $class ActiveRecord */
		$class = $this->modelClass;
		$pks   = $class::primaryKey();
		if ( count( $pks ) === 1 ) {
			return '$id';
		}

		return '$' . implode( ', $', $pks );
	}

	/**
	 * Generates parameter tags for phpdoc
	 * @return array parameter tags for phpdoc
	 * @throws \yii\base\InvalidConfigException
	 */
	public function generateActionParamComments() {
		/* @var $class ActiveRecord */
		$class = $this->modelClass;
		$pks   = $class::primaryKey();
		if ( ( $table = $this->getTableSchema() ) === false ) {
			$params = [];
			foreach ( $pks as $pk ) {
				$params[] = '@param ' . ( substr( strtolower( $pk ), - 2 ) == 'id' ? 'integer' : 'string' ) . ' $' . $pk;
			}

			return $params;
		}
		if ( count( $pks ) === 1 ) {
			return [ '@param ' . $table->columns[ $pks[0] ]->phpType . ' $id' ];
		}

		$params = [];
		foreach ( $pks as $pk ) {
			$params[] = '@param ' . $table->columns[ $pk ]->phpType . ' $' . $pk;
		}

		return $params;
	}

	/**
	 * Returns table schema for current model class or false if it is not an active record
	 *
	 * @param string $className
	 *
	 * @return bool|\yii\db\TableSchema
	 * @throws \yii\base\InvalidConfigException
	 */
	public function getTableSchema( $className = '' ) {
		/* @var $class ActiveRecord */
		$class = $className !== '' ? $className : $this->modelClass;
		if ( is_subclass_of( $class, ActiveRecord::class ) ) {
			return $class::getTableSchema();
		}

		return false;
	}

	/**
	 * @return array model column names
	 * @throws \yii\base\InvalidConfigException
	 */
	public function getColumnNames() {
		/* @var $class ActiveRecord */
		$class = $this->modelClass;
		if ( is_subclass_of( $class, ActiveRecord::class ) ) {
			return $class::getTableSchema()->getColumnNames();
		}

		/* @var $model \yii\base\Model */
		$model = new $class();

		return $model->attributes();
	}

	public function getColumn( $name ) {
		/* @var $class ActiveRecord */
		$class = $this->modelClass;
		if ( is_subclass_of( $class, ActiveRecord::class ) ) {
			return $class::getTableSchema()->getColumn( $name );
		}

		/* @var $model \yii\base\Model */
		$model = new $class();

		return $model->attributes();
	}

	public function getSubColumn( $name, $modelClass ) {
		/* @var $class ActiveRecord */
		$class = $modelClass;
		if ( is_subclass_of( $class, ActiveRecord::class ) ) {
			return $class::getTableSchema()->getColumn( $name );
		}

		/* @var $model \yii\base\Model */
		$model = new $class();

		return $model->attributes();
	}
}