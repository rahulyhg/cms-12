<?php

namespace common\modules\extrafield\models;

use Yii;
use common\modules\extrafield\models\ExtrafieldFieldSet as FieldSet;
use common\modules\extrafield\models\ExtrafieldField as Field;

/**
 * This is the model class for table "extrafield_set".
 *
 * @property int $id
 * @property string $name
 * @property string $object
 */
class ExtrafieldSet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'extrafield_set';
    }

    /**
     * @inheritdoc
     */
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
