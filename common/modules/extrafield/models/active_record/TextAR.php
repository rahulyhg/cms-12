<?php

namespace common\modules\extrafield\models\active_record;

use Yii;
use common\modules\extrafield\models\active_record\ExtrafieldActiveRecordInteface;


class TextAR extends \yii\db\ActiveRecord implements ExtrafieldActiveRecordInteface
{
    
    public static function tableName()
    {
        return 'extrafield_text';
    }

    public function rules()
    {
        return [
            [['field_id', 'object_id', 'object_type'], 'required'],
            [['field_id', 'object_id'], 'integer'],
            [['value'], 'string'],
            [['object_type'], 'string', 'max' => 255],
        ];
    }


    public function getFieldInfo()
    {
        return $this->hasOne(Field::className(), ['id'=>'field_id']);
    }
}
