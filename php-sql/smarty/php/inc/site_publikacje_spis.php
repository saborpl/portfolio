<?
  //ile na strone
	$ile = 15;
	$numrows = mysql_num_rows(mysql_query("SELECT * FROM ksiazki"));
	if(!$p) $p = 0;
		// zabezpieczenie przed nienumerycznymi wartosciami
		$p = (int)$p;
		$ile = (int)$ile;

	$query = "SELECT * FROM ksiazki ORDER BY nazwa ASC LIMIT $p,$ile";
	$res = mysql_query($query) or die("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $query . "<br />\nError: (" . mysql_errno() . ") " . mysql_error());
	while($row = mysql_fetch_assoc($res)){
		//print_r($row);
?>
<div class="book">
<? if ($row['okladka']) { ?>
	<a title="<? echo $row['nazwa'] ?>" href="image.php?fid=<? echo $row['id'] ?>&foto=1" rel="lightbox">
	<img src="image.php?fid=<? echo $row['id'] ?>&foto=1" border=0 width="120" height="170" />
   	</a>
<? } ?>
<div class="desc">
<a class="naglowek_sklep" href="publikacje2.php?strona=Co-z-tymi-kobietami"><h2><? echo $row['nazwa'] ?></h2></a>

<?
	$query = "SELECT * FROM user WHERE userID=$row[id_autora]";
	$res1 = mysql_query($query) or die("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $query . "<br />\nError: (" . mysql_errno() . ") " . mysql_error());
	while($row1 = mysql_fetch_assoc($res1)){

?>
<p><p>Autor: <? echo $row1['email'] ?><br />
<? } ?>
Stron: <? echo $row['stron'] ?>.<br />Format: <? echo $row['format'] ?>.<br />Oprawa: <? echo $row['oprawa'] ?>.</p><p><font size="2"><strong>Ksi±¿ka wkr&oacute;tce dostêpna m.in. w sieci Empik oraz na stronie <a href="http://www.empik.com/" target="_blank" title="Empik">www.empik.com</a>.</strong></font></p></p>
<div class="downSection">				          
<a href="publikacje2.php?fid=<? echo $row['id'] ?>" class="more"></a>
</div>
</div>
</div>

<?
	}
	include "php/inc/mysql_error.php";		  
	echo "<div align=center>Strona: ";
	for($i=0;$i<ceil($numrows/$ile);$i++) {
		echo '<a href="?p='.($i*$ile).'">'.($i+1).'</a> | ';
	}
	echo "</div>";
?>

