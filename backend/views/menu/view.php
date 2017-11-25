<?php

use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $menu backend\models\Menu */
$this->title = $menu->name;
$this->params['breadcrumbs'][] = ['label' => 'Menu', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-view ">
    <h1 class="page-title"><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="txt_name"><?= $menu->getAttributeLabel('name') ?></label>
                <input type="text" class="form-control" value="<?= $menu->name ?>" id="txt_name" readonly>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="txt_type_menu_id"><?= $menu->getAttributeLabel('type_menu_id') ?></label>
                <input type="text" class="form-control" value="<?= $menu->type_menu_id != null ? $menu->typeMenu->name : '' ?>" id="txt_type_menu_id" readonly>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="txt_price"><?= $menu->getAttributeLabel('price') ?></label>
                <input type="text" class="form-control" value="<?= $menu->price ?>" id="txt_price" readonly>
            </div>
        </div>
    </div>
    <div class="form-footer">
        <a class="btn btn-default" href="<?= Url::to( [ 'index' ] ) ?>">Hủy</a>
        <?php if ( Yii::$app->permission->can( Yii::$app->controller->id , 'update' )) : ?>
            <a class="btn green-haze" href="<?= Url::to( [ 'update', 'id' => $menu->id ] ) ?>">Cập nhật</a>
        <?php endif; ?>
    </div>
</div>
