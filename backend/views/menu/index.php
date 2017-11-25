<?php

use yii\helpers\Html;
use yii\helpers\Url;
$this->title = 'Menu';
$this->params['breadcrumbs'][] = $this->title;
/* @var $menu backend\models\Menu */
/* @var $this yii\web\View */
?>
<div class="menu-index">
	<h1 class="page-title margin-bottom-10"><?= Html::encode($this->title) ?></h1>
	<?= $this->render( '_search', ['table' => 'table_menu', 'menu' => $menu] ); ?>
	<?=  $this->render( '/template/_more_options', [ 'table' => 'table_menu', 'url' => Url::to( [ 'change-rows-status' ] ), 'params' => [Yii::t( 'yii', 'Delete' ) => - 1] ] ); ?>
	<table id="table_menu" class="table table-striped table-bordered table-hover table-checkable nowrap">
		<thead>
		<tr>
            <th class="table-checkbox" width="5%">
                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                    <input class="cb-all group-checkable" type="checkbox" title=""/>
                    <span></span>
                </label>
            </th>
			<th><?= $menu->getAttributeLabel('name') ?></th>
			<th><?= $menu->getAttributeLabel('type_menu_id') ?></th>
			<th><?= $menu->getAttributeLabel('price') ?></th>
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
        let tableMenu = $("#table_menu").DataTable({
			serverSide: true,
			ajax: $.fn.dataTable.pipeline({
				url: "<?= Url::to(['index-table']) ?>",
				data: function(q) {
					q.filterDatas = $("#form_menu_search").serialize();
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
		body.on('click', '.btn-delete-menu', function () {
            Team.action($(this), "<?= Yii::t('yii', 'Are you sure you want to delete this item?') ?>", tableMenu);
		});
	});
</script>