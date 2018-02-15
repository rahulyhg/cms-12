<?php

namespace common\models;

use Yii;


class Product extends \yii\db\ActiveRecord
{
    const TYPE = 'product';

    public static function tableName()
    {
        return 'product';
    }

    public $extraViews;
    public $extrafieldValues;

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
        if (!$insert && $this->extrafield_set) {
            // Если обновляем
            $post =  \Yii::$app->request->post();
            $module = \Yii::$app->getModule('extrafield');
            $module->updateExtrafields(self::TYPE, $this->id, $this->extrafield_set, $post);
        }

        parent::afterSave( $insert, $changedAttributes);
    }

    public function getExtraFieldViews($setId)
    {
        $module = \Yii::$app->getModule('extrafield');
        $this->extraViews = $module->getViews(self::TYPE, $setId, $this->id);
    }

    
    public function getExtrafieldValues($setId)
    {
        $module = \Yii::$app->getModule('extrafield');
        $this->extrafieldValues = $module->getExtrafieldValues(self::TYPE, $this->id, $setId);
    }
}
