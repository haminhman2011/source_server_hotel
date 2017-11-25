<?php
/* @var $this yii\web\View */
/* @var $orderRoom backend\models\OrderRoom */
?>
<form id="form_order_room_search" class="search-form">
	<div class="row">
		<div class="col-md-3 col-xs-6">
			<div class="form-group">
				<label for="txt_full_name"><?= $orderRoom->getAttributeLabel('full_name') ?></label>
                <input class="form-control" name="full_name" id="txt_full_name">
			</div>
		</div>
		<div class="col-md-3 col-xs-6">
			<div class="form-group">
				<label for="txt_phone"><?= $orderRoom->getAttributeLabel('phone') ?></label>
                <input class="form-control" name="phone" id="txt_phone">
			</div>
		</div>
		<div class="col-md-3 col-xs-6">
			<div class="form-group">
				<label for="txt_email"><?= $orderRoom->getAttributeLabel('email') ?></label>
                <input class="form-control" name="email" id="txt_email">
			</div>
		</div>
		<div class="col-md-3 col-xs-6">
			<div class="form-group">
				<label for="txt_check_in_date"><?= $orderRoom->getAttributeLabel('check_in_date') ?></label>
                <div class="input-group date">
                    <input class="form-control datepicker" name="check_in_date" id="txt_check_in_date"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                </div>
			</div>
		</div>
		<div class="col-md-3 col-xs-6">
			<div class="form-group">
				<label for="txt_check_out_date"><?= $orderRoom->getAttributeLabel('check_out_date') ?></label>
                <div class="input-group date">
                    <input class="form-control datepicker" name="check_out_date" id="txt_check_out_date"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                </div>
			</div>
		</div>
		<div class="col-md-3 col-xs-6">
			<div class="form-group">
				<label for="txt_note"><?= $orderRoom->getAttributeLabel('note') ?></label>
                <input class="form-control" name="note" id="txt_note">
			</div>
		</div>
        <div class="col-md-3 col-xs-12">
            <div class="form-group" style="margin-top: 22px">
                <a type="button" class="btn btn-default" id="btn_reset_filter">Thiết lập lại</a>
                <button class="btn blue-steel" id="btn_filter">Tìm kiếm</button>
            </div>
        </div>
	</div>
</form>
<script>
    $(function() {
        let body = $("body");
        // PHẦN TÌM KIẾM
        $("#form_order_room_search").on('submit', function () {
            $('#<?= $table ?>').DataTable().clearPipeline().draw();
            return false;
        });
        $(document).keyup(function(e) {
            if (e.keyCode === 27) { // escape key maps to keycode `27`
                $("#btn_reset_filter").trigger('click');
            }
        });
        body.on('click', '#btn_reset_filter', function () {
            $("#form_order_room_search").find('input, select').val('').trigger('change');
            $('#<?= $table ?>').DataTable().clearPipeline().order([]).draw();
        });
        //END PHẦN TÌM KIẾM
    });
</script>
