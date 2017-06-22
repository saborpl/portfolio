<?
$aktualnosc = Yii::app()->db->createCommand("SELECT * FROM news WHERE id=".$_GET['id']." ORDER BY id DESC ")
    ->queryRow();

?>
      <? if (!$_GET['id'] or $aktualnosc['id'] != $_GET['id']) {
	 		echo "<div class=flash-notice>brak wpisu o podanym numerze lub nie podano numeru</div>";
     	} else {
	?>
    	<hr class="space" />
    	<h2>Aktualności</h2><hr />
<table width="100%">
  <tr>
    <td width="70%">
		<div class="news_cal"><? echo substr($aktualnosc['dodano'], 8, -9) ?><br /><? echo $miesiacpl[substr($aktualnosc['dodano'], 5, -12)] ?></div>
        <div class="news_tresc_more">
        <strong><? echo $aktualnosc['tytul'] ?></strong>
        <br />
        <? echo $aktualnosc['tresc'] ?>
        </div>
        <div class="clear"></div>
    </td>
    <td width="30%" style="vertical-align:top"><? include "inc/grid_left.php" ?></td>
  </tr>
</table>
    <? } ?>

