<?php

namespace common\modules\extrafield\models;

use Yii;
use common\modules\extrafield\models\ExtrafieldFieldSet as FieldSet;
use common\modules\extrafield\models\ExtrafieldField as Field;


class ExtrafieldSet extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'extrafield_set';
    }


    public function rules()
    {
        return [
            [['name', 'object'], 'required'],
            [['name', 'object'], 'string', 'max' => 255],
        ];
    }


    public static function getFieldsId($setId)
    {
        $result = [];
        $fields = FieldSet::findAll(['set_id'=>$setId]);
        if (!empty($fields)) {
            foreach ($fields as $field) {
                $result[] = $field->field_id;
            }
        }


        $result2 = [];

        if (!empty($result)) {
            foreach ($result as $fieldId) {
                $field = Field::findOne($fieldId);
                $result2[] = [
                    'id'=>$fieldId,
                    'type'=>$field->type,
                ];
            }
        }
        return $result2;
    }
}
