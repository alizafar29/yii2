<?php
namespace frontend\controllers;


use Yii;

use yii\web\Controller;

class ProductSearchController extends Controller
{
    /**
     * {@inheritdoc}
     */



    /**
     * Displays homepage.
     *
     * @return mixed
     */

    public function actionFindProduct()
    {
       
        return $this->render('find-product');
    }

    
}
