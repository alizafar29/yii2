<?php
namespace frontend\controllers;

    use Yii;
    use yii\web\Controller;
    use frontend\models\Registered;
    use yii\web\UploadedFile;
    use frontend\models\RegisteredSearch;

    class CustomLoginController extends Controller{


        public function actionLoginForm(){
            return $this->render('login-form');
        }
    }

?>