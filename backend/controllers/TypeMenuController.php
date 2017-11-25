<?php

namespace backend\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use yii\web\ServerErrorHttpException;
use yii\web\MethodNotAllowedHttpException;
use backend\models\TypeMenu;
use common\utils\controller\Controller;
use common\utils\table\TableFacade;
use backend\models\table\TypeMenuTable;
use yii\helpers\Url;

class TypeMenuController extends Controller
{
    /**
    * Hiện danh sách TypeMenu.
    *
    * @return string
    */
    public function actionIndex()
    {
		$typeMenu = new TypeMenu();
        return $this->render('index', ['typeMenu' => $typeMenu]);
    }

    /**
    * Load ajax table trang index
    *
    * @return string
    */
    public function actionIndexTable() {
        $tableFacade = new TableFacade( new TypeMenuTable );
        return $tableFacade->getDataTable();
    }

    /**
    * Hiện trang view chi tiết TypeMenu.
    *
    * @return string
    * @throws NotFoundHttpException
    */
	public function actionView()
	{
        $typeMenuId = Yii::$app->request->get('id', '');
        $typeMenu = $this->findModel($typeMenuId);
		return $this->render('view', [
			'typeMenu' => $typeMenu
		]);
	}

    /**
    * Hiện trang create TypeMenu.
    *
    * @return string
    */
    public function actionCreate()
    {
		$typeMenu = new TypeMenu();
		return $this->render('create', [
			'typeMenu' => $typeMenu,
		]);
    }

    /**
    * Hiện trang update TypeMenu.
    *
    * @return string
    * @throws NotFoundHttpException
    */
	public function actionUpdate()
	{
        $typeMenuId = Yii::$app->request->get('id', '');
		$typeMenu = $this->findModel($typeMenuId);
		return $this->render('update', [
			'typeMenu' => $typeMenu
		]);
	}

    /**
    * Lưu TypeMenu model.
    *
    * @return string:
    * - url: lưu thành công
    * - json: lưu thất bại, trả vể object lỗi
    * - An internal server error occurred: không load được model
    * @throws \yii\base\InvalidParamException
    * @throws NotFoundHttpException
    * @throws ServerErrorHttpException
    * @throws \yii\base\Exception
    * @throws \yii\db\Exception
    * @throws \yii\base\InvalidCallException
    */
	public function actionSave() {
		$typeMenuId = Yii::$app->request->post('TypeMenu')['id'];
		$typeMenu   = $typeMenuId != '' ? $this->findModel($typeMenuId) : new TypeMenu();

		if ( $typeMenu->load( Yii::$app->request->post() ) ) {
			if ( $typeMenu->save() ) {
				return Url::to( [ 'index' ], true );
			}

			return $this->asJson($typeMenu->errors);
		}

		throw new ServerErrorHttpException( Yii::t('yii', 'An internal server error occurred.') );
	}


    /**
    * Cập nhật status TypeMenu.
    *
    * @return string
    * @throws NotFoundHttpException
    */
    public function actionDelete() {
        $typeMenuId = Yii::$app->request->post( 'id', '');
        $typeMenu = TypeMenu::findOne(['id' => $typeMenuId, 'status' => 1]);
        return $typeMenu != null && $typeMenu->updateAttributes( [ 'status' => -1 ] ) > 0 ? 'success' : 'fail';
    }

    /**
     * Select2 ajax TypeMenu.
     *
     * @return \yii\web\Response
     * @throws MethodNotAllowedHttpException
     */
	public function actionSelectTypeMenu() {
        if (Yii::$app->request->isAjax) {
            $query  = Yii::$app->request->get( 'query', '' );
            $page   = Yii::$app->request->get( 'page', 1 );
            $excludeIds = Yii::$app->request->get( 'excludeIds', [] );
            $offset = ($page - 1) * 10;
            $typeMenus = TypeMenu::find()->where( [ 'status' => 1 ] )
                                                                    ->andFilterWhere( [ 'not in', 'id', $excludeIds ] )
                                                                    ->andFilterWhere( [ 'like', 'name', $query ] )->select( [ 'id', 'name' ] );

            return $this->asJson( [
                'total_count' => $typeMenus->count(),
                'items'       => $typeMenus->offset($offset)->limit( 10 )->all()
            ] );
        }

        throw new MethodNotAllowedHttpException(Yii::t('yii', 'Method Not Allowed'));
	}


	/**
	* Tìm TypeMenu model theo khóa chính.
	* Nếu không tìm thấy, trả về trang 404.
    *
	* @param $typeMenuId
	* @return TypeMenu the loaded model
	* @throws NotFoundHttpException if the model cannot be found
	*/
    protected function findModel($typeMenuId) {
        if (($model = TypeMenu::findOne(['id' => $typeMenuId, 'status' => 1])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t( 'yii', 'Page not found.'));
    }
}
