<?php

namespace backend\models\base;
use yii\db\ActiveRecord;
use backend\models\query\TypeMenuQuery;


/**
* This is the model class for table "type_menu".
*
* @property integer $id
* @property string $name
* @property integer $status
*/
class TypeMenuBase extends ActiveRecord {
    /**
    * @inheritdoc
    */
    public static function tableName()
    {
        return 'type_menu';
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 250]
        ];
    }


    /**
    * @inheritdoc
    * @return TypeMenuQuery the active query used by this AR class.
    */
    public static function find()
    {
        return new TypeMenuQuery(get_called_class());
    }
}
