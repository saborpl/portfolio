<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="span-19">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<div class="span-5 last">
	<div id="sidebar">
    
    
    
    
<?    

if (Yii::app()->user->checkAccess('RightsAdministration')) {

	$this->widget('zii.widgets.CMenu',array(
	'items'=>array(
	array('label'=>'Twój profil', 'url'=>array('/user/profile')),
	array('label'=>'Zarządzaj ogłoszeniami', 'url'=>array('/ogloszenia/ogback/admin')),
	array('label'=>'Zarządzaj b2b', 'url'=>array('/b2b/b2back/admin')),
	array('label'=>'Zarządzaj działami', 'url'=>array('/dzialy/dzback/admin')),
	array('label'=>'Zarządzaj aktualnościami', 'url'=>array('/news/neback/admin')),
	array('label'=>'Zarządzaj targami', 'url'=>array('/targi/taback/admin')),
	array('label'=>'Zarządzaj użytkownikami', 'url'=>array('/user/admin')),
	array('label' => 'Zarządzaj reklamami', 'url' => 'http://openads.snell.pl/admin/index.php', 'linkOptions' => array('target'=>'_blank')),
	
	),
	));

}

?>
    
    
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Operations',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>
        
	</div><!-- sidebar -->
</div>
<?php $this->endContent(); ?>