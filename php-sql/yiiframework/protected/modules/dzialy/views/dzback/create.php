<?php
/* @var $this DzialyController */
/* @var $model Dzialy */

$this->breadcrumbs=array(
	'Działy'=>array('index'),
	'stwórz',
);

$this->menu=array(
	array('label'=>'Lista działów', 'url'=>array('index')),
	array('label'=>'Zarządzaj działami', 'url'=>array('admin')),
);
?>

<h1>Stwórz dział</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>