<?php

namespace backend\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use yii\web\ServerErrorHttpException;
use yii\web\MethodNotAllowedHttpException;
use backend\models\Menu;
use common\utils\controller\Controller;
use common\utils\table\TableFacade;
use backend\models\table\MenuTable;
use yii\helpers\Url;

class MenuController extends Controller
{
    /**
    * Hiện danh sách Menu.
    *
    * @return string
    */
    public function actionIndex()
    {
		$menu = new Menu();
        return $this->render('index', ['menu' => $menu]);
    }

    /**
    * Load ajax table trang index
    *
    * @return string
    */
    public function actionIndexTable() {
        $tableFacade = new TableFacade( new MenuTable );
        return $tableFacade->getDataTable();
    }

    /**
    * Hiện trang view chi tiết Menu.
    *
    * @return string
    * @throws NotFoundHttpException
    */
	public function actionView()
	{
        $menuId = Yii::$app->request->get('id', '');
        $menu = $this->findModel($menuId);
		return $this->render('view', [
			'menu' => $menu
		]);
	}

    /**
    * Hiện trang create Menu.
    *
    * @return string
    */
    public function actionCreate()
    {
		$menu = new Menu();
		return $this->render('create', [
			'menu' => $menu,
		]);
    }

    /**
    * Hiện trang update Menu.
    *
    * @return string
    * @throws NotFoundHttpException
    */
	public function actionUpdate()
	{
        $menuId = Yii::$app->request->get('id', '');
		$menu = $this->findModel($menuId);
		return $this->render('update', [
			'menu' => $menu
		]);
	}

    /**
    * Lưu Menu model.
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
		$menuId = Yii::$app->request->post('Menu')['id'];
		$menu   = $menuId != '' ? $this->findModel($menuId) : new Menu();

		if ( $menu->load( Yii::$app->request->post() ) ) {
			if ( $menu->save() ) {
				return Url::to( [ 'index' ], true );
			}

			return $this->asJson($menu->errors);
		}

		throw new ServerErrorHttpException( Yii::t('yii', 'An internal server error occurred.') );
	}


    /**
    * Cập nhật status Menu.
    *
    * @return string
    * @throws NotFoundHttpException
    */
    public function actionDelete() {
        $menuId = Yii::$app->request->post( 'id', '');
        $menu = Menu::findOne(['id' => $menuId, 'status' => 1]);
        return $menu != null && $menu->updateAttributes( [ 'status' => -1 ] ) > 0 ? 'success' : 'fail';
    }

    /**
     * Select2 ajax Menu.
     *
     * @return \yii\web\Response
     * @throws MethodNotAllowedHttpException
     */
	public function actionSelectMenu() {
        if (Yii::$app->request->isAjax) {
            $query  = Yii::$app->request->get( 'query', '' );
            $page   = Yii::$app->request->get( 'page', 1 );
            $excludeIds = Yii::$app->request->get( 'excludeIds', [] );
            $offset = ($page - 1) * 10;
            $menus = Menu::find()->where( [ 'status' => 1 ] )
                                                                    ->andFilterWhere( [ 'not in', 'id', $excludeIds ] )
                                                                    ->andFilterWhere( [ 'like', 'name', $query ] )->select( [ 'id', 'name' ] );

            return $this->asJson( [
                'total_count' => $menus->count(),
                'items'       => $menus->offset($offset)->limit( 10 )->all()
            ] );
        }

        throw new MethodNotAllowedHttpException(Yii::t('yii', 'Method Not Allowed'));
	}


	/**
	* Tìm Menu model theo khóa chính.
	* Nếu không tìm thấy, trả về trang 404.
    *
	* @param $menuId
	* @return Menu the loaded model
	* @throws NotFoundHttpException if the model cannot be found
	*/
    protected function findModel($menuId) {
        if (($model = Menu::findOne(['id' => $menuId, 'status' => 1])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t( 'yii', 'Page not found.'));
    }
}
