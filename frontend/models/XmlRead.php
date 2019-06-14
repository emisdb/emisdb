<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use frontend\models\AcademBases;
use frontend\models\AcademProduct;
//use frontend\models\AcademNumber;

class XmlRead extends Model
{
        public $filename;
//        private $parser;
        private $fp;
//        private $data;
        private $output;
        private $goc=false;
       private $gona=false;
       private $gonu=false;
        private $gosu=false;
        private $codearray;
       private $attr;
        private $name;
       private $code;
       private $number;
       private $sum;
       private $bid;
       private $count=0;
       private $numb;
         
    public function parse()	{

//         $this->parser = xml_parser_create('windows-1251');
//         $this->parser = xml_parser_create();
         $parser = xml_parser_create();


//        xml_set_object($this->parser, $this);
//        xml_set_element_handler($this->parser, "start", "stop");
//       xml_set_character_data_handler($this->parser, "content"); 
        xml_set_object($parser, $this);
        xml_set_element_handler($parser, "start", "stop");
       xml_set_character_data_handler($parser, "content"); 
        if (!($this->fp = fopen($this->filename, "r")))
                die("could not open XML input");


//    while ($this->data = fread($this->fp, 4096)) {
    while ($data = fread($this->fp, 4096)) {
//    if (!xml_parse($this->parser, $this->data, feof($this->fp))) {
    if (!xml_parse($parser, $data, feof($this->fp))) {
        die(sprintf("XML error: %s at line %d",
                    xml_error_string(xml_get_error_code($parser)),
                    xml_get_current_line_number($parser)));
//                   xml_error_string(xml_get_error_code($this->parser)),
//                    xml_get_current_line_number($this->parser)));
    }
}

        xml_parser_free($parser);
//        xml_parser_free($this->parser);
             return true;
 	}
        
     public function getCount()	{

//         $this->parser = xml_parser_create('windows-1251');
         $this->parser = xml_parser_create();


        xml_set_object($this->parser, $this);
        xml_set_element_handler($this->parser, "count_start", "count_stop");
       xml_set_character_data_handler($this->parser, "content"); 
        if (!($this->fp = fopen($this->filename, "r")))
                die("could not open XML input");


//    while ($this->data = fread($this->fp, 4096)) {
//    if (!xml_parse($this->parser, $this->data, feof($this->fp))) {
   while ($data = fread($this->fp, 4096)) {
    if (!xml_parse($this->parser, $data, feof($this->fp))) {
        die(sprintf("XML error: %s at line %d",
                    xml_error_string(xml_get_error_code($this->parser)),
                    xml_get_current_line_number($this->parser)));
        }
    }

        xml_parser_free($this->parser);
             return $this->count;
 }
    protected function count_start($parser, $name, $attrs) {
        
    }
    function count_stop($parser,$name) {

       if($name=="PRODUCT"){
           $this->count+=1;
      }

}
        

      public function getlist()	{
          return $this->output;
      }
     public function getattr()	{
          return $this->attr;
      }
   protected function start($parser, $name, $attrs) {
        if($name=="NAME") $this->gona=true;
       if($name=="CODE") $this->goc=true;
       if($name=="NUMBER") $this->gonu=true;
       if($name=="SUM") $this->gosu=true;
        if($name=="ACADEM")  {
            $this->attr=$attrs;
            $this->saveBase ($attrs);
        }
   }
  protected function stop($parser,$name) {
        if($name=="NAME") $this->gona=false;
       if($name=="CODE") $this->goc=false;
       if($name=="NUMBER") $this->gonu=false;
       if($name=="SUM") $this->gosu=false;
       if($name=="PRODUCT"){
           $this->output[]=['code'=>(string)$this->code,
                            'name'=>$this->name,
                            'number'=>preg_replace( '/[^.0-9]/', '', $this->number ),
                            'sum'=>preg_replace( '/[^.0-9]/', '', $this->sum )];
           $this->codearray[]=(string)$this->code;
          $this->code="";
           $this->name="";
           $this->number="";
           $this->sum="";
           if(count($this->output)==20) {
               $res=$this->saveProduct ();
//               if($res) $this->output=[];
//                unset($this->output);
                      $this->codearray=[];
                      $this->output=[];
           }
  
      }
             if($name=="ACADEM")  {
            $this->saveProduct ();
        }
}

protected function saveProduct(){
            $where="'".implode($this->codearray,"','")."'";
            if(strlen($where)>0){
                  $rows= Yii::$app->db->createCommand
                          ("SELECT  academ_product.id, academ_product.id_out "
                         . "FROM academ_product WHERE id_out IN (".$where.")")->queryAll();
     
                  $id_out=array_column($rows ,'id_out');
 /*                      
               if($this->codearray[0]=='003388'){
                   print_r($rows);
                   echo "<hr>";
                   print_r($id_out);
                   echo "<hr>";
                   print_r($this->output);
                   

               }

*/
            foreach ($this->output as $line){ 
      
               $id=0;
               $key = array_search($line['code'], $id_out, true);
 
               if($key===false){
                   
               
                  
//          Yii::$app->db->createCommand()->insert('academ_product', 
//                  [
//                      'id_out' => $line['code'],
//                      'name' => $line['name'],
//                       ])->execute();                  
                   
                 $prod= new AcademProduct();
                 $prod->id_out=$line['code'];
                 $prod->name=$line['name'];
                 $prod->save();
                 $id=$prod->id;
                 unset($prod);
               }
               else{
                   $id=$rows[$key]['id'];
               }
         Yii::$app->db->createCommand()->insert('academ_number', 
                  [
                      'product' => $id,
                      'base' => $this->bid,
                      'number' => (double)$line['number'],
                      'sum' => (double)$line['sum'],
                      ])->execute();
   /*   
              $this->numb=new AcademNumber();
              $this->numb->product=$id;
              $this->numb->base=$this->bid;
              $this->numb->number=(double)$line['number'];
              $this->numb->sum=(double)$line['sum'];
             $this->numb->save();
              unset($numb);
   */
               }
             
 
     }
 

    return true;
}
protected function saveBase($attr){
         $bid=$attr['TYPE'].".".$attr['CODE'];
         $bid=mb_substr($bid,0,16,'UTF-8');

        $base=AcademBases::findOne(['base_id'=>$bid]);

      if(empty($base)){
        $base= new AcademBases();
        $id=$base->find()->max('id');
         $base->id=$id+1;
         $base->name=mb_substr($attr['NAME'],0,50,'UTF-8');
         $base->base_id=$bid;
   
         $base->save();
//                     print_r($base);exit(); 	
                     	  }
     else{
            Yii::$app->db->createCommand("DELETE FROM academ_number WHERE base=".$base->id)->execute();
 
     }
              $this->bid=$base->id;

    }
//Function to use when finding character data
  protected function content($parser, $data){ 
      if($this->goc){
          $this->code.=$data;
      }
      if($this->gonu){
          $this->number.=$data;
      }
      if($this->gona){
          $this->name.=$data;
      }
     if($this->gosu){
          $this->sum.=$data;
      }

}
}
