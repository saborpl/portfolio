<?
$ogloszenia = Yii::app()->db->createCommand()
    ->select('*')
    ->from('ogloszenia')
	->where('publikacja = 1 and glowna = 1')	
	->order('premium desc,edytowano desc')
	->limit('10')
    ->queryAll();

?>
        
<h2>Giełda maszyn</h2><hr />
<? 
	foreach($ogloszenia AS $ogloszenie){ 
		include "inc/ogloszenia_pozostalo.php";
?>     
<? if ($ogloszenie['premium'] == 1){ ?>
<div class="premium">OGŁOSZENIE PREMIUM</div>
<table width="100%" style="background-color:#f4f9ce" cellpadding="2" cellspacing="2" border="0">
<? } else { ?>
<table width="100%" style="background-color:#ebe4de" cellpadding="2" cellspacing="2" border="0">
<? } ?>
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
	<? echo substr($ogloszenie['opis'], 0, 96)."..." ?>


    </td>
    <td style="vertical-align:top; text-align:center">
    <div class="button_cena"><? echo $ogloszenie['cena'] ?> zł</div>
    <strong>DO KOŃCA:</strong> <span class="tytul2"><? echo $pozostalo ?> dni</span>
            <a href="<? echo $this->createAbsoluteUrl('/ogloszenia/default/details',array('id'=>$ogloszenie['id'])) ?>"><div class="button_blue">więcej</div></a>

    </td>
  </tr>

</table>
<hr />
<? } ?> 