<?php

namespace frontend\widgets;
use yii\helpers\Html;
use yii\base\Widget;

class Mywidg extends Widget
{
    public $text;
    public function run() {
        
        return "<div style='width:120px; align:center;"
        . "  border: inset gray 8px;"
        . " margin: 5px; padding:3px;"
        . " font-size: 1.5em;'>".$this->text."</div>";
        
    }
}
?>