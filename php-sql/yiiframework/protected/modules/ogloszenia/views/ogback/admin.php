<?php
/* @var $this OgbackController */
/* @var $model Ogback */

$this->breadcrumbs=array(
	'Ogbacks'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Lista ogłoszeń', 'url'=>array('index')),
	array('label'=>'Stwórz ogłoszenie', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#ogback-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Zarządzaj ogłoszeniami</h1>

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
	'id'=>'ogback-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'id_users',
		'publikacja',
		'glowna',
		'premium',
		'czas_publikacji',
		'tytul',
		'kategoria',
		/*
		'cena',
		'dodano',
		'edytowano',
		'opis',
		'czas_publikacji',
		'zdjecie1',
		'zdjecie2',
		'zdjecie3',
		'zdjecie4',
		'zdjecie5',
		'zdjecie6',
		'id_platnosc',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
