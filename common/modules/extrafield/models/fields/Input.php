<?php

namespace common\modules\extrafield\models\fields;

use Yii;
use yii\base\View;
use common\modules\extrafield\models\fields\FieldInterface;
use common\modules\extrafield\models\active_record\InputAR;



class Input extends InputAR implements FieldInterface
{

    public static function type()
    {
        return FieldInterface::TYPE_INPUT;
    }

    public static function getViewPath()
    {
        return FieldInterface::VIEW_PATH . "/input.php";
    }

    public function setFieldId($id)
    {
        $this->field_id = $id;
    }

    public function showField($objectType, $setId, $objectId = null)
    {
        $model = $this->getModel($objectType, $objectId);
        $view = new View();
        return $view->renderFile(self::getViewPath(), compact('model'));
    }

    public function saveField($objectType, $objectId, $setId, $post)
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

    public function updateField($objectType, $objectId, $setId, $post)
    {   
        $model = $this->getModel($objectType, $objectId);
        $model->value = $this->getPostValue($post, $model->field_id);
        return $model->isNewRecord ? $model->save() : $model->update();
    }

    // Берем значения с поста
    public function getPostValue($post, $fieldId = null)
    {
        $label = $fieldId != null ? 'extrafield_'.$fieldId : 'extrafield_'.$this->field_id;
        return isset($post[$label]) ? $post[$label] : null;
    }

    private function getModel($objectType, $objectId = null)
    {
        $model = null;

        if ($objectId) {
            $model = Input::find()->where(['field_id'=>$this->field_id, 'object_id'=>$objectId, 'object_type'=>$objectType])->one();
            if (!$model) {
                $model = new Input();
                $model->field_id = $this->field_id;
                $model->object_type = $objectType;
                $model->object_id = $objectId;
            }
        } else {
            $model = new Input();
            $model->field_id = $this->field_id;
            $model->object_type = $objectType;
        }

        return $model;
    }
}
