<?php
/* @var $this OgbackController */
/* @var $model Ogback */

$this->breadcrumbs=array(
	'Ogbacks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista ogłoszeń', 'url'=>array('index')),
	array('label'=>'Zarządzaj ogłoszeniami', 'url'=>array('admin')),
);
?>

<h1>Stwórz ogłoszenie</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>