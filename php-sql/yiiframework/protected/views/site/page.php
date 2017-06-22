<?php
/* @var $this SiteController */

$dzialy = Yii::app()->db->createCommand()
    ->select('*')
    ->from('dzialy')
	->where('tytul_skrot=:pg', array(':pg'=>$_GET['pg']))
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
<h2><? echo $dzialy['tytul']; ?></h2>
<hr />
<table width="100%">
  <tr>
    <td width="70%"><? echo $dzialy['tresc']; ?></td>
    <td width="30%" style="vertical-align:top"><? //include "assets/box_oferty.php" ?></td>
  </tr>
</table>
