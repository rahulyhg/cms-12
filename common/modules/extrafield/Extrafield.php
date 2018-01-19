<?php

namespace common\modules\extrafield;

use common\modules\extrafield\models\FieldFactory;

class Extrafield extends \yii\base\Module
{
    public $controllerNamespace = 'common\modules\extrafield\controllers';

    public function init()
    {
        parent::init();
    }

    public function getViews($objectType, $setId, $objectId = null)
    {
        $factory = new FieldFactory();
        $fieldsArray = $factory->setInstanceBySetId($setId);
        
        $views = [];
        foreach ($fieldsArray as $field) {
            $views[] = $field->showField($objectType, $objectId);
        }
        return $views;
    }

    // Сохранение новых данных
    public function saveExtrafields($objectType, $objectId, $setId, $post)
    {
        $factory = new FieldFactory();
        $fieldsArray = $factory->setInstanceBySetId($setId);
        foreach ($fieldsArray as $field) {
            $field->saveField($objectType, $objectId, $post);
        }
    }

    // Обновление данных
    public function updateExtrafields($objectType, $objectId, $setId, $post)
    {
        $factory = new FieldFactory();
        $fieldsArray = $factory->setInstanceBySetId($setId);
        foreach ($fieldsArray as $field) {
            $field->updateField($objectType, $objectId, $post);
        }        
    }

    

}
