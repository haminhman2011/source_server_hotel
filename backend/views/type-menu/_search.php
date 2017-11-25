<?php
/* @var $this yii\web\View */
/* @var $typeMenu backend\models\TypeMenu */
?>
<form id="form_type_menu_search" class="search-form">
	<div class="row">
		<div class="col-md-3 col-xs-6">
			<div class="form-group">
				<label for="txt_name"><?= $typeMenu->getAttributeLabel('name') ?></label>
                <input class="form-control" name="name" id="txt_name">
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
        $("#form_type_menu_search").on('submit', function () {
            $('#<?= $table ?>').DataTable().clearPipeline().draw();
            return false;
        });
        $(document).keyup(function(e) {
            if (e.keyCode === 27) { // escape key maps to keycode `27`
                $("#btn_reset_filter").trigger('click');
            }
        });
        body.on('click', '#btn_reset_filter', function () {
            $("#form_type_menu_search").find('input, select').val('').trigger('change');
            $('#<?= $table ?>').DataTable().clearPipeline().order([]).draw();
        });
        //END PHẦN TÌM KIẾM
    });
</script>
