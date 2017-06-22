<?php
/* @var $this B2backController */
/* @var $model b2back */

$this->breadcrumbs=array(
	'B2backs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Lista', 'url'=>array('index')),
	array('label'=>'Dodaj', 'url'=>array('create')),
	array('label'=>'Podgląd', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'zarządzaj', 'url'=>array('admin')),
);
?>

<h1>edytuj b2back <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>