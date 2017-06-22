<?php
/* @var $this B2backController */
/* @var $model b2back */

$this->breadcrumbs=array(
	'B2backs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Lista', 'url'=>array('index')),
	array('label'=>'Dodaj', 'url'=>array('create')),
	array('label'=>'Podgląd', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Edytuj', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'usuń', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'zarządzaj', 'url'=>array('admin')),
);
?>

<h1>Podgląd #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'dodano',
		'edytowano',
		'tytul',
		'miejsce',
		'obowiazki',
		'wymagania',
		'oferujemy',
		'opis',
		//'publikacja',
		//'glowna',
		//'czas_publikacji',
	),
)); ?>
