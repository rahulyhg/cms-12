<?php

namespace common\modules\extrafield\models\active_record;

use Yii;
use common\modules\extrafield\models\ExtrafieldField as Field;


class InputAR extends \yii\db\ActiveRecord
{
    
    public static function tableName()
    {
        return 'extrafield_input';
    }

    public function rules()
    {
        return [
            [['field_id', 'object_id', 'object_type'], 'required'],
            [['field_id', 'object_id'], 'integer'],
            [['value', 'object_type'], 'string', 'max' => 255],
        ];
    }

    public function getFieldInfo()
    {
        return $this->hasOne(Field::className(), ['id'=>'field_id']);
    }

    public function getValue()
    {
        return $this->value;
    }
}
