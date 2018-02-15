<?php
    $this->title = 'Создание набора';
    $this->params['breadcrumbs'][] = ['label' => 'Все наборы', 'url' => ['/extrafield/default/index']];
    $this->params['breadcrumbs'][] = $this->title;
?>

	<?= $this->render('_form-set', compact('model'))?>


