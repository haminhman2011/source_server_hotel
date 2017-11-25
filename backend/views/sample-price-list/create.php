<?php
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $floor backend\models\floor */
?>
<br>
<form id="form_floor">
	<div id="error_summary"></div>
	<div class="row">
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-12" style="border: 2px solid #fafafa; padding: 15px 15px 15px 15px;">
					<div class="row">
						<div class="col-md-6">
							<label>Từ loại phòng</label>
							<input type="" class="form-control" name="">
						</div>
						<div class="col-md-6">
							<label>Tên giá mẫu</label>
							<input type="" class="form-control" name="">
						</div>
						<div class="col-md-6">
							<label>Giá theo ngày</label>
							<input type="" class="form-control" name="">
						</div>
						<div class="col-md-6">
							<label>Giá qua đêm</label>
							<input type="" class="form-control" name="">
						</div>
						<div class="col-md-6">
							<label>Giá theo tháng</label>
							<input type="" class="form-control" name="">
						</div>
					</div>
				</div>

				<div class="col-md-12" style="border: 2px solid #fafafa; padding: 15px 15px 15px 15px; top:15px;">
					<div class="row">
						<div class="col-md-12">
							<label for="">Giá bán theo giờ</label>
						</div>
						<div class="col-md-4">
							<label>Giờ:</label>
							<select id="select_order_menu_in_room_detail_menu_id" class="form-control select">
								<option>1h</option>
								<option>2h</option>
							</select>
						</div>
						<div class="col-md-6">
							<label>Giá:</label>
							<input class="form-control alphanum" id="txt_order_menu_in_room_detail_quantity">
						</div>
						<div class="col-md-2" style="top:23px;">
							<a href="javascript:;" class="btn btn-icon-only green">
                                <i class="fa fa-plus"></i>
                            </a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="col-md-12" style="border: 2px solid #fafafa; padding: 15px 15px 15px 15px; ">
				<div class="row">
					<div class="col-md-12">
						<label for="">Phụ trội quá giờ check out (theo ngày)</label>
					</div>
					
					<div class="col-md-4">
						<label>Quá:</label>
						<select id="select_order_menu_in_room_detail_menu_id" class="form-control select">
							<option>1h</option>
							<option>2h</option>
						</select>
					</div>
					<div class="col-md-6" style="top:23px">
						<input class="form-control alphanum" id="txt_order_menu_in_room_detail_quantity">
					</div>
					<div class="col-md-2" style="top:23px">
						<a href="javascript:;" class="btn btn-icon-only green">
                            <i class="fa fa-plus"></i>
                        </a>
					</div>
					<div class="col-md-12">
						<label style="color: red; font-weight: bold;">Nếu ở quá quy định trên sẽ tính thành 1 ngày</label>
					</div>
				</div>
			</div>
			<div class="col-md-12" style="border: 2px solid #fafafa; padding: 15px 15px 15px 15px; top:15px;">
				<div class="row">
					<div class="col-md-12">
						<label for="">Phụ trội quá giờ check out (qua đêm)</label>
					</div>
					
					<div class="col-md-4">
						<label>Quá:</label>
						<select id="select_order_menu_in_room_detail_menu_id" class="form-control select">
							<option>1h</option>
							<option>2h</option>
						</select>
					</div>
					<div class="col-md-6" style="top:23px">
						<input class="form-control alphanum" id="txt_order_menu_in_room_detail_quantity">
					</div>
					<div class="col-md-2" style="top:23px">
						<a href="javascript:;" class="btn btn-icon-only green">
                            <i class="fa fa-plus"></i>
                        </a>
					</div>
					<div class="col-md-12">
						<label style="color: red; font-weight: bold;">Nếu ở quá quy định trên sẽ tính thành 1 ngày</label>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="col-md-12" style="border: 2px solid #fafafa; padding: 15px 15px 15px 15px; ">
				<div class="row">
					<div class="col-md-12">
						<label for="">Phụ trội quá giờ check in (theo ngày)</label>
					</div>
					
					<div class="col-md-4">
						<label>Quá:</label>
						<select id="select_order_menu_in_room_detail_menu_id" class="form-control select">
							<option>1h</option>
							<option>2h</option>
						</select>
					</div>
					<div class="col-md-6" style="top:23px">
						<input class="form-control alphanum" id="txt_order_menu_in_room_detail_quantity">
					</div>
					<div class="col-md-2" style="top:23px">
						<a href="javascript:;" class="btn btn-icon-only green">
                            <i class="fa fa-plus"></i>
                        </a>
					</div>
					<div class="col-md-12">
						<label style="color: red; font-weight: bold;">Nếu ở quá quy định trên sẽ tính thành 1 ngày</label>
					</div>
				</div>
			</div>
			<div class="col-md-12" style="border: 2px solid #fafafa; padding: 15px 15px 15px 15px; top:15px;">
				<div class="row">
					<div class="col-md-12">
						<label for="">Phụ trội quá giờ check in (qua đêm)</label>
					</div>
					
					<div class="col-md-4">
						<label>Quá:</label>
						<select id="select_order_menu_in_room_detail_menu_id" class="form-control select">
							<option>1h</option>
							<option>2h</option>
						</select>
					</div>
					<div class="col-md-6" style="top:23px">
						<input class="form-control alphanum" id="txt_order_menu_in_room_detail_quantity">
					</div>
					<div class="col-md-2" style="top:23px">
						<a href="javascript:;" class="btn btn-icon-only green">
                            <i class="fa fa-plus"></i>
                        </a>
					</div>
					<div class="col-md-12">
						<label style="color: red; font-weight: bold;">Nếu ở quá quy định trên sẽ tính thành 1 ngày</label>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	
    <div class="form-footer">
        <a class="btn btn-default" href="<?= Url::to( [ 'index' ] ) ?>">Hủy</a>
        <button class="btn green-haze" id="btn_save_floor">Lưu</button>
    </div>
</form>