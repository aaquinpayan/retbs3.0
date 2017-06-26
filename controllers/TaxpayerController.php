<?php

namespace app\controllers;

use Yii;
use app\models\Taxpayer;
use app\models\TaxpayerSearch;
use app\models\TaxDeclaration;
use app\models\TaxDeclarationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * TaxpayerController implements the CRUD actions for Taxpayer model.
 */
class TaxpayerController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Taxpayer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'admin';

        $searchModel = new TaxpayerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Taxpayer model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $this->layout = 'admin';
        
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Taxpayer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $this->layout = 'admin';

        $model = new Taxpayer();

        if ($model->load(Yii::$app->request->post())) {
            // $model->full_name = $model->first_name . ' ' . $model->middle_name . ' ' . $model->last_name;
            $user = TaxDeclaration::find()
                ->where(['property_owner' => $model->full_name])
                ->one();

            $model->address = $user->address;
            if ($model->validate()) {
                

            }else {
                // validation failed: $errors is an array containing error messages
                $errors = $model->errors;
                print_r( $errors);
            }
            // print_r(Yii::$app->request->post());
            if($model->save()) return $this->redirect(['view', 'id' => $model->taxpayer_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Taxpayer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $this->layout = 'admin';
        $model = $this->findModel($id);
         // echo "<br/>" . "<br/>" . "<br/>" ;
        

        // var_dump('Paid                            ');
        if($model->gender == 'Female                          ') $model->gender = 'Female';
        else $model->gender = 'Male';

        if($model->payment_status == 'Paid                            ') $model->payment_status = 'Paid';
        else $model->payment_status = 'Not Paid';



        if ($model->load(Yii::$app->request->post())) {
            $model->full_name = $model->first_name . ' ' . $model->middle_name . ' ' . $model->last_name;
             if($model->save())
            return $this->redirect(['view', 'id' => $model->taxpayer_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Taxpayer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Taxpayer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Taxpayer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Taxpayer::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
