<?php

/* @var $this yii\web\View */
/* @var $orderRoom backend\models\OrderRoom */
/* @var $orderRoomDetail[] backend\models\OrderRoomDetail */
$this->title = 'Tạo Order Room';
$this->params['breadcrumbs'][] = ['label' => 'Order Room', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h1 class="page-title margin-bottom-10"><?= yii\helpers\Html::encode($this->title) ?></h1>
<?= $this->render('_form', [
	'orderRoom' => $orderRoom,
'orderRoomDetail' => $orderRoomDetail,
'orderRoomDetail' => $orderRoomDetail,
            'orderMenuInRoomDetail' => $orderMenuInRoomDetail
]) ?>
