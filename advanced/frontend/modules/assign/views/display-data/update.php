<?php   
  
use yii\helpers\Html;
use frontend\widgets\Form;
use frontend\modules\assign\models\CustomSearch;
  
?>   
<div class="employees-update">   
  
    <h1><?= Html::encode($this->title) ?></h1>   
  
    <?= $this->render('custom-search', [   
        'model' => $model,   
    ]) 
    
    ?>  
</div> 