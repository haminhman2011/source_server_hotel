<?php

use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $orderRoom backend\models\OrderRoom */
/* @var $orderMenuInRoomDetails[] backend\models\OrderMenuInRoomDetail */
/* @var $orderMenuInRoomDetail backend\models\OrderMenuInRoomDetail */
$this->title = $orderRoom->full_name;
$this->params['breadcrumbs'][] = ['label' => 'Order Room', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-room-view ">
    <h1 class="page-title"><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="txt_full_name"><?= $orderRoom->getAttributeLabel('full_name') ?></label>
                <input type="text" class="form-control" value="<?= $orderRoom->full_name ?>" id="txt_full_name" readonly>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="txt_phone"><?= $orderRoom->getAttributeLabel('phone') ?></label>
                <input type="text" class="form-control" value="<?= $orderRoom->phone ?>" id="txt_phone" readonly>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="txt_email"><?= $orderRoom->getAttributeLabel('email') ?></label>
                <input type="text" class="form-control" value="<?= $orderRoom->email ?>" id="txt_email" readonly>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="txt_check_in_date"><?= $orderRoom->getAttributeLabel('check_in_date') ?></label>
                <input type="text" class="form-control" value="<?= Yii::$app->formatter->asDate($orderRoom->check_in_date) ?>" id="txt_check_in_date" readonly>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="txt_check_out_date"><?= $orderRoom->getAttributeLabel('check_out_date') ?></label>
                <input type="text" class="form-control" value="<?= Yii::$app->formatter->asDate($orderRoom->check_out_date) ?>" id="txt_check_out_date" readonly>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="txt_note"><?= $orderRoom->getAttributeLabel('note') ?></label>
                <input type="text" class="form-control" value="<?= $orderRoom->note ?>" id="txt_note" readonly>
            </div>
        </div>
    </div>
    <div class="detail-title">
        <label for="">Danh sách chi tiết</label>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <table id="table_order_menu_in_room_detail" class="table table-striped table-bordered nowrap" style="width: 100%">
                    <thead>
                        <tr>
                            <th><?= $orderMenuInRoomDetail->getAttributeLabel('menu_id') ?></th>
                            <th><?= $orderMenuInRoomDetail->getAttributeLabel('quantity') ?></th>
                            <th><?= $orderMenuInRoomDetail->getAttributeLabel('note') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if ( isset($orderMenuInRoomDetails) && is_array($orderMenuInRoomDetails) ): ?>
                        <?php foreach ( $orderMenuInRoomDetails as $key => $orderMenuInRoomDetail ): ?>
                            <tr>
                                <td>
                                    <?= $orderMenuInRoomDetail->menu_id != null ? $orderMenuInRoomDetail->menu->name : '' ?>

                                </td>
                                <td>
                                    <?= $orderMenuInRoomDetail->quantity ?>

                                </td>
                                <td>
                                    <?= $orderMenuInRoomDetail->note ?>

                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="form-footer">
        <a class="btn btn-default" href="<?= Url::to( [ 'index' ] ) ?>">Hủy</a>
        <?php if ( Yii::$app->permission->can( Yii::$app->controller->id , 'update' )) : ?>
            <a class="btn green-haze" href="<?= Url::to( [ 'update', 'id' => $orderRoom->id ] ) ?>">Cập nhật</a>
        <?php endif; ?>
    </div>
</div>
<script>
    'use strict';
    $(function(){
        $("#table_order_menu_in_room_detail").DataTable({
            paging: false,
            scrollY: '276px',
            scrollCollapse: true,
            scrollX: true,
            sort: false
        });
    });
</script>
