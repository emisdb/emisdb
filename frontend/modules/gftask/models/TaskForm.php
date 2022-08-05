<?php
namespace app\modules\gftask\models;;

use Yii;
use yii\base\Model;


class TaskForm extends Model
{

	public $start;
	public $finish;

	private $range = array();
	private $numberBySums = array();

    public function rules() {
       return [
           [['start','finish'],'required'],
		   [['start'],'integer','min'=>0, 'max' => 999999],
		   [['finish'],'integer','min'=>0, 'max' => 999999],
		   ['start','compare','compareAttribute' => 'finish', 'operator' => '<', 'type' => 'number'],
		   ['finish','compare','compareAttribute' => 'start', 'operator' => '>', 'type' => 'number'],
           ];
    }
        public function attributeLabels()
    {
        return [
            'start' => 'N - From',
			'finish' => 'N - to',
        ];
    }

	public function getNumber() {
		$this->parseNumbers();
		/* count the number of sums for first 3 digits  */
		$this->numberBySums['first'] = $this->countNumbers($this->range['first']['from'], $this->range['first']['to']);
		/* count the number of sums for last 3 digits (from minimun number for the next thousand number)  */
		if($this->range['second']['from']>0) {
			if($this->range['first']['range']>0) $countto = 999;
			else $countto = $this->range['second']['to'];
			$this->numberBySums['second']['hundreds_first'] = $this->countNumbers($this->range['second']['from'], $countto);
			$this->range['first']['range']--;
		}
		/* count the number of sums for  last 3 digits from the lowest thousand number to the highest thousand number */
		$result0 = 0;
		if($this->range['first']['range']>0) {
			$this->numberBySums['second']['thousands'] = $this->countNumbers(0, 999);
		}
		/* count the number of sums for  last 3 digits from the highest thousand number to the highest number */
		if($this->range['first']['range']>=0) {
			if($this->range['second']['to']>0){
				$this->numberBySums['second']['hundreds_last'] = $this->countNumbers(0,$this->range['second']['to']);
			} else $result0 = 1;
		}
 		$this->sumUpLastPart($result0);
		/* sum up the number of the tickets calculating the total number*/
		$number = 0;
		foreach($this->numberBySums['first'] as $key =>$val) {
			if(isset($this->numberBySums['second']['result'][$key])) {
				$number += $this->numberBySums['second']['result'][$key] * $val;
			}
		}
		return  $number;
	}

	private function parseNumbers() {
		$this->range['first']['from'] = floor($this->start/1000);
		$this->range['first']['to'] = floor($this->finish/1000);
		$this->range['first']['range'] = $this->range['first']['to'] - $this->range['first']['from'];
		$this->range['second']['from'] = $this->start % 1000;
		$this->range['second']['to'] = $this->finish % 1000;
	}
	private function countNumbers($from,$to)
	{
		$arr = array();
		for ($i = $from; $i <= $to; $i++) {
			$a = floor($i / 100);
			$b = floor(($i - $a * 100) / 10);
			$c = $i % 10;
			$d = (int)($a + $b + $c);
			if ($d > 9) {
				$e = (int)floor($d / 10) + ($d % 10);
				if ($e == 10) $e = 1;
				if (empty($arr[$e])) $arr[$e] = 1;
				else               $arr[$e]++;
			} else {
				if (empty($arr[$d])) $arr[$d] = 1;
				else               $arr[$d]++;
			}
		}
		return $arr;
	}
	private function sumArrays($a1,$a2) {
		$sums = array();
		foreach (array_keys($a1 + $a2) as $key) {
			$sums[$key] = (isset($a1[$key]) ? $a1[$key] : 0) + (isset($a2[$key]) ? $a2[$key] : 0);
		}
		return $sums;
	}
/*
 * sum Up all parts of sums for the last part of the number
 */
	private function sumUpLastPart($result0){
		if(isset($this->numberBySums['second']['hundreds_first'])) $this->numberBySums['second']['result'] = $this->numberBySums['second']['hundreds_first'];
		if(isset($this->numberBySums['second']['result'])){
			if(isset($this->numberBySums['second']['thousands'])) $this->numberBySums['second']['result'] = $this->sumArrays($this->numberBySums['second']['result'], $this->numberBySums['second']['thousands']);

		} else {
			$this->numberBySums['second']['result'] = isset($this->numberBySums['second']['thousands'])?$this->numberBySums['second']['thousands']:null;
		}
		if(isset($this->numberBySums['second']['result'])){
			if(isset($this->numberBySums['second']['hundreds_last'])) $this->numberBySums['second']['result'] = $this->sumArrays($this->numberBySums['second']['result'], $this->numberBySums['second']['hundreds_last']);
		} else $this->numberBySums['second']['result'] = $this->numberBySums['second']['hundreds_last'];
		if(isset($this->numberBySums['second']['result'][0])) $this->numberBySums['second']['result'][0] += $result0;
		else $this->numberBySums['second']['result'][0] = $result0;
	}

}

