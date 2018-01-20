<?php 
	use yii\helpers\Html;
?>

<?php foreach ($models as $model): ?>
	<?= Html::checkbox("extrafield_".$model['field_id']."[]", (bool)$model['in_use'], ['value'=>$model['value_id']]) ?><?= $model['item_name'] ?><br>
<?php endforeach ?>

