<?php

namespace backend\models\base;
use yii\db\ActiveRecord;
use backend\models\query\FloorQuery;
use backend\models\Room;


/**
* This is the model class for table "floor".
*
* @property integer $id
* @property string $name
* @property integer $created_by
* @property integer $modified_by
* @property integer $created_date
* @property integer $modified_date
* @property integer $status
*
* @property Room[] $rooms
*/
class FloorBase extends ActiveRecord {
    /**
    * @inheritdoc
    */
    public static function tableName()
    {
        return 'floor';
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 250]
        ];
    }


    /**
    * @return \yii\db\ActiveQuery
    */
    public function getRooms()
    {
        return $this->hasMany(Room::className(), ['floor_id' => 'id']);
    }

    /**
    * @inheritdoc
    * @return FloorQuery the active query used by this AR class.
    */
    public static function find()
    {
        return new FloorQuery(get_called_class());
    }
}
