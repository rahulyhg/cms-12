<?php

namespace common\modules\extrafield\models\active_record;

use Yii;

class InputListAR extends \yii\db\ActiveRecord
{
    
    public static function tableName()
    {
        return 'extrafield_input_list';
    }

    public function rules()
    {
        return [
            [['field_id', 'object_id', 'object_type'], 'required'],
            [['field_id', 'object_id', 'value'], 'integer'],
            [['object_type'], 'string', 'max' => 255],
        ];
    }
}
