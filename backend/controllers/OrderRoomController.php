<?php

namespace backend\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use yii\web\ServerErrorHttpException;
use yii\web\MethodNotAllowedHttpException;
use backend\models\OrderRoom;
use common\utils\controller\Controller;
use common\utils\table\TableFacade;
use backend\models\table\OrderRoomTable;
use yii\helpers\Url;
use backend\models\OrderRoomDetail;
use backend\models\OrderMenuInRoomDetail;
use common\utils\model\ModelBuilder;
use common\utils\model\Model;
use yii\base\Exception;

class OrderRoomController extends Controller
{
    /**
    * Hiện danh sách OrderRoom.
    *
    * @return string
    */
    public function actionIndex()
    {
		$orderRoom = new OrderRoom();
        return $this->render('index', ['orderRoom' => $orderRoom]);
    }

    /**
    * Load ajax table trang index
    *
    * @return string
    */
    public function actionIndexTable() {
        $tableFacade = new TableFacade( new OrderRoomTable );
        return $tableFacade->getDataTable();
    }

    /**
    * Hiện trang view chi tiết OrderRoom.
    *
    * @return string
    * @throws NotFoundHttpException
    */
	public function actionView()
	{
        $orderRoomId = Yii::$app->request->get('id', '');
        $orderRoom = $this->findModel($orderRoomId);
		$orderRoomDetails = OrderRoomDetail::find()->where( [ 'status' => 1, 'order_room_id' => $orderRoomId ] )->all();
		$orderRoomDetail = new OrderRoomDetail();
        $orderMenuInRoomDetails = OrderMenuInRoomDetail::find()->where( [ 'status' => 1, 'order_room_id' => $orderRoomId ] )->all();
        $orderMenuInRoomDetail = new OrderMenuInRoomDetail();
		return $this->render('view', [
			'orderRoom' => $orderRoom,
			'orderRoomDetails' => $orderRoomDetails,
			'orderRoomDetail' => $orderRoomDetail,
            'orderMenuInRoomDetails' => $orderMenuInRoomDetails,
            'orderMenuInRoomDetail' => $orderMenuInRoomDetail
		]);
	}

    /**
    * Hiện trang create OrderRoom.
    *
    * @return string
    */
    public function actionCreate()
    {
		$orderRoom = new OrderRoom();
		$orderRoomDetail = new OrderRoomDetail();
        $orderMenuInRoomDetail = new OrderMenuInRoomDetail();
		return $this->render('create', [
			'orderRoom' => $orderRoom,
			'orderRoomDetail' => $orderRoomDetail,
            'orderMenuInRoomDetail' => $orderMenuInRoomDetail
		]);
    }

    /**
    * Hiện trang update OrderRoom.
    *
    * @return string
    * @throws NotFoundHttpException
    */
	public function actionUpdate()
	{
        $orderRoomId = Yii::$app->request->get('id', '');
		$orderRoom = $this->findModel($orderRoomId);
		$orderRoomDetails = OrderRoomDetail::find()->where( [ 'status' => 1, 'order_room_id' => $orderRoomId ] )->all();
		$orderRoomDetail = new OrderRoomDetail();
        $orderMenuInRoomDetails = OrderMenuInRoomDetail::find()->where( [ 'status' => 1, 'order_room_id' => $orderRoomId ] )->all();
        $orderMenuInRoomDetail = new OrderMenuInRoomDetail();
		return $this->render('update', [
			'orderRoom' => $orderRoom,
			'orderRoomDetails' => $orderRoomDetails,
			'orderRoomDetail' => $orderRoomDetail,
            'orderMenuInRoomDetails' => $orderMenuInRoomDetails,
            'orderMenuInRoomDetail' => $orderMenuInRoomDetail
		]);
	}

    /**
    * Lưu OrderRoom model.
    *
    * @return string:
    * - url: lưu model OrderRoom thành công
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
		$orderRoomId = Yii::$app->request->post( 'OrderRoom' )['id'];
        $orderRoom   = $orderRoomId != '' ? $this->findModel($orderRoomId) : new OrderRoom();
		if ( $orderRoom->load( Yii::$app->request->post() ) ) {
			$transaction = Yii::$app->db->beginTransaction();
			try {
                $result = $orderRoom->save();
				if ( $result && (! $orderRoom->isNewRecord || array_key_exists( 'OrderRoomDetail', Yii::$app->request->post()))) {
                    $builder = new ModelBuilder($orderRoom->id);
                    $builder->setSubModel(OrderRoomDetail::className())->setRelation('orderRoomDetails')->setForeignKey('order_room_id');
					$result    = Model::saveMultiple( $orderRoom, $builder );
				}
				if ( is_bool($result) && $result ) {
					$transaction->commit();
                    return Url::to( ['index'], true );
				}
                if (is_array($result) && ! empty($result)) {
                    return $this->asJson( $result );
                }
                return $this->asJson($orderRoom->errors);
			} catch ( Exception $e ) {
				$transaction->rollBack();
                Yii::error($e->getMessage() . "\n" . __FUNCTION__ . ' ----- ' . __CLASS__, 'system');

				return $e->getMessage();
			}
		}

		throw new ServerErrorHttpException( Yii::t( 'yii', 'An internal server error occurred.' ) );
	}


    /**
    * Cập nhật status OrderRoom.
    *
    * @return string
    * @throws NotFoundHttpException
    */
    public function actionDelete() {
        $orderRoomId = Yii::$app->request->post( 'id', '');
        $orderRoom = OrderRoom::findOne(['id' => $orderRoomId, 'status' => 1]);
        $transaction = Yii::$app->db->beginTransaction();
        try {
            if ($orderRoom->updateAttributes( [ 'status' => -1 ] ) > 0) {
                OrderRoomDetail::updateAll( [ 'status' => -1 ], [ 'order_room_id' => $orderRoomId ] );
                $transaction->commit();
                return 'success';
            }
            return 'fail';
        } catch ( Exception $e ) {
            $transaction->rollBack();
            Yii::error($e->getMessage() . "\n" . __FUNCTION__ . ' ----- ' . __CLASS__, 'system');

            return $e->getMessage();
        }
    }

    /**
     * Select2 ajax OrderRoom.
     *
     * @return \yii\web\Response
     * @throws MethodNotAllowedHttpException
     */
	public function actionSelectOrderRoom() {
        if (Yii::$app->request->isAjax) {
            $query  = Yii::$app->request->get( 'query', '' );
            $page   = Yii::$app->request->get( 'page', 1 );
            $excludeIds = Yii::$app->request->get( 'excludeIds', [] );
            $offset = ($page - 1) * 10;
            $orderRooms = OrderRoom::find()->where( [ 'status' => 1 ] )
                                                                    ->andFilterWhere( [ 'not in', 'id', $excludeIds ] )
                                                                    ->andFilterWhere( [ 'like', 'full_name', $query ] )->select( [ 'id', 'full_name' ] );

            return $this->asJson( [
                'total_count' => $orderRooms->count(),
                'items'       => $orderRooms->offset($offset)->limit( 10 )->all()
            ] );
        }

        throw new MethodNotAllowedHttpException(Yii::t('yii', 'Method Not Allowed'));
	}


	/**
	* Tìm OrderRoom model theo khóa chính.
	* Nếu không tìm thấy, trả về trang 404.
    *
	* @param $orderRoomId
	* @return OrderRoom the loaded model
	* @throws NotFoundHttpException if the model cannot be found
	*/
    protected function findModel($orderRoomId) {
        if (($model = OrderRoom::findOne(['id' => $orderRoomId, 'status' => 1])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t( 'yii', 'Page not found.'));
    }
}
