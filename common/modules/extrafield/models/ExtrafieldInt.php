<?php

namespace common\modules\extrafield\models;

use Yii;
use common\modules\extrafield\models\FieldInterface;
use common\modules\extrafield\models\ExtrafieldFieldType as Type;
use common\modules\extrafield\models\ExtrafieldField;
use yii\base\View;


class ExtrafieldInt extends \yii\db\ActiveRecord implements FieldInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'extrafield_int';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['field_id', 'object_id', 'object_type'], 'required'],
            [['field_id', 'value', 'object_id'], 'integer'],
            [['object_type'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'field_id' => 'Field ID',
            'value' => 'Value',
            'object_id' => 'Object ID',
            'object_type' => 'Object Type',
        ];
    }

    public function getType(){
        return Type::NUMBER;
    }
        
    public function saveInfo(){
        die("INT SAVE");
    }

    public function initField($objectId, $objectName)
    {
        $this->object_id = $objectId;
        $this->object_type = $objectName;
        $this->save();
    }

    public function getView()
    {
        return FieldInterface::VIEW_PATH . "/integer.php";
    }

    public function loadField($objectId, $objectName)
    {
        $model = self::findOne($this->field_id);
        $view = new View();
        return $view->renderFile($this->getView(), compact('model'));
    }

    public function getFieldType()
    {
        return $this->hasOne(ExtrafieldField::className(), ['id'=>$this->field_id]);
    }

    public function loadWithData($data)
    {
        $this->value = $data;
    }


    public function updateData()
    {
        $field = self::findOne(['id'=>$this->id]);
        if ($field) {
            $field->value = $this->value;
            $field->update();
        }
    }

}
