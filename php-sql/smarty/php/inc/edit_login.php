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
		$password = mysql_real_escape_string($_POST['password']);
		$password2 = mysql_real_escape_string($_POST['password2']);
		$oldPassword = mysql_real_escape_string($_POST['oldPassword']);
		$username = mysql_real_escape_string($_POST['username']);
		$nr_konta = mysql_real_escape_string($_POST['nr_konta']);
		$email = mysql_real_escape_string($_POST['email']);
		
		
		//check email validation, the function is available at config.php
		//if (!check_email($_POST['email'])) {
		//	$error['email'] .= " <strong>Niepoprawny adres email!</strong>";
		//}
		//check email exists in database
		$res = mysql_query("SELECT email FROM user WHERE email='".$email."' AND userID != '".$_SESSION['auth_userID']."'");
		if (mysql_num_rows($res) == 1) {
			$error['email'] .= " <strong>Adres email istnieje w bazie!</strong>";
		}
		//check username exists in database
		$res = mysql_query("SELECT username FROM user WHERE username='".$username."' AND username != '".$username."'");
		if (mysql_num_rows($res) == 1) {
			$error['username'] .= " <strong>Użytkownik istnieje w bazie!</strong>";
		}
		//check both passwords are the same when password fields are not empty
		if (($password != "" && $password2 != "") && ($password != $password2)) {
			$error['password'] .= " <strong>Hasła nie są takie same!</strong>";
		}
		
		//check if you are the owner in order to have permission to edit
		$res = mysql_query("SELECT salt FROM user WHERE userID = '".$_SESSION['auth_userID']."'");
		$salt = mysql_fetch_assoc($res);
		$oldPassword = sha1(sha1($oldPassword).sha1($salt['salt']));
		$res = mysql_query("SELECT password FROM user WHERE userID='".$_SESSION['auth_userID']."' AND password = '".$oldPassword."'");
		if (mysql_num_rows($res) == 0) {
			$error['oldPassword'] .= " <strong>Hasło nieprawidłowe!</strong>";																																																																																																																																																																																																																																																																																																																																																																																																												
		}
		//end validate data ---------------------------------------------------------------------
		//save to database when no errors are detected ------------------------------------------
									//echo count($error);
									
									//exit;

		if (count($error) == 0) {
			//echo "<pre>". print_r($_SESSION) ."</pre>";
			$username = $_SESSION['auth_username'];
			//echo $username;
			//exit;
			$query = "UPDATE user SET username='".$username."'";
			if ($password != "") {
				$salt = rand(100,999);
				$password = sha1(sha1($password).sha1($salt));
				$query .= ", password='".$password."', salt='".$salt."'";
			}
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
	$rs = mysql_query("SELECT username, email FROM user WHERE userID = ".$_SESSION['auth_userID']." AND active='1'");
	if (mysql_num_rows($rs) == 0) {
		die("User does not exists!");
	}
	$row = mysql_fetch_assoc($rs);
	$_POST['username'] = $row['username'];
	$_POST['email'] = $row['email'];
	?>
	<form action="?edit&pg=5" method="post">
   <table width="500" border="0" align="center" cellpadding="2" cellspacing="2">
     <tr>
       <td align="right">&nbsp;</td>
       <td>&nbsp;</td>
     </tr>
     <tr>
       <td colspan="2" bgcolor="#f4f4f4">ZMIANA HASŁA</td>
     </tr>
  <tr>
    <td align="right" bgcolor="#e8e8e8"><label>Hasło:</label></td>
    <td bgcolor="#e8e8e8"><input type="password" name="oldPassword" value='<?php echo $_POST['oldPassword'];?>' />
      <?php echo(isset($error['oldPassword']))?$error['oldPassword']:"";?></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#e8e8e8"><label>Nowe hasło:</label></td>
    <td bgcolor="#e8e8e8"><input type="password" name="password" value='<?php echo $_POST['password'];?>' />
      <?php echo(isset($error['password']))?$error['password']:"";?></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#e8e8e8">Powtórz nowe hasło: </td>
    <td bgcolor="#e8e8e8"><input type="password" name="password2" value='<?php echo $_POST['password2'];?>' />
      <?php echo(isset($error['password2']))?$error['password2']:"";?></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type='submit' name='editUser' value='Zmień hasło' /></td>
    </tr>
   </table>
</form>
	<?php
}
?>