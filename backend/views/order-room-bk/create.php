<?php

/* @var $this yii\web\View */
/* @var $orderRoom backend\models\OrderRoom */
/* @var $orderMenuInRoomDetail[] backend\models\OrderMenuInRoomDetail */
$this->title = 'Tạo Order Room';
$this->params['breadcrumbs'][] = ['label' => 'Order Room', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h1 class="page-title margin-bottom-10"><?= yii\helpers\Html::encode($this->title) ?></h1>
<?= $this->render('_form', [
	'orderRoom' => $orderRoom,
'orderMenuInRoomDetail' => $orderMenuInRoomDetail
]) ?>
