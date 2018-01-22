<?php
    use yii\helpers\Html;

    $this->title = 'Все поля';
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
	<div class="col-md-12">
		<?php if (count($fields)): ?>
			<ul>
			<?php foreach ($fields as $field): ?>
				<li><?= Html::a($field->name, ['update-field', 'id'=>$field->id]) ?></li>
			<?php endforeach ?>
			</ul>
		<?php endif ?>
	</div>
</div>