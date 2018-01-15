<?php

namespace common\modules\extrafield\models;

use Yii;

/**
 * This is the model class for table "extrafield_field_set".
 *
 * @property int $id
 * @property int $set_id
 * @property int $field_id
 * @property int $is_requred
 */
class ExtrafieldFieldSet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'extrafield_field_set';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['set_id', 'field_id'], 'required'],
            [['set_id', 'field_id', 'is_requred'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'set_id' => 'Set ID',
            'field_id' => 'Field ID',
            'is_requred' => 'Is Requred',
        ];
    }
}
