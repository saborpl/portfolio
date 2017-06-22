<?
if(!($db = @mysql_connect($server, $db_user, $db_pass))) //connect to database
	die("Couldn't connect to the database.");
	mysql_query("SET NAMES latin2");
		
if(!@mysql_select_db($db_name, $db)) //select database
	die("Database doesn't exist!");
?>