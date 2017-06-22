<?php
/* @var $this OgbackController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ogbacks',
);

$this->menu=array(
	array('label'=>'Powrót', 'url'=>array('/user/profile')),
);

//echo Yii::app()->user->id;
?>

<h2>Twoje ogłoszenia</h2>
<hr />

<?php //$this->widget('zii.widgets.CListView', array(
	//'dataProvider'=>$dataProvider,
	//'itemView'=>'_view',
//));


//print_r($ogloszeniaOwn)

 ?>
<table width="100%" style="background-color:#ebe4de" cellpadding="2" cellspacing="2" border="0">
  <tr style="background-color:#FFF">
    <td>TYTUŁ</td>
    <td style="text-align:center">CZAS WYŚWIETLANIA</td>
    <td style="text-align:center">DODANO</td>
    <td style="text-align:center">CENA</td>
    <td style="text-align:center">KATEGORIA</td>
    <td style="text-align:center">&nbsp;</td>
  </tr>
 <? 
	foreach($ogloszeniaOwn AS $ogloszenie){ 	
		include "inc/ogloszenia_pozostalo.php";

?>     
  <tr>
    <td width="">
    <span class="tytul1"><? echo $ogloszenie['tytul'] ?></span></td>
    <td style="text-align:center"><? echo $pozostalo ?> dni</td>
    <td style="text-align:center"><? echo $ogloszenie['dodano'] ?></td>
    <td style="text-align:center"><? echo $ogloszenie['cena'] ?> zł</td>
    <td style="text-align:center"><? echo $ogloszenie['kategoria'] ?></td>
    <td style="text-align:center"><? echo CHtml::link('<div class=button_blue>edytuj</div>', $this->createAbsoluteUrl('/ogloszenia/ogback/updateown',array('id'=>$ogloszenie['id']))); ?></td>
  </tr>
<? } ?>     

</table>
<hr />

<?php

//$dbCommand = Yii::app()->db->createCommand("SELECT COUNT(*) as all_posts FROM ogloszenia WHERE publikacja = 1");
//$row = $dbCommand->queryRow();
?>

<?php $this->widget('CLinkPager', array(
    'pages' => $pages,
)) 
?>