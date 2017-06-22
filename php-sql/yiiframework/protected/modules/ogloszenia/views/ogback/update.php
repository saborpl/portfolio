<?php
/* @var $this OgbackController */
/* @var $model Ogback */

$this->breadcrumbs=array(
	'Ogbacks'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Lista ogłoszeń', 'url'=>array('index')),
	array('label'=>'Stwórz ogłoszenie', 'url'=>array('create')),
	array('label'=>'Podgląd ogłoszenia', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Zarządzaj ogłoszeniami', 'url'=>array('admin')),
);
?>

<h1>Edytuj ogłoszenie <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>