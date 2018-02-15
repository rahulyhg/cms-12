<?php 
	use yii\helpers\Html;
?>

<b><?= $name ?></b>
<?php foreach ($models as $model): ?>
	<?php $checked = (bool)$model['in_use'] ? "checked" : '' ?>
	<div class="radio">
	  <label>
	  	<input <?= $checked ?> name="<?= "extrafield_".$model['field_id']."[]" ?>" type="radio" value="<?= $model['value_id'] ?>"><?= $model['item_name'] ?>
	  </label>
	</div>
<?php endforeach ?>