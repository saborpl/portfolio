<?
$targ = Yii::app()->db->createCommand("SELECT * FROM targi WHERE id=".$_GET['id']." ORDER BY id DESC ")
    ->queryRow();

?>
      <? if (!$_GET['id'] or $targ['id'] != $_GET['id']) {
	 		echo "<div class=flash-notice>brak wpisu o podanym numerze lub nie podano numeru</div>";
     	} else {
	?>
    	<hr class="space" />
    	<h2>Najblizsze targi branzowe</h2><hr />
<table width="100%">
  <tr>
    <td width="70%">
		<div class="news_cal"><? echo substr($targ['od'], 8, 2) ?><br /><? echo $miesiacpl[substr($targ['od'], 5, 2)] ?></div>
		<div class="news_cal"><? echo substr($targ['do'], 8, 2) ?><br /><? echo $miesiacpl[substr($targ['do'], 5, 2)] ?></div>
        <div class="targi_tresc">
        <span class="tytul1"><? echo $targ['tytul'] ?></span>
        <br />
        <? echo $targ['tresc'] ?>
        </div>
        <hr />
        <div class="clear"></div>
    </td>
    <td width="30%" style="vertical-align:top"><? include "inc/grid_left.php" ?></td>
  </tr>
</table>
    <? } ?>

