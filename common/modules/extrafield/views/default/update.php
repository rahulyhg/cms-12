<?php
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;

    $this->title = 'Обновление поля';
    $this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_form', compact('model'))?>


<div class="row">
    <div class="col-md-12">
        <ul>
            <li><?= Html::a("Input",    ['create', 'type'=>FieldInterface::TYPE_INPUT]) ?></li>
            <li><?= Html::a("Text",     ['create', 'type'=>FieldInterface::TYPE_TEXT]) ?></li>
            <li><?= Html::a("Number",   ['create', 'type'=>FieldInterface::TYPE_INTEGER]) ?></li>
            <li><?= Html::a("Input predefined Checkbox",    ['create', 'type'=>FieldInterface::TYPE_LIST_INPUT_CHECKBOX]) ?></li>
            <li><?= Html::a("Input predefined Radio",       ['create', 'type'=>FieldInterface::TYPE_LIST_INPUT_RADIO]) ?></li>
        </ul>
    </div>
</div>
