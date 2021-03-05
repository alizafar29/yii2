<?php

namespace frontend\widgets;

use yii;
use yii\base\Widget;
use frontend\models\Registered;

class Data extends Widget{

    public function init(){

        parent::init();

        echo "This is a Custom Widget !<br>";
    }

    public function run(){

        return Yii::$app->view->render('@app/views/registration/confirmation');

    }
}

?>