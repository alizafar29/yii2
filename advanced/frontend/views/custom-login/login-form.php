<?php

use frontend\widgets\login;

$this->registerCssFile("@web/css/customCss.css");
$this->registerJsFile("@web/js/CustomJs.js", ['position' => $this::POS_HEAD]);
// $this->registerJsFile("@web/js/CustomJs.js", ['position' => $this::POS_GEGIN]);
// $this->registerJsFile("@web/js/CustomJs.js", ['position' => $this::POS_END]);
?>

<?= login::widget(['name'=>'User Name','password'=>'User Password']); ?>


<?php

Yii::setAlias('web1', 'localhost/yii2/advanceed/frontend/controller');

echo Yii::getAlias('@webroot');
echo "<br>";
echo Yii::getAlias('@web');
echo "<br>";
echo Yii::getAlias('@web1');


?>