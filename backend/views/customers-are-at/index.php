<?php

use yii\helpers\Html;
use yii\helpers\Url;
$this->title = 'Khách hàng đang ở';
$this->params['breadcrumbs'][] = $this->title;
/* @var $ backend\models\Room */
/* @var $this yii\web\View */
?>
<div class="room-index">
	<h1 class="page-title margin-bottom-10"><?= Html::encode($this->title) ?></h1>
	<?php // echo  $this->render( '/template/_more_options', [ 'table' => 'table_room', 'url' => Url::to( [ 'change-rows-status' ] ), 'params' => [Yii::t( 'yii', 'Delete' ) => - 1] ] ); ?>
	<table id="table_room" class="table table-striped table-bordered table-hover table-checkable nowrap">
		<thead>
		<tr>
            <th class="table-checkbox" width="5%">
                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                    <input class="cb-all group-checkable" type="checkbox" title=""/>
                    <span></span>
                </label>
            </th>
			<th>Phòng</th>
			<th>Khách hàng</th>
			<th>Loại phòng</th>
			<th>Ngày đến</th>
			<th>Ngày đi dự kiến</th>
			<th>Số CM/HC</th>
			<th>NGày sinh</th>
			<th>Giới tính</th>
			<th>Địa chỉ</th>
            <th width="10%">Hành động</th>
		</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</div>