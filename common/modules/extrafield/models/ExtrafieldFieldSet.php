<?php

namespace common\modules\extrafield\models;

use Yii;

class ExtrafieldFieldSet extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'extrafield_field_set';
    }


    public function rules()
    {
        return [
            [['set_id', 'field_id'], 'required'],
            [['set_id', 'field_id', 'is_requred'], 'integer'],
        ];
    }
}
