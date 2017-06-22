
<?
$ogloszenia = Yii::app()->db->createCommand()
    ->select('*')
    ->from('ogloszenia')
	->where('publikacja = 1 and premium = 1')	
	->order('edytowano')
	->limit('10')
    ->queryAll();

?>


               <div id="slider1">
               <!-- slideshow luczynski.eu-->
                    <ul id="slider1Content">
					<? 	foreach($ogloszenia AS $ogloszenie){  ?>
                    	<a href="<? echo $this->createAbsoluteUrl('/ogloszenia/default/details',array('id'=>$ogloszenie['id'])) ?>" class="a1">
                        <li class="slider1Image">
                        	<img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/images/<?php echo $ogloszenie[zdjecie1]?>" width="960" height="320" alt="<?php echo $ogloszenie[tytul]?>" />
                            <span class="right">
                            <div class="clear"></div>
                            <div class="textbox">
                              <div class="tytul"><?php echo $ogloszenie['tytul']?></div>
                              <div class="tresc"><? echo substr($ogloszenie['opis'], 0, 256)."..." ?><br /><font style="color:#F90; font-weight:bold">zobacz ofertę &raquo;</font></div>
                              
                              <div class="cena"><?php echo $ogloszenie['cena']?> zł</div>
                              
                            </div>
                            </span>
                        </li>
                        </a>
						<? } ?>
                        <div class="clear slider1Image"></div>
                    </ul>
                </div>
                <!-- // slider1 -->
