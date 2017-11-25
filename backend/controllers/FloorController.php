<?php

namespace backend\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use yii\web\ServerErrorHttpException;
use yii\web\MethodNotAllowedHttpException;
use backend\models\floor;
use common\utils\controller\Controller;
use common\utils\table\TableFacade;
use backend\models\table\floorTable;
use yii\helpers\Url;

class FloorController extends Controller
{
    /**
    * Hiện danh sách floor.
    *
    * @return string
    */
    public function actionIndex()
    {
		$floor = new floor();
        return $this->render('index', ['floor' => $floor]);
    }

    /**
    * Load ajax table trang index
    *
    * @return string
    */
    public function actionIndexTable() {
        $tableFacade = new TableFacade( new floorTable );
        return $tableFacade->getDataTable();
    }

    /**
    * Hiện trang view chi tiết floor.
    *
    * @return string
    * @throws NotFoundHttpException
    */
	public function actionView()
	{
        $floorId = Yii::$app->request->get('id', '');
        $floor = $this->findModel($floorId);
		return $this->render('view', [
			'floor' => $floor
		]);
	}

    /**
    * Hiện trang create floor.
    *
    * @return string
    */
    public function actionCreate()
    {
		$floor = new floor();
		return $this->render('create', [
			'floor' => $floor,
		]);
    }

    /**
    * Hiện trang update floor.
    *
    * @return string
    * @throws NotFoundHttpException
    */
	public function actionUpdate()
	{
        $floorId = Yii::$app->request->get('id', '');
		$floor = $this->findModel($floorId);
		return $this->render('update', [
			'floor' => $floor
		]);
	}

    /**
    * Lưu floor model.
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
		$floorId = Yii::$app->request->post('floor')['id'];
		$floor   = $floorId != '' ? $this->findModel($floorId) : new floor();

		if ( $floor->load( Yii::$app->request->post() ) ) {
			if ( $floor->save() ) {
				return Url::to( [ 'index' ], true );
			}

			return $this->asJson($floor->errors);
		}

		throw new ServerErrorHttpException( Yii::t('yii', 'An internal server error occurred.') );
	}


    /**
    * Cập nhật status floor.
    *
    * @return string
    * @throws NotFoundHttpException
    */
    public function actionDelete() {
        $floorId = Yii::$app->request->post( 'id', '');
        $floor = floor::findOne(['id' => $floorId, 'status' => 1]);
        return $floor != null && $floor->updateAttributes( [ 'status' => -1 ] ) > 0 ? 'success' : 'fail';
    }

    /**
     * Select2 ajax floor.
     *
     * @return \yii\web\Response
     * @throws MethodNotAllowedHttpException
     */
	public function actionSelectfloor() {
        if (Yii::$app->request->isAjax) {
            $query  = Yii::$app->request->get( 'query', '' );
            $page   = Yii::$app->request->get( 'page', 1 );
            $excludeIds = Yii::$app->request->get( 'excludeIds', [] );
            $offset = ($page - 1) * 10;
            $floors = floor::find()->where( [ 'status' => 1 ] )
                                                                    ->andFilterWhere( [ 'not in', 'id', $excludeIds ] )
                                                                    ->andFilterWhere( [ 'like', 'name', $query ] )->select( [ 'id', 'name' ] );

            return $this->asJson( [
                'total_count' => $floors->count(),
                'items'       => $floors->offset($offset)->limit( 10 )->all()
            ] );
        }

        throw new MethodNotAllowedHttpException(Yii::t('yii', 'Method Not Allowed'));
	}


	/**
	* Tìm floor model theo khóa chính.
	* Nếu không tìm thấy, trả về trang 404.
    *
	* @param $floorId
	* @return floor the loaded model
	* @throws NotFoundHttpException if the model cannot be found
	*/
    protected function findModel($floorId) {
        if (($model = floor::findOne(['id' => $floorId, 'status' => 1])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t( 'yii', 'Page not found.'));
    }
}
