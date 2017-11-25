<?php

namespace backend\models;
use \backend\models\base\RoomBase;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
/**
* @inheritdoc
*/
class Room extends RoomBase{
	public function behaviors() {
		return [
			[
				'class'              => BlameableBehavior::className(),
				'createdByAttribute' => 'created_by',
				'updatedByAttribute' => 'modified_by',
			],
			[
				'class'              => TimestampBehavior::className(),
				'createdAtAttribute' => 'created_date',
				'updatedAtAttribute' => 'modified_date',
				'value'              => time(),
			],
		];
	}

	/**
	* @inheritdoc
	*/
	public function attributeLabels()
	{
		return [
			'name' => 'Name',
			'floor_id' => 'Floor',
			'created_by' => 'Created By',
			'modified_by' => 'Modified By',
			'created_date' => 'Created Date',
			'modified_date' => 'Modified Date',
			'number_of_beds_id' => 'Number Of Beds',
			'status' => 'Status',
		];
	}

    /**
     * Text hiển thị của model
     * @return string
     */
    public function displayText()
    {
        return $this->name;
    }

	//	public function beforeSave( $insert ) {
	//		if ( parent::beforeSave( $insert ) ) {
	//			if ( $insert ) {
	//				//nếu là thêm mới
	//			}
	//
	//			return true;
	//		} else {
	//			return false;
	//		}
	//	}
}
