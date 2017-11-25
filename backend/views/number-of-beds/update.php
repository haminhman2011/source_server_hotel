<?php

/* @var $this yii\web\View */
/* @var $numberOfBeds backend\models\NumberOfBeds */
$this->title = 'Cập nhật Number Of Beds: ' . $numberOfBeds->name;
$this->params['breadcrumbs'][] = ['label' => 'Number Of Beds', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<h1 class="page-title margin-bottom-10"><?= yii\helpers\Html::encode($this->title) ?></h1>
<?= $this->render('_form', [
    	'numberOfBeds' => $numberOfBeds,
        ]) ?>
