<?
	$fid = $_REQUEST['fid'];
	$query = "SELECT * FROM ksiazki WHERE id=$fid";
	$res = mysql_query($query) or die("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $query . "<br />\nError: (" . mysql_errno() . ") " . mysql_error());
	$ksiazki = array();
	$row = mysql_fetch_assoc($res);
?>
<div id="books">
	<div class="book" >
		<? if ($row['okladka']) { ?>
			<a title="<? echo $row['nazwa'] ?>" href="image.php?fid=<? echo $fid ?>&foto=1" rel="lightbox">
			<img src="image.php?fid=<? echo $fid ?>&foto=1" border="0" width="120" height="170" vspace="5" hspace="5" />
			</a>
		<? } ?>
		<div class="desc">
			<h2><? echo $row['nazwa'] ?></h2>
			<p><? echo $row['opis'] ?></p>
            <form action="zamowienie.php" method="post">
            <input type="hidden" name="nazwa" value="<? echo $row['nazwa'] ?>" />       
<input name="" type="image" src="php/images/zamawiam.jpg" alt="zamawiam" />
</form>

		</div>
	</div>
</div>