<?php
/* @var $this DzialyController */
/* @var $model Dzialy */

$this->breadcrumbs=array(
	'Działy'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Edytuj',
);

$this->menu=array(
	array('label'=>'Lista działów', 'url'=>array('index')),
	array('label'=>'Stwórz dział', 'url'=>array('create')),
	//array('label'=>'Edycja działu', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Delete Dzialy', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Zarządzaj działami', 'url'=>array('admin')),
);
?>

<h1>Edytuj dział: <?php echo $model->tytul; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>