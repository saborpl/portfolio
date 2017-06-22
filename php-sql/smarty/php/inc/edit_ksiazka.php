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
		//escape string
		//$nazwa = mysql_real_escape_string($_POST['nazwa']);
		//$opis = mysql_real_escape_string($_POST['opis']);
		//$uwagi = mysql_real_escape_string($_POST['uwagi']);

if ($_FILES['image']) { 
      // Temporary file name stored on the server
      $tmpName  = $_FILES['image']['tmp_name'];  
       
      // Read the file 
      if ($tmpName) {
	  $fp      = fopen($tmpName, 'r');
      $data = fread($fp, filesize($tmpName));
      $data = addslashes($data);
	  //$data = mysql_real_escape_string($_POST['data']);
      fclose($fp);
	  }
      // Create the query and insert
      // into our database.
      $query = "UPDATE ksiazki SET ";
	  $query .= "nazwa='".$nazwa."',";
	  $query .= "data_edycja='".$data_dodania."',";
	  $query .= "id_autora='".$id_autora."',";
	  $query .= "stron='".$stron."',";
	  $query .= "format='".$format."',";
	  $query .= "oprawa='".$oprawa."',";
	  $query .= "opis='".$opis."',";
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
	  
		if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
	  		$query .= ", okladka='".$data."'";
	  	}
	  
	  $query .= " WHERE id='".$id."'";
      //$query .= "(okladka) VALUES ('$data')";
      //$query .= "(nazwa) VALUES ('$nazwa')";
	  //echo $query;
	  //exit;
	  $results = mysql_query($query) or die("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $query . "<br />\nError: (" . mysql_errno() . ") " . mysql_error());
	  //$results = mysql_query($query);
}
	  
      
      // Print results
      print "Poprawnie wyedytowano wpis do bazy.";
	  header( 'Location: ?pg=2' ) ;
      
}else{
	include "php/inc/mysql_error.php";
}

