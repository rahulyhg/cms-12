<?php

namespace common\modules\extrafield\models;

use Yii;
use common\modules\extrafield\models\ExtrafieldFieldSet as FieldSet;

class ExtrafieldField extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'extrafield_field';
    }


    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            [['name', 'slug'], 'string', 'max' => 255],
            [['type'], 'safe'],
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => \yii\behaviors\SluggableBehavior::className(),
                'attribute' => 'name',
            ],
        ];
    }

    public function beforeDelete()
    {
        if (!parent::beforeDelete()) {
            return false;
        }

        $rows = FieldSet::findAll(['field_id'=>$this->id]);
        if ($rows) {
            foreach ($rows as $row) {
                $row->delete();
            }
        }
        
        return true;
    }
}
