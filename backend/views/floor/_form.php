<?php
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $floor backend\models\floor */
?>
<form id="form_floor">
	<div id="error_summary"></div>
	<div class="row">
		<input type="hidden" name="floor[id]" value="<?= $floor->id ?>">
		<div class="col-md-3 col-xs-6">
			<div class="form-group">
                <label for="txt_name" class="control-label">Tên tầng
					<span class="font-red-mint">*</span></label>
                <input class="form-control alphanum require" name="floor[name]" value="<?= $floor->name ?>" id="txt_name" autofocus>
			</div>
		</div>
		<div class="col-md-3 col-xs-6">
			<div class="form-group">
                <label for="txt_name" class="control-label">Số lượng phòng
					<span class="font-red-mint">*</span></label>
                <input class="form-control alphanum require" name="floor[name]" value="<?= $floor->name ?>" id="txt_name" autofocus>
			</div>
		</div>
		<div class="col-md-3 col-xs-6">
			<div class="form-group">
				<label for="select_order_menu_in_room_detail_menu_id" class="control-label">Loại phòng:</label>
				<select id="select_order_menu_in_room_detail_menu_id" class="form-control select">
					<option></option>
				</select>
			</div>
		</div>
		<div class="col-md-12  col-xs-12">
			<div class="form-group">
                <label for="textarea_note" class="control-label">Ghi chú:</label>
                <textarea class="form-control" name="OrderRoom[note]" id="textarea_note" cols="30" rows="5"></textarea>
			</div>
		</div>
	</div>
    <div class="form-footer">
        <a class="btn btn-default" href="<?= Url::to( [ 'index' ] ) ?>">Hủy</a>
        <button class="btn <?= $floor->isNewRecord ? 'blue-steel' : 'green-haze' ?>" id="btn_save_floor">Lưu</button>
    </div>
</form>
<script>
    'use strict';
    $(function () {
		$("#form_floor").on('submit', function () {
            if (Team.validate('form_floor')) {
				let formData = new FormData(document.getElementById("form_floor"));
                Team.submitForm('<?= Url::to( [ 'save' ] ) ?>', formData).then(function(result) {
					if (typeof result !== 'object' && result.includes('http')) {
						location.href = result;
					} else {
                        Team.showErrorSummary(result, '#form_floor');
					}
				});
			} else {
                $('.error').first().focus();
            }
			return false;
		});
	});
</script>