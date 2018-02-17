<?php

namespace common\models;

use Yii;
use Sbmd\Extrafields\Extrafield;


class Product extends \yii\db\ActiveRecord
{
    const TYPE = 'product';
    public $extraViews;
    public $extrafieldValues;

    public static function tableName()
    {
        return 'product';
    }

    public function rules()
    {
        return [
            [['name', 'price'], 'required'],
            [['price', 'extrafield_set'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function afterSave( $insert, $changedAttributes)
    {        
        if (!$insert) {
            // Если обновляем
            $post =  \Yii::$app->request->post();
            $module = new Extrafield();
            $module->updateExtrafields(self::TYPE, $this->id, $this->extrafield_set, $post);
        }

        parent::afterSave( $insert, $changedAttributes);
    }

    public function getExtraFieldViews($setId)
    {
        $module = new Extrafield();
        $this->extraViews = $module->getViews(self::TYPE, $setId, $this->id);
    }

    
    public function getExtrafieldValues($setId)
    {
        $module = new Extrafield();
        $this->extrafieldValues = $module->getExtrafieldValues(self::TYPE, $this->id, $setId);
    }
}
