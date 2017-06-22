<?
	$query = "SELECT * FROM ksiazki LIMIT 0,15";
	$res = mysql_query($query) or die("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $query . "<br />\nError: (" . mysql_errno() . ") " . mysql_error());
	$ksiazki = array();
	while($row = mysql_fetch_assoc($res)){
?>
		<li><a href="publikacje2.php?fid=<? echo $row['id'] ?>"><? echo $row['nazwa']; ?></a></li>
<?
	}

?>