<?php 
use yii\helpers\Url;
?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">Cập nhật trạng thái</h4>
</div>
<div class="modal-body"> 
	<div class="form-group">
		<div class="row">
			<div class="col-md-12">
				<label>Trạng thái</label>
				<div class="mt-checkbox-inline">
			        <label class="mt-checkbox">
			            <input type="checkbox" id="inlineCheckbox21" value="option1"> Đang sửa
			            <span></span>
			        </label>
			        <label class="mt-checkbox">
			            <input type="checkbox" id="inlineCheckbox22" value="option2"> Chưa dọn
			            <span></span>
			        </label>
			    </div>
			</div>
			<div class="col-md-12">
				<label>Ghi chú</label>
				<textarea class="form-control" row="4"></textarea>
			</div>
		</div>
	</div>
</div>
<div class="modal-footer">
    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Cancel</button>
    <button type="button" class="btn green btn_change_order_table">Update</button>
</div>