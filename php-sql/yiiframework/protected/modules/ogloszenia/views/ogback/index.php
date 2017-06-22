<?php
/* @var $this OgbackController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ogbacks',
);

$this->menu=array(
	array('label'=>'Stworz ogłoszenie', 'url'=>array('create')),
	array('label'=>'Zarządzaj ogłoszeniami', 'url'=>array('admin')),
);
?>

<h1>Ogłoszenia</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
