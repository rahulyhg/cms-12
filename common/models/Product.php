<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property int $price
 */
class Product extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
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
        $insert ? $module->initExtrafields($this->id, 'product') : $module->saveExtrafieldsData($this->id, 'product', \Yii::$app->request->post('extrafield'));

        parent::afterSave( $insert, $changedAttributes);
    }

    public function loadExtrafields()
    {
        $module = \Yii::$app->getModule('extrafield');
        $this->extraViews = $module->loadData($this->id, 'product');
    }

    public function showExtrafields()
    {
        // $module = \Yii::$app->getModule('extrafields');
        // $module->loadData($this->id, 'product');
    }
}
