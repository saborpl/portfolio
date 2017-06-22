<?php
/* @var $this DefaultController */

$ogloszenia = Yii::app()->db->createCommand()
    ->select('*')
    ->from('ogloszenia')
	->where('publikacja = 1')	
	->order('edytowano')
	//->limit('4')
    ->queryAll();



$this->breadcrumbs=array(
	$this->module->id,
);
?>

<h2>Giełda maszyn</h2>
<hr />
<? include "inc/search.php" ?>
<table width="100%">
  <tr>
    <td width="70%">
<? 
	foreach($models AS $ogloszenie){ 	
		include "inc/ogloszenia_pozostalo.php";

?>
<table width="100%" style="background-color:#ebe4de" cellpadding="2" cellspacing="2" border="0">
  <tr>
    <td align="center" width="120" style="text-align:center">
      <? if (isset($ogloszenie[zdjecie2])) { ?>
      <img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/images/<?php echo $ogloszenie[zdjecie2]?>" width="100" height="100" alt="<?php echo $ogloszenie[tytul]?>" />
      <? } ?>
    </td>
    <td style="vertical-align:top" width="350">
    <span class="tytul1"><? echo $ogloszenie['tytul'] ?></span>
    <div class="spacer"></div>
    <b>KATEGORIA:</b> <? echo $ogloszenie['kategoria'] ?>
    <div class="spacer"></div>
    <b>STAN:</b> <? echo $ogloszenie['stan'] ?>
    <div class="spacer"></div>
	<? echo substr($ogloszenie['opis'], 0, 96)."..." ?>


    </td>
    <td style="vertical-align:top; text-align:center">
    <div class="button_cena"><? echo $ogloszenie['cena'] ?> zł</div>
    <strong>DO KOŃCA:</strong> <span class="tytul2"><? echo $pozostalo ?> dni</span>
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