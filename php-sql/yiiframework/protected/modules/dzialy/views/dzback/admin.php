<?php
/* @var $this DzialyController */
/* @var $model Dzialy */

$this->breadcrumbs=array(
	'Działy'=>array('index'),
	'zarządzaj',
);

$this->menu=array(
	array('label'=>'Lista działów', 'url'=>array('index')),
	array('label'=>'Stwórz dział', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#dzialy-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Zarządzaj działami</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'dzialy-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'tytul',
		'tytul_skrot',
		'dodano',
		'zmieniono',
		'autor',
		/*'tresc',
		'metaTitle',
		'metaKeywords',
		'metaDescription',
		'foto',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
