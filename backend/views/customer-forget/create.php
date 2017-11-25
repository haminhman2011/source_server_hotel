<?php
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $floor backend\models\floor */
?>
<br>
<form id="form_floor">
	<div id="error_summary"></div>
	<div class="row">
		
		<div class="col-md-3 col-xs-6">
			<div class="form-group">
                <label>Để quên</label>
                <input type="" class="form-control" name="">
			</div>
		</div>
		<div class="col-md-3 col-xs-6">
			<div class="form-group">
                <label>Phòng</label>
                <select class="form-control">
                	<option>Chọn</option>
                </select>
			</div>
		</div>
		<div class="col-md-3 col-xs-6">
			<div class="form-group">
                <label>Khách hàng</label>
                <select class="form-control">
                	<option>Chọn</option>
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
        <button class="btn blue-steel" id="btn_save_floor">Lưu</button>
    </div>
</form>