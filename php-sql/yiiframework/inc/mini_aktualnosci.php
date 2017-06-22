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
		
        <a href="<? echo $this->createAbsoluteUrl('/news/default/details',array('id'=>$aktualnosc['id'])) ?>" class="a1">
        <div class="news_tresc_mini">
        <strong><? echo substr($aktualnosc['tytul'], 0, 128) ?></strong>
        <span class="data_grey"><? echo substr($aktualnosc['dodano'], 0, 10) ?></span>
        <br />
        <? echo substr($aktualnosc['tresc'], 0, 46) ?> 
        </div>
        </a>
        <hr />
        <div class="clear"></div>
		<? } ?>
        <? echo CHtml::link('<div class=wszystkie>wszystkie</div>', $this->createAbsoluteUrl('/news')); ?>
                <div class="clear"></div>

   
