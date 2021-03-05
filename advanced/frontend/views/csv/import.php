<?php

namespace frontend\import;
// echo "Welcome to Registration Page !";
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\widgets\Data;
use yii\widgets\Pjax;
use yii\helpers\Url;
use frontend\models\FakeData;

?>

<div class="form">
<?php $model = new FakeData(); ?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

	<fieldset>
		<legend>
			<p class="note">Fields with <span class="required">*</span> are required.</p>
		</legend>
		

		<div class="control-group">		
			<div class="span4">
                <div class="control-group">
				<?= $form->field($model, 'file')->fileInput() ?>
                </div>
            </div>
	    </div>

		<div class="form-actions">
		<?= Html::submitButton('Import', ['class' => 'btn btn-success', 'name' => 'registration-button']) ?>

		<?= Html::a('Export', ['/csv/export'], ['class'=>'btn btn-danger','name'=>"export-button"]) ?>
		</div>
	
	</fieldset>

	<?php ActiveForm::end(); ?>

</div>