<?php
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $menu backend\models\Menu */
?>
<form id="form_menu">
	<div id="error_summary"></div>
	<div class="row">
		<input type="hidden" name="Menu[id]" value="<?= $menu->id ?>">
		<div class="col-md-3 col-xs-6">
			<div class="form-group">
                <label for="txt_name" class="control-label"><?= $menu->getAttributeLabel('name') ?>
<span class="font-red-mint">*</span></label>
                <input class="form-control alphanum require" name="Menu[name]" value="<?= $menu->name ?>" id="txt_name" autofocus>
			</div>
		</div>
		<div class="col-md-3 col-xs-6">
			<div class="form-group">
				<label for="select_type_menu_id" class="control-label"><?= $menu->getAttributeLabel('type_menu_id') ?></label>
				<select name="Menu[type_menu_id]" id="select_type_menu_id" class="form-control select require">
					<option></option>
                    <?php if ( $menu->type_menu_id != null ): ?>
                        <option value="<?= $menu->type_menu_id ?>" selected><?= $menu->typeMenu->name ?></option>
                    <?php endif ?>
				</select>
			</div>
		</div>
		<div class="col-md-3 col-xs-6">
			<div class="form-group">
                <label for="txt_price" class="control-label"><?= $menu->getAttributeLabel('price') ?></label>
                <input class="form-control alphanum" name="Menu[price]" value="<?= $menu->price ?>" id="txt_price">
			</div>
		</div>
	</div>
    <div class="form-footer">
        <a class="btn btn-default" href="<?= Url::to( [ 'index' ] ) ?>">Hủy</a>
        <button class="btn <?= $menu->isNewRecord ? 'blue-steel' : 'green-haze' ?>" id="btn_save_menu">Lưu</button>
    </div>
</form>
<script>
    'use strict';
    $(function () {
		$("#form_menu").on('submit', function () {
            if (Team.validate('form_menu')) {
				let formData = new FormData(document.getElementById("form_menu"));
                Team.submitForm('<?= Url::to( [ 'save' ] ) ?>', formData).then(function(result) {
					if (typeof result !== 'object' && result.includes('http')) {
						location.href = result;
					} else {
                        Team.showErrorSummary(result, '#form_menu');
					}
				});
			} else {
                $('.error').first().focus();
            }
			return false;
		});
	});
</script>