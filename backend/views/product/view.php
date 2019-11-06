<?php

use backend\models\Category;
use trntv\yii\datetime\DateTimeWidget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\JsExpression;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\product */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <p>
        <?php echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'description:text',
            [
                'attribute' => 'image_path',
                'value'=>Html::a(Html::img('http://storage.yii2-starter-kit.localhost/source' .$model->image_path,['width' => '120','height'=>'120']), 'http://storage.yii2-starter-kit.localhost/source' .$model->image_path, ['class' => 'update-modal-link']),
                'format' => 'raw'
            ],
            'image_base_url:url',
            [
                'attribute' => 'created_at',
                'options' => ['style' => 'width: 10%'],
                'format' => 'datetime',
                'filter' => DateTimeWidget::widget([
                    'model' => $model,
                    'attribute' => 'created_at',
                    'phpDatetimeFormat' => 'dd.MM.yyyy',
                    'momentDatetimeFormat' => 'DD.MM.YYYY',
                    'clientEvents' => [
                        'dp.change' => new JsExpression('(e) => $(e.target).find("input").trigger("change.yiiGridView")'),
                    ],
                ]),
            ],
            //'updated_at',
            [
                'attribute' => 'created_by',
                'options' => ['style' => 'width: 10%'],
                'value' => function ($model) {
                    return $model->author->username;
                },
            ],
            //'updated_by',
            [
                'attribute' => 'category',
                'filter'    =>ArrayHelper::map(Category::find()->asArray()->all(), 'id', 'title'),
                'value'=>function($model){
                    return $model->category0->title;
                }
            ],
        ],
    ]) ?>

</div>
