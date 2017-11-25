<?php
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $numberOfBeds backend\models\NumberOfBeds */
?>
<form id="form_number_of_beds">
	<div id="error_summary"></div>
	<div class="row">
		<input type="hidden" name="NumberOfBeds[id]" value="<?= $numberOfBeds->id ?>">
		<div class="col-md-3 col-xs-6">
			<div class="form-group">
                <label for="txt_name" class="control-label"><?= $numberOfBeds->getAttributeLabel('name') ?>
<span class="font-red-mint">*</span></label>
                <input class="form-control alphanum require" name="NumberOfBeds[name]" value="<?= $numberOfBeds->name ?>" id="txt_name" autofocus>
			</div>
		</div>
	</div>
    <div class="form-footer">
        <a class="btn btn-default" href="<?= Url::to( [ 'index' ] ) ?>">Hủy</a>
        <button class="btn <?= $numberOfBeds->isNewRecord ? 'blue-steel' : 'green-haze' ?>" id="btn_save_number_of_beds">Lưu</button>
    </div>
</form>
<script>
    'use strict';
    $(function () {
		$("#form_number_of_beds").on('submit', function () {
            if (Team.validate('form_number_of_beds')) {
				let formData = new FormData(document.getElementById("form_number_of_beds"));
                Team.submitForm('<?= Url::to( [ 'save' ] ) ?>', formData).then(function(result) {
					if (typeof result !== 'object' && result.includes('http')) {
						location.href = result;
					} else {
                        Team.showErrorSummary(result, '#form_number_of_beds');
					}
				});
			} else {
                $('.error').first().focus();
            }
			return false;
		});
	});
</script>