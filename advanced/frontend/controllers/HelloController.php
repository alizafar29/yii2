<?php
namespace frontend\controllers;


use Yii;

use yii\web\Controller;

class HelloController extends Controller
{
    /**
     * {@inheritdoc}
     */



    /**
     * Displays homepage.
     *
     * @return mixed
     */

    public function actionSayHello()
    {
       
        return $this->render('say-hello');
    }

    
}
