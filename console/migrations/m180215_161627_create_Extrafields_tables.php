<?php

use yii\db\Migration;

/**
 * Class m180215_161627_create_Extrafields_tables
 */
class m180215_161627_create_Extrafields_tables extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('extrafield_field', [
            'id'    => $this->primaryKey(),
            'name'  => $this->string()->notNull(),
            'slug'  => $this->string()->defaultValue(null),
            'type'  => $this->number(11),            
        ]);

        $this->createTable('extrafield_field_set', [
            'id'        => $this->primaryKey(),
            'set_id'    => $this->number(11)->notNull(),
            'field_id'  => $this->number(11)->notNull(),
            'is_requred' => $this->number(3)->notNull(),            
        ]);

        $this->createTable('extrafield_input', [
            'id'            => $this->primaryKey(),
            'object_type'   => $this->string(255)->defaultValue(null),
            'value'         => $this->string(255)->defaultValue(null),
            'object_id'     => $this->number(11)->notNull(),  
            'field_id'      => $this->number(11)->notNull(),
        ]);

        $this->createTable('extrafield_input_list', [
            'id'        => $this->primaryKey(),
            'field_id'  => $this->number(11)->defaultValue(null),
            'value'     => $this->number(11)->defaultValue(null),
            'object_id' => $this->number(11)->defaultValue(null),
            'object_type' => $this->string(255)->defaultValue(null),
        ]);

        $this->createTable('extrafield_input_list_defined', [
            'id'        => $this->primaryKey(),
            'field_id'  => $this->number(11)->defaultValue(null),
            'value'     => $this->string(255)->defaultValue(null),
        ]);

        $this->createTable('extrafield_int', [
            'id'        => $this->primaryKey(),
            'field_id'  => $this->number(11)->defaultValue(null),
            'value'     => $this->number(11)->defaultValue(null),
            'object_id' => $this->number(11)->defaultValue(null),
            'object_type' => $this->string(255)->defaultValue(null),
        ]);

        $this->createTable('extrafield_set', [
            'id'    => $this->primaryKey(),
            'name'  => $this->string(255)->defaultValue(null),
            'object' => $this->string(255)->defaultValue(null),
        ]);

        $this->createTable('extrafield_text', [
            'id'        => $this->primaryKey(),
            'field_id'  => $this->number(11)->defaultValue(null),
            'object_id' => $this->number(11)->defaultValue(null),
            'value'     => $this->text(),
            'object_type' => $this->string(255)->defaultValue(null),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180215_161627_create_Extrafields_tables cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180215_161627_create_Extrafields_tables cannot be reverted.\n";

        return false;
    }
    */
}
