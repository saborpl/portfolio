<?php
/* @var $this TabackController */
/* @var $model Taback */

$this->breadcrumbs=array(
	'Tabacks'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Lista Targi', 'url'=>array('index')),
	array('label'=>'Stwórz Targi', 'url'=>array('create')),
	array('label'=>'View Targi', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Zarządzaj Targi', 'url'=>array('admin')),
);
?>

<h1>Edytuj Taback <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>