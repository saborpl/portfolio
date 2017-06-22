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
if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) { 

		//escape string
		$nazwa = mysql_real_escape_string($_POST['nazwa']);
		$opis = mysql_real_escape_string($_POST['opis']);
		$uwagi = mysql_real_escape_string($_POST['uwagi']);

      // Temporary file name stored on the server
      $tmpName  = $_FILES['image']['tmp_name'];  
       
      // Read the file 
      $fp      = fopen($tmpName, 'r');
      $data = fread($fp, filesize($tmpName));
      $data = addslashes($data);
	  //$data = mysql_real_escape_string($_POST['data']);
      fclose($fp);
      

      // Create the query and insert
      // into our database.
      $query = "INSERT INTO ksiazki SET ";
	  $query .= "nazwa='".$nazwa."',";
	  $query .= "data_dodania='".$data_dodania."',";
	  $query .= "id_autora='".$id_autora."',";
	  $query .= "stron='".$stron."',";
	  $query .= "format='".$format."',";
	  $query .= "oprawa='".$oprawa."',";
	  $query .= "opis='".$opis."',";
	  $query .= "uwagi='".$uwagi."',";
	  $query .= "okladka='".$data."'";
      //$query .= "(okladka) VALUES ('$data')";
      //$query .= "(nazwa) VALUES ('$nazwa')";
	  //echo $query;
	  //exit;
	  $res = mysql_query($query) or die("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $query . "<br />\nError: (" . mysql_errno() . ") " . mysql_error());
      //$results = mysql_query($query, $link);
      
      // Print results
      print "Dodano poprawnie wpis do bazy.";
	  header( 'Location: ?pg=2' ) ;
      
}else{
	include "php/inc/mysql_error.php";
	//die("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $query . "<br />\nError: (" . mysql_errno() . ") " . mysql_error());	
}

?>  

<form enctype="multipart/form-data" action="?pg=7" method="post" onSubmit="return submitbutton();" name="form1">
   <table width="900" border="0" align="center" cellpadding="2" cellspacing="2">
     <tr>
       <td align="right">&nbsp;</td>
       <td>&nbsp;</td>
     </tr>
     <tr>
       <td colspan="2" bgcolor="#f4f4f4" class="tytul">DODAWANIE KSI¡¯KI</td>
     </tr>
     <tr>
    <td width="250" align="right" bgcolor="#e8e8e8"><label>Tytu³:</label></td>
    <td bgcolor="#e8e8e8"><input type="text" name="nazwa" value='<?php echo $_POST['nazwa'];?>' /></td>
  </tr>
     <tr>
       <td width="250" align="right" bgcolor="#e8e8e8">Autor:</td>
       <td bgcolor="#e8e8e8">
        <select name="id_autora" size="1">
		<?
       		$res = mysql_query("SELECT userID,username FROM user WHERE admin !='1'");			  
			while($atr = mysql_fetch_assoc($res)){
				$id_autora = $atr['userID'];
		?>
          <option value="<?php echo $id_autora ?>"><? echo $atr['username'] ?></option>
		<?
			}
		?>
        </select>
       </td>
     </tr>
     <tr>
       <td width="250" align="right" bgcolor="#e8e8e8">Ilo¶æ stron:</td>
       <td bgcolor="#e8e8e8"><input name="stron" type="text" id="stron" value='<?php echo $_POST['stron'];?>' /></td>
     </tr>
     <tr>
       <td width="250" align="right" bgcolor="#e8e8e8">Format:</td>
       <td bgcolor="#e8e8e8"><input name="format" type="text" id="format" value='<?php echo $_POST['format'];?>' /></td>
     </tr>
     <tr>
       <td width="250" align="right" bgcolor="#e8e8e8">Oprawa:</td>
       <td bgcolor="#e8e8e8"><select name="oprawa" id="oprawa">
         <option value="twarda">Twarda</option>
         <option value="Miêkka">Miêkka</option>
       </select></td>
     </tr>
     <tr>
       <td width="250" align="right" bgcolor="#e8e8e8">Opis:</td>
       <td bgcolor="#e8e8e8"><textarea name="opis" cols="50" rows="5" id="opis"><?php echo $_POST['opis'];?></textarea></td>
     </tr>
     <tr>
       <td width="250" align="right" bgcolor="#e8e8e8">Uwagi:</td>
       <td bgcolor="#e8e8e8"><textarea name="uwagi" cols="50" rows="2" id="uwagi"><?php echo $_POST['uwagi'];?></textarea></td>
     </tr>
     <tr>
       <td width="250" align="right" bgcolor="#e8e8e8">Ok³adka:</td>
       <td bgcolor="#e8e8e8"><input name="image" accept="image/jpeg" type="file" /></td>
     </tr>
  <tr>
    <td colspan="2" align="center">
    <input name="id_autora" value="<? echo $id_autora ?>" type="hidden">
    <input name="MAX_FILE_SIZE" value="10240000000" type="hidden">
	<input type="button" value=" Powrót " onclick="history.go(-1);return false;" />
	<input value="Dodaj ksi±¿kê" type="submit" /> 
    <input name="Reset" type="reset" value="Wyczy¶æ" /></td>
  </tr>
   </table>

</form>
<?
// Close our MySQL Link
mysql_close($link);
?>