<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\FileForm;
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
use frontend\models\AcademProductSearch;
use frontend\models\XmlRead;
use yii\web\Response;


/**
 * Site controller
 */
class AcademController extends Controller
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
  
       public function actionIndex()
	{

             $modelff=new FileForm();
            if($modelff->load(Yii::$app->request->post()) && $modelff->validate())
                   {
//                        $modelff->attributes=$_POST['FileForm'];
                        $modelff->image = UploadedFile::getInstance($modelff, 'image');
                        $file=$modelff->upload();
                        if ($file) {
                            $xml=new XmlRead();
                            $xml->filename=$file;
                            $xml->parse();
                           $res=$xml->getlist();

                    }
                   }
            $dataProvider = new ActiveDataProvider([
               'query' => AcademBases::find(),
           ]);
                    return     $this->render('academ',
                                ['ff'=>$modelff,'dataProvider' => $dataProvider]
                        );                  
        }
        
               public function actionCount()
	{
            if (Yii::$app->request->isAjax) {
              Yii::$app->response->format = Response::FORMAT_JSON;


                 $res = array(
                     'body'    => date('Y-m-d H:i:s'),
                     'success' => true,
                 );

             } 
             else {
 
                 $res = array(
                     'body'    => 'shit',
                     'success' => false,
                 );
            }
                 echo json_encode($res);
               }

        public function actionReport()
    { 
            $model=AcademProduct::find()
                    ->alias('pa')
                    ->join('LEFT JOIN', 'academ_number AS ap',
            '`pa`.id=`ap`.product')
//           'academ_product.id_out=academ_product.id_out')
                    ->select('ap.base AS apbase, pa.id_out AS paid, pa.name AS paname, ap.number AS apnumber,')
                   ;	
                      $dataProvider = new ActiveDataProvider([
               'query' =>  $model,
           ]);

                    return     $this->render('restmp',
                                ['dp'=>$dataProvider, 'query'=>$model]
                        );
 
    }

       public function actionRelreport()
    { 
            $model=AcademProduct::find()
                    ->alias('pa')
                     ->joinWith(['products ap' ],true,'LEFT JOIN')
//                    ->onCondition(['pa.base'=>3])
//                    ->where('((pa.base=3 or pa.base IS NULL) and (ap.base=4 or ap.base IS NULL) )')
                    ->select('`ap`.*,`pa`.*')
                   ;	
                      $dataProvider = new ActiveDataProvider([
               'query' =>  $model,
//                'pagination' => [
//                     'pageSize' => 30,
//                         ],
           ]);

                    return     $this->render('restmp',
                                ['dp'=>$dataProvider, 'query'=>$model]
                        );
 
    }
        public function actionTest($clear=0){
        $searchModel = new AcademProductSearch();
        if($clear==0)  
            $value = $searchModel->report(Yii::$app->request->post());
         else 
           $value = $searchModel->report([]);
        return     $this->render('result',
                                ['val'=>$value,
                                    'model'=>$searchModel,
                                    'params'=>Yii::$app->request->post()
                               
                               ]
                        );
         
        }

    public function actionSql()
    { 
        $totalCount = Yii::$app->db
            ->createCommand('SELECT COUNT(*) FROM academ_product')
            ->queryScalar();
         $ress=$this->getSQL();   
        $dataProvider = new SqlDataProvider([
             'sql' => $ress['sql'],
             'params' => $ress['params'],
             'totalCount' => $totalCount,

             'pagination' => [
                 'pageSize' => 500,
    ],
]);
                    return     $this->render('restmp',
                                ['dp'=>$dataProvider, 'columns'=>$ress['columns']]
                        );
 
    }
      private function csv() {
          $encode = "\xEF\xBB\xBF";
        $data = $encode."Название товара,Код,Фирмы\r\n";
        $model = AcademProduct::find()->all();
        foreach ($model as $value) {
            $data .= $value->name.
                    ',' . $value->id_out .
                      "\r\n";
        }
        return $data;
    }
               private function getCSV($page,$ver){
          $totalCount = Yii::$app->db
            ->createCommand('SELECT COUNT(*) FROM academ_product')
            ->queryScalar();
         $ress=$this->getSQL();   
        $dataProvider = new SqlDataProvider([
             'sql' => $ress['sql'],
             'params' => $ress['params'],
             'totalCount' => $totalCount,

             'pagination' => [
                 'pageSize' => 500,  
                 ],]);
        if($ver=0)
                $delim=",";
        else 
            $delim=";";

       $dataProvider->pagination->page = $page; //Set page 
       $model = $dataProvider->refresh(); //Refresh models
       $model = $dataProvider->getModels(); //Models in page 
            $encode = "\xEF\xBB\xBF";
        $data = $encode."Название товара,Код,Фирмы\r\n";
//        print_r($ress['columns']);                exit();
        $fh = fopen('php://temp', 'rw');
        fputs($fh, $encode);
        $last_names = array_column($ress['columns'], 'header');
        $headers=["Номер","Код","Товар"];
        foreach ($last_names as $value) {
            $headers[]=$value;            
            $headers[]=" S ";            
        }
        fputcsv($fh, $headers,$delim);

            foreach ($model as $value) {
                   fputcsv($fh, $value,$delim);
       }
         rewind($fh);
        $csv = stream_get_contents($fh);
        fclose($fh);

        return $csv;
         
           }
 public function actionExport($page,$ver) {
    $csv = $this->getCSV($page-1,$ver); // this should return a csv string
    return \Yii::$app->response->sendContentAsFile($csv, 'sample.csv', [
           'mimeType' => 'application/csv', 
           'inline'   => false
    ]);
}  
    private function getSQL(){
                $bases=Yii::$app->db
            ->createCommand('SELECT academ_bases.id as id, academ_bases.name as name, COUNT(academ_number.base) AS bCount '
                    . 'FROM academ_bases INNER JOIN academ_number ON academ_bases.id=academ_number.base '
                    . 'GROUP BY academ_bases.id');
        $select="";$params=[];$join="";$columns=[];
        foreach ($bases->queryAll() as $base)
               {
                    if($base['bCount']>0){
						$bid=$base['id'];
                        $select.=", `nu".$bid."`.number as num".$bid.
								", `nu".$bid."`.sum as sum".$bid;
                        $join.=" LEFT JOIN `academ_number` `nu".$bid."`"
            . " ON `pa`.id=`nu".$bid."`.product and `nu".$bid."`.base=:bas_".$bid;
                       $params[':bas_'.$bid]=$bid; 
                       $columns[]=[ 'attribute' => 'num'.$bid,
                                    'header' => $base['name']  ,
        				'format' =>'raw',
//									'content' =>'function($model,$key){return "yop"}',
 									'value' =>function($model,$key) use ($bid)
						   {
						   $ret='<div class="container-fluid">  <div class="row">'
								   .'<div class="col-sm-6" style="background-color:lavender;text-align:right;">'.$model['num'.$bid].'</div>'
								   .'<div class="col-sm-6" style="background-color:lightgreen;text-align:right;">'.(($model['sum'.$bid]>0) ?  Yii::$app->formatter->asDecimal($model['sum'.$bid],2) : "").'</div>'
								   . '</div></div>';
						   
						   return $ret;}
                           ];
                    }
               
               }
        $sql= 'SELECT `pa`.id,`pa`.id_out AS paid,`pa`.name AS paname '.$select
             . ' FROM `academ_product` `pa` '.$join;
        return ['sql'=>$sql, 'columns'=>$columns, 'params'=>$params];

    }
}
