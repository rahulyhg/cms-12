<?php

namespace common\modules\extrafield\models\fields;

use Yii;
use yii\base\View;
use common\modules\extrafield\models\fields\FieldInterface;
use common\modules\extrafield\models\active_record\InputListAR;
use common\modules\extrafield\models\active_record\InputListDefinedAR;



class InputList extends InputListAR implements FieldInterface
{

    public static function type()
    {
        return FieldInterface::TYPE_LIST_INPUT_CHECKBOX;
    }

    public static function getViewPath()
    {
        return FieldInterface::VIEW_PATH . "/input_checkbox.php";
    }

    public function setFieldId($id)
    {
        $this->field_id = $id;
    }

    public function showField($objectType, $objectId = null)
    {
        $models = $this->getModel($objectType, $objectId);
        $view = new View();
        return $view->renderFile(self::getViewPath(), compact('models'));
    }

    public function saveField($objectType, $objectId, $post)
    {
        $values = $this->getPostValue($post);
        if ($values) {
            foreach ($values as $value) {
                $this->id = null;
                $this->isNewRecord = true;
                $this->value = $value;
                $this->object_type = $objectType;
                $this->object_id = $objectId;
                $this->save();
            }
        }
    }

    public function updateField($objectType, $objectId, $post)
    {   
        $this->removeOldValues($objectType, $objectId);
        $this->saveField($objectType, $objectId, $post);
    }

    public function removeOldValues($objectType, $objectId)
    {
        InputListAR::deleteAll(['object_type'=>$objectType, 'object_id'=>$objectId, 'field_id'=>$this->field_id]);
    }

    // Берем значения с поста
    public function getPostValue($post, $fieldId = null)
    {
        $label = $fieldId != null ? 'extrafield_'.$fieldId : 'extrafield_'.$this->field_id;
        return isset($post[$label]) ? $post[$label] : null;
    }

    private function getModel($objectType, $objectId = null)
    {
        $object = $objectId != null ? $objectId : "NULL";

        $query = new \yii\db\Query;
        $x = $query->select(['d.id as value_id', 'd.field_id', 'd.value as item_name', 'l.value as in_use'])
                    ->from(InputListDefinedAR::tableName().' d')
                    ->leftJoin(InputListAR::tableName().' l', "d.id = l.value AND l.object_id = ".$object." AND l.object_type='".$objectType."'")
                    ->orderBy(['d.id'=>SORT_ASC])
                    ->all();
        return $x;
        // echo "<pre>";print_r($x);die();
    }

    public function getRawValues($objectType, $objectId)
    {
        return true;
        $result = null;

        $model = $this->getModel($objectType, $objectId);
        echo "<pre>";print_r($model);die();
        if ($model->isNewRecord) {
            return $result;
        }

        $result['values'] = $model->getValues();
        $result['type'] = $model->type();
        $result['name'] = $model->fieldInfo->name;
        // $result['attributes'] = $model->getAttributes();
        return $result;
    }


    public function getValues()
    {
        return $this->value;
    }
}
