<?php

namespace frontend\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\AcademProduct;

/**
 * AcademProductSearch represents the model behind the search form of `frontend\models\AcademProduct`.
 */
class AcademProductSearch extends AcademProduct
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['id_out', 'name'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function report($params)
    {
        $strwhere="";
        $name="";
        if(isset($params)) {
  
       if(is_array($params)){
            $this->load($params);
           if(strlen($this->name)>0){
               $name=$this->name;
         }
               }
             else{
             if(strlen($params)>0)     $name=$params;
        } }   
         $session = Yii::$app->session;
          if (!$session->isActive)                    $session->open();
         if($name=="")                    $session->remove('report-name');    
         else{
                 $strwhere=" WHERE `pa`.name like \"%".$name."%\"";
                $session->set('report-name', $name);
         }
         
     $totalCount = Yii::$app->db
            ->createCommand('SELECT COUNT(*) FROM `academ_product` `pa` '.$strwhere)
            ->queryScalar();
        
         $ress=$this->getSQL(); 
         $ress['sql'].=$strwhere;
         $ress['total']=$totalCount;
         return $ress;

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
//                                  'content' =>'function($model,$key){return "yop"}',
                                    'value' =>function($model,$key) use ($bid)
				{
				   $ret='<div class="container-fluid">  <div class="row">'
                                       .'<div class="col-sm-6" style="background-color:lavender;text-align:right;">'.$model['num'.$bid].'</div>'
                                       .'<div class="col-sm-6" style="background-color:lightgreen;text-align:right;">'.(($model['sum'.$bid]>0) ?  Yii::$app->formatter->asDecimal($model['sum'.$bid],2) : "").'</div>'
                                       . '</div></div>';
                                        return $ret;
                                }
                           ];
                    }
               
               }
        $sql= 'SELECT `pa`.id,`pa`.id_out AS paid,`pa`.name AS paname '.$select
             . ' FROM `academ_product` `pa` '.$join;
        return ['sql'=>$sql, 'columns'=>$columns, 'params'=>$params];

    }

   public function search($params)
    {
        $query = AcademProduct::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'id_out', $this->id_out])
            ->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
