<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product`.
 * Has foreign keys to the tables:
 *
 * - `category`
 */
class m191104_145907_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'description' => $this->text(),
            'image' => $this->text(),
            'created_at' => $this->dateTime(),
            'category' => $this->integer()->notNull(),
        ]);

        // creates index for column `category`
        $this->createIndex(
            'idx-product-category',
            'product',
            'category'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-product-category',
            'product',
            'category',
            'category',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `category`
        $this->dropForeignKey(
            'fk-product-category',
            'product'
        );

        // drops index for column `category`
        $this->dropIndex(
            'idx-product-category',
            'product'
        );

        $this->dropTable('product');
    }
}
