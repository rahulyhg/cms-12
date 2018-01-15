<?php 
	use yii\helpers\Html;
?>

<?= Html::label($model->fieldInfo->name, "extrafield[".$model->getType()."__".$model->id."]") ?>
<?= Html::input("text", "extrafield[".$model->getType()."__".$model->id."]", $model->value, ['class'=>'form-control']) ?>