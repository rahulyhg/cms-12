<?php 
	use yii\helpers\Html;
?>

<?= Html::label($model->fieldInfo->name, "extrafield_".$model->field_id) ?>
<?= Html::textarea("extrafield_".$model->field_id, $model->value, ['class'=>'form-control']) ?>