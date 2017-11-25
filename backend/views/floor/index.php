<?php

use yii\helpers\Html;
use yii\helpers\Url;
$this->title = 'Floor';
$this->params['breadcrumbs'][] = $this->title;
/* @var $floor backend\models\floor */
/* @var $this yii\web\View */
?>
<div class="floor-index">
	<h1 class="page-title margin-bottom-10"><?= Html::encode($this->title) ?></h1>
	<?= $this->render( '_search', ['table' => 'table_floor', 'floor' => $floor] ); ?>
	<?=  $this->render( '/template/_more_options', [ 'table' => 'table_floor', 'url' => Url::to( [ 'change-rows-status' ] ), 'params' => [Yii::t( 'yii', 'Delete' ) => - 1] ] ); ?>
	<table id="table_floor" class="table table-striped table-bordered table-hover table-checkable nowrap">
		<thead>
		<tr>
            <th class="table-checkbox" width="5%">
                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                    <input class="cb-all group-checkable" type="checkbox" title=""/>
                    <span></span>
                </label>
            </th>
			<th>Tên tầng</th>
			<th>Số phòng</th>
			<th>Ghi chú</th>
            <th width="10%">Thao tác</th>
		</tr>
		</thead>
		<tbody>
			<tr>
				<td><input class="cb-all group-checkable" type="checkbox" title=""/></td>
				<td>Trệt</td>
				<td>001</td>
				<td></td>
				<td>
					<a class='btn green-steel btn-update-floor' title='Sửa'>
						<i class='fa fa-pencil' aria-hidden='true'></i> 
					</a>
					<button class='btn red-mint btn-delete-floor' title='Xóa'>
						<i class='fa fa-trash' aria-hidden='true'></i> 
					</button>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<script>
    'use strict';
	$(function () {
		Team.blockUI();
		let body = $('body');
        let tableFloor = $("#table_floor").DataTable({
			serverSide: true,
			ajax: $.fn.dataTable.pipeline({
				// url: "<?= Url::to(['index-table']) ?>",
				// data: function(q) {
				// 	q.filterDatas = $("#form_floor_search").serialize();
				// }
			}),
			conditionalPaging: true,
            info: true,
            columnDefs: [
                {
                    'targets': [0, -1],
                    'searchable': false,
                    'orderable': false,
                }
            ],
		});
		body.on('click', '.btn-delete-floor', function () {
            Team.action($(this), "<?= Yii::t('yii', 'Are you sure you want to delete this item?') ?>", tableFloor);
		});
	});
</script>