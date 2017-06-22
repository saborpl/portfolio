<?php
/* @var $this DzialyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Działy',
);

$this->menu=array(
	array('label'=>'Stwórz dział', 'url'=>array('create')),
	array('label'=>'Zarządzaj działami', 'url'=>array('admin')),
);
?>

<h1>Działy</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
