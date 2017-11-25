<?php

namespace backend\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use yii\web\ServerErrorHttpException;
use yii\web\MethodNotAllowedHttpException;
use backend\models\NumberOfBeds;
use common\utils\controller\Controller;
use common\utils\table\TableFacade;
use backend\models\table\NumberOfBedsTable;
use yii\helpers\Url;

class NumberOfBedsController extends Controller
{
    /**
    * Hiện danh sách NumberOfBeds.
    *
    * @return string
    */
    public function actionIndex()
    {
		$numberOfBeds = new NumberOfBeds();
        return $this->render('index', ['numberOfBeds' => $numberOfBeds]);
    }

    /**
    * Load ajax table trang index
    *
    * @return string
    */
    public function actionIndexTable() {
        $tableFacade = new TableFacade( new NumberOfBedsTable );
        return $tableFacade->getDataTable();
    }

    /**
    * Hiện trang view chi tiết NumberOfBeds.
    *
    * @return string
    * @throws NotFoundHttpException
    */
	public function actionView()
	{
        $numberOfBedsId = Yii::$app->request->get('id', '');
        $numberOfBeds = $this->findModel($numberOfBedsId);
		return $this->render('view', [
			'numberOfBeds' => $numberOfBeds
		]);
	}

    /**
    * Hiện trang create NumberOfBeds.
    *
    * @return string
    */
    public function actionCreate()
    {
		$numberOfBeds = new NumberOfBeds();
		return $this->render('create', [
			'numberOfBeds' => $numberOfBeds,
		]);
    }

    /**
    * Hiện trang update NumberOfBeds.
    *
    * @return string
    * @throws NotFoundHttpException
    */
	public function actionUpdate()
	{
        $numberOfBedsId = Yii::$app->request->get('id', '');
		$numberOfBeds = $this->findModel($numberOfBedsId);
		return $this->render('update', [
			'numberOfBeds' => $numberOfBeds
		]);
	}

    /**
    * Lưu NumberOfBeds model.
    *
    * @return string:
    * - url: lưu thành công
    * - json: lưu thất bại, trả vể object lỗi
    * - An internal server error occurred: không load được model
    * @throws \yii\base\InvalidParamException
    * @throws NotFoundHttpException
    * @throws ServerErrorHttpException
    * @throws \yii\base\Exception
    * @throws \yii\db\Exception
    * @throws \yii\base\InvalidCallException
    */
	public function actionSave() {
		$numberOfBedsId = Yii::$app->request->post('NumberOfBeds')['id'];
		$numberOfBeds   = $numberOfBedsId != '' ? $this->findModel($numberOfBedsId) : new NumberOfBeds();

		if ( $numberOfBeds->load( Yii::$app->request->post() ) ) {
			if ( $numberOfBeds->save() ) {
				return Url::to( [ 'index' ], true );
			}

			return $this->asJson($numberOfBeds->errors);
		}

		throw new ServerErrorHttpException( Yii::t('yii', 'An internal server error occurred.') );
	}


    /**
    * Cập nhật status NumberOfBeds.
    *
    * @return string
    * @throws NotFoundHttpException
    */
    public function actionDelete() {
        $numberOfBedsId = Yii::$app->request->post( 'id', '');
        $numberOfBeds = NumberOfBeds::findOne(['id' => $numberOfBedsId, 'status' => 1]);
        return $numberOfBeds != null && $numberOfBeds->updateAttributes( [ 'status' => -1 ] ) > 0 ? 'success' : 'fail';
    }

    /**
     * Select2 ajax NumberOfBeds.
     *
     * @return \yii\web\Response
     * @throws MethodNotAllowedHttpException
     */
	public function actionSelectNumberOfBeds() {
        if (Yii::$app->request->isAjax) {
            $query  = Yii::$app->request->get( 'query', '' );
            $page   = Yii::$app->request->get( 'page', 1 );
            $excludeIds = Yii::$app->request->get( 'excludeIds', [] );
            $offset = ($page - 1) * 10;
            $numberOfBedss = NumberOfBeds::find()->where( [ 'status' => 1 ] )
                                                                    ->andFilterWhere( [ 'not in', 'id', $excludeIds ] )
                                                                    ->andFilterWhere( [ 'like', 'name', $query ] )->select( [ 'id', 'name' ] );

            return $this->asJson( [
                'total_count' => $numberOfBedss->count(),
                'items'       => $numberOfBedss->offset($offset)->limit( 10 )->all()
            ] );
        }

        throw new MethodNotAllowedHttpException(Yii::t('yii', 'Method Not Allowed'));
	}


	/**
	* Tìm NumberOfBeds model theo khóa chính.
	* Nếu không tìm thấy, trả về trang 404.
    *
	* @param $numberOfBedsId
	* @return NumberOfBeds the loaded model
	* @throws NotFoundHttpException if the model cannot be found
	*/
    protected function findModel($numberOfBedsId) {
        if (($model = NumberOfBeds::findOne(['id' => $numberOfBedsId, 'status' => 1])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t( 'yii', 'Page not found.'));
    }
}
