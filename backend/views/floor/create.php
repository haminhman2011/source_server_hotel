<?php

/* @var $this yii\web\View */
/* @var $floor backend\models\floor */
$this->title = 'Tạo Floor';
$this->params['breadcrumbs'][] = ['label' => 'Floor', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h1 class="page-title margin-bottom-10"><?= yii\helpers\Html::encode($this->title) ?></h1>
<?= $this->render('_form', [
	'floor' => $floor,
]) ?>
