<?php

namespace common\modules\extrafield\models;

interface FieldInterface{
    
    const VIEW_PATH = "@common/modules/extrafield/views/fields-views";

    public function getType();
    
    public function getView();
    
    public function saveInfo();
    
    public function initField($objectId, $objectName);

    public function loadField($objectId, $objectName);
}
