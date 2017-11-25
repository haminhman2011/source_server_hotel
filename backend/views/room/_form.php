<?php
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $room backend\models\Room */
?>
<form id="form_room">
	<div id="error_summary"></div>
	<div class="row">
		<input type="hidden" name="Room[id]" value="<?= $room->id ?>">
		<div class="col-md-3 col-xs-6">
			<div class="form-group">
                <label for="txt_name" class="control-label"><?= $room->getAttributeLabel('name') ?>
<span class="font-red-mint">*</span></label>
                <input class="form-control alphanum require" name="Room[name]" value="<?= $room->name ?>" id="txt_name" autofocus>
			</div>
		</div>
		<div class="col-md-3 col-xs-6">
			<div class="form-group">
				<label for="select_floor_id" class="control-label"><?= $room->getAttributeLabel('floor_id') ?></label>
				<select name="Room[floor_id]" id="select_floor_id" class="form-control select require">
					<option></option>
                    <?php if ( $room->floor_id != null ): ?>
                        <option value="<?= $room->floor_id ?>" selected><?= $room->floor->name ?></option>
                    <?php endif ?>
				</select>
			</div>
		</div>
		<div class="col-md-3 col-xs-6">
			<div class="form-group">
				<label for="select_number_of_beds_id" class="control-label"><?= $room->getAttributeLabel('number_of_beds_id') ?></label>
				<select name="Room[number_of_beds_id]" id="select_number_of_beds_id" class="form-control select require">
					<option></option>
                    <?php if ( $room->number_of_beds_id != null ): ?>
                        <option value="<?= $room->number_of_beds_id ?>" selected><?= $room->numberOfBeds->name ?></option>
                    <?php endif ?>
				</select>
			</div>
		</div>
	</div>
    <div class="form-footer">
        <a class="btn btn-default" href="<?= Url::to( [ 'index' ] ) ?>">Hủy</a>
        <button class="btn <?= $room->isNewRecord ? 'blue-steel' : 'green-haze' ?>" id="btn_save_room">Lưu</button>
    </div>
</form>
<script>
    'use strict';
    $(function () {
		$("#form_room").on('submit', function () {
            if (Team.validate('form_room')) {
				let formData = new FormData(document.getElementById("form_room"));
                Team.submitForm('<?= Url::to( [ 'save' ] ) ?>', formData).then(function(result) {
					if (typeof result !== 'object' && result.includes('http')) {
						location.href = result;
					} else {
                        Team.showErrorSummary(result, '#form_room');
					}
				});
			} else {
                $('.error').first().focus();
            }
			return false;
		});
	});
</script>