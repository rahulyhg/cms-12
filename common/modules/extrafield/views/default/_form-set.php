<?php
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;
?>

<div class="row">
    <div class="col-md-4">
        <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'name')->textInput() ?>

            <div class="form-group">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
            </div>

        <?php ActiveForm::end(); ?>
    </div>
    <?php if (!$model->isNewRecord): ?>    
        <div class="col-md-6">
            <?php if ($fields): ?>
                <?php $form = ActiveForm::begin(); ?>
                    <?php foreach ($fields as $field): ?>
                        <div class="checkbox">
                          <label>
                            <input <?= in_array($field->id, $includedFieldIds) ? "checked" : "" ?> name="included[]" type="checkbox" value="<?= $field->id ?>">
                                <?= $field->name ?>
                          </label>
                        </div>
                    <?php endforeach ?>
                    <div class="form-group">
                        <?= Html::submitButton('Обновить', ['class' => 'btn btn-primary btn-xs', 'name'=>'include_fields', 'value'=>1]) ?>
                    </div>
                <?php ActiveForm::end(); ?>
            <?php endif ?>
        </div>
    <?php endif ?>
</div>

