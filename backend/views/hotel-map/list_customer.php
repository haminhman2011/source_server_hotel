<?php 
use yii\helpers\Url;
?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">Danh sách khách hàng</h4>
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
							<th>Chọn</th>
							<th>Khách hàng</th>
							<th>CMND/Passport</th>
							<th>Địa chỉ</th>
							<th>Thông tin giao dịch</th>
							<th>Phone</th>
							<th>Quốc tịch</th>
							<th>Ngày sinh</th>
							<th>Ngày tạo</th>
							<th>Ghi chú</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<input type="radio" name="">
							</td>
							<td>Khách lẻ</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>

					</tbody>
					
				</table>
			</div>
		</div>

	</div>
</div>
<div class="modal-footer">
    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Cancel</button>
    <button type="button" class="btn green btn_change_order_table">Nhận phòng </button>
</div>
