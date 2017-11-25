<?php

namespace backend\models\base;
use yii\db\ActiveRecord;
use backend\models\query\OrderRoomDetailQuery;
use backend\models\OrderRoom;
use backend\models\Room;


/**
* This is the model class for table "order_room_detail".
*
* @property integer $id
* @property integer $order_room_id
* @property integer $room_id
* @property integer $created_by
* @property integer $modified_by
* @property integer $created_date
* @property integer $modified_date
* @property integer $price_room_id
* @property integer $status
*
* @property OrderRoom $orderRoom
* @property Room $room
*/
class OrderRoomDetailBase extends ActiveRecord {
    /**
    * @inheritdoc
    */
    public static function tableName()
    {
        return 'order_room_detail';
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        return [
            [['order_room_id', 'room_id', 'price_room_id', 'status'], 'integer'],
            [['order_room_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrderRoom::className(), 'targetAttribute' => ['order_room_id' => 'id']],
            [['room_id'], 'exist', 'skipOnError' => true, 'targetClass' => Room::className(), 'targetAttribute' => ['room_id' => 'id']]
        ];
    }


    /**
    * @return \yii\db\ActiveQuery
    */
    public function getOrderRoom()
    {
        return $this->hasOne(OrderRoom::className(), ['id' => 'order_room_id']);
    }

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getRoom()
    {
        return $this->hasOne(Room::className(), ['id' => 'room_id']);
    }

    /**
    * @inheritdoc
    * @return OrderRoomDetailQuery the active query used by this AR class.
    */
    public static function find()
    {
        return new OrderRoomDetailQuery(get_called_class());
    }
}
