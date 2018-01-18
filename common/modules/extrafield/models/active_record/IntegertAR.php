<?php

namespace common\modules\extrafield\models\active_record;

use Yii;
use common\modules\extrafield\models\active_record\ExtrafieldActiveRecordInteface;


class IntegerAR extends \yii\db\ActiveRecord implements ExtrafieldActiveRecordInteface
{

    public static function tableName()
    {
        return 'extrafield_int';
    }

    public function rules()
    {
        return [
            [['field_id', 'object_id', 'object_type'], 'required'],
            [['field_id', 'value', 'object_id'], 'integer'],
            [['object_type'], 'string', 'max' => 255],
        ];
    }   
    
    public function getFieldType()
    {
        return $this->hasOne(ExtrafieldField::className(), ['id'=>$this->field_id]);
    }

}
