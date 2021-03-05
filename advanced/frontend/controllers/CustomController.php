<?php
namespace frontend\controllers;


use Yii;

use yii\web\Controller;

class CustomController extends Controller
{
    /**
     * {@inheritdoc}
     */



    /**
     * Displays homepage.
     *
     * @return mixed
     */

    public function actionQuestionAnswer()
    {
       
        return $this->render('question-answer');
    }

    
}
