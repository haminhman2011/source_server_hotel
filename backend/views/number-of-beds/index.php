<?php

use yii\helpers\Html;
use yii\helpers\Url;
$this->title = 'Number Of Beds';
$this->params['breadcrumbs'][] = $this->title;
/* @var $numberOfBeds backend\models\NumberOfBeds */
/* @var $this yii\web\View */
?>
<div class="number-of-beds-index">
	<h1 class="page-title margin-bottom-10"><?= Html::encode($this->title) ?></h1>
	<?= $this->render( '_search', ['table' => 'table_number_of_beds', 'numberOfBeds' => $numberOfBeds] ); ?>
	<?=  $this->render( '/template/_more_options', [ 'table' => 'table_number_of_beds', 'url' => Url::to( [ 'change-rows-status' ] ), 'params' => [Yii::t( 'yii', 'Delete' ) => - 1] ] ); ?>
	<table id="table_number_of_beds" class="table table-striped table-bordered table-hover table-checkable nowrap">
		<thead>
		<tr>
            <th class="table-checkbox" width="5%">
                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                    <input class="cb-all group-checkable" type="checkbox" title=""/>
                    <span></span>
                </label>
            </th>
			<th><?= $numberOfBeds->getAttributeLabel('name') ?></th>
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
        let tableNumberOfBeds = $("#table_number_of_beds").DataTable({
			serverSide: true,
			ajax: $.fn.dataTable.pipeline({
				url: "<?= Url::to(['index-table']) ?>",
				data: function(q) {
					q.filterDatas = $("#form_number_of_beds_search").serialize();
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
		body.on('click', '.btn-delete-number-of-beds', function () {
            Team.action($(this), "<?= Yii::t('yii', 'Are you sure you want to delete this item?') ?>", tableNumberOfBeds);
		});
	});
</script>