<?php

use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use frontend\models\Registered;
use frontend\web\image;
use frontend\models\RegisteredSearch;
use frontend\component\events;

// $dataProvider = new ActiveDataProvider([

    // Yii::$app->on(events::EVENT_SUCCESS,['frontend\component\events','wish']);
    // Yii::$app->trigger(events::EVENT_SUCCESS);
    // Yii::$app->off(events::EVENT_SUCCESS);

//     'query' => registered::find(),
//     'pagination' => [
//         'pageSize' => 20,
//     ],
//     // 'sort' => [
//     //     'defaultOrder' => [
//     //         'id' => 'SORT_ASC',
//     //     ]
//     // ]
// ]);

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
            'id',
            [
            'attribute' => 'name',
            'value' => 'name'
            ],
            [
            'attribute' => 'Mobile_Number',
            'value' => 'Mobile_Number'
            ],
            [
            'attribute' => 'Email',
            'value' => 'Email'
            ],
            [
            'attribute' => 'DOB',
            'value' => 'DOB'
            ],
        array(
            'format' => ['image',['width'=>'200','height'=>'100']],
           'attribute'=>'img',

),
        'password',

        ['class' => 'yii\grid\ActionColumn',
        'template' => '{update}  {delete}',
        ],

    ],
]);
// print_r($searchModel);
?>
