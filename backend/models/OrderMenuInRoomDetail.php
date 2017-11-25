<?php

namespace backend\models;
use \backend\models\base\OrderMenuInRoomDetailBase;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
/**
* @inheritdoc
*/
class OrderMenuInRoomDetail extends OrderMenuInRoomDetailBase{
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
			'order_room_id' => 'Order Room',
			'menu_id' => 'Menu',
			'quantity' => 'Quantity',
			'note' => 'Note',
			'created_by' => 'Created By',
			'modified_by' => 'Modified By',
			'created_date' => 'Created Date',
			'modified_date' => 'Modified Date',
			'status' => 'Status',
		];
	}

    /**
     * Text hiển thị của model
     * @return string
     */
    public function displayText()
    {
        return ;
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
