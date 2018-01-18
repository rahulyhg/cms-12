<?php 
	use yii\helpers\Html;
?>

<?= Html::label($model->fieldInfo->name, "extrafield_".$model->field_id) ?>
<?= Html::input("text", "extrafield_".$model->field_id, $model->getValue(), ['class'=>'form-control']) ?>