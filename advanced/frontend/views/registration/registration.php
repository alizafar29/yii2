<?php

    namespace frontend\registration;
    // echo "Welcome to Registration Page !";
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;
    use yii\jui\DatePicker;
    use frontend\widgets\Data;

    $this->title = 'Registration';
    $this->params['breadcrums'][] = $this->title;

?>

<div class="registration-registration">
<?php if(!isset($model->id)){
    echo "<h1>".Html::encode($this->title)."</h1>
    <p>Please Fill Out the following Fields for Registration : </p>";
    }?>

        <div class="row">
            <div class="col-lg-5">
                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

                    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                        <?= $form->field($model, 'Mobile_Number') ?>

                            <?= $form->field($model, 'Email') ?>

                            <?= $form->field($model,'DOB')->widget(DatePicker::className(),['dateFormat' => 'yyyy-MM-dd']) ?>

                            <?= $form->field($model, 'img')->fileInput() ?>
                            
                            <?php if(!isset($model->id)){
                            echo $form->field($model, 'password')->passwordInput();} ?>

                            <div class="form-group">
                                <?= Html::submitButton('Submit',['class' => 'btn btn-success', 'name' => 'registration-button']) ?>
                            </div>

                        <?php ActiveForm::end(); ?>

            </div>
        </div>
</div>
