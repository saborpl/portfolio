<?
$aktualnosci = Yii::app()->db->createCommand()
    ->select('*')
    ->from('news')
	->where('publikacja = 1')	
	->order('id desc')
	//->limit('5')
    ->queryAll();
 
?>
<h2>Aktualności</h2><hr />
<table width="100%">
  <tr>
    <td width="70%">
        <? foreach($aktualnosci AS $aktualnosc){  ?>
		<div class="news_cal"><? echo substr($aktualnosc['dodano'], 8, -9) ?><br /><? echo $miesiacpl[substr($aktualnosc['dodano'], 5, -12)] ?></div>
        <!--<a href="#" class="a1">-->
        <div class="news_tresc_more">
        <strong><? echo substr($aktualnosc['tytul'], 0, 28) ?></strong>
        <br />
        <? echo substr($aktualnosc['tresc'], 0, 1024) ?>
        </div>
        <!--</a>-->
        <div class="clear"></div>
		<? } ?>
    </td>
    <td width="30%" style="vertical-align:top"><? include "inc/grid_left.php" ?></td>
  </tr>
</table>