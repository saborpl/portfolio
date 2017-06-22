<?
$targi = Yii::app()->db->createCommand()
    ->select('*')
    ->from('targi')
	//->where('publikacja = 1')	
	->order('od')
	->limit('3')
    ->queryAll();

?>
    	<hr class="space" />
    	<h2>Najbliższe targi branzowe</h2><hr />
        <? 
			foreach($targi AS $targ){
			$tytul = substr($targ['tytul'], 0, 28);
		?>
		<div class="news_cal"><? echo substr($targ['od'], 8, 2) ?><br /><? echo $miesiacpl[substr($targ['od'], 5, 2)] ?></div>
		<div class="news_cal"><? echo substr($targ['do'], 8, 2) ?><br /><? echo $miesiacpl[substr($targ['do'], 5, 2)] ?></div>
        <div class="targi_tresc">
		<? echo CHtml::link('<span class=tytul1>'.$tytul.'</span>', $this->createAbsoluteUrl('/targi/default/details',array('id'=>$targ['id']))); ?>
        <br />
        <? echo substr($targ['tresc'], 0, 96) ?>
        </div>
        <hr />
        <div class="clear"></div>
		<? } ?>
                <? echo CHtml::link('<div class=wszystkie>wszystkie</div>', $this->createAbsoluteUrl('/targi')); ?>

    