?>  
		<?
       		$query = "SELECT * FROM ksiazki WHERE id=$id";
			$res = mysql_query($query) or die("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $query . "<br />\nError: (" . mysql_errno() . ") " . mysql_error());
			while($atr = mysql_fetch_assoc($res)){
		?>

<form enctype="multipart/form-data" action="?pg=8&edit" method="post" onSubmit="return submitbutton();" name="form1">
   <table width="900" border="0" align="center" cellpadding="2" cellspacing="2">
     <tr>
       <td align="right">&nbsp;</td>
       <td>&nbsp;</td>
     </tr>
     <tr>
       <td colspan="2" bgcolor="#f4f4f4" class="tytul">EDYCJA KSI¡¯KI</td>
     </tr>
     <tr>
    <td width="250" align="right" bgcolor="#e8e8e8"><label>Tytu³:</label></td>
    <td bgcolor="#e8e8e8"><input type="text" name="nazwa" value='<?php echo $atr['nazwa'];?>' /></td>
  </tr>
     <tr>
       <td width="250" align="right" bgcolor="#e8e8e8">Autor:</td>
       <td bgcolor="#e8e8e8">
        <select name="id_autora" size="1">
		<?
       		$res = mysql_query("SELECT userID,username FROM user WHERE admin !='1' AND userID=$atr[id_autora]");		  
			while($atra = mysql_fetch_assoc($res)){
		?>
          <option value="<?php echo $atra['userID'] ?>"><? echo $atra['username'] ?></option>
		<?
			}
       		$res = mysql_query("SELECT userID,username FROM user WHERE admin !='1'");		  
			while($atra = mysql_fetch_assoc($res)){
		?>
          <option value="0">Brak autora</option>
          <option value="<?php echo $atra['userID'] ?>"><? echo $atra['username'] ?></option>
		<?
			}
		?>
        </select>
       </td>
     </tr>
     <tr>
       <td width="250" align="right" bgcolor="#e8e8e8">Ilo¶æ stron:</td>
       <td bgcolor="#e8e8e8"><input name="stron" type="text" id="stron" value='<?php echo $atr['stron'];?>' /></td>
     </tr>
     <tr>
       <td width="250" align="right" bgcolor="#e8e8e8">Format:</td>
       <td bgcolor="#e8e8e8"><input name="format" type="text" id="format" value='<?php echo $atr['format'];?>' /></td>
     </tr>
     <tr>
       <td width="250" align="right" bgcolor="#e8e8e8">Oprawa:</td>
       <td bgcolor="#e8e8e8"><select name="oprawa" id="oprawa">
         <option value="<? echo $atr['oprawa'] ?>" selected="selected"><? echo $atr['oprawa'] ?></option>
         <option value="twarda">Twarda</option>
         <option value="Miekka">Miêkka</option>
       </select></td>
     </tr>
     <tr>
       <td width="250" align="right" bgcolor="#e8e8e8">Opis:</td>
       <td bgcolor="#e8e8e8"><textarea name="opis" cols="50" rows="5" id="opis"><?php echo $atr['opis'];?></textarea></td>
     </tr>
     <tr>
       <td width="250" align="right" bgcolor="#e8e8e8">Uwagi:</td>
       <td bgcolor="#e8e8e8"><textarea name="uwagi" cols="50" rows="2" id="uwagi"><?php echo $atr['uwagi'];?></textarea></td>
     </tr>
     <tr>
       <td width="250" align="right" bgcolor="#e8e8e8">Ok³adka:</td>
       <td bgcolor="#e8e8e8"><input name="image" accept="image/jpeg" type="file" />
       		<? if ($atr[okladka]) { ?><a href="#" onmouseover="dymekKom('<img src=image.php?fid=<? echo $atr[id] ?>&foto=1 border=0 width=120 height=170 vspace=5 hspace=5 />')" onmousemove="dymekLinkPrzesun();" onmouseout="dymekZamknij();"><img src="php/images/lupa.png" border="0" /></a>
			<? } ?>
       </td>
     </tr>
     <tr>
       <td align="right" bgcolor="#e8e8e8">Sprzeda¿</td>
       <td bgcolor="#e8e8e8"><table border="0" cellspacing="2" cellpadding="2">
         <tr>
           <td align="center">01</td>
           <td align="center">02</td>
           <td align="center">03</td>
           <td align="center">04</td>
           <td align="center">05</td>
           <td align="center">06</td>
           <td align="center">07</td>
           <td align="center">08</td>
           <td align="center">09</td>
           <td align="center">10</td>
           <td align="center">11</td>
           <td align="center">12</td>
           <!--<td align="center">razem</td>-->
         </tr>
         <tr>
           <td align="center"><input name="ilosc_sprzedana1" type="text" size="5" maxlength="5" value="<? echo $atr['ilosc_sprzedana1'] ?>" /></td>
           <td align="center"><input name="ilosc_sprzedana2" type="text" size="5" maxlength="5" value="<? echo $atr['ilosc_sprzedana2'] ?>" /></td>
           <td align="center"><input name="ilosc_sprzedana3" type="text" size="5" maxlength="5" value="<? echo $atr['ilosc_sprzedana3'] ?>" /></td>
           <td align="center"><input name="ilosc_sprzedana4" type="text" size="5" maxlength="5" value="<? echo $atr['ilosc_sprzedana4'] ?>" /></td>
           <td align="center"><input name="ilosc_sprzedana5" type="text" size="5" maxlength="5" value="<? echo $atr['ilosc_sprzedana5'] ?>" /></td>
           <td align="center"><input name="ilosc_sprzedana6" type="text" size="5" maxlength="5" value="<? echo $atr['ilosc_sprzedana6'] ?>" /></td>
           <td align="center"><input name="ilosc_sprzedana7" type="text" size="5" maxlength="5" value="<? echo $atr['ilosc_sprzedana7'] ?>" /></td>
           <td align="center"><input name="ilosc_sprzedana8" type="text" size="5" maxlength="5" value="<? echo $atr['ilosc_sprzedana8'] ?>" /></td>
           <td align="center"><input name="ilosc_sprzedana9" type="text" size="5" maxlength="5" value="<? echo $atr['ilosc_sprzedana9'] ?>" /></td>
           <td align="center"><input name="ilosc_sprzedana10" type="text" size="5" maxlength="5" value="<? echo $atr['ilosc_sprzedana10'] ?>" /></td>
           <td align="center"><input name="ilosc_sprzedana11" type="text" size="5" maxlength="5" value="<? echo $atr['ilosc_sprzedana11'] ?>" /></td>
           <td align="center"><input name="ilosc_sprzedana12" type="text" size="5" maxlength="5" value="<? echo $atr['ilosc_sprzedana12'] ?>" /></td>
          <!-- <td align="center"><input name="ilosc_sprzedana" type="text" size="10" maxlength="10" value="razem" /></td>-->
         </tr>
       </table></td>
     </tr>
  <tr>
    <td colspan="2" align="center">
    <input name="id" value="<? echo $id ?>" type="hidden">
    <input name="MAX_FILE_SIZE" value="10240000000" type="hidden">
	<input type="button" value=" Powrót " onclick="history.go(-1);return false;" />
	<input value="Edytuj ksi±¿kê" type="submit" /> 
    <input name="Reset" type="reset" value="Wyczy¶æ" /></td>
  </tr>
   </table>


</form>
<?
}
// Close our MySQL Link
mysql_close($link);
?>