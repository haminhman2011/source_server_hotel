<?php

namespace backend\models\table;

use \backend\models\OrderRoomDetail;
use common\utils\table\DataTable;
use yii\helpers\Url;
use Yii;

class OrderRoomDetailTable extends DataTable
{
    /*public function __construct() {
		parent::__construct();
        $arguments = Yii::$app->request->post();
	}*/

	/**
	* Tạo danh sách OrderRoomDetail
.
	* @return array
    * @throws \yii\base\InvalidParamException
	*/
	public function getData()
	{
		$models = $this->getModels();
		$dataArray = [];
		foreach ($models as $model) {
            $htmlAction  = "<a class='btn yellow-gold link-view-order-room-detail' title='Xem' data-id='$model->id' href='".Url::to(['view', 'id' => $model->id])."'><i class='fa fa-eye' aria-hidden='true'></i> </a>";
            if ( Yii::$app->permission->can( Yii::$app->controller->id , 'update' )) {
                $htmlAction .= " <a class='btn green-steel btn-update-order-room-detail' title='Sửa' data-id='$model->id' href='".Url::to(['update', 'id' => $model->id])."'><i class='fa fa-pencil' aria-hidden='true'></i> </a>";
            }
            if ( Yii::$app->permission->can( Yii::$app->controller->id , 'delete' )) {
                $htmlAction .= " <button class='btn red-mint btn-delete-order-room-detail' title='Xóa' data-id='$model->id' data-url='".Url::to(['delete'])."'><i class='fa fa-trash' aria-hidden='true'></i> </button>";
            }
			$dataArray[] = [
                "<label class='mt-checkbox mt-checkbox-single mt-checkbox-outline'><input class='cb-single' type='checkbox' data-id='$model->id'><span></span></label>",
				$model->order_room_id !== null ? $model->orderRoom->displayText() : '',
				$model->room_id !== null ? $model->room->displayText() : '',
				number_format( $model->price_room_id, 2 ),
				$htmlAction
			];
		}
		return $dataArray;
	}

	/**
	* Tìm OrderRoomDetail.
	* @return OrderRoomDetail[].
	*/
	public function getModels()
	{
		$column = $this->getColumn();
        $models = OrderRoomDetail::find()->joinWith(['orderRoom','room','priceRoom'])
                                            ->where(['order_room_detail.status' => 1])
                                            ->andFilterWhere([])->distinct();

		$this->totalRecords = $models->count();
        return $models->limit($this->length)
						 ->offset($this->start)
						 ->orderBy([$column => $this->direction])
						 ->all();
	}

	/**
	 * Lấy cột muốn sắp xếp
	 * @return string
	 */
	public function getColumn()
	{
		switch ($this->column) {
			case '1':
				$field = 'order_room_id';
				break;
			case '2':
				$field = 'room_id';
				break;
			case '3':
				$field = 'price_room_id';
				break;
			default:
				$field = 'id';
				break;
		}
		return $field;
	}
}

?>