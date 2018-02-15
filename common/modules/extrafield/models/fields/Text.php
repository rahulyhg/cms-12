<?php

namespace common\modules\extrafield\models\fields;

use Yii;
use yii\base\View;
use common\modules\extrafield\models\fields\FieldInterface;
use common\modules\extrafield\models\active_record\TextAR;



class Text extends TextAR
{
    
    public static function type()
    {
        return FieldInterface::TYPE_TEXT;
    }

    public function getViewPath()
    {
        return FieldInterface::VIEW_PATH . "/text.php";
    }

    public function setFieldId($id)
    {
        $this->field_id = $id;
    }

    public function showField($objectType, $objectId = null)
    {
        $model = $this->getModel($objectType, $objectId);
        $view = new View();
        return $view->renderFile($this->getViewPath(), compact('model'));
    }

    public function saveField($objectType, $objectId, $post)
    {
        $this->value = $this->getPostValue($post);
        if ($this->value) {
            $this->object_type = $objectType;
            $this->object_id = $objectId;
            return $this->save();
        } else {
            return null;
        }
    }

    public function updateField($objectType, $objectId, $post)
    {   
        $this->removeOldValues($objectType, $objectId);
        $this->saveField($objectType, $objectId, $post);
    }

    public function removeOldValues($objectType, $objectId)
    {
        TextAR::deleteAll(['object_type'=>$objectType, 'object_id'=>$objectId, 'field_id'=>$this->field_id]);
    }

    // Берем значения с поста
    public function getPostValue($post, $fieldId = null)
    {
        $label = $fieldId != null ? 'extrafield_'.$fieldId : 'extrafield_'.$this->field_id;
        if (!isset($post[$label]) || trim($post[$label]) == "") {
            return null;
        } else {
            return $post[$label];
        }
    }

    private function getModel($objectType, $objectId = null)
    {
        $model = null;

        if ($objectId) {
            $model = Text::find()->where(['field_id'=>$this->field_id, 'object_id'=>$objectId, 'object_type'=>$objectType])->one();
        }

        if (!$model) {
            $model = new Text();
            $model->field_id = $this->field_id;
            $model->object_type = $objectType;
            $model->object_id = $objectId != null ? $objectId : null;
        }

        return $model;
    }

     public function getRawValues($objectType, $objectId)
    {
        $result = false;

        $model = $this->getModel($objectType, $objectId);
        if ($model->isNewRecord || ($this->getValues() == null)) {
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

    public function beforeDelete()
    {
        if (!parent::beforeDelete()) {
            return false;
        }

        self::deleteAll(['field_id'=>$this->field_id]);
        
        return true;
    }
}
