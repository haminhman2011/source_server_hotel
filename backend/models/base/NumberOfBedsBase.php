<?php

namespace backend\models\base;
use yii\db\ActiveRecord;
use backend\models\query\NumberOfBedsQuery;
use backend\models\Room;


/**
* This is the model class for table "number_of_beds".
*
* @property integer $id
* @property string $name
* @property integer $status
*
* @property Room[] $rooms
*/
class NumberOfBedsBase extends ActiveRecord {
    /**
    * @inheritdoc
    */
    public static function tableName()
    {
        return 'number_of_beds';
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
        return $this->hasMany(Room::className(), ['number_of_beds_id' => 'id']);
    }

    /**
    * @inheritdoc
    * @return NumberOfBedsQuery the active query used by this AR class.
    */
    public static function find()
    {
        return new NumberOfBedsQuery(get_called_class());
    }
}
