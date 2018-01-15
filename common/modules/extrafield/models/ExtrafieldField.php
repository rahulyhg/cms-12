<?php

namespace common\modules\extrafield\models;

use Yii;

/**
 * This is the model class for table "extrafield_field".
 *
 * @property int $id
 * @property string $name
 * @property string $type
 */
class ExtrafieldField extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'extrafield_field';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['type'], 'safe'],
        ];
    }
}
