<?php

namespace common\modules\extrafield\models\fields;

interface FieldInterface{
    
    const VIEW_PATH = "@common/modules/extrafield/views/fields_views";

    const TYPE_TEXT = 1;
    const TYPE_INPUT = 2;    
    const TYPE_INTEGER = 3;

    public static function type();
    
    public static function getViewPath();
    
    // Создание пустого значения поля в БД
    public function initField($fieldId, $objectId, $objectType);
    
    // Возврат вьюхи для поля с текущим значением
    public function getFieldView($fieldId, $objectId, $objectType);
}
