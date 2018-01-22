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
            [['name'], 'required'],
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

    public static function getSets()
    {
        return self::find()->with(['fields'])->all();
    }

    public function getFields()
    {
        return $this->hasMany(Field::className(), ['id'=>'field_id'])->viaTable(FieldSet::tableName(), ['set_id'=>'id']);
    }

    public static function getIncludedFields($setId)
    {
        $result = [];
        $fields = FieldSet::findAll(['set_id'=>$setId]);
        if ($fields) {
            foreach ($fields as $field) {
                $result[] = $field->field_id;
            }
        }

        return $result;
    }

    // Подвязать событие на удаление поляю (удалять занчения товаров)
    public function updateIncludedFields($fieldIdsArray)
    {
        FieldSet::deleteAll(['set_id'=>$this->id]);
        if (!empty($fieldIdsArray)) {
            $set = new FieldSet();
            foreach ($fieldIdsArray as $fieldId) {
                $set->isNewREcord = true;
                $set->id = null;
                $set->set_id = $this->id;
                $set->field_id = $fieldId;
                $set->save();
            }
        }
        return true;
    }
}
