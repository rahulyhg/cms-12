<?php

namespace common\modules\extrafield\controllers;

use Yii;
use yii\web\Controller;
use common\modules\extrafield\models\ExtrafieldFieldType as Type;
use common\modules\extrafield\models\FieldFactory as Factory;
use common\modules\extrafield\models\ExtrafieldField;


class DefaultController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index', ['module'=>$this->module->id]);
    }
    
    public function actionCreate()
    {
        $model = new ExtrafieldField(['type'=>(int)Yii::$app->request->get('type')]);

        if ($model->load( Yii::$app->request->post() )) {
            if ($model->validate()) {
                $model->save();
            }
            
            return $this->redirect(['index']);
        }        

        return $this->render('create-field', compact('model'));
    }
}
