<?php

namespace app\controllers;


use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Taxpayer;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout', 'changepassword'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        //if (!Yii::$app->user->isGuest) {
            return $this->render('index'); 
        //}else{
            //return $this->goBack();
        //}
    }

    public function actionAdmin()
    {
        return $this->render('admin');
    }

    public function actionAssessor()
    {
        return $this->render('assessor');
    }

    public function actionTreasurer()
    {
        return $this->render('treasurer');
    }

    public function actionTaxpayer()
    {
        return $this->render('taxpayer');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $model = new LoginForm();

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if(Yii::$app->user->identity->user_type == 1){
                return $this->render('admin');
            }else if (Yii::$app->user->identity->user_type == 2){
                return $this->render('assessor');  
            }else if (Yii::$app->user->identity->user_type == 3){
                return $this->render('treasurer');  
            }else if (Yii::$app->user->identity->user_type == 4){
                return $this->render('taxpayer');  
            }else{
                return $this->goHome();
            }
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }


    //register taxpayer
    public function actionRegister()
    {
       $this->layout = 'admin';

        $model = new Taxpayer();

        if ($model->load(Yii::$app->request->post())) {
            $model->full_name = $model->first_name . ' ' . $model->middle_name . ' ' . $model->last_name;
            // if ($model->validate()) {
                

            // }else {
            //     // validation failed: $errors is an array containing error messages
            //     $errors = $model->errors;
            //     print_r( $errors);
            // }
            // print_r(Yii::$app->request->post());
            if($model->save()) return $this->redirect(['view', 'id' => $model->taxpayer_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionChangepassword(){
        $model = new PasswordForm();
        $modeluser = Login::find()->where([
            'username'=>Yii::$app->user->identity->username
        ])->one();
      
        if($model->load(Yii::$app->request->post())){
            if($model->validate()){
                try{
                    $modeluser->password = $_POST['PasswordForm']['newpass'];
                    if($modeluser->save()){
                        Yii::$app->getSession()->setFlash(
                            'success','Password changed'
                        );
                        return $this->redirect(['index']);
                    }else{
                        Yii::$app->getSession()->setFlash(
                            'error','Password not changed'
                        );
                        return $this->redirect(['index']);
                    }
                }catch(Exception $e){
                    Yii::$app->getSession()->setFlash(
                        'error',"{$e->getMessage()}"
                    );
                    return $this->render('changepassword',[
                        'model'=>$model
                    ]);
                }
            }else{
                return $this->render('changepassword',[
                    'model'=>$model
                ]);
            }
        }else{
            return $this->render('changepassword',[
                'model'=>$model
            ]);
        }
    }



    /**
     * Displays contact page.
     *
     * @return string
     */
    /*
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }*/

    /**
     * Displays about page.
     *
     * @return string
     */
    /*
    public function actionAbout()
    {
        return $this->render('about');
    }
    */

    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');

            if ($model->validate()) {                
                $model->file->saveAs('uploads/' . $model->file->baseName . '.' . $model->file->extension);
            }
        }

        return $this->render('upload', ['model' => $model]);
    }

   

}
