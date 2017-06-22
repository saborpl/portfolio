<?php
/* @var $this TabackController */
/* @var $model Taback */

$this->breadcrumbs=array(
	'Tabacks'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Lista Targi', 'url'=>array('index')),
	array('label'=>'Stwórz Targi', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#taback-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Zarządzaj Targi</h1>

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
	'id'=>'taback-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		//'dodano',
		//'zmieniono',
		'od',
		'do',
		//'autor',
		'tytul',
		//'tresc',
		//'metaTitle',
		//'metaKeywords',
		//'metaDescription',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
