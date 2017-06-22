<?
$ogloszenia = Yii::app()->db->createCommand()
    ->select('*')
    ->from('ogloszenia')
	->where('publikacja = 1 and premium = 1')	
	->order('edytowano')
	->limit('4')
    ->queryAll();

?>


               <div id="slider1">
                    <ul id="slider1Content">
					<? 	foreach($ogloszenia AS $ogloszenie){  ?>
                        <li class="slider1Image">
                        	<img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/images/<?php echo $ogloszenie[zdjecie1]?>" width="960" height="320" alt="<?php echo $ogloszenie[tytul]?>" />
                            <span class="right">
                            <div class="clear"></div>
                            <div class="textbox">
                              <div class="tytul"><?php echo $ogloszenie['tytul']?></div>
                              <div class="tresc"><? echo substr($ogloszenie['opis'], 0, 256)."..." ?><br /><font style="color:#F90; font-weight:bold">zobacz ofertę &raquo;</font></div>
                              
                              <div class="cena"><?php echo $ogloszenie['cena']?></div>
                              
                            </div>
                            </span>
                        </li>
						<? } ?>
                        <div class="clear slider1Image"></div>
                    </ul>
                </div>
                <!-- // slider1 -->
