<?php

namespace common\modules\extrafield\models\fields;

interface FieldInterface{
    
    const VIEW_PATH = "@common/modules/extrafield/views/fields_views";

    const TYPE_TEXT = 1;
    const TYPE_INPUT = 2;    
    const TYPE_INTEGER = 3;

    public static function type();
    
    public static function getViewPath();
    
    public function showField($objectType, $setId, $objectId = null);
    
    public function updateField($objectType, $objectId, $setId, $post);

    public function saveField($objectType, $objectId, $setId, $post);

    public function getPostValue($post, $fieldId = null);
}
