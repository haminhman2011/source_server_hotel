<?php

/* @var $this yii\web\View */
/* @var $room backend\models\Room */
$this->title = 'Tạo Room';
$this->params['breadcrumbs'][] = ['label' => 'Room', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h1 class="page-title margin-bottom-10"><?= yii\helpers\Html::encode($this->title) ?></h1>
<?= $this->render('_form', [
	'room' => $room,
]) ?>
