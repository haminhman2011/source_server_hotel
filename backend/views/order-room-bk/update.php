<?php

/* @var $this yii\web\View */
/* @var $orderRoom backend\models\OrderRoom */
/* @var $orderMenuInRoomDetails[] backend\models\OrderMenuInRoomDetail */
/* @var $orderMenuInRoomDetail backend\models\OrderMenuInRoomDetail */
$this->title = 'Cập nhật Order Room: ' . $orderRoom->full_name;
$this->params['breadcrumbs'][] = ['label' => 'Order Room', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<h1 class="page-title margin-bottom-10"><?= yii\helpers\Html::encode($this->title) ?></h1>
<?= $this->render('_form', [
    	'orderRoom' => $orderRoom,
    'orderMenuInRoomDetails' => $orderMenuInRoomDetails,
    'orderMenuInRoomDetail' => $orderMenuInRoomDetail,
    'orderMenuInRoomDetails' => $orderMenuInRoomDetails,
            'orderMenuInRoomDetail' => $orderMenuInRoomDetail
]) ?>
