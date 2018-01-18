<?php

namespace common\modules\extrafield\models;

use common\modules\extrafield\models\fields\FieldInterface;

use common\modules\extrafield\models\fields\Input;
// use common\modules\extrafield\models\fields\ExtrafieldText;
// use common\modules\extrafield\models\fields\ExtrafieldInt;
use common\modules\extrafield\models\ExtrafieldSet as Set;

class FieldFactory extends \yii\base\Model {
    
    private $instance = null;    
    
    
    public function setInstanceByFieldType($fieldType, $id = null) {
        switch ($fieldType){
            case FieldInterface::TYPE_INPUT:
                $this->instance = new Input();
                break;
            // case Type::TEXT:
            //     $this->instance = new ExtrafieldText(['field_id'=>$id]);
            //     break;
            // case Type::NUMBER:
            //     $this->instance = new ExtrafieldInt(['field_id'=>$id]);
            //     break;
        }

        if ($id != null && $this->instance != null) {
            $this->instance->setFieldId($id);
        }

        return $this->getInstance();
    }

    public function setInstanceBySetId($objectType, $setId, $objectId = null) {
        // находим типы и ID полей, которые входят в набор
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

