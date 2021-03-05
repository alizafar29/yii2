<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<?php
$ch = Yii::$app->cache->get('data');
if($ch != ""){
?>
<body>
    <table border="1px" cellpadding="5px" cellspacing="5px" style="text-align:center">
    <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Mobile_Number</th>
    <th>Email</th>
    <th>DOB</th>
    <th>Image</th>
    <th>Password</th>
    </tr>
<?php
// echo "<pre>";
// $c = count($ch);
    foreach($ch as $d){
        ?>
        <tr>
        <td><?= $d->id; ?></td>
        <td><?= $d->name; ?></td>
        <td><?= $d->Mobile_Number; ?></td>
        <td><?= $d->Email; ?></td>
        <td><?= $d->DOB; ?></td>
        <td><img src="<?= $d->img ?>" alt="" style="width:200px;height:100px"></td>
        <td><?= $d->password; ?></td>
        </tr>
        <?php
    }
    ?>
    <?= Html::a('Refresh', ['/cache/delete-cache'], ['class'=>'btn btn-primary']) ?>
    <?php
}else{
    ?>
    <h1>No Records Found</h1>
    <?php
}
// if (is_array($ch) || is_object($ch))
// {
//     foreach ($ch as $value)
//     {
//        echo $ch['name'];
//     }
// }

    ?>

    <tr>

    </tr>

    <?php

?>

    </table>
</body>
</html>