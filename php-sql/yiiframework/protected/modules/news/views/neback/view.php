<?php
/* @var $this NebackController */
/* @var $model Neback */

$this->breadcrumbs=array(
	'Nebacks'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Lista News', 'url'=>array('index')),
	array('label'=>'Stwórz News', 'url'=>array('create')),
	array('label'=>'Edytuj News', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Usuń News', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Zarządzaj News', 'url'=>array('admin')),
);
?>

<h1>Podgląd News #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'dodano',
		'zmieniono',
		'autor',
		'tytul',
		'tresc',
		'publikacja',
		'metaTitle',
		'metaKeywords',
		'metaDescription',
	),
)); ?>
