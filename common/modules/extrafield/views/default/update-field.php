<?php
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;

    $this->title = 'Обновлеие поля';
    $this->params['breadcrumbs'][] = ['label' => 'Все наборы', 'url' => ['/extrafield/default/index']];
    $this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_form-field', compact('model', 'fields'))?>