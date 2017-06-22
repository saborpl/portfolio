<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
);
?>
<?php
/* @var $this DefaultController */

$b2b = Yii::app()->db->createCommand()
    ->select('*')
    ->from('b2b')
	->order('edytowano')
	//->limit('4')
    ->queryAll();



$this->breadcrumbs=array(
	$this->module->id,
);
?>

<h2>Giełda B2B</h2>
<hr />
<? //include "inc/search.php" ?>
<table width="100%">
  <tr>
    <td width="70%">
<? 
	foreach($b2b AS $ogloszenie){ 	
		//include "inc/ogloszenia_pozostalo.php";

?>
<table width="100%" style="background-color:#ebe4de" cellpadding="2" cellspacing="2" border="0">
  <tr>
    <td style="vertical-align:top" width="350">
    <span class="tytul1"><? echo $ogloszenie['tytul'] ?></span>
    <div class="spacer"></div>
    <b>Miejsce:</b> <? echo $ogloszenie['miejsce'] ?>
    <div class="spacer"></div>
    <b>Dodano:</b> <? echo substr($ogloszenie['dodano'], 0, 10) ?>
    </td>
    <td style="vertical-align:top; text-align:center">
    <? echo CHtml::link('<div class=button_blue>więcej</div>', $this->createAbsoluteUrl('default/details',array('id'=>$ogloszenie['id']))); ?>
    </td>
  </tr>

</table>
<hr />
<? } ?>     
    </td>
    <td width="30%" style="vertical-align:top"><? include "inc/grid_left.php" ?></td>
  </tr>
</table>


<?php

//$dbCommand = Yii::app()->db->createCommand("SELECT COUNT(*) as all_posts FROM ogloszenia WHERE publikacja = 1");
//$row = $dbCommand->queryRow();
?>

<?php $this->widget('CLinkPager', array(
    'pages' => $pages,
)) 
?>