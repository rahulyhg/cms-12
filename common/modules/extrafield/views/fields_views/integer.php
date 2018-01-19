<?php 
	use yii\helpers\Html;
?>

<?= Html::label($model->fieldInfo->name, "extrafield_".$model->field_id) ?>
<?= Html::input("number", "extrafield_".$model->field_id, $model->value, ['class'=>'form-control']) ?>