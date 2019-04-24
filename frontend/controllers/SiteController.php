<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\FileForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\NewForm;
use frontend\models\Languages;
use frontend\models\SiteData;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\data\Pagination;
use yii\web\Cookie;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\SqlDataProvider;
use frontend\models\AcademBases;
use frontend\models\AcademProduct;
use frontend\models\XmlRead;


/**
 * Site controller
 */
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
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
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
  
        public function actionData()
    {
            $form= new SiteData();
            $val=Yii::$app->request->get();
              $cookies=Yii::$app->response->cookies;
          if($form->load(Yii::$app->request->post()) && $form->validate())
            {
              $cookies->add(new Cookie(['name'=>'sitedata','value'=>$form->data]));
            }
           $vali=Yii::$app->request->cookies->getValue('sitedata');
         return $this->render('cook',['form'=>$form,'res'=>$val,'resi'=>$cookies, 'resid'=>$vali]);
    }
    
    public function actionIndex($chap=0)
    {
//        $req=Yii::$app->request->get();
        if($chap==0)
        {
            return $this->render('index');
        }
        else {
              return $this->render('index_'.$chap);
   
        }
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
    public function actionLanguages()
    {
        $lang= Languages::find()->orderBy('shortname');
        $pg=new Pagination(['defaultPageSize'=>8,'totalCount'=>$lang->count()]);
        $lang=$lang->offset($pg->offset)->limit($pg->limit)->all();
        Languages::SetNumbers($lang);
        return $this->render('langs', ['langs'=>$lang,'pg'=>$pg, 'name'=>'Languages']);
        
    }
   public function actionForm()
    {
        $form=new NewForm();
         if ($form->load(Yii::$app->request->post()) && $form->validate() ) {
            return $this->render('form', ['form'=>$form,'name'=>$form->name,'age'=>$form->age,'act'=>$form->active,'mail'=>$form->email]);           
         }
        return $this->render('form', ['form'=>$form]);
    }
}
