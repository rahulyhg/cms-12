<?php

namespace common\modules\extrafield\models\active_record;

use Yii;


class InputListDefinedAR extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'extrafield_input_list_defined';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['field_id', 'value'], 'required'],
            [['field_id'], 'integer'],
            [['value'], 'string', 'max' => 255],
        ];
    }
}
