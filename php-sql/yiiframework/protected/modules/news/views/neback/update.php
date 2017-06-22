<?php
/* @var $this NebackController */
/* @var $model Neback */

$this->breadcrumbs=array(
	'News'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Lista News', 'url'=>array('index')),
	array('label'=>'Stwórz News', 'url'=>array('create')),
	array('label'=>'View News', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Zarządzaj News', 'url'=>array('admin')),
);
?>

<h1>Edytuj News <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>