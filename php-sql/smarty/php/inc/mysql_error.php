<?
if(($result = @mysql_query($sql, $db)) == 0) {
	//die("MySQL Said: " . mysql_error());
	mysql_error();
}
?>