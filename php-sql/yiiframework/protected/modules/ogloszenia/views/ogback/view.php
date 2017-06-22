<?php
/* @var $this OgbackController */
/* @var $model Ogback */

$this->breadcrumbs=array(
	'Ogbacks'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Lista ogłoszeń', 'url'=>array('index')),
	array('label'=>'Stwórz ogłoszenie', 'url'=>array('create')),
	array('label'=>'Edytuj ogłoszenie', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'usuń ogłoszenie', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Zarządzaj ogłoszeniami', 'url'=>array('admin')),
);
?>


<h1>Podgląd ogłoszenia #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'dodano',
		'edytowano',
		'tytul',
		'kategoria',
		'opis',
		'cena',
		'publikacja',
		'glowna',
		'premium',
		'czas_publikacji',
		'zdjecie1',
		'zdjecie2',
		'zdjecie3',
		'zdjecie4',
		'zdjecie5',
		'zdjecie6',
		'id_users',
		'id_platnosc',
	),
)); ?>
