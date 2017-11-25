<?php

use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $room backend\models\Room */
$this->title = $room->name;
$this->params['breadcrumbs'][] = ['label' => 'Room', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="room-view ">
    <h1 class="page-title"><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="txt_name"><?= $room->getAttributeLabel('name') ?></label>
                <input type="text" class="form-control" value="<?= $room->name ?>" id="txt_name" readonly>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="txt_floor_id"><?= $room->getAttributeLabel('floor_id') ?></label>
                <input type="text" class="form-control" value="<?= $room->floor_id != null ? $room->floor->name : '' ?>" id="txt_floor_id" readonly>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="txt_number_of_beds_id"><?= $room->getAttributeLabel('number_of_beds_id') ?></label>
                <input type="text" class="form-control" value="<?= $room->number_of_beds_id != null ? $room->numberOfBeds->name : '' ?>" id="txt_number_of_beds_id" readonly>
            </div>
        </div>
    </div>
    <div class="form-footer">
        <a class="btn btn-default" href="<?= Url::to( [ 'index' ] ) ?>">Hủy</a>
        <?php if ( Yii::$app->permission->can( Yii::$app->controller->id , 'update' )) : ?>
            <a class="btn green-haze" href="<?= Url::to( [ 'update', 'id' => $room->id ] ) ?>">Cập nhật</a>
        <?php endif; ?>
    </div>
</div>
