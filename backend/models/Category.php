<?php

namespace backend\models;

use common\models\ArticleAttachment;
use trntv\filekit\behaviors\UploadBehavior;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $main_image
 * @property array $images
 *
 *
 */
class Category extends \yii\db\ActiveRecord
{

public $main_image;
public $images;
    /**
     * {@inheritdoc}
     */


    public static function tableName()
    {
        return 'category';
    }
    public function behaviors()
    {
        return [
            [
                'class' => UploadBehavior::class,
                'attribute' => 'images',
                'multiple' => true,
                'uploadRelation' => 'articleAttachments',
                'pathAttribute' => 'path',
                'baseUrlAttribute' => 'base_url',
                'orderAttribute' => 'order',
                'typeAttribute' => 'type',
                'sizeAttribute' => 'size',
                'nameAttribute' => 'name',
            ],
            [
                'class' => UploadBehavior::class,
                'attribute' => 'main_image',
                'pathAttribute' => 'main_image_path',
                'baseUrlAttribute' => 'main_image_base_url',
            ],
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['images'], 'required'],
            [['title','main_image_path', 'main_image_base_url'], 'string', 'max' => 255],
            [['main_image','images'], 'safe'],


        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'main_image' => 'Main_Image',
            'images'=>'Images',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['category' => 'id']);
    }
    public function getArticleAttachments()
    {
        return $this->hasMany(ArticleAttachment::class, ['article_id' => 'id']);
    }
}
