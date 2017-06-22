<?php
/* @var $this B2backController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'B2backs',
);

$this->menu=array(
	array('label'=>'Dodaj', 'url'=>array('create')),
	array('label'=>'Zarządzaj', 'url'=>array('admin')),
);
?>

<h1>B2b</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
