<script language="javascript" src="js/dymek.js"></script>
<div id="dymek" style="position: absolute; left: 0px; top: 0px; visibility: hidden;"></div>

<script language="javascript" type="text/javascript">
		function submitbutton() {
			var form = document.form1;
			// do field validation
			if (form.nazwa.value == "" || form.imie.value == "" || form.zgoda.value == "" || form.pelnoletnia.value == "" || form.regulamin.value == "" || form.foto1.value == "" || form.email.value == "") {
				alert( 'Wszystkie pola formularza nalezy wypelnic i dodac conajmniej jedno zdjecie.' );
				return false;
			}
			return true;
		}
		</script>
<?
// Make the connect to MySQL or die
// and display an error.
$link = mysql_connect($server, $db_user, $db_pass);
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
// Select your database
mysql_select_db ($db_name); 

// Make sure the user actually 
// selected and uploaded a file
//if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) { 
if (isset($_REQUEST['edit'])) {

      // Create the query and insert
      // into our database.
      $query = "UPDATE user SET ";
	  $query .= "imie='".$imie."',";
	  $query .= "data_edycja='".$data_dodania."',";
	  $query .= "nazwisko='".$nazwisko."',";
	  $query .= "email='".$email."',";
	  $query .= "nr_konta='".$numer_konta."'";
	  $query .= " WHERE userID='".$id."'";
	  //echo $query;
	  //exit;
	  $results = mysql_query($query) or die("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $query . "<br />\nError: (" . mysql_errno() . ") " . mysql_error());
	  //$results = mysql_query($query);	  
      
      // Print results
      print "Poprawnie wyedytowano wpis do bazy.";
	  //header( 'Location: ?pg=1' ) ;
      
}else{
	include "php/inc/mysql_error.php";
}

?>  
		<?
       		$query = "SELECT * FROM user WHERE userID=$id";
			$res = mysql_query($query) or die("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $query . "<br />\nError: (" . mysql_errno() . ") " . mysql_error());
			while($atr = mysql_fetch_assoc($res)){
		?>

<form enctype="multipart/form-data" action="?pg=10&edit" method="post" onSubmit="return submitbutton();" name="form1">
   <table width="900" border="0" align="center" cellpadding="2" cellspacing="2">
     <tr>
       <td align="right">&nbsp;</td>
       <td>&nbsp;</td>
     </tr>
     <tr>
       <td colspan="2" bgcolor="#f4f4f4" class="tytul">EDYCJA AUTORA</td>
     </tr>
     <tr>
    <td width="250" align="right" bgcolor="#e8e8e8"><label>Imie:</label></td>
    <td bgcolor="#e8e8e8"><input name="imie" type="text" id="imie" value='<?php echo $atr['imie'];?>' /></td>
  </tr>
     <tr>
       <td width="250" align="right" bgcolor="#e8e8e8">Nazwisko:</td>
       <td bgcolor="#e8e8e8"><input name="nazwisko" type="text" id="nazwisko" value='<?php echo $atr['nazwisko'];?>' /></td>
     </tr>
     <tr>
       <td width="250" align="right" bgcolor="#e8e8e8">Email:</td>
       <td bgcolor="#e8e8e8"><input name="email" type="text" id="email" value='<?php echo $atr['email'];?>' /></td>
     </tr>
     <tr>
       <td width="250" align="right" bgcolor="#e8e8e8">Numer konta bankowego:</td>
       <td bgcolor="#e8e8e8"><input name="numer_konta" type="text" id="numer_konta" value='<?php echo $atr['numer_konta'];?>' /></td>
     </tr>
  <tr>
    <td colspan="2" align="center">
      <input name="id" value="<? echo $id ?>" type="hidden">
      <input value="Edytuj autora" type="submit" /></td>
  </tr>
   </table>


</form>
<?
}
// Close our MySQL Link
mysql_close($link);
?>