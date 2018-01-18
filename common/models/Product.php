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
    public function rules()
    {
        return [
            [['name', 'price'], 'required'],
            [['price'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function afterSave( $insert, $changedAttributes)
    {
        $module = \Yii::$app->getModule('extrafield');
        $post =  \Yii::$app->request->post();
        // $setId =  \Yii::$app->request->post('extrafield_setId');
        $setId =  1;
        $insert ? $module->saveExtrafields(self::TYPE, $this->id, $setId, $post) : $module->updateExtrafields(self::TYPE, $this->id, $setId, $post);

        parent::afterSave( $insert, $changedAttributes);
    }

    public function getExtraFieldViews($setId)
    {
        $module = \Yii::$app->getModule('extrafield');
        $this->extraViews = $module->getViews(self::TYPE, $setId, $this->id);
    }

    public function showExtraFieldValues()
    {
        // $module = \Yii::$app->getModule('extrafield');
        // $this->extraViews = $module->geViews(self::TYPE, $this->isNewRecord ? null : $this->id);   
    }
}
