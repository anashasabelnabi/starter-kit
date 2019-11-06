<?php

use backend\models\Category;
use trntv\yii\datetime\DateTimeWidget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'title',
            'description',
            [
                'attribute'=>'image_path',
                'value' => function ($model) {
                    return Html::a(Html::img('http://storage.yii2-starter-kit.localhost/source' .$model->image_path,['width' => '120','height'=>'120']), 'http://storage.yii2-starter-kit.localhost/source' .$model->image_path, ['class' => 'update-modal-link']);
                },
                'format'=>'raw',
            ],
            [
                'attribute'=>'created_at',

                'value'=>function($model){
                    return Yii::$app->formatter->asDatetime('now', "php:d-m-Y H:i:s");
                },
            ],
            [
                'attribute' => 'category',
                'value'=>function($model){
                    return $model->category0->title;
                }
            ],
        ],
    ]); ?>


</div>
