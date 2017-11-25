<?php

namespace backend\models\base;
use yii\db\ActiveRecord;
use backend\models\query\OrderRoomQuery;
use backend\models\OrderMenuInRoomDetail;
use backend\models\OrderRoomDetail;


/**
* This is the model class for table "order_room".
*
* @property integer $id
* @property string $full_name
* @property string $phone
* @property string $email
* @property integer $check_in_date
* @property integer $check_out_date
* @property string $note
* @property integer $created_by
* @property integer $modified_by
* @property integer $created_date
* @property integer $modified_date
* @property integer $status
*
* @property OrderMenuInRoomDetail[] $orderMenuInRoomDetails
* @property OrderRoomDetail[] $orderRoomDetails
*/
class OrderRoomBase extends ActiveRecord {
    /**
    * @inheritdoc
    */
    public static function tableName()
    {
        return 'order_room';
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        return [
            [['check_in_date', 'check_out_date', 'status'], 'integer'],
            [['note'], 'string'],
            [['full_name', 'email'], 'string', 'max' => 250],
            [['phone'], 'string', 'max' => 50]
        ];
    }


    /**
    * @return \yii\db\ActiveQuery
    */
    public function getOrderMenuInRoomDetails()
    {
        return $this->hasMany(OrderMenuInRoomDetail::className(), ['order_room_id' => 'id']);
    }

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getOrderRoomDetails()
    {
        return $this->hasMany(OrderRoomDetail::className(), ['order_room_id' => 'id']);
    }

    /**
    * @inheritdoc
    * @return OrderRoomQuery the active query used by this AR class.
    */
    public static function find()
    {
        return new OrderRoomQuery(get_called_class());
    }
}
