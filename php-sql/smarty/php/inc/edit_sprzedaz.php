<?
$link = mysql_connect($server, $db_user, $db_pass);
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db ($db_name); 

//if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) { 
if (isset($_REQUEST['edit'])) {
	$query = "SELECT id FROM ksiazki";
  	$res = mysql_query($query) or die("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $query . "<br />\nError: (" . mysql_errno() . ") " . mysql_error());
  	while ($row = mysql_fetch_array($res, MYSQL_ASSOC)) {

	  $queryA = "SELECT * FROM ksiazki WHERE id=$row[id]";
	  $resA = mysql_query($queryA) or die("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $queryA . "<br />\nError: (" . mysql_errno() . ") " . mysql_error());
		  while($atr = mysql_fetch_assoc($resA)){
			echo "$atr[ilosc_sprzedana1]<br />";

      $query = "UPDATE ksiazki SET ";
	  $query .= "data_edycja='".$data_dodania."',";
	  $query .= "uwagi='".$uwagi."',";
	  $query .= "ilosc_sprzedana1='".$ilosc_sprzedana1."',";
	  $query .= "ilosc_sprzedana2='".$ilosc_sprzedana2."',";
	  $query .= "ilosc_sprzedana3='".$ilosc_sprzedana3."',";
	  $query .= "ilosc_sprzedana4='".$ilosc_sprzedana4."',";
	  $query .= "ilosc_sprzedana5='".$ilosc_sprzedana5."',";
	  $query .= "ilosc_sprzedana6='".$ilosc_sprzedana6."',";
	  $query .= "ilosc_sprzedana7='".$ilosc_sprzedana7."',";
	  $query .= "ilosc_sprzedana8='".$ilosc_sprzedana8."',";
	  $query .= "ilosc_sprzedana9='".$ilosc_sprzedana9."',";
	  $query .= "ilosc_sprzedana10='".$ilosc_sprzedana10."',";
	  $query .= "ilosc_sprzedana11='".$ilosc_sprzedana11."',";
	  $query .= "ilosc_sprzedana12='".$ilosc_sprzedana12."'";	  
	  $query .= " WHERE id='".$row[id]."'";
      //$query .= "(okladka) VALUES ('$data')";
      //$query .= "(nazwa) VALUES ('$nazwa')";
	  echo "$query<br />";
	  //exit;
	  $results = mysql_query($query) or die("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $query . "<br />\nError: (" . mysql_errno() . ") " . mysql_error());
	  //$results = mysql_query($query);	   
	  header( 'Location: ?pg=2' ) ;
		  }
	}
      print "<br /><center><span class=\"tytul3\">Poprawnie wyedytowano wpis do bazy.</span></center>";

}else{
	include "php/inc/mysql_error.php";
}

?> 
<form enctype="multipart/form-data" action="?pg=9&edit" method="post" onSubmit="return submitbutton();" name="form1">

<?
  $query = "SELECT id FROM ksiazki";
  $res = mysql_query($query) or die("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $query . "<br />\nError: (" . mysql_errno() . ") " . mysql_error());
  while ($row = mysql_fetch_array($res, MYSQL_ASSOC)) {
  //printf("ID: %s  Name: %s", $row['id'], $row['nazwa']); 

	  $queryA = "SELECT * FROM ksiazki WHERE id=$row[id]";
	  $resA = mysql_query($queryA) or die("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $queryA . "<br />\nError: (" . mysql_errno() . ") " . mysql_error());
		  while($atr = mysql_fetch_assoc($resA)){
			//echo "$atr[id]<br />";
			include "php/inc/edit_sprzedaz_inc.php";
	  }
  }

//  exit;	
?>
 
<table>
  <tr>
    <td colspan="2" align="center">
    <input name="id" value="<? echo $id ?>" type="hidden">
	<input type="button" value=" Powrót " onclick="history.go(-1);return false;" />
	<input value="Wprowadz zmiany" type="submit" /> 
  </tr>
   </table>


</form>
<?
// Close our MySQL Link
mysql_close($link);
?>