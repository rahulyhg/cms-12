<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


?>
<div class="site-login">

    <p>Please fill out the following fields to login:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'name')->textInput() ?>

                <?= $form->field($model, 'price')->textInput() ?>

                <?php if ($model->extraViews != null): ?>
                    <?php foreach ($model->extraViews as $view): ?>
                        <?= $view ?>
                    <?php endforeach ?>
                <?php endif ?>

                <?php if ($model->extrafieldValues != null): ?>
                    <?php foreach ($model->extrafieldValues as $field): ?>
                        <b><?= $field['name']?></b>:<?= $field['values']?><br>
                    <?php endforeach ?>
                <?php endif ?>

                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
