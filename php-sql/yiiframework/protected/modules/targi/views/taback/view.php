<?php
/* @var $this TabackController */
/* @var $model Taback */

$this->breadcrumbs=array(
	'Tabacks'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Lista Targi', 'url'=>array('index')),
	array('label'=>'Stwórz Targi', 'url'=>array('create')),
	array('label'=>'Edytuj Targi', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Usuń Targi', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Zarządzaj Targi', 'url'=>array('admin')),
);
?>

<h1>View Taback #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'dodano',
		'zmieniono',
		'od',
		'do',
		'autor',
		'tytul',
		'tresc',
		'metaTitle',
		'metaKeywords',
		'metaDescription',
	),
)); ?>
