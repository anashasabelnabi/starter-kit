<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'title',
                'value' => function ($model) {
                    return Html::a($model->title ,['/site/show-product?id='.$model->id]);
                },
                'format'=>'raw',


            ],

            'description',
            [
                'attribute'=>'image_path',
                'value' => function ($model) {
                    return Html::a(Html::img('http://storage.yii2-starter-kit.localhost/source' .$model->image_path,['width' => '120','height'=>'120']), 'http://storage.yii2-starter-kit.localhost/source' .$model->image_path, ['class' => 'update-modal-link']);
                },
                'format'=>'raw',


            ],


        ],
    ]); ?>


</div>
