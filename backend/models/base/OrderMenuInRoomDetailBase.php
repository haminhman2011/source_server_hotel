<?php

namespace backend\models\base;
use yii\db\ActiveRecord;
use backend\models\query\OrderMenuInRoomDetailQuery;
use backend\models\Menu;
use backend\models\OrderRoom;


/**
* This is the model class for table "order_menu_in_room_detail".
*
* @property integer $id
* @property integer $order_room_id
* @property integer $menu_id
* @property integer $quantity
* @property string $note
* @property integer $created_by
* @property integer $modified_by
* @property integer $created_date
* @property integer $modified_date
* @property integer $status
*
* @property Menu $menu
* @property OrderRoom $orderRoom
*/
class OrderMenuInRoomDetailBase extends ActiveRecord {
    /**
    * @inheritdoc
    */
    public static function tableName()
    {
        return 'order_menu_in_room_detail';
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        return [
            [['order_room_id', 'menu_id', 'quantity', 'status'], 'integer'],
            [['note'], 'string'],
            [['menu_id'], 'exist', 'skipOnError' => true, 'targetClass' => Menu::className(), 'targetAttribute' => ['menu_id' => 'id']],
            [['order_room_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrderRoom::className(), 'targetAttribute' => ['order_room_id' => 'id']]
        ];
    }


    /**
    * @return \yii\db\ActiveQuery
    */
    public function getMenu()
    {
        return $this->hasOne(Menu::className(), ['id' => 'menu_id']);
    }

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getOrderRoom()
    {
        return $this->hasOne(OrderRoom::className(), ['id' => 'order_room_id']);
    }

    /**
    * @inheritdoc
    * @return OrderMenuInRoomDetailQuery the active query used by this AR class.
    */
    public static function find()
    {
        return new OrderMenuInRoomDetailQuery(get_called_class());
    }
}
