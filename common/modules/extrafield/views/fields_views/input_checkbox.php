<?php 
	use yii\helpers\Html;
?>

<?php foreach ($models as $model): ?>
	<?php $checked = (bool)$model['in_use'] ? "checked" : '' ?>
	<div class="checkbox">
	  <label>
	  	<input <?= $checked ?> name="<?= "extrafield_".$model['field_id']."[]" ?>" type="checkbox" value="<?= $model['value_id'] ?>"><?= $model['item_name'] ?>
	  </label>
	</div>
<?php endforeach ?>