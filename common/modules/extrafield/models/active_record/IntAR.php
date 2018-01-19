<?php

namespace common\modules\extrafield\models\active_record;

use Yii;
use common\modules\extrafield\models\active_record\ExtrafieldActiveRecordInteface;
use common\modules\extrafield\models\ExtrafieldField as Field;


// class TextAR extends \yii\db\ActiveRecord implements ExtrafieldActiveRecordInteface
class IntAR extends \yii\db\ActiveRecord
{
    
    public static function tableName()
    {
        return 'extrafield_int';
    }

    public function rules()
    {
        return [
            [['field_id', 'object_id', 'object_type'], 'required'],
            [['field_id', 'object_id', 'value'], 'integer'],
            [['object_type'], 'string', 'max' => 255],
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