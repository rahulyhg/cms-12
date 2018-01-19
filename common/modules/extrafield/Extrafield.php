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

    // Получение поля для вставку в форму модели
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

    // @return array
    // Получение данных для отображения на фронте
    public function getExtrafieldValues($objectType, $objectId, $setId)
    {
        $result = [];
        $factory = new FieldFactory();
        $fieldsArray = $factory->setInstanceBySetId($setId);
        foreach ($fieldsArray as $field) {
            $result[] = $field->getRawValues($objectType, $objectId);
        }

        return array_values(array_filter($result));
    }
}