<?php
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;

    ?>

        <div class='container bgcolor'>
            <form method="POST">
                <label for='uname'><b>User</b></label><br>
                <input type='text' id='name' placeholder='Enter Username' name='uname' required><br><br>
                
                <label for='psw'><b>Password</b></label><br>
                <input type='password' id='password' placeholder='Enter Password' name='psw' required><br><br>
                        
                <?= Html::a('Refresh', ['/cache/curl-registration'], ['class'=>'btn btn-primary','name'=>"curl"]) ?>

            </form>
        </div>
    
