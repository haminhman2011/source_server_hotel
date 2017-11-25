<?php 
use yii\helpers\Url;

?>
<br>
<div class="portlet light bordered">

    <div class="portlet-title">
        <div class="caption font-red-sunglo">
            <i class="icon-settings font-red-sunglo"></i>
            <span class="badge badge-success">80</span><span class="span_text">Trống</span>
            <span class="badge badge-danger">0</span><span class="span_text">Đang ở</span>
            <span class="badge badge-info">0</span><span class="span_text">Chờ khách</span>
            <span class="badge badge-default">2</span><span class="span_text">Chưa chọn</span>
            <span class="badge badge-danger">2</span><span class="span_text">Đang sửa</span>
        </div>
        <div class="form-group">
        	<div class="row col-md-12">
                <div class="btn-group">
                    <a href="javascript:;" class="btn btn-sm blue " data-toggle="dropdown">
                        <i class="fa fa-user"></i> Khách đoàn/Cty
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="javascript:;" class="check_in">
                                <i class="fa fa-pencil " ></i> Check In </a>
                        </li>
                        <li>
                            <a href="javascript:;" class="check_out">
                                <i class="fa fa-pencil "></i> Check Out </a>
                        </li>
                    </ul>
                </div>
                <a href="javascript:;" class="btn btn-sm red booking_status">
                    <i class="fa fa-file-o"></i> Hiện trạng và đặt phòng 
                </a>
                <a href="javascript:;" class="btn btn-sm default click_checkin" > <i class="fa fa-edit"></i>
                	Danh sách CheckIn
                </a>
                <a href="javascript:;" class="btn btn-sm default click_checkout"> <i class="fa fa-edit"></i>
                	Danh sách CheckOut
                </a>
                <a href="javascript:;" class="btn btn-sm blue click_customer"> 
        			<i class="fa fa-user"></i>
        			DS khách hàng
                </a>
        	</div>
        </div>
    </div>

    <div class="portlet-body form">

        <form role="form">
            <div class="form-body">
            	<div class="form-group">
            		<label>Sơ đồ tầng</label>
            	</div>
            	<div class="row form-group col-md-12">
            		<div class="row col-md-3">
            			<div style="width: 10px;height: 10px;background: red;"></div>
            			<label>Phòng đặt trước</label>
            		</div>
            		<div class="row col-md-3">
            			<div style="width: 10px;height: 10px;background: blue;"></div>
            			<label>Phòng còn trống</label>
            		</div>
            		<div class="row col-md-3"> 
            			<div style="width: 10px;height: 10px;background: yellow;"></div>
            			<label>Phòng đang ở/ đã nhận phòng</label>
            		</div>
            		<div class="row col-md-3">
            			<div style="width: 10px;height: 10px;background: #dddddd;"></div>
            			<label>Phòng đang dọn dẹp</label>
            		</div>
            	</div>
            	<div class="row">
            		<div class="col-md-12">
            			<div class="row form-group">
            				<div class="col-md-3">
	            				<label>Tầng</label>
	            				<select class="form-control">
	            					<option>Chọn</option>
	            				</select>
	            			</div>
	            			<div class="col-md-3">
	            				<label>Loại phòng</label>
	            				<select class="form-control">
	            					<option>Chọn</option>
	            					<option>Vip</option>
	            					<option>Thường (có máy lạnh)</option>
	            					<option>Thường (có quạt)</option>
	            				</select>
	            			</div>
	            			<div class="col-md-3">
	            				<label>Số lượng giường</label>
	            				<select class="form-control">
	            					<option>Chọn</option>
	            					<option>1 giường đôi</option>
	            					<option>1 giường đôi (có giường trẻ em)</option>
	            					<option>2 giường </option>
	            					<option>3 giường</option>
	            				</select>
	            			</div>
	            			<div class="col-md-3" style="top:24px">
	            			<button class="btn success">Tìm kiếm</button>
	            			</div>
            			</div>
            			
            		</div>
            	</div>
                <div class="form-group">
                   <table>
  
					  	<tr >
						    <td class="color_1">Trệt</td>
						    <?php for($i = 1; $i <=6; $i++): ?>
						    	<?php if($i == 3): ?>
						    		<td class="color_red">
										<div class="btn-group">
					                        <button type="button" class="btn red"><?= $i ?></button>
					                        <button type="button" class="btn red dropdown-toggle" data-toggle="dropdown">
					                            <i class="fa fa-angle-down"></i>
					                        </button>
					                        <ul class="dropdown-menu" role="menu">
					                            <li>
					                                <a href="javascript:;" class="input_room"><i class="fa fa-user"></i> Nhận phòng </a>
					                            </li>
					                            <li class="divider"> </li>
					                            <li>
					                                <a href="javascript:;" class="order_room"><i class="fa fa-check"></i>  Đặt phòng trước </a>
					                            </li>
					                            <li class="divider"> </li>
					                            <li>
					                                <a href="javascript:;" class="update_status_room"> <i class="fa fa-edit"></i> Cập nhật trạng thái phòng </a>
					                            </li>
					                            
					                        </ul>
					                    </div>
									</td>
						    	<?php else:  ?>
						    		<td class="color_2">
										<div class="btn-group">
					                        <button type="button" class="btn blue"><?= $i ?></button>
					                        <button type="button" class="btn blue dropdown-toggle" data-toggle="dropdown">
					                            <i class="fa fa-angle-down"></i>
					                        </button>
					                        <ul class="dropdown-menu" role="menu">
					                            <li>
					                                <a href="javascript:;" class="input_room"><i class="fa fa-user"></i> Nhận phòng </a>
					                            </li>
					                            <li class="divider"> </li>
					                            <li>
					                                <a href="javascript:;" class="order_room"><i class="fa fa-check"></i>  Đặt phòng trước </a>
					                            </li>
					                            <li class="divider"> </li>
					                            <li>
					                                <a href="javascript:;" class="update_status_room"> <i class="fa fa-edit"></i> Cập nhật trạng thái phòng </a>
					                            </li>
					                            
					                        </ul>
					                    </div>
									</td>
						    	<?php endif; ?>
								
							<?php endfor; ?>
					  	</tr>
					  	<tr >
						    <td class="color_1">Lầu 1</td>
						    <?php for($i = 1; $i <=8; $i++): ?>
								<td class="color_2">
									<div class="btn-group">
				                        <button type="button" class="btn blue"><?= $i ?></button>
				                        <button type="button" class="btn blue dropdown-toggle" data-toggle="dropdown">
				                            <i class="fa fa-angle-down"></i>
				                        </button>
				                        <ul class="dropdown-menu" role="menu">
				                            <li>
				                                <a href="javascript:;" class="input_room"><i class="fa fa-user"></i> Nhận phòng </a>
				                            </li>
				                            <li class="divider"> </li>
				                            <li>
				                                <a href="javascript:;" class="order_room"><i class="fa fa-check"></i>  Đặt phòng trước </a>
				                            </li>
				                            <li class="divider"> </li>
				                            <li>
				                                <a href="javascript:;" class="update_status_room"> <i class="fa fa-edit"></i> Cập nhật trạng thái phòng </a>
				                            </li>
				                            
				                        </ul>
				                    </div>
								</td>
							<?php endfor; ?>
					  	</tr>
					  	<tr >
						    <td class="color_1">Lầu 2</td>
						    <?php for($i = 1; $i <=7; $i++): ?>
								<td class="color_yellow">
									<div class="btn-group">
				                        <button type="button" class="btn yellow"><?= $i ?></button>
				                        <button type="button" class="btn yellow dropdown-toggle" data-toggle="dropdown">
				                            <i class="fa fa-angle-down"></i>
				                        </button>
				                        <ul class="dropdown-menu" role="menu">
				                            <li>
				                                <a href="javascript:;" class="input_room"><i class="fa fa-user"></i> Nhận phòng </a>
				                            </li>
				                            <li class="divider"> </li>
				                            <li>
				                                <a href="javascript:;"  class="order_room"><i class="fa fa-check"></i>  Đặt phòng trước </a>
				                            </li>
				                            <li class="divider"> </li>
				                            <li>
				                                <a href="javascript:;" class="update_status_room"> <i class="fa fa-edit"></i> Cập nhật trạng thái phòng </a>
				                            </li>
				                            
				                        </ul>
				                    </div>
								</td>
							<?php endfor; ?>
					  	</tr>
					  	<tr >
						    <td class="color_1">Lầu 3</td>
						    <?php for($i = 1; $i <=11; $i++): ?>
						    	<?php if($i== 1 || $i==3 || $i ==6 || $i == 10 || $i == 11): ?>
						    		<td class="color_red">
										<div class="btn-group">
					                        <button type="button" class="btn red"><?= $i ?></button>
					                        <button type="button" class="btn red dropdown-toggle" data-toggle="dropdown">
					                            <i class="fa fa-angle-down"></i>
					                        </button>
					                        <ul class="dropdown-menu" role="menu">
					                            <li>
					                                <a href="javascript:;" class="input_room"><i class="fa fa-user"></i> Nhận phòng </a>
					                            </li>
					                            <li class="divider"> </li>
					                            <li>
					                                <a href="javascript:;"  class="order_room"><i class="fa fa-check"></i>  Đặt phòng trước </a>
					                            </li>
					                            <li class="divider"> </li>
					                            <li>
					                                <a href="javascript:;" class="update_status_room"> <i class="fa fa-edit"></i> Cập nhật trạng thái phòng </a>
					                            </li>
					                            
					                        </ul>
					                    </div>
									</td>
						    	<?php else: ?>
						    		<td class="color_2">
										<div class="btn-group">
					                        <button type="button" class="btn blue"><?= $i ?></button>
					                        <button type="button" class="btn blue dropdown-toggle" data-toggle="dropdown">
					                            <i class="fa fa-angle-down"></i>
					                        </button>
					                        <ul class="dropdown-menu" role="menu">
					                            <li>
					                                <a href="javascript:;" class="input_room"><i class="fa fa-user"></i> Nhận phòng </a>
					                            </li>
					                            <li class="divider"> </li>
					                            <li>
					                                <a href="javascript:;"  class="order_room"><i class="fa fa-check"></i>  Đặt phòng trước </a>
					                            </li>
					                            <li class="divider"> </li>
					                            <li>
					                                <a href="javascript:;" class="update_status_room"> <i class="fa fa-edit"></i> Cập nhật trạng thái phòng </a>
					                            </li>
					                            
					                        </ul>
					                    </div>
									</td>
						    	<?php endif; ?>
								
							<?php endfor; ?>
					  	</tr>
					  	<tr >
						    <td class="color_1">Lầu 4</td>
						    <?php for($i = 1; $i <=11; $i++): ?>
								<td class="color_2">
									<div class="btn-group">
				                        <button type="button" class="btn blue"><?= $i ?></button>
				                        <button type="button" class="btn blue dropdown-toggle" data-toggle="dropdown">
				                            <i class="fa fa-angle-down"></i>
				                        </button>
				                        <ul class="dropdown-menu" role="menu">
				                            <li>
				                                <a href="javascript:;" class="input_room"><i class="fa fa-user"></i> Nhận phòng </a>
				                            </li>
				                            <li class="divider"> </li>
				                            <li>
				                                <a href="javascript:;"  class="order_room"><i class="fa fa-check"></i>  Đặt phòng trước </a>
				                            </li>
				                            <li class="divider"> </li>
				                            <li>
				                                <a href="javascript:;" class="update_status_room"> <i class="fa fa-edit"></i> Cập nhật trạng thái phòng </a>
				                            </li>
				                            
				                        </ul>
				                    </div>
								</td>
							<?php endfor; ?>
					  	</tr>
					  	<tr >
						    <td class="color_1">Lầu 5</td>
						    <?php for($i = 1; $i <=11; $i++): ?>
						    	<?php if($i == 2 || $i == 4 || $i == 10): ?>
						    		<td class="color_grey-cascade">
										<div class="btn-group">
					                        <button type="button" class="btn grey-cascade"><?= $i ?></button>
					                        <button type="button" class="btn grey-cascade dropdown-toggle" data-toggle="dropdown">
					                            <i class="fa fa-angle-down"></i>
					                        </button>
					                        <ul class="dropdown-menu" role="menu">
					                            <li>
					                                <a href="javascript:;" class="input_room"><i class="fa fa-user"></i> Nhận phòng </a>
					                            </li>
					                            <li class="divider"> </li>
					                            <li>
					                                <a href="javascript:;"  class="order_room"><i class="fa fa-check"></i>  Đặt phòng trước </a>
					                            </li>
					                            <li class="divider"> </li>
					                            <li>
					                                <a href="javascript:;" class="update_status_room"> <i class="fa fa-edit"></i> Cập nhật trạng thái phòng </a>
					                            </li>
					                            
					                        </ul>
					                    </div>
									</td>
						    	<?php else: ?>
									<td class="color_2">
										<div class="btn-group">
					                        <button type="button" class="btn blue"><?= $i ?></button>
					                        <button type="button" class="btn blue dropdown-toggle" data-toggle="dropdown">
					                            <i class="fa fa-angle-down"></i>
					                        </button>
					                        <ul class="dropdown-menu" role="menu">
					                            <li>
					                                <a href="javascript:;" class="input_room"><i class="fa fa-user"></i> Nhận phòng </a>
					                            </li>
					                            <li class="divider"> </li>
					                            <li>
					                                <a href="javascript:;"  class="order_room"><i class="fa fa-check"></i>  Đặt phòng trước </a>
					                            </li>
					                            <li class="divider"> </li>
					                            <li>
					                                <a href="javascript:;" class="update_status_room"> <i class="fa fa-edit"></i> Cập nhật trạng thái phòng </a>
					                            </li>
					                            
					                        </ul>
					                    </div>
									</td>
								<?php endif; ?>
							<?php endfor; ?>
					  	</tr>
					  
					</table>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
	
	$(document).ready(function(){ 
		$("body").on("click", '.click_customer', function(){
			$.ajax({
				url: "<?= Url::to(['list-customer']) ?>",
				success : function(result) {
					$('#modal_lg .modal-content').html(result);
					$("#modal_lg").modal();
				}
			});
			
		})
		$("body").on("click", '.click_checkout', function(){
			$.ajax({
				url: "<?= Url::to(['list-checkout']) ?>",
				success : function(result) {
					$('#modal_lg .modal-content').html(result);
					$("#modal_lg").modal();
				}
			});
			
		})
		$("body").on("click", '.click_checkin', function(){
			$.ajax({
				url: "<?= Url::to(['list-checkin']) ?>",
				success : function(result) {
					$('#modal_lg .modal-content').html(result);
					$("#modal_lg").modal();
				}
			});
			
		})
		$("body").on("click", '.booking_status', function(){
			$.ajax({
				url: "<?= Url::to(['booking-status']) ?>",
				success : function(result) {
					$('#modal_sm .modal-content').html(result);
					$("#modal_sm").modal();
				}
			});
			
		})
		
		$("body").on("click", '.check_in', function(){
			$.ajax({
				url: "<?= Url::to(['check-in-customer-group']) ?>",
				success : function(result) {
					$('#modal_lg .modal-content').html(result);
					$("#modal_lg").modal();
				}
			});
			
		})
		$("body").on("click", '.check_out', function(){
			$.ajax({
				url: "<?= Url::to(['check-out-customer-group']) ?>",
				success : function(result) {
					$('#modal_lg .modal-content').html(result);
					$("#modal_lg").modal();
				}
			});
			
		})
		$("body").on("click", '.order_room', function(){
			$.ajax({
				url: "<?= Url::to(['modal-order']) ?>",
				data: {
					id: '1',
				},
				type: 'post',
				success : function(result) {
					$('#modal_lg .modal-content').html(result);
					$("#modal_lg").modal();
				}
			});
			
		}) 
		$("body").on("click", '.input_room', function(){
			$.ajax({
				url: "<?= Url::to(['modal-order']) ?>",
				data: {
					id: '2',
				},
				type: "post",
				success : function(result) {
					$('#modal_lg .modal-content').html(result);
					$("#modal_lg").modal();
				}
			});
			
		}) 

		$("body").on("click", '.update_status_room', function(){
			$.ajax({
				url: "<?= Url::to(['modal-update-status-room']) ?>",
				success : function(result) {
					$('#modal_sm .modal-content').html(result);
					$("#modal_sm").modal();
				}
			});
			
		})
	})
</script>

<style>
.color_1, .color_2 {    
   text-align: center;
    width:100px;
    height: auto;
    margin: auto;
    
    
}

.color_1{
 background-color: #363636;
 border: 1px solid #fafafa;
 color: #fafafa;
 font-weight: bold;
}

.color_red{
 background-color: red;
 border: 1px solid #fafafa;
 color: #fafafa;
 font-weight: bold;
}
.color_yellow{
	background-color: yellow;
 border: 1px solid #fafafa;
  color: #fafafa;
 font-weight: bold;
}
.color_grey-cascade{
	background-color: #dddddd;
 border: 1px solid #fafafa;
  color: #fafafa;
 font-weight: bold;
}

.color_2{
 background-color: #2f7ebb;
 border: 1px solid #fafafa;
  color: #fafafa;
 font-weight: bold;
}
table {
    border-collapse: collapse;
   
}

th, td {
    padding: 10px;
}
.table .btn-group .btn {
	padding: 6px 5px!important;
}
</style>