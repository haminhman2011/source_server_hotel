<?php 
use yii\helpers\Url;
?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">Check Out Khách đoàn/CTy</h4>
</div>
<div class="modal-body"> 
	<div class="form-group">
		<div class="row">
			<div class="col-md-3 form-group">
				<label>Tìm kiếm</label>
				<input type="" class="form-control" name="">
			</div>
			<div class="col-md-12">
				<table class="table table-striped table-bordered table-checkable nowrap">
					<thead>
						<tr>
							<th>Phòng</th>
							<th>Trạng thái</th>
							<th>Khách hàng</th>
							<th>CMND/Passport</th>
							<th>Check In</th>
							<th>Check Out</th>
							<th>Created</th>
							<th>Ký gửi</th>
							<th>Mark</th>
							<th>Thao tác</th>
						</tr>
					</thead>
					
				</table>
			</div>
		</div>

	</div>
</div>
<div class="modal-footer">
    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Cancel</button>
    <button type="button" class="btn green btn_change_order_table">Trả phòng </button>
</div>
