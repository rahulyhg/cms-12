<?php

namespace common\modules\extrafield\models;

use common\modules\extrafield\models\fields\FieldInterface;

use common\modules\extrafield\models\fields\Input;
use common\modules\extrafield\models\fields\Text;
use common\modules\extrafield\models\fields\Int;
use common\modules\extrafield\models\ExtrafieldSet as Set;

class FieldFactory extends \yii\base\Model {
    
    private $instance = null;    
    
    
    public function setInstanceByFieldType($fieldType, $id = null) {
        switch ($fieldType){
            case FieldInterface::TYPE_INPUT:
                $this->instance = new Input();
                break;
            case FieldInterface::TYPE_TEXT:
                $this->instance = new Text();
                break;
            case FieldInterface::TYPE_INTEGER:
                $this->instance = new Int();
                break;
        }

        if ($id != null && $this->instance != null) {
            $this->instance->setFieldId($id);
        }

        return $this->getInstance();
    }

    public function setInstanceBySetId($setId) {
        $fieldsId = Set::getFieldsId($setId);
        $result = [];

        foreach ($fieldsId as $field) {
            $result[] = $this->setInstanceByFieldType($field['type'], $field['id']);
        }

        return $result;
    }
    
    public function getInstance()  {
        return $this->instance;
    }    
    
}

