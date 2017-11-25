<?php
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $orderRoom backend\models\OrderRoom */
/* @var $orderRoomDetails[] backend\models\OrderRoomDetail */
/* @var $orderRoomDetail backend\models\OrderRoomDetail */
?>
<form id="form_order_room">
	<div id="error_summary"></div>
	<div class="row">
		<input type="hidden" name="OrderRoom[id]" value="<?= $orderRoom->id ?>">
		<div class="col-md-3 col-xs-6">
			<div class="form-group">
                <label for="txt_full_name" class="control-label"><?= $orderRoom->getAttributeLabel('full_name') ?>
<span class="font-red-mint">*</span></label>
                <input class="form-control alphanum require" name="OrderRoom[full_name]" value="<?= $orderRoom->full_name ?>" id="txt_full_name" autofocus>
			</div>
		</div>
		<div class="col-md-3 col-xs-6">
			<div class="form-group">
                <label for="txt_phone" class="control-label"><?= $orderRoom->getAttributeLabel('phone') ?></label>
                <input class="form-control alphanum" name="OrderRoom[phone]" value="<?= $orderRoom->phone ?>" id="txt_phone">
			</div>
		</div>
		<div class="col-md-3 col-xs-6">
			<div class="form-group">
                <label for="txt_email" class="control-label"><?= $orderRoom->getAttributeLabel('email') ?></label>
                <input class="form-control email" name="OrderRoom[email]" value="<?= $orderRoom->email ?>" id="txt_email">
			</div>
		</div>
		<div class="col-md-3 col-xs-6">
			<div class="form-group">
                <label for="txt_check_in_date" class="control-label"><?= $orderRoom->getAttributeLabel('check_in_date') ?></label>
                <div class="input-group date">
                    <input class="form-control datepicker" name="OrderRoom[check_in_date]" value="<?= Yii::$app->formatter->asDate($orderRoom->check_in_date) ?>" id="txt_check_in_date"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                </div>
			</div>
		</div>
		<div class="col-md-3 col-xs-6">
			<div class="form-group">
                <label for="txt_check_out_date" class="control-label"><?= $orderRoom->getAttributeLabel('check_out_date') ?></label>
                <div class="input-group date">
                    <input class="form-control datepicker" name="OrderRoom[check_out_date]" value="<?= Yii::$app->formatter->asDate($orderRoom->check_out_date) ?>" id="txt_check_out_date"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                </div>
			</div>
		</div>
		<div class="col-md-12  col-xs-12">
			<div class="form-group">
                <label for="textarea_note" class="control-label"><?= $orderRoom->getAttributeLabel('note') ?></label>
                <textarea class="form-control" name="OrderRoom[note]" id="textarea_note" cols="30" rows="5"><?= $orderRoom->note ?></textarea>
			</div>
		</div>
	</div>
	<!-- danh sach dat phonge -->
    <div class="detail-title">
        <label for="">Danh sách</label>
    </div>
    <div class="row" id="order_room_detail_section">
		<div class="col-md-3 col-xs-6">
			<div class="form-group">
				<label for="select_order_room_detail_room_id" class="control-label"><?= $orderRoomDetail->getAttributeLabel('room_id') ?>:</label>
				<select id="select_order_room_detail_room_id" class="form-control select">
					<option></option>
				</select>
			</div>
		</div>
		<div class="col-md-3 col-xs-6">
			<div class="form-group">
				<label for="select_order_room_detail_price_room_id" class="control-label"><?= $orderRoomDetail->getAttributeLabel('price_room_id') ?>:</label>
				<select id="select_order_room_detail_price_room_id" class="form-control select">
					<option></option>
				</select>
			</div>
		</div>
		<div class="col-md-3 col-xs-6">
            <div class="form-group">
                <button type="button" class="btn btn-primary" id="btn_add_order_room_detail" style="margin-top: 24px">Thêm</button>
            </div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12 form-group">
			<table id="table_order_menu_in_room_detail" class="table table-striped table-bordered nowrap">
				<thead>
				<tr>
					<th><?= $orderMenuInRoomDetail->getAttributeLabel('menu_id') ?></th>
					<th><?= $orderMenuInRoomDetail->getAttributeLabel('quantity') ?></th>
					<th><?= $orderMenuInRoomDetail->getAttributeLabel('note') ?></th>
                    <th width="10%">Hành động</th>
				</tr>
				</thead>
				<tbody>
				<?php if ( isset($orderMenuInRoomDetails) && is_array($orderMenuInRoomDetails) ): ?>
					<?php foreach ( $orderMenuInRoomDetails as $key => $orderMenuInRoomDetail ): ?>
						<tr>
							<td>
                                <?= $orderMenuInRoomDetail->menu_id != null ? $orderMenuInRoomDetail->menu->name : '' ?>
								<input type="hidden" class="txt-menu-id" name="OrderMenuInRoomDetail[<?= $key ?>][menu_id]" value="<?= $orderMenuInRoomDetail->menu_id?>">
							</td>
							<td>
								<input title="" class="form-control txt-quantity" name="OrderMenuInRoomDetail[<?= $key ?>][quantity]" value="<?= $orderMenuInRoomDetail->quantity ?>">
							</td>
							<td>
								<input title="" class="form-control txt-note" name="OrderMenuInRoomDetail[<?= $key ?>][note]" value="<?= $orderMenuInRoomDetail->note ?>">
							</td>
							<td>
								<button type="button" class="btn btn-danger btn-remove-order-menu-in-room-detail"> <i class="glyphicon glyphicon-trash"></i> </button>
							</td>
						</tr>
					<?php endforeach ?>
				<?php endif ?>
				</tbody>
			</table>
		</div>
	</div>

