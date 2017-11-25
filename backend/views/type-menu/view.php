<?php

use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $typeMenu backend\models\TypeMenu */
$this->title = $typeMenu->name;
$this->params['breadcrumbs'][] = ['label' => 'Type Menu', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-menu-view ">
    <h1 class="page-title"><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="txt_name"><?= $typeMenu->getAttributeLabel('name') ?></label>
                <input type="text" class="form-control" value="<?= $typeMenu->name ?>" id="txt_name" readonly>
            </div>
        </div>
    </div>
    <div class="form-footer">
        <a class="btn btn-default" href="<?= Url::to( [ 'index' ] ) ?>">Hủy</a>
        <?php if ( Yii::$app->permission->can( Yii::$app->controller->id , 'update' )) : ?>
            <a class="btn green-haze" href="<?= Url::to( [ 'update', 'id' => $typeMenu->id ] ) ?>">Cập nhật</a>
        <?php endif; ?>
    </div>
</div>
