<?php

namespace backend\models\base;
use yii\db\ActiveRecord;
use backend\models\query\RoomQuery;
use backend\models\OrderRoomDetail;
use backend\models\Floor;
use backend\models\NumberOfBeds;


/**
* This is the model class for table "room".
*
* @property integer $id
* @property string $name
* @property integer $floor_id
* @property integer $created_by
* @property integer $modified_by
* @property integer $created_date
* @property integer $modified_date
* @property integer $number_of_beds_id
* @property integer $status
*
* @property OrderRoomDetail[] $orderRoomDetails
* @property Floor $floor
* @property NumberOfBeds $numberOfBeds
*/
class RoomBase extends ActiveRecord {
    /**
    * @inheritdoc
    */
    public static function tableName()
    {
        return 'room';
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        return [
            [['floor_id', 'number_of_beds_id', 'status'], 'integer'],
            [['name'], 'string', 'max' => 250],
            [['floor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Floor::className(), 'targetAttribute' => ['floor_id' => 'id']],
            [['number_of_beds_id'], 'exist', 'skipOnError' => true, 'targetClass' => NumberOfBeds::className(), 'targetAttribute' => ['number_of_beds_id' => 'id']]
        ];
    }


    /**
    * @return \yii\db\ActiveQuery
    */
    public function getOrderRoomDetails()
    {
        return $this->hasMany(OrderRoomDetail::className(), ['room_id' => 'id']);
    }

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getFloor()
    {
        return $this->hasOne(Floor::className(), ['id' => 'floor_id']);
    }

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getNumberOfBeds()
    {
        return $this->hasOne(NumberOfBeds::className(), ['id' => 'number_of_beds_id']);
    }

    /**
    * @inheritdoc
    * @return RoomQuery the active query used by this AR class.
    */
    public static function find()
    {
        return new RoomQuery(get_called_class());
    }
}
