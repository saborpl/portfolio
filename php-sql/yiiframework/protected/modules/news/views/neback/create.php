<?php
/* @var $this NebackController */
/* @var $model Neback */

$this->breadcrumbs=array(
	'Nebacks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista News', 'url'=>array('index')),
	array('label'=>'Zarządzaj News', 'url'=>array('admin')),
);
?>

<h1>Stwórz News</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>