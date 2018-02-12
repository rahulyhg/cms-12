<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\opspace\ProductsSocial as Social;

class SocialController extends Controller
{
        
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
    

    // 1. 1 раз в день
    public function actionActivateProducts()
    {
        Social::activateProducts();
    }
    
    // 2. 1 раз в день
    public function actionDeactivateProducts()
    {
        Social::deactivateProducts();   
    }

    // 3. 1 раз в день
    public function actionAddNewProducts()
    {
        Social::addNewProducts();
    }
    
    // 4. каждые 5 мин
    public function actionUpdateVk()
    {
        Social::updateVk();
    }

    // 5. Раз в 3 дня
    public function actionSetForUpdate()
    {
        Social::setForUpdate();
    }
}