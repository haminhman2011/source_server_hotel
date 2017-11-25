<?php

/* @var $this yii\web\View */
/* @var $typeMenu backend\models\TypeMenu */
$this->title = 'Tạo Type Menu';
$this->params['breadcrumbs'][] = ['label' => 'Type Menu', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h1 class="page-title margin-bottom-10"><?= yii\helpers\Html::encode($this->title) ?></h1>
<?= $this->render('_form', [
	'typeMenu' => $typeMenu,
]) ?>
