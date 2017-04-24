<?php
namespace frontend\models;

use Yii;
use yii\base\Model;


class NewForm extends Model
{
    public $name;
    public $age;
   public $email;
    public $active;
    
    public function rules() {
       return [
           [['name'],'required'],
           [['age'],'integer'],
           [['email'],'email'],
            [['active'],'boolean']
           ];
    }
        public function attributeLabels()
    {
        return [
            'name' => 'Shortname',
            'age' => 'Age',
            'email' => 'E-mail',
            'active' => 'Act',
        ];
    }

}

