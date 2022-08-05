<?php
namespace frontend\models;

use Yii;
use yii\base\Model;


class NewForm extends Model
{
    public $name;
	public $start;
	public $finish;
   public $email;
    public $active;
	private $number = 0;
    
    public function rules() {
       return [
           [['name','start','finish'],'required'],
		   [['start'],'integer','min'=>0, 'max' => 999999],
		   [['finish'],'integer','min'=>0, 'max' => 999999],
		   ['start','compare','compareAttribute' => 'finish', 'operator' => '<', 'type' => 'number'],
		   ['finish','compare','compareAttribute' => 'start', 'operator' => '>', 'type' => 'number'],
           [['email'],'email'],
            [['active'],'boolean']
           ];
    }
        public function attributeLabels()
    {
        return [
            'name' => 'Shortname',
            'start' => 'N - From',
			'finish' => 'N - to',
			'email' => 'E-mail',
            'active' => 'Act',
        ];
    }

	public function getNumber() {

		return $this->number = $this->finish - $this->start;
}

}

