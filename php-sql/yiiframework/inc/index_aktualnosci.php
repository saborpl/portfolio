<?
$aktualnosci = Yii::app()->db->createCommand()
    ->select('*')
    ->from('news')
	->where('publikacja = 1')	
	->order('id')
	->limit('5')
    ->queryAll();
 
?>
    	<h2>Aktualności</h2><hr />
        <? foreach($aktualnosci AS $aktualnosc){  ?>
		<div class="news_cal"><? echo substr($aktualnosc['dodano'], 8, -9) ?><br /><? echo $miesiacpl[substr($aktualnosc['dodano'], 5, -12)] ?></div>
        <a href="<? echo $this->createAbsoluteUrl('/news/default/details',array('id'=>$aktualnosc['id'])) ?>" class="a1">
        <div class="news_tresc">
        <strong><? echo substr($aktualnosc['tytul'], 0, 28) ?></strong>
        <br />
        <? echo substr($aktualnosc['tresc'], 0, 96) ?>
        </div>
        </a>
        <div class="clear"></div>
		<? } ?>
   
