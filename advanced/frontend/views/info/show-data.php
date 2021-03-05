<?php

use frontend\widgets\Data;

use frontend\assets\CustomAsset;


CustomAsset::register($this);
?>
<?= Data::widget([]); ?>
