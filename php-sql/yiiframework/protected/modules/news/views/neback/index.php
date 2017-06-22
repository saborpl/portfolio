<?php
/* @var $this NebackController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'News',
);

$this->menu=array(
	array('label'=>'Stwórz News', 'url'=>array('create')),
	array('label'=>'Zarządzaj News', 'url'=>array('admin')),
);
?>

<h1>News</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
