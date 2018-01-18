<?php

namespace common\modules\extrafield\models\fields;

use Yii;
use yii\base\View;
use common\modules\extrafield\models\fields\FieldInterface;
use common\modules\extrafield\models\ExtrafieldFieldType as Type;
use common\modules\extrafield\models\ExtrafieldField as Field;


class ExtrafieldText extends \yii\db\ActiveRecord implements FieldInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'extrafield_text';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['field_id', 'object_id', 'object_type'], 'required'],
            [['field_id', 'object_id'], 'integer'],
            [['value'], 'string'],
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
        return Type::TEXT;
    }
            
    public function saveInfo(){
        die("TEXT SAVE");
    }

    public function initField($objectId, $objectName)
    {
        $this->object_id = $objectId;
        $this->object_type = $objectName;
        $this->save();
    }

    public function getView()
    {
        return FieldInterface::VIEW_PATH . "/text.php";
    }

    public function loadField($objectId, $objectName)
    {
        $model = self::find()
                    ->where(['field_id'=>$this->field_id, 'object_id'=>$objectId, 'object_type'=>$objectName])
                    ->with(['fieldInfo'])
                    ->one();
        if ($model) {
            $view = new View();
            return $view->renderFile($this->getView(), compact('model'));
        } else {
            return null;
        }        
    }

    public function getFieldInfo()
    {
        return $this->hasOne(Field::className(), ['id'=>'field_id']);
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
