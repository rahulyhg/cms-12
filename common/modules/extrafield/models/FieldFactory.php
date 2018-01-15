<?php

namespace common\modules\extrafield\models;

use common\modules\extrafield\models\ExtrafieldFieldType as Type;

use common\modules\extrafield\models\ExtrafieldInput;
use common\modules\extrafield\models\ExtrafieldText;
use common\modules\extrafield\models\ExtrafieldInt;
use common\modules\extrafield\models\ExtrafieldSet as Set;

class FieldFactory extends \yii\base\Model {
    
    private $instance = null;    
    
    
    public function setInstanceByFieldType($fieldType, $id = null) {
        switch ($fieldType){
            case Type::INPUT:
                $this->instance = new ExtrafieldInput(['field_id'=>$id]);
                break;
            case Type::TEXT:
                $this->instance = new ExtrafieldText(['field_id'=>$id]);
                break;
            case Type::NUMBER:
                $this->instance = new ExtrafieldInt(['field_id'=>$id]);
                break;
        }

        return $this->getInstance();
    }

    public function setInstanceBySetId($objectId, $objectName, $setId = 1) {
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
