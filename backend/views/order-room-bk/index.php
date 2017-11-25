<?php

use yii\helpers\Html;
use yii\helpers\Url;
$this->title = 'Order Room';
$this->params['breadcrumbs'][] = $this->title;
/* @var $orderRoom backend\models\OrderRoom */
/* @var $this yii\web\View */
?>
<div class="order-room-index">
	<h1 class="page-title margin-bottom-10"><?= Html::encode($this->title) ?></h1>
	<?= $this->render( '_search', ['table' => 'table_order_room', 'orderRoom' => $orderRoom] ); ?>
	<?=  $this->render( '/template/_more_options', [ 'table' => 'table_order_room', 'url' => Url::to( [ 'change-rows-status' ] ), 'params' => [Yii::t( 'yii', 'Delete' ) => - 1] ] ); ?>
	<table id="table_order_room" class="table table-striped table-bordered table-hover table-checkable nowrap">
		<thead>
		<tr>
            <th class="table-checkbox" width="5%">
                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                    <input class="cb-all group-checkable" type="checkbox" title=""/>
                    <span></span>
                </label>
            </th>
			<th><?= $orderRoom->getAttributeLabel('full_name') ?></th>
			<th><?= $orderRoom->getAttributeLabel('phone') ?></th>
			<th><?= $orderRoom->getAttributeLabel('email') ?></th>
			<th><?= $orderRoom->getAttributeLabel('check_in_date') ?></th>
			<th><?= $orderRoom->getAttributeLabel('check_out_date') ?></th>
            <th width="10%">Hành động</th>
		</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</div>
<script>
    'use strict';
	$(function () {
		Team.blockUI();
		let body = $('body');
        let tableOrderRoom = $("#table_order_room").DataTable({
			serverSide: true,
			ajax: $.fn.dataTable.pipeline({
				url: "<?= Url::to(['index-table']) ?>",
				data: function(q) {
					q.filterDatas = $("#form_order_room_search").serialize();
				}
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
		body.on('click', '.btn-delete-order-room', function () {
            Team.action($(this), "<?= Yii::t('yii', 'Are you sure you want to delete this item?') ?>", tableOrderRoom);
		});
	});
</script>