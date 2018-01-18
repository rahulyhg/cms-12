<?php

namespace common\modules\extrafield\models\fields;

use Yii;
use yii\base\View;

use common\modules\extrafield\models\fields\FieldInterface;
use common\modules\extrafield\models\active_record\InputAR;



// class Input extends InputAR implements FieldInterface
class Input extends InputAR
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
        $result = null;
        $model = null;

        if ($objectId) {
            $model = Input::find()
                    ->where(['field_id'=>$this->field_id, 'object_id'=>$objectId, 'object_type'=>$objectType])
                    ->with(['fieldInfo'])
                    ->one();
        } else {
            $model = new Input();
            $model->field_id = $this->field_id;
            $model->object_type = $objectType;
        }

        if ($model) {
            $view = new View();
            $result = $view->renderFile(self::getViewPath(), compact('model'));
        }

        return $result;
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
        $model = Input::find()->where(['object_type'=>$objectType, 'object_id'=>$objectId, 'field_id'=>$this->field_id])->one();

        if ($model) {
            $model->value = $this->getPostValue($post, $model->field_id);
            return $model->update();
        } else {
            return null;
        }
    }

    // Берем значения с поста
    public function getPostValue($post, $fieldId = null)
    {
        $label = $fieldId != null ? 'extrafield_'.$fieldId : 'extrafield_'.$this->field_id;
        return isset($post[$label]) ? $post[$label] : null;
    }
}
