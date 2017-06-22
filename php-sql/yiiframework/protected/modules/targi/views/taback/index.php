<?php
/* @var $this TabackController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tabacks',
);

$this->menu=array(
	array('label'=>'Stwórz Targi', 'url'=>array('create')),
	array('label'=>'Zarządzaj Targi', 'url'=>array('admin')),
);
?>

<h1>Targi</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
