<?php
/* @var $this SiteController */

$dzialy = Yii::app()->db->createCommand()
    ->select('*')
    ->from('dzialy')
	->where('id = 1')
	//->where('tytul_skrot=:pg', array(':pg'=>$_GET['pg']))
    //->where('id=:id and moderator=:moderator', array(':id'=>$_GET['id'], ':moderator'=>1))
    ->queryRow();


$this->pageMetaTitle = $dzialy['metaTitle'];
$this->pageMetaKeywords = $dzialy['metaKeywords'];
$this->pageMetaDescription = $dzialy['metaDescription'];

$this->pageTitle=Yii::app()->name . ' - '.$dzialy['tytul'];
$this->breadcrumbs=array(
	$dzialy['tytul'],
);
?>
<table width="100%">
  <tr >
    <td width="">
		<? echo CHtml::link('<img src=images/button_dodaj_ogloszenie.png width=566 height=119 alt=dodaj swoje ogłoszenie! />',array('/ogloszenia/default/create'), array('class'=>'member')); ?>
	  <? include "inc/index_gielda_maszyn.php" ?>
   </td>
    <td width="320" rowspan="2" align="center" style="vertical-align:top;">
	<? include "inc/reklama_bok1.php" ?>
    <hr class="space" />
	<? include "inc/index_aktualnosci.php" ?>
    <hr class="space" />
	<? include "inc/reklama_bok2.php" ?>
    </td>
  </tr>
  <tr >
    <td>
		<? include "inc/reklama_tresc1.php" ?>
        <? include "inc/index_targi.php" ?>
    <br /></td>
  </tr>
</table>
