<?php

namespace backend\models\base;
use yii\db\ActiveRecord;
use backend\models\query\MenuQuery;
use backend\models\TypeMenu;
use backend\models\OrderMenuInRoomDetail;


/**
* This is the model class for table "menu".
*
* @property integer $id
* @property string $name
* @property integer $created_by
* @property integer $modified_by
* @property integer $created_date
* @property integer $modified_date
* @property integer $type_menu_id
* @property integer $price
* @property integer $status
*
* @property TypeMenu $typeMenu
* @property OrderMenuInRoomDetail[] $orderMenuInRoomDetails
*/
class MenuBase extends ActiveRecord {
    /**
    * @inheritdoc
    */
    public static function tableName()
    {
        return 'menu';
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        return [
            [['type_menu_id', 'price', 'status'], 'integer'],
            [['name'], 'string', 'max' => 250],
            [['type_menu_id'], 'exist', 'skipOnError' => true, 'targetClass' => TypeMenu::className(), 'targetAttribute' => ['type_menu_id' => 'id']]
        ];
    }


    /**
    * @return \yii\db\ActiveQuery
    */
    public function getTypeMenu()
    {
        return $this->hasOne(TypeMenu::className(), ['id' => 'type_menu_id']);
    }

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getOrderMenuInRoomDetails()
    {
        return $this->hasMany(OrderMenuInRoomDetail::className(), ['menu_id' => 'id']);
    }

    /**
    * @inheritdoc
    * @return MenuQuery the active query used by this AR class.
    */
    public static function find()
    {
        return new MenuQuery(get_called_class());
    }
}
