<?php 
	use yii\helpers\Html;
?>

<div class="form-group">
	<?= Html::label($model->fieldInfo->name, "extrafield_".$model->field_id) ?>
	<?= Html::input("number", "extrafield_".$model->field_id, $model->value, ['class'=>'form-control']) ?>
</div>