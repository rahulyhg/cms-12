<?php

namespace common\modules\extrafield\models;

use Yii;

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
            [['name'], 'string', 'max' => 255],
            [['type'], 'safe'],
        ];
    }
}
