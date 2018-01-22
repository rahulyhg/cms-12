<?php
    $this->title = 'Обновление набора';
    $this->params['breadcrumbs'][] = $this->title;
?>

	<?= $this->render('_form-set', compact('model', 'includedFieldIds', 'fields'))?>