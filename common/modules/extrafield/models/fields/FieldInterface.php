<?php

namespace common\modules\extrafield\models\fields;

interface FieldInterface{
    
    const VIEW_PATH = "@common/modules/extrafield/views/fields_views";

    const TYPE_TEXT = 1;
    const TYPE_INPUT = 2;    
    const TYPE_INTEGER = 3;
    const TYPE_LIST_INPUT_RADIO = 4;
    const TYPE_LIST_INPUT_CHECKBOX = 5;
    const TYPE_LIST_INTEGER_RADIO = 6;
    const TYPE_LIST_INTEGER_CHECKBOX = 7;
    

    // public static function type();
    
    // public static function getViewPath();
    
    // public function showField($objectType, $objectId = null);
    
    // public function updateField($objectType, $objectId, $post);

    // public function saveField($objectType, $objectId, $post);

    // public function getPostValue($post, $fieldId = null);
}
