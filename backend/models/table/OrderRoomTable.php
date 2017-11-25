<?php

namespace backend\models\table;

use \backend\models\OrderRoom;
use common\utils\table\DataTable;
use yii\helpers\Url;
use Yii;

class OrderRoomTable extends DataTable
{
    /*public function __construct() {
		parent::__construct();
        $arguments = Yii::$app->request->post();
	}*/

	/**
	* Tạo danh sách OrderRoom
.
	* @return array
    * @throws \yii\base\InvalidParamException
	*/
	public function getData()
	{
		$models = $this->getModels();
		$dataArray = [];
		foreach ($models as $model) {
            $htmlAction  = "<a class='btn yellow-gold link-view-order-room' title='Xem' data-id='$model->id' href='".Url::to(['view', 'id' => $model->id])."'><i class='fa fa-eye' aria-hidden='true'></i> </a>";
            if ( Yii::$app->permission->can( Yii::$app->controller->id , 'update' )) {
                $htmlAction .= " <a class='btn green-steel btn-update-order-room' title='Sửa' data-id='$model->id' href='".Url::to(['update', 'id' => $model->id])."'><i class='fa fa-pencil' aria-hidden='true'></i> </a>";
            }
            if ( Yii::$app->permission->can( Yii::$app->controller->id , 'delete' )) {
                $htmlAction .= " <button class='btn red-mint btn-delete-order-room' title='Xóa' data-id='$model->id' data-url='".Url::to(['delete'])."'><i class='fa fa-trash' aria-hidden='true'></i> </button>";
            }
			$dataArray[] = [
                "<label class='mt-checkbox mt-checkbox-single mt-checkbox-outline'><input class='cb-single' type='checkbox' data-id='$model->id'><span></span></label>",
				$model->full_name,
				$model->phone,
				$model->email,
				\Yii::$app->formatter->asDate($model->check_in_date),
				\Yii::$app->formatter->asDate($model->check_out_date),
				$model->note,
				$htmlAction
			];
		}
		return $dataArray;
	}

	/**
	* Tìm OrderRoom.
	* @return OrderRoom[].
	*/
	public function getModels()
	{
		$column = $this->getColumn();
        $models = OrderRoom::find()->where(['order_room.status' => 1])
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
				$field = 'full_name';
				break;
			case '2':
				$field = 'phone';
				break;
			case '3':
				$field = 'email';
				break;
			case '4':
				$field = 'check_in_date';
				break;
			case '5':
				$field = 'check_out_date';
				break;
			case '6':
				$field = 'note';
				break;
			default:
				$field = 'id';
				break;
		}
		return $field;
	}
}

?>