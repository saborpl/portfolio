<?php
/* @var $this B2backController */
/* @var $model b2back */

$this->breadcrumbs=array(
	'B2backs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista', 'url'=>array('index')),
	array('label'=>'Zarządzaj', 'url'=>array('admin')),
);
?>

<h1>Dodaj</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>