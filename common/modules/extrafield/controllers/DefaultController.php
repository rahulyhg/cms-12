<?php

namespace common\modules\extrafield\controllers;

use Yii;
use yii\web\Controller;
use common\modules\extrafield\models\FieldFactory as Factory;
use common\modules\extrafield\models\ExtrafieldField as Field;
use common\modules\extrafield\models\ExtrafieldSet as Set;
use common\modules\extrafield\models\fields\InputListDefinedInterface;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $sets = Set::getSets();
        return $this->render('index', compact('sets'));
    }

    public function actionAllFields()
    {
        $fields = Field::find()->all();
        return $this->render('all-fields', compact('fields'));
    }

    public function actionCreateField()
    {
        $model = null;
        if (null != Yii::$app->request->get('type')) {
            $model = new Field(['type'=>(int)Yii::$app->request->get('type')]);
            if ($model->load( Yii::$app->request->post() )) {
                if ($model->validate()) {
                    $model->save();
                }                
                return $this->redirect(['update-field', 'id'=>$model->id]);
            }
        }
        
        return $this->render('create-field', compact('model'));
    }

    public function actionUpdateField($id)
    {
        $model = Field::findOne($id);
        $fields = null;

        $factory = new Factory();
        $field = $factory->setInstanceByFieldType($model->type, $model->id);
        if ($field instanceof InputListDefinedInterface) {
            $fields = $field->getFormForDefinedValues();
        }        

        if ($model->load( Yii::$app->request->post() )) {
            if ($model->validate()) {
                $model->update();
            }
            return $this->refresh();
        }

        if ($fields['model'] != null && $fields['model']->load( Yii::$app->request->post() )) {
            if ($fields['model']->validate()) {
                $fields['model']->save();
                return $this->refresh();
            }
        }
        return $this->render('update-field', compact('model', 'fields'));
    }

    public function actionCreateSet()
    {
        $model = new Set();
        if ($model->load( Yii::$app->request->post() )) {
            if ($model->validate()) {
                $model->save();
            }
            
            return $this->redirect(['update-set', 'id'=>$model->id]);
        }
        return $this->render('create-set', compact('model'));
    }

    public function actionUpdateSet($id)
    {
        $model = Set::findOne($id);
        $includedFieldIds = Set::getIncludedFields($id);
        $fields = Field::find()->all();

        if ($model->load( Yii::$app->request->post() )) {
            if ($model->validate()) {
                $model->save();
            }
            return $this->refresh();
        }
        if ((bool)Yii::$app->request->post('include_fields')) {
            if ($model->updateIncludedFields(Yii::$app->request->post('included'))) {
                return $this->refresh();
            }
        }

        return $this->render('update-set', compact('model', 'includedFieldIds', 'fields'));
    }
}
