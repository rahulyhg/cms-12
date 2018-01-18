<?php 
	use yii\helpers\Html;
?>
<?= Html::label($model->fieldInfo->name, "extrafield[".$model->getType()."__".$model->id."]") ?>
<?= Html::textarea("extrafield[".$model->getType()."__".$model->id."]", $model->value, ['class'=>'form-control']) ?>