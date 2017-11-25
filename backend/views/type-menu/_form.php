<?php
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $typeMenu backend\models\TypeMenu */
?>
<form id="form_type_menu">
	<div id="error_summary"></div>
	<div class="row">
		<input type="hidden" name="TypeMenu[id]" value="<?= $typeMenu->id ?>">
		<div class="col-md-3 col-xs-6">
			<div class="form-group">
                <label for="txt_name" class="control-label"><?= $typeMenu->getAttributeLabel('name') ?>
<span class="font-red-mint">*</span></label>
                <input class="form-control alphanum require" name="TypeMenu[name]" value="<?= $typeMenu->name ?>" id="txt_name" autofocus>
			</div>
		</div>
	</div>
    <div class="form-footer">
        <a class="btn btn-default" href="<?= Url::to( [ 'index' ] ) ?>">Hủy</a>
        <button class="btn <?= $typeMenu->isNewRecord ? 'blue-steel' : 'green-haze' ?>" id="btn_save_type_menu">Lưu</button>
    </div>
</form>
<script>
    'use strict';
    $(function () {
		$("#form_type_menu").on('submit', function () {
            if (Team.validate('form_type_menu')) {
				let formData = new FormData(document.getElementById("form_type_menu"));
                Team.submitForm('<?= Url::to( [ 'save' ] ) ?>', formData).then(function(result) {
					if (typeof result !== 'object' && result.includes('http')) {
						location.href = result;
					} else {
                        Team.showErrorSummary(result, '#form_type_menu');
					}
				});
			} else {
                $('.error').first().focus();
            }
			return false;
		});
	});
</script>