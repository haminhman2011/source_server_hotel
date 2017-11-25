<?php

namespace backend\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use yii\web\ServerErrorHttpException;
use yii\web\MethodNotAllowedHttpException;
use backend\models\floor;
use common\utils\controller\Controller;
use common\utils\table\TableFacade;
use backend\models\table\floorTable;
use yii\helpers\Url;



class CustomerForgetController extends Controller
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

    public function actionCreate()
    {
        return $this->render('create');
    }

}