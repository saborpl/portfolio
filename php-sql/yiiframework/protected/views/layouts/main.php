<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="pl" />
	<?php if (!empty($this->pageMetaDescription))
    {
      echo '<meta name="description" content="' . $this->pageMetaDescription . '" />
      ';
    }
    if (!empty($this->pageMetaTitle))
    {
      echo '<meta name="title" content="' . $this->pageMetaTitle . '" />
      ';
    }
    if (!empty($this->pageMetaKeywords))
    {
      echo '<meta name="keywords" content="' . $this->pageMetaKeywords . '" />
      ';
    }
    ?>

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/s3Slider.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.lightbox-0.5.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<?
		Yii::app()->clientScript->registerCoreScript('jquery');
		Yii::app()->clientScript->registerCoreScript('jquery.ui'); 
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/vendor/jquery.lightbox-0.5.pack.js');
		
		//Yii::app()->clientScript->registerScriptFile('http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js');
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/vendor/s3Slider.js');
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/custom/s3Slider.js');
	?>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
    	<div id="member2">
        
        
        <?php 
			//echo !Yii::app()->user->isGuest ? '' : CHtml::link('zaloguj się',array('/user/login','param1'=>'value1'), array('class'=>'member'));
			echo !Yii::app()->user->isGuest ? '' : CHtml::link('logowanie',array('/user/login'), array('class'=>'member'))."&nbsp;|&nbsp;";
			echo !Yii::app()->user->isGuest ? '' : CHtml::link('rejestracja',array('/user/registration'), array('class'=>'member'));
			
			echo Yii::app()->user->isGuest ? '' : "<span class=member_t>Witaj ".Yii::app()->user->name."</span>&nbsp;|&nbsp;";
			echo Yii::app()->user->isGuest ? '' : CHtml::link('twój profil',array('/user/login'), array('class'=>'member'))."&nbsp;|&nbsp;";
			echo Yii::app()->user->isGuest ? '' : CHtml::link('dodaj ogłoszenie',array('/ogloszenia/default/create'), array('class'=>'member'))."&nbsp;|&nbsp;";
			echo Yii::app()->user->isGuest ? '' : CHtml::link('wyloguj',array('/user/logout'), array('class'=>'member'));
			
		 ?>
        
        </div>
        <div class="clear"></div>
		<div id="logo"><?php //echo CHtml::encode(Yii::app()->name); ?></div>
	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
			                                     
				array('label'=>'home', 'url'=>array('/site/index')),
				array('label'=>'katalog produktów', 'url'=>array('/site/pg&pg=katalog_produktow')),
				array('label'=>'porady i rekomendacje', 'url'=>array('/site/pg&pg=porady_rekomendacje')),
				array('label'=>'giełda maszyn', 'url'=>array('/ogloszenia')),
				array('label'=>'giełda ofert b2b', 'url'=>array('/b2b/')),
				array('label'=>'giełda pracy', 'url'=>array('/site/pg&pg=gielda_pracy')),
				array('label'=>'targi branżowe', 'url'=>array('/targi')),
				array('label'=>'o portalu', 'url'=>array('/site/pg&pg=o_portalu')),
				array('label'=>'kontakt', 'url'=>array('/site/contact')),
				
				
				//array('label'=>'Home', 'url'=>array('/site/index')),
				//array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				//array('label'=>'Contact', 'url'=>array('/site/contact')),
				//array('label'=>'Login', 'url'=>array('/user/login'), 'visible'=>Yii::app()->user->isGuest),
				//array('label'=>'Profil ('.Yii::app()->user->name.')', 'url'=>array('/user/profile'), 'visible'=>!Yii::app()->user->isGuest),
				//array('label'=>'Logout', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
        
	</div><!-- header -->

	<? /*
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
    */?>
	
    <?php include Yii::app()->request->baseUrl."inc/s3Slider.php"; ?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
    <? echo $tresc[5]['tresc'] ?>
        Copyright &copy; <?php echo date('Y'); ?>: portal-cnc.pl
		|
  		Projekt i wykonanie: <?php echo date('Y'); ?> Robert Łuczyński <a class="af" href="http://luczynski.eu">luczynski.eu</a>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
