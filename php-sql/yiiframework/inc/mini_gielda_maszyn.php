<?
$ogloszenia = Yii::app()->db->createCommand()
    ->select('*')
    ->from('ogloszenia')
	->where('publikacja = 1')	
	->order('id')
	->limit('5')
    ->queryAll();
 
?>
    	<h2>Giełda maszyn</h2><hr />
        <? 
			foreach($ogloszenia AS $ogloszenie){  
				include "inc/ogloszenia_pozostalo.php";
		?>
		
        <a href="<? echo $this->createAbsoluteUrl('/ogloszenia/default/details',array('id'=>$ogloszenie['id'])) ?>" class="a1">
        <div class="news_tresc_mini">
        <strong><? echo substr($ogloszenie['tytul'], 0, 56) ?></strong>
        <span class="data_grey">(<? echo $pozostalo ?> dni)</span>
        <br />
        <? echo substr($ogloszenie['opis'], 0, 46) ?> 
        </div>
        </a>
        <div class="clear"></div>
		<? } ?>
        <? echo CHtml::link('<div class=wszystkie>wszystkie</div>', $this->createAbsoluteUrl('/ogloszenia')); ?>
   
