<?php
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;       
?>


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

    <div class="col-md-6">
        <?php if ($fields): ?>
            <?php if (isset($fields['model'])): ?>
                <?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($fields['model'], 'value')->textInput() ?>

                    <?= $form->field($fields['model'], 'field_id')->hiddenInput()->label(false) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
                    </div>

                <?php ActiveForm::end(); ?>
            <?php endif ?>

            <?php if (isset($fields['values']) && count($fields['values'])): ?>
                <h2>Значения</h2>
                <ul>
                    <?php foreach ($fields['values'] as $field): ?>
                        <li><?= $field->value ?></li>
                    <?php endforeach ?>
                </ul>
            <?php endif ?>
            
        <?php endif ?>
    </div>
</div>

