<?php

use yii\helpers\Html;
use yii\helpers\Url;
$this->title = 'Loại phòng và giá';
$this->params['breadcrumbs'][] = $this->title;
/* @var $floor backend\models\floor */
/* @var $this yii\web\View */
?>
<br>
<div class="row form-group ">
    <div class="col-md-2 right-button">
        <a class="btn btn-success" type="button" href="<?= Url::to( [ 'kind-of-room/create' ] ) ?>">
            Thêm
        </a>
    </div>
</div>
<div class="floor-index">
	<table id="table_floor" class="table table-striped table-bordered table-hover table-checkable nowrap">
		<thead>
		<tr>
            <th class="table-checkbox" width="5%">
                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                    <input class="cb-all group-checkable" type="checkbox" title=""/>
                    <span></span>
                </label>
            </th>
			<th>Loại phòng</th>
			<th>Giá phòng</th>
			<th>Cài đặt giá</th>
			<th>Quy định phụ trội</th>
            <th width="10%">Thao tác</th>
		</tr>
		</thead>
		<tbody>
			<tr>
				<td><input class="cb-all group-checkable" type="checkbox" title=""/></td>
				<td>Phòng đơn</td>
				<td>220,000</td>
				<td>
					<ul>
						<li>Một ngày: 220,000</li>
						<li>Qua đêm: 160,000</li>
						<li>Tính theo giờ:</li>
						<li>Giờ thứ 1: 50,000 </li>
					</ul>
				</td>
				<td>
					<ul>
						<li>Phụ trội checkOut giờ ngày và đêm</li>
						<li>Giờ thứ 1: miễn phí</li>
						<li>Quá quy định trên tính thành 1 ngày</li>
					</ul>
				</td>
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