<?
$targi = Yii::app()->db->createCommand()
    ->select('*')
    ->from('targi')
	//->where('publikacja = 1')	
	->order('od')
	//->limit('3')
    ->queryAll();

?>
    	<hr class="space" />
    	<h2>Targi branżowe</h2><hr />
<table width="100%">
  <tr>
    <td width="70%">
        <? 
			foreach($targi AS $targ){
				$tytul = substr($targ['tytul'], 0, 28);
		?>
		<div class="news_cal"><? echo substr($targ['od'], 8, 2) ?><br /><? echo $miesiacpl[substr($targ['od'], 5, 2)] ?></div>
		<div class="news_cal"><? echo substr($targ['do'], 8, 2) ?><br /><? echo $miesiacpl[substr($targ['do'], 5, 2)] ?></div>
        <a href="<? echo $this->createAbsoluteUrl('/targi/default/details',array('id'=>$targ['id'])) ?>" class="a1">
        <div class="targi_tresc_more">
        <? echo CHtml::link('<span class=tytul1>'.$tytul.'</span>', $this->createAbsoluteUrl('/targi/default/details',array('id'=>$targ['id']))); ?> 
        <br />
        <? echo substr($targ['tresc'], 0, 96) ?>
        </div>
        </a>
        <hr />
        <div class="clear"></div>
		<? } ?>
    </td>
    <td width="30%" style="vertical-align:top"><? include "inc/grid_left.php" ?></td>
  </tr>
</table>
    
