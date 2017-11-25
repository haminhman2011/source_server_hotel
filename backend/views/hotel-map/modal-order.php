<?php 
use yii\helpers\Url;
?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title"><?= $title == '1' ? 'Đặt phòng: ...': 'Nhận phòng: ...' ?></h4>
</div>
<div class="modal-body"> 
	<div class="form-group">
		<div class="row">
			<div class="col-md-12">
				<label>Thông tin đăng ký: Phòng đơn</label>
			</div>
			<div class="col-md-6" >
				<div class="col-md-12" style="border: 2px solid red; padding: 15px 15px 15px 15px;">
					<div class="form-group">
						<div class="col-md-12">
			        		<label>Giá</label>
		                    <input class="form-control" value="200,000" />
				        </div>
					</div>
					<div class="form-group">
						<div class="col-md-6">
				        		<label>Ngày vào:</label>
			                    <input class="form-control " value="15/11/2017" />
				        </div>
				        <div class="col-md-6">
				        		<label>Lúc:</label>
			                    <input class="form-control " value="12:00" />
				        </div>
					</div>
					<div class="form-group">
						<div class="col-md-6">
				        	<div class="input-group">
				        		<label>Ngày ra dự kiến:</label>
			                    <input class="form-control " value="16/11/2017" />
			                </div>
				        </div>
				        <div class="col-md-6">
				        	<div class="input-group">
				        		<label>Lúc:</label>
			                    <input class="form-control " value="12:00" />
			                </div>
				        </div>
					</div>
					<div class="form-group">
						<div class="col-md-12">
			        		<label>Group/CTY/ID</label>
		                    <input class="form-control " value="" />
				        </div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="col-md-12" style="border: 2px solid red; padding: 15px 15px 15px 15px;">
					<div class="form-group">
						<div class="col-md-6">
			        		<label>Trả trước:</label>
		                    <input class="form-control " value="" />
				        </div>
				        <div class="col-md-6">
			        		<label>Giảm trừ:</label>
		                    <input class="form-control " value="" />
				        </div>
					</div>
					<div class="form-group">
						<div class="col-md-12">
			        		<label>Ghi sơ đồ:</label>
		                    <input class="form-control " value="" />
			        	</div>
					</div>
					<div class="form-group">
						<div class="col-md-12">
			        		<label>Ghi chu1:</label>
		                    <textarea class="form-control " value="" row="6"></textarea>
			        	</div>
					</div>
				</div>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-12">
				<label>Thông tin khách hàng</label>
			</div>
			<div class="col-md-6">
				<div class="col-md-12" style="border: 2px solid red; padding: 15px 15px 15px 15px;">
					<div class="form-group">
						<div class="col-md-12">
			        		<label>CMND/Passport:</label>
		                    <input class="form-control" value="" />
				        </div>
					</div>
					<div class="form-group">
						<div class="col-md-12">
			        		<label>Tên khách hàng:</label>
		                    <input class="form-control" value="" />
				        </div>
					</div>
					<div class="form-group">
						<div class="col-md-12">
			        		<label>Địa chỉ:</label>
		                    <input class="form-control" value="" />
				        </div>
					</div>
					<div class="form-group">
						<div class="col-md-12">
			        		<label>Ghi chú KH:</label>
		                    <textarea class="form-control " value="" row="3" />
				        </div>
					</div>

				</div>
			</div>
			<div class="col-md-6">
				<div class="col-md-12" style="border: 2px solid red; padding: 15px 15px 15px 15px;">
					<div class="form-group">
						<div class="col-md-12">
			        		<label>Ngày cấp:</label>
		                    <input class="form-control" value="" />
				        </div>
					</div>
					<div class="form-group">
						<div class="col-md-12">
			        		<label>Ngày sinh:</label>
		                    <input class="form-control" value="" />
				        </div>
					</div>
					<div class="form-group">
						<div class="col-md-6">
			        		<label>Email:</label>
		                    <input class="form-control" value="" />
				        </div>
				        <div class="col-md-6">
			        		<label>Điện thoại:</label>
		                    <input class="form-control" value="" />
				        </div>
					</div>
					<div class="form-group">
						<div class="col-md-6">
			        		<label>Giớ tính:</label>
		                    <select class="form-control" style="padding: 0px 15px!important;">
		                    	<option>Chọn</option>
		                    </select>
				        </div>
				        <div class="col-md-6">
			        		<label>Quốc tịch:</label>
		                    <select class="form-control" style="padding: 0px 15px!important;">
		                    	<option>Chọn</option>
		                    </select>
				        </div>
					</div>
					

				</div>
			</div>
			
		</div>
		<hr>
			<div class="row">
				<div class="col-md-12">
					<label>Các khách hàng đã đăng ký</label>
				</div>
				<div class="col-md-12">
					<table class="table table-striped table-bordered table-checkable nowrap">
						<thead>
							<tr>
								<th>KH chính</th>
								<th>Họ tên</th>
								<th>CMND/Passport</th>
								<th>Địa chỉ</th>
								<th>Quốc tịch</th>
							</tr>
						</thead>
						<tbody>
							
						</tbody>
					</table>
				</div>
			</div>
	</div>
</div>
<div class="modal-footer">
    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Cancel</button>
    <button type="button" class="btn green btn_change_order_table">Booking</button>
</div>
<style type="text/css">
	.form-control{
		height: 20px!important;
	}
</style>