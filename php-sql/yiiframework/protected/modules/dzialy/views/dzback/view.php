<?php
/* @var $this DzialyController */
/* @var $model Dzialy */

$this->breadcrumbs=array(
	'Działy'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Lista działów', 'url'=>array('index')),
	array('label'=>'Stwórz dział', 'url'=>array('create')),
	array('label'=>'Edycja działu', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Delete Dzialy', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Zarządzaj działami', 'url'=>array('admin')),
);
?>`````````````````

<h1>View Dzialy #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'dodano',
		'zmieniono',
		'autor',
		'tytul',
		'tytul_skrot',
		'tresc',
		'metaTitle',
		'metaKeywords',
		'metaDescription',
		//'foto',
	),
)); ?>
