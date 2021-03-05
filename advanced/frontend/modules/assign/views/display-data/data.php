<?php 

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use frontend\modules\assign\models\CustomSearch;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\bootstrap\Modal;
// use yii\web\JqueryAsset;

// JqueryAsset::register($this);
// $this->registerJsFile("@web/js/CustomJs.js");
$ch = Yii::$app->cache->get('data');


    ?>
     <?php Pjax::begin(['id'=>'type_id']); //id is used for jquery opertaion  ?>
     <?=Html::beginForm(['display-data/export'],'post');?>
    <?=Html::submitButton('Export', ['class' => 'btn btn-info','name' => 'submit', 'value'=>'all']);?>
    <?= Html::a('Refresh', ['display-data/refresh'], ['class'=>'btn btn-danger','name'=>"refresh-button"]) ?>
    <?= Html::a("Count : $ch" , [''], ['class'=>'btn btn-info','name'=>"refresh-button",]) ?>
    <?php echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\CheckboxColumn',
                'contentOptions' => ['class' => 'checkBox']             
                ],
                [
                'attribute' => 'id',
                'value' => 'id',
                'contentOptions' => ['class' => 'text-center']
                ],
                [
                'attribute' => 'product_id',
                'value' => 'product_id',
                'contentOptions' => ['class' => 'text-center']
                ],
                [
                    'attribute' => 'title',
                    'value' => 'products.title'
                ],
                [
                'attribute' => 'variant_id',
                'value' => 'variant_id',
                'contentOptions' => ['class' => 'text-center']
                ],
                [
                    'attribute' => 'price',
                    'label' => 'Price(range)',
                    'filter' => $this->render('filter', ['model' => $searchModel]),
                    'value' => function($model)
                    {
                    $max = CustomSearch::find()->where(['product_id'=>$model->product_id])->max('price');
                    $min = CustomSearch::find()->where(['product_id'=>$model->product_id])->min('price');
                    return $max . " - " .$min ;
                    },
                ],
                [
                'attribute' => 'inventory',
                'value' => 'inventory',
                'contentOptions' => ['class' => 'text-center']
                ],
                ['class' => 'yii\grid\ActionColumn',
                'template' => '{update}  {delete}',
                'header' => 'Action',
                'buttons' => [
                    

                'delete' => function ($url, $model) {
                    return Html::a('', $url, [
                        'class'       => 'btn btn-danger btn-xs glyphicon glyphicon-trash popup-modal',
                        'data-toggle' => 'modal',
                        'data-target' => '#modal',
                        'data-id'     => $model->id,
                        'id'          => 'popupModal',
                      
                    ]);
                },
                    ],
                'urlCreator'  => function ($action, $model, $key, $index) {
                                            if ($action == 'delete') {
                                                $url = Url::to(['display-data/delete', 'id' => $model->id]);

                                            }else {
                                                $url = Url::to(['display-data/update', 'id' => $model->id]);
                                            }
                                            return $url;
                                    },
                
                    ],
                ],
    
                ]);
                ?>
                <?php
                
                $this->registerJs(
                    "var modal,id;
                    $(function() {
                        $('.popup-modal').click(function(e) {
                            e.preventDefault();
                            modal = $('#modal-delete').modal('show');
                            id = $(this).data('id');
                            modal.find('.modal-title').text('Delete');

                            $('#delete-confirm').click(function(e) {
                                e.preventDefault();
                                $('#confirm-delete').attr('disabled','disabled');
                                modal = $('#modal-confirm').modal('show');
                                modal.find('.modal-title').text('Enter  \"' + id + '\" to Confirm');

                                
                                $('#confirm-delete').click(function(e) {
                                    e.preventDefault();
                                    var value = $('#con_id').val();
                                    if(value == id){
                                        window.location = 'delete?id='+id;

                                    }else{
                                        alert('Wrong Input Please Try Again');
                                    }
                                });
                            });
                        });
                    });"
                );
                ?>

                <?php
                $this->registerJs(
                    
                    'var checkBoxArr = [],name;
                    $("document").ready(function() {
                        $("input[type=checkbox]").click(function(e) {
                            name =  $(this).val();

                            console.log(checkBoxArr);

                            if(checkBoxArr.indexOf(name) != -1)
                            {
                                checkBoxArr.splice(checkBoxArr.indexOf(name),1);
                                $(this).prop("checked", false);
                            }
                            else{
                            checkBoxArr.push(name);
                            $(this).prop("checked", true);
                            console.log(checkBoxArr);
                            }       
                        });

                        $("li a").click(function() {
                            // console.log(checkBoxArr);
                            // $("input[type=checkbox]").val
                        });
                    });  
                    '
                );
                
                Pjax::end(); ?>

                <?php $url = Url::to(['display-data/data']); ?>

                <?php Modal::begin([
                    'header' => '<h2 class="modal-title"></h2>',
                    'id'     => 'modal-delete',
                    'footer' => Html::a('Delete', $url, ['class' => 'btn btn-danger','id' => 'delete-confirm']),
                ]); ?>

                <?= 'Are you sure you want to delete this Records'; ?>
                <?php Modal::end(); ?>

                <?php Modal::begin([
                    'header' => '<h2 class="modal-title"></h2>',
                    'id'     => 'modal-confirm',
                    'footer' => Html::a('Confirm', $url, ['class' => 'btn btn-danger','id' => 'confirm-delete']),
                ]);
                ?>

                <?= "<input type='text' placeholder='Enter the Text' id='con_id'>" ?>


                <?php Modal::end(); ?>