<?
if (isset($_GET['edit'])) {
	//execution when completed the edit user form and pressed submit button ---------------------
	if (isset($_POST['editUser'])) {
		//validate data ------------------------------------------------------------------------
		//check empty fields
		$notRequired = array("password","password2"); //passwords won't be checked, as they are not required
		foreach ($_POST as $k=>$v) {
			if ($v == "" && !in_array($k,$notRequired)) {
				$error[$k] = "<strong>To pole jest puste</strong>";
			}
		}
		//escape string
		$username = mysql_real_escape_string($_POST['username']);
		$nr_konta = mysql_real_escape_string($_POST['nr_konta']);
		$email = mysql_real_escape_string($_POST['email']);
		
		//check email validation, the function is available at config.php
		if (!check_email($_POST['email'])) {
			$error['email'] .= " <strong>Niepoprawny adres email!</strong>";
		}
		//check email exists in database
		$res = mysql_query("SELECT email FROM user WHERE email='".$email."' AND userID != '".$_SESSION['auth_userID']."'");
		if (mysql_num_rows($res) == 1) {
			$error['email'] .= " <strong>Adres email istnieje w bazie!</strong>";
		}
		//check nr konta exists in database
		$res = mysql_query("SELECT email FROM user WHERE nr_konta='".$nr_konta."' AND userID != '".$_SESSION['auth_userID']."'");
		if (mysql_num_rows($res) == 1) {
			$error['nr_konta'] .= " <strong>Numer konta istnieje w bazie!</strong>";
		}
		//check username exists in database
		$res = mysql_query("SELECT username FROM user WHERE username='".$username."' AND username != '".$username."'");
		if (mysql_num_rows($res) == 1) {
			$error['username'] .= " <strong>Użytkownik istnieje w bazie!</strong>";
		}
		
		//end validate data ---------------------------------------------------------------------
		
		//save to database when no errors are detected ------------------------------------------
		if (count($error) == 0) {
			$query = "UPDATE user SET username='".$username."', email='".$email."', nr_konta='".$nr_konta."'";
			$query .= " WHERE userID='".$_SESSION['auth_userID']."'";
			$_SESSION['auth_username'] = $username; //update username in case it's changed.
			//echo $query;
			//exit;
			if (mysql_query($query)) {
				echo "<p><strong>Twoje konto zostało zmodyfikowane i zapisane do bazy.</strong></p>";
			} else {
				echo "<p><strong>Twoje konto NIE zostało zmodyfikowane i dodane do bazy. ".mysql_error()."</strong></p>";
			}
		}
	}
	//get user from the database and put data into $_POST variables.
	$rs = mysql_query("SELECT username, email, nr_konta FROM user WHERE userID = ".$_SESSION['auth_userID']." AND active='1'");
	if (mysql_num_rows($rs) == 0) {
		die("User does not exists!");
	}
	$row = mysql_fetch_assoc($rs);
	$_POST['username'] = $row['username'];
	$_POST['email'] = $row['email'];
	$_POST['nr_konta'] = $row['nr_konta'];
	?>

	<form action="?edit&pg=6" method="post">
   <table width="500" border="0" align="center" cellpadding="2" cellspacing="2">
     <tr>
       <td align="right">&nbsp;</td>
       <td>&nbsp;</td>
     </tr>
     <tr>
       <td colspan="2" bgcolor="#f4f4f4" class="tytul">ZMIANA DANYCH</td>
     </tr>
     <tr>
    <td align="right" bgcolor="#e8e8e8"><label>Autor:</label></td>
    <td bgcolor="#e8e8e8"><input type="text" name="username" readonly="readonly" value='<?php echo $_POST['username'];?>' />
      <?php echo(isset($error['username']))?$error['username']:"";?> <span class="info1">* zmiana zablokowana</span></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#e8e8e8"><label>Email:</label></td>
    <td bgcolor="#e8e8e8"><input type="text" name="email" value='<?php echo $_POST['email'];?>' />
      <?php echo(isset($error['email']))?$error['email']:"";?></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#e8e8e8">Numer konta:</td>
    <td bgcolor="#e8e8e8">
	<input type="text" name="nr_konta" value='<?php echo $_POST['nr_konta'];?>' />
	<?php echo(isset($error['nr_konta']))?$error['nr_konta']:"";?></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type='submit' name='editUser' value='Edytuj dane' /></td>
  </tr>
   </table>
</form>
	<?php
}
?>