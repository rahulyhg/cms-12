<?php

namespace common\modules\extrafield;

use common\modules\extrafield\models\FieldFactory;

class Extrafield extends \yii\base\Module
{
    public $controllerNamespace = 'common\modules\extrafield\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    public function initExtrafields($objectId, $objectName)
    {
        $factory = new FieldFactory();
        $fieldsArray = $factory->setInstanceBySetId($objectId, $objectName);

        foreach ($fieldsArray as $field) {
            $field->initField($objectId, $objectName);
        }
    }

    public function loadData($objectId, $objectName)
    {
        $factory = new FieldFactory();
        $fieldsArray = $factory->setInstanceBySetId($objectId, $objectName); 
        $views = [];
        foreach ($fieldsArray as $field) {
            $views[] = $field->loadField($objectId, $objectName);
        }
        
        return $views;
    }

    public function saveExtrafieldsData($objectId, $objectName, $dataArray)
    {
        $infoToSave = $this->setInfoToSAave($dataArray);

        if (!empty($infoToSave)) {
            $factory = new FieldFactory();
            foreach ($infoToSave as $fieldInfo) {
                $field = $factory->setInstanceByFieldType($fieldInfo['field_type']);
                $field->id = $fieldInfo['field_id'];
                $field->loadWithData($fieldInfo['field_data']);
                $field->updateData();
            }
        }

        $fieldsArray = $factory->setInstanceByFieldType($objectId, $objectName); 


        
    }

    public function setInfoToSAave($array)
    {
        $result = [];
        if (!empty($array)) {
            foreach ($array as $key => $value) {
                $ex = explode("__", $key);
                $result[] = ['field_type'=>$ex[0], 'field_id'=>$ex[1], 'field_data'=>$value];
            }
        }
        return $result;
    }

    

}
