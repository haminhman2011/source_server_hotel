<?php

/* @var $this yii\web\View */
/* @var $menu backend\models\Menu */
$this->title = 'Cập nhật Menu: ' . $menu->name;
$this->params['breadcrumbs'][] = ['label' => 'Menu', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<h1 class="page-title margin-bottom-10"><?= yii\helpers\Html::encode($this->title) ?></h1>
<?= $this->render('_form', [
    	'menu' => $menu,
        ]) ?>
