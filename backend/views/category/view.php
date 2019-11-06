<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\category */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-view">

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
                'attribute' => 'main_image_path',
                'value'=>Html::a(Html::img('http://storage.yii2-starter-kit.localhost/source' .$model->main_image_path,['width' => '120','height'=>'120']), 'http://storage.yii2-starter-kit.localhost/source' .$model->main_image_path, ['class' => 'update-modal-link']),
                'format' => 'raw'
            ],
            'main_image_base_url'
        ],
    ]) ?>

</div>
