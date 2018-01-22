<?php 
    use yii\helpers\Html;
    use yii\helpers\Url;

    $this->title = 'Наборы полей';
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-12">
        <?= Html::a("Add Field",    ['create-field'],   ['class'=>'btn btn-success']) ?>
        <?= Html::a("Add Set",      ['create-set'],     ['class'=>'btn btn-success']) ?>
        <?= Html::a("All fields",   ['all-fields'],     ['class'=>'btn btn-success']) ?>
    </div>
</div>

<div class="row">
    
    <?php foreach ($sets as $set): ?>
        <div class="col-md-4">
            <?= Html::a($set->name, ['update-set', 'id'=>$set->id]) ?>        
            <?php if (count($set->fields)): ?>
                <ul>
                    <?php foreach ($set->fields as $field): ?>
                        <li><?= Html::a($field->name, ['update-field', 'id'=>$field->id]) ?></li>
                    <?php endforeach ?>
                </ul>
            <?php endif ?>
        </div>
    <?php endforeach ?>
    
</div>