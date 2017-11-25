<?php

namespace backend\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use yii\web\ServerErrorHttpException;
use yii\web\MethodNotAllowedHttpException;
use common\utils\controller\Controller;
use yii\helpers\Url;

class HotelMapController extends Controller
{
    /**
    * Hiện danh sách floor.
    *
    * @return string
    */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionModalOrder(){
        $title = Yii::$app->request->post('id', '');
    	return $this->renderPartial('modal-order', ['title' => $title]);
    }

    public function actionModalUpdateStatusRoom(){
        return $this->renderPartial('modal_update_status_room');
    }

    public function actionCheckOutCustomerGroup(){
        return $this->renderPartial('check_out_customer_group');
    }
    public function actionCheckInCustomerGroup(){
        return $this->renderPartial('check_in_customer_group');
    }

    public function actionBookingStatus(){
        return $this->renderPartial('booking_status');
    }
    public function actionListCheckin(){
        return $this->renderPartial('list_checkin');
    }

    public function actionListCheckout(){
        return $this->renderPartial('list_checkout');
    }

    public function actionListCustomer(){
        return $this->renderPartial('list_customer');
    }

   
}