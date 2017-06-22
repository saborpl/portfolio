<?php
/* @var $this TabackController */
/* @var $model Taback */

$this->breadcrumbs=array(
	'Tabacks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista Targi', 'url'=>array('index')),
	array('label'=>'Zarządzaj Targi', 'url'=>array('admin')),
);
?>

<h1>Stwórz Taback</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>