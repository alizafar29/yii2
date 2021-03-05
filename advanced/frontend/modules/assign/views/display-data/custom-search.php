<?php

    namespace frontend\modules\assign\views\insert;

    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;
    use yii\jui\DatePicker;
    use frontend\widgets\Data;

    $this->title = 'Insert_Data';

?>

<div class="variants-variants">
<?php if(!isset($model->id)){
    echo "<h1>".Html::encode($this->title)."</h1>";
    }?>

        <div class="row">
            <div class="col-lg-5">
                <?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($model, 'product_id')->textInput(['autofocus' => true]) ?>

                            <?= $form->field($model, 'variant_id') ?>

                            <?= $form->field($model, 'price') ?>
                            
                            <?= $form->field($model, 'inventory')?>

                            <div class="form-group">
                                <?= Html::submitButton('Submit',['class' => 'btn btn-success', 'name' => 'registration-button']) ?>
                            </div>

                        <?php ActiveForm::end(); ?>

            </div>
        </div>
</div>
