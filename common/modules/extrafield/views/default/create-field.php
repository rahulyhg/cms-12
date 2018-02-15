<?php
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;
    use common\modules\extrafield\models\fields\FieldInterface;

    $this->title = 'Создание поля';
    $this->params['breadcrumbs'][] = ['label' => 'Все наборы', 'url' => ['/extrafield/default/index']];
    $this->params['breadcrumbs'][] = $this->title;
?>

<?php if ($model): ?>
	<div class="row">
        <div class="col-md-4">
            <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'name')->textInput() ?>

                <?= $form->field($model, 'type')->hiddenInput()->label(false) ?>

                <div class="form-group">
                    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

<?php else: ?>
	<div class="row">
	    <div class="col-md-12">
	        <ul>
	            <li><?= Html::a("Поле", ['create-field', 'type'=>FieldInterface::TYPE_INPUT]) ?></li>
	            <li><?= Html::a("Текст", ['create-field', 'type'=>FieldInterface::TYPE_TEXT]) ?></li>
	            <li><?= Html::a("Число", ['create-field', 'type'=>FieldInterface::TYPE_INTEGER]) ?></li>
	            <li><?= Html::a("Поле с многими значениями (checkbox)",['create-field', 'type'=>FieldInterface::TYPE_LIST_INPUT_CHECKBOX]) ?></li>
	            <li><?= Html::a("Поле с одним значениями (radio)", ['create-field', 'type'=>FieldInterface::TYPE_LIST_INPUT_RADIO]) ?></li>
	        </ul>
	    </div>
	</div>
<?php endif ?>
