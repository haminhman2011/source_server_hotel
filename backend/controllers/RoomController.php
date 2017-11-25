<?php

namespace backend\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use yii\web\ServerErrorHttpException;
use yii\web\MethodNotAllowedHttpException;
use backend\models\Room;
use common\utils\controller\Controller;
use common\utils\table\TableFacade;
use backend\models\table\RoomTable;
use yii\helpers\Url;

class RoomController extends Controller
{
    /**
    * Hiện danh sách Room.
    *
    * @return string
    */
    public function actionIndex()
    {
		$room = new Room();
        return $this->render('index', ['room' => $room]);
    }

    /**
    * Load ajax table trang index
    *
    * @return string
    */
    public function actionIndexTable() {
        $tableFacade = new TableFacade( new RoomTable );
        return $tableFacade->getDataTable();
    }

    /**
    * Hiện trang view chi tiết Room.
    *
    * @return string
    * @throws NotFoundHttpException
    */
	public function actionView()
	{
        $roomId = Yii::$app->request->get('id', '');
        $room = $this->findModel($roomId);
		return $this->render('view', [
			'room' => $room
		]);
	}

    /**
    * Hiện trang create Room.
    *
    * @return string
    */
    public function actionCreate()
    {
		$room = new Room();
		return $this->render('create', [
			'room' => $room,
		]);
    }

    /**
    * Hiện trang update Room.
    *
    * @return string
    * @throws NotFoundHttpException
    */
	public function actionUpdate()
	{
        $roomId = Yii::$app->request->get('id', '');
		$room = $this->findModel($roomId);
		return $this->render('update', [
			'room' => $room
		]);
	}

    /**
    * Lưu Room model.
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
		$roomId = Yii::$app->request->post('Room')['id'];
		$room   = $roomId != '' ? $this->findModel($roomId) : new Room();

		if ( $room->load( Yii::$app->request->post() ) ) {
			if ( $room->save() ) {
				return Url::to( [ 'index' ], true );
			}

			return $this->asJson($room->errors);
		}

		throw new ServerErrorHttpException( Yii::t('yii', 'An internal server error occurred.') );
	}


    /**
    * Cập nhật status Room.
    *
    * @return string
    * @throws NotFoundHttpException
    */
    public function actionDelete() {
        $roomId = Yii::$app->request->post( 'id', '');
        $room = Room::findOne(['id' => $roomId, 'status' => 1]);
        return $room != null && $room->updateAttributes( [ 'status' => -1 ] ) > 0 ? 'success' : 'fail';
    }

    /**
     * Select2 ajax Room.
     *
     * @return \yii\web\Response
     * @throws MethodNotAllowedHttpException
     */
	public function actionSelectRoom() {
        if (Yii::$app->request->isAjax) {
            $query  = Yii::$app->request->get( 'query', '' );
            $page   = Yii::$app->request->get( 'page', 1 );
            $excludeIds = Yii::$app->request->get( 'excludeIds', [] );
            $offset = ($page - 1) * 10;
            $rooms = Room::find()->where( [ 'status' => 1 ] )
                                                                    ->andFilterWhere( [ 'not in', 'id', $excludeIds ] )
                                                                    ->andFilterWhere( [ 'like', 'name', $query ] )->select( [ 'id', 'name' ] );

            return $this->asJson( [
                'total_count' => $rooms->count(),
                'items'       => $rooms->offset($offset)->limit( 10 )->all()
            ] );
        }

        throw new MethodNotAllowedHttpException(Yii::t('yii', 'Method Not Allowed'));
	}


	/**
	* Tìm Room model theo khóa chính.
	* Nếu không tìm thấy, trả về trang 404.
    *
	* @param $roomId
	* @return Room the loaded model
	* @throws NotFoundHttpException if the model cannot be found
	*/
    protected function findModel($roomId) {
        if (($model = Room::findOne(['id' => $roomId, 'status' => 1])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t( 'yii', 'Page not found.'));
    }
}