<!-- danh sach mon an -->
	 <div class="detail-title">
        <label for="">Danh sách</label>
    </div>
    <div class="row" id="order_menu_in_room_detail_section">
		<div class="col-md-3 col-xs-6">
			<div class="form-group">
				<label for="select_order_menu_in_room_detail_menu_id" class="control-label"><?= $orderMenuInRoomDetail->getAttributeLabel('menu_id') ?>:</label>
				<select id="select_order_menu_in_room_detail_menu_id" class="form-control select">
					<option></option>
				</select>
			</div>
		</div>
		<div class="col-md-3 col-xs-6">
			<div class="form-group">
				<label for="txt_order_menu_in_room_detail_quantity" class="control-label"><?= $orderMenuInRoomDetail->getAttributeLabel('quantity') ?>:</label>
				<input class="form-control alphanum" id="txt_order_menu_in_room_detail_quantity">
			</div>
		</div>
		<div class="col-md-3 col-xs-6">
			<div class="form-group">
				<label for="txt_order_menu_in_room_detail_note" class="control-label"><?= $orderMenuInRoomDetail->getAttributeLabel('note') ?>:</label>
				<input class="form-control alphanum" id="txt_order_menu_in_room_detail_note">
			</div>
		</div>
		<div class="col-md-3 col-xs-6">
            <div class="form-group">
                <button type="button" class="btn btn-primary" id="btn_add_order_menu_in_room_detail" style="margin-top: 24px">Thêm</button>
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 form-group">
			<table id="table_order_room_detail" class="table table-striped table-bordered nowrap">
				<thead>
				<tr>
					<th><?= $orderRoomDetail->getAttributeLabel('room_id') ?></th>
					<th><?= $orderRoomDetail->getAttributeLabel('price_room_id') ?></th>
                    <th width="10%">Hành động</th>
				</tr>
				</thead>
				<tbody>
				<?php if ( isset($orderRoomDetails) && is_array($orderRoomDetails) ): ?>
					<?php foreach ( $orderRoomDetails as $key => $orderRoomDetail ): ?>
						<tr>
							<td>
                                <?= $orderRoomDetail->room_id != null ? $orderRoomDetail->room->name : '' ?>
								<input type="hidden" class="txt-room-id" name="OrderRoomDetail[<?= $key ?>][room_id]" value="<?= $orderRoomDetail->room_id?>">
							</td>
							<td>
                                <?= $orderRoomDetail->price_room_id != null ? $orderRoomDetail->priceRoom->name : '' ?>
								<input type="hidden" class="txt-price-room-id" name="OrderRoomDetail[<?= $key ?>][price_room_id]" value="<?= $orderRoomDetail->price_room_id?>">
							</td>
							<td>
								<button type="button" class="btn btn-danger btn-remove-order-room-detail"> <i class="glyphicon glyphicon-trash"></i> </button>
							</td>
						</tr>
					<?php endforeach ?>
				<?php endif ?>
				</tbody>
			</table>
		</div>
	</div>
    <div class="form-footer">
        <a class="btn btn-default" href="<?= Url::to( [ 'index' ] ) ?>">Hủy</a>
        <button class="btn <?= $orderRoom->isNewRecord ? 'blue-steel' : 'green-haze' ?>" id="btn_save_order_room">Lưu</button>
    </div>
