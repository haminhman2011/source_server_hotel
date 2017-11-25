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
                <label for="txt_name" class="control-label">Tên tầng
					<span class="font-red-mint">*</span></label>
                <input class="form-control alphanum require" name="floor[name]" value="" id="txt_name" autofocus>
			</div>
		</div>
		<div class="col-md-3 col-xs-6">
			<div class="form-group">
                <label for="txt_name" class="control-label">Số giường
					<span class="font-red-mint">*</span></label>
                <input class="form-control alphanum require" name="floor[name]" value="" id="txt_name" autofocus>
			</div>
		</div>
		<div class="col-md-3 col-xs-6">
			<div class="form-group">
                <label for="txt_name" class="control-label">Số người
					<span class="font-red-mint">*</span></label>
                <input class="form-control alphanum require" name="floor[name]" value="" id="txt_name" autofocus>
			</div>
		</div>
		<div class="col-md-3 col-xs-6">
			<div class="form-group">
                <label for="txt_name" class="control-label">Giá theo ngày
					<span class="font-red-mint">*</span></label>
                <input class="form-control alphanum require" name="floor[name]" value="" id="txt_name" autofocus>
			</div>
		</div>
		<div class="col-md-3 col-xs-6">
			<div class="form-group">
                <label for="txt_name" class="control-label">Giá theo đêm</label>
                <input class="form-control alphanum require" name="floor[name]" value="" id="txt_name" autofocus>
			</div>
		</div>
		<div class="col-md-3 col-xs-6">
			<div class="form-group">
                <label for="txt_name" class="control-label">Giá theo tháng</label>
                <input class="form-control alphanum require" name="floor[name]" value="" id="txt_name" autofocus>
			</div>
		</div>
	<!-- 	<div class="col-md-3 col-xs-6">
			<div class="form-group">
				<label for="select_order_menu_in_room_detail_menu_id" class="control-label">Loại phòng:</label>
				<select id="select_order_menu_in_room_detail_menu_id" class="form-control select">
					<option></option>
				</select>
			</div>
		</div> -->

	
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="col-md-12" style="border: 2px solid #fafafa;">
			<div class="detail-title">
		        <label for="">Giá bán theo giờ</label>
		    </div>
		    <div class="row" id="order_menu_in_room_detail_section">
				<div class="col-md-4 col-xs-6">
					<div class="form-group">
						<label for="select_order_menu_in_room_detail_menu_id" class="control-label">Giờ:</label>
						<select id="select_order_menu_in_room_detail_menu_id" class="form-control select">
							<option>1h</option>
							<option>2h</option>
						</select>
					</div>
				</div>
				<div class="col-md-4 col-xs-6">
					<div class="form-group">
						<label for="txt_order_menu_in_room_detail_quantity" class="control-label">Giá:</label>
						<input class="form-control alphanum" id="txt_order_menu_in_room_detail_quantity">
					</div>
				</div>
				<div class="col-md-4 col-xs-6">
		            <div class="form-group">
		                <button type="button" class="btn btn-primary" id="btn_add_order_menu_in_room_detail" style="margin-top: 24px">Thêm</button>
		            </div>
				</div>
			</div>
			</div>
		</div>


	</div>
	<div class="row ">
		<div class="col-md-6">
		<div class="col-md-12" style="border:  2px solid #fafafa;;">
			<div class="detail-title">
		        <label for="">Giá bán phụ trội quá giờ CheckOut(theo ngày)</label>
		        <label style="color:red">Nếu ở quá qui định trên sẽ tính thành 1 ngày.</label>
		    </div>
		    <div class="row" id="order_menu_in_room_detail_section">
				<div class="col-md-4 col-xs-6">
					<div class="form-group">
						<label for="select_order_menu_in_room_detail_menu_id" class="control-label">Giờ:</label>
						<select id="select_order_menu_in_room_detail_menu_id" class="form-control select">
							<option>1h</option>
							<option>2h</option>
						</select>
					</div>
				</div>
				<div class="col-md-4 col-xs-6">
					<div class="form-group">
						<label for="txt_order_menu_in_room_detail_quantity" class="control-label">Giá:</label>
						<input class="form-control alphanum" id="txt_order_menu_in_room_detail_quantity">
					</div>
				</div>
				<div class="col-md-4 col-xs-6">
		            <div class="form-group">
		                <button type="button" class="btn btn-primary" id="btn_add_order_menu_in_room_detail" style="margin-top: 24px">Thêm</button>
		            </div>
				</div>
			</div>
			</div>

		</div>
		<div class="col-md-6" >
			<div class="col-md-12" style="border:  2px solid #fafafa;;">
				<div class="detail-title">
		        <label for="">Giá bán phụ trội quá giờ CheckOut(Qua đêm) </label>
		        <label style="color:red">Nếu ở quá qui định trên sẽ tính thành 1 ngày.</label>
		    </div>
		    <div class="row" id="order_menu_in_room_detail_section">
				<div class="col-md-4 col-xs-6">
					<div class="form-group">
						<label for="select_order_menu_in_room_detail_menu_id" class="control-label">Giờ:</label>
						<select id="select_order_menu_in_room_detail_menu_id" class="form-control select">
							<option>1h</option>
							<option>2h</option>
						</select>
					</div>
				</div>
				<div class="col-md-4 col-xs-6">
					<div class="form-group">
						<label for="txt_order_menu_in_room_detail_quantity" class="control-label">Giá:</label>
						<input class="form-control alphanum" id="txt_order_menu_in_room_detail_quantity">
					</div>
				</div>
				<div class="col-md-4 col-xs-6">
		            <div class="form-group">
		                <button type="button" class="btn btn-primary" id="btn_add_order_menu_in_room_detail" style="margin-top: 24px">Thêm</button>
		            </div>
				</div>
			</div>
			</div>
			
		</div>
	</div>
    <div class="form-footer">
        <a class="btn btn-default" href="<?= Url::to( [ 'index' ] ) ?>">Hủy</a>
        <button class="btn green-haze" id="btn_save_floor">Lưu</button>
    </div>
</form>