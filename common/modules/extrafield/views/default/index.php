<?php 
    use yii\helpers\Html;
    use yii\helpers\Url;
    use common\modules\extrafield\models\ExtrafieldFieldType as Type;
?>

<div class="row">
    <div class="col-md-12">
        <ul>
            <li><?= Html::a("Input", ['create', 'type'=>Type::INPUT]) ?></li>
            <li><?= Html::a("Text", ['create',  'type'=>Type::TEXT]) ?></li>
            <li><?= Html::a("Number", ['create','type'=>Type::NUMBER]) ?></li>
        </ul>        
    </div>
</div>