</form>
<script>
    'use strict';
    $(function () {
		$("#form_order_room").on('submit', function () {
            if (Team.validate('form_order_room')) {
				let formData = new FormData(document.getElementById("form_order_room"));
                Team.submitForm('<?= Url::to( [ 'save' ] ) ?>', formData).then(function(result) {
					if (typeof result !== 'object' && result.includes('http')) {
						location.href = result;
					} else {
                        Team.showErrorSummary(result, '#form_order_room');
					}
				});
			} else {
                $('.error').first().focus();
            }
			return false;
		});
//		MODEL DETAIL
		let tableOrderRoomDetail = $("#table_order_room_detail").DataTable({
            paging: false,
            scrollY: '276px',
            scrollCollapse: true,
            scrollX: true,
            sort: false
		});
		let body = $("body");
		$("#btn_add_order_room_detail").on('click', function() {
            let index = tableOrderRoomDetail.rows().count();
            let valid = false;
            while (!valid) {
                if ($(`input[name="OrderRoomDetail[${index}][id]"]`).length > 0) {
                    index++;
                } else {
                    valid = true;
                }
            }
            let roomText = $("#select_order_room_detail_room_id").select2('data')[0]['name'];
            let roomId = $("#select_order_room_detail_room_id").val();
            let priceRoomText = $("#select_order_room_detail_price_room_id").select2('data')[0]['name'];
            let priceRoomId = $("#select_order_room_detail_price_room_id").val();
			tableOrderRoomDetail.row
                .add([`<input type="hidden" name="OrderRoomDetail[${index}][id]">` + 
roomText + `<input type="hidden" name="OrderRoomDetail[${index}][room_id]" value="${roomId}" class="txt-room-id">`
,priceRoomText + `<input type="hidden" name="OrderRoomDetail[${index}][price_room_id]" value="${priceRoomId}" class="txt-price-room-id">`
,'<button type="button" class="btn btn-danger btn-remove-order-room-detail"> <i class="glyphicon glyphicon-trash"></i> </button>'])
                .draw(false);
            $("#order_room_detail_section").find('input, select').val('').trigger('change').first().focus();
            let offSet = (parseInt(index) + 1) * 51;
            $(".dataTables_scrollBody").scrollTop(offSet);
//            $('.DTFC_LeftBodyLiner').scrollTop(offSet);
//            $('.DTFC_RightBodyLiner').scrollTop(offSet);
		});
		body.on('click', '.btn-remove-order-room-detail', function () {
			tableOrderRoomDetail.row($(this).parents('tr')).remove().draw();
		});


		//		MODEL DETAIL
		let tableOrderMenuInRoomDetail = $("#table_order_menu_in_room_detail").DataTable({
            paging: false,
            scrollY: '276px',
            scrollCollapse: true,
            scrollX: true,
            sort: false
		});
		let body = $("body");
		$("#btn_add_order_menu_in_room_detail").on('click', function() {
            let index = tableOrderMenuInRoomDetail.rows().count();
            let valid = false;
            while (!valid) {
                if ($(`input[name="OrderMenuInRoomDetail[${index}][id]"]`).length > 0) {
                    index++;
                } else {
                    valid = true;
                }
            }
            let menuText = $("#select_order_menu_in_room_detail_menu_id").select2('data')[0]['name'];
            let menuId = $("#select_order_menu_in_room_detail_menu_id").val();
            let quantity = $("#txt_order_menu_in_room_detail_quantity").val();
            let note = $("#txt_order_menu_in_room_detail_note").val();
			tableOrderMenuInRoomDetail.row
                .add([`<input type="hidden" name="OrderMenuInRoomDetail[${index}][id]">` + 
menuText + `<input type="hidden" name="OrderMenuInRoomDetail[${index}][menu_id]" value="${menuId}" class="txt-menu-id">`
,`<input type="text" name="OrderMenuInRoomDetail[${index}][quantity]" value="${quantity}" class="form-control txt-quantity">`
,`<input type="text" name="OrderMenuInRoomDetail[${index}][note]" value="${note}" class="form-control txt-note">`
,'<button type="button" class="btn btn-danger btn-remove-order-menu-in-room-detail"> <i class="glyphicon glyphicon-trash"></i> </button>'])
                .draw(false);
            $("#order_menu_in_room_detail_section").find('input, select').val('').trigger('change').first().focus();
            let offSet = (parseInt(index) + 1) * 51;
            $(".dataTables_scrollBody").scrollTop(offSet);
//            $('.DTFC_LeftBodyLiner').scrollTop(offSet);
//            $('.DTFC_RightBodyLiner').scrollTop(offSet);
		});
		body.on('click', '.btn-remove-order-menu-in-room-detail', function () {
			tableOrderMenuInRoomDetail.row($(this).parents('tr')).remove().draw();
		});
	});
</script>