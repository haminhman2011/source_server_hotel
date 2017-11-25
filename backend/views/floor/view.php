<?php

use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $floor backend\models\floor */
$this->title = $floor->name;
$this->params['breadcrumbs'][] = ['label' => 'Floor', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="floor-view ">
    <h1 class="page-title"><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="txt_name"><?= $floor->getAttributeLabel('name') ?></label>
                <input type="text" class="form-control" value="<?= $floor->name ?>" id="txt_name" readonly>
            </div>
        </div>
    </div>
    <div class="form-footer">
        <a class="btn btn-default" href="<?= Url::to( [ 'index' ] ) ?>">Hủy</a>
        <?php if ( Yii::$app->permission->can( Yii::$app->controller->id , 'update' )) : ?>
            <a class="btn green-haze" href="<?= Url::to( [ 'update', 'id' => $floor->id ] ) ?>">Cập nhật</a>
        <?php endif; ?>
    </div>
</div>
