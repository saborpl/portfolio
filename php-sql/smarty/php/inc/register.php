<?
	$checked[1] = "checked";
?>
<?php
if (isset($_GET['register'])) {
	//execution when completed the add user form and pressed submit button ---------------------
	if (isset($_POST['register'])) {
		//validate data ------------------------------------------------------------------------
		//check empty fields
		foreach ($_POST as $k=>$v) {
			if ($v == "") {
				$error[$k] = "<strong>" . EMPTY_FIELD . "</strong>";
			}
		}
		//escape string
		$imie = mysql_real_escape_string($_POST['imie']);
		$nazwisko = mysql_real_escape_string($_POST['nazwisko']);
		$username = mysql_real_escape_string($_POST['username']);
		$password = mysql_real_escape_string($_POST['password']);
		$password2 = mysql_real_escape_string($_POST['password2']);
		$email = mysql_real_escape_string($_POST['email']);
		$admin = mysql_real_escape_string($_POST['admin']);
		
		//check email validation, the function is available at config.php
		if (!check_email($_POST['email'])) {
			$error['email'] .= " <strong>Niepoprawny adres email!</strong>";
		}
		//check email exists in database
		$res = mysql_query("SELECT email FROM user WHERE email='".$email."'");
		if (mysql_num_rows($res) == 1) {
			$error['email'] .= " <strong>Podany email istnieje w bazie!</strong>";
		}
		
		//check username exists in database
		$res = mysql_query("SELECT username FROM user WHERE username='".$username."'");
		if (mysql_num_rows($res) == 1) {
			$error['username'] .= " <strong>U¿ytkownik istnieje w bazie!</strong>";
		}
		
		//check both passwords are the same
		if ($password != $password2) {
			$error['password'] .= " <strong>Has³a nie sa identyczne!</strong>";
		}
		//check captcha
		 $aCaptcha = array (
            array(),
            array('127689'),
            array('678437'),
            array('076655'),
            array('426246'),
            array('658935'),
            array('109378'),
            array('753453')
        );
        if (!in_array(strtolower($_POST['captcha']), $aCaptcha[$_SESSION['captcha']])) {
            $error['captcha'] .= "&nbsp;<strong>Numer siê nie zgadza</strong>&nbsp;";
        }
		//end validate data ---------------------------------------------------------------------
		
		//save to database when no errors are detected ------------------------------------------
		if (count($error) == 0) {
			$salt = rand(100,999);
			$password = sha1(sha1($password).sha1($salt));
			$query = "INSERT INTO user SET imie='".$imie."', nazwisko='".$nazwisko."', username='".$email."', email='".$email."', password='".$password."', admin='".$admin."', salt='".$salt."', ".
			"`data_rejestracja`='".date('Y-m-d H:i:s')."', active='1'";
			//echo $query;
			//exit;
			if (mysql_query($query)) {
				echo "<p><strong>Dziekujemy za rejestracje. Mo¿esz siê <a href=\"?pg=0\">zalogowaæ</a> do swojego konta.</strong></p>";
				//empty fields
				foreach ($_POST as $k=>$v) {
					$_POST[$k] = "";
				}
					
			} else {
				echo "<strong>Co¶ nie tak: ".mysql_error()."</strong>";
			}
			//header( 'Location: ?pg=0' ) ;
		}
	}
	?>
    
    
	<form action="?pg=3&register" method="post">
		<table width="500" border="0" align="center" cellpadding="2" cellspacing="2">
		  <tr>
		    <td align="right">&nbsp;</td>
		    <td>&nbsp;</td>
	      </tr>
		  <tr>
		    <td colspan="2" bgcolor="#f4f4f4">REJESTRACJA KONTA AUTORA</td>
	      </tr>
		  <tr>
		    <td align="right" bgcolor="#e8e8e8">Imiê: </td>
		    <td bgcolor="#e8e8e8"><input type="text" name="imie" value='<?php echo $_POST['imie'];?>' />
            <?php echo(isset($error['imie']))?$error['imie']:"";?></td>
	      </tr>
		  <tr>
		    <td align="right" bgcolor="#e8e8e8">Nazwisko:</td>
		    <td bgcolor="#e8e8e8"><label> </label>
		      <input type="text" name="nazwisko" value='<?php echo $_POST['nazwisko'];?>' />
            <?php echo(isset($error['nazwisko']))?$error['nazwisko']:"";?></td>
	      </tr>
		  <tr>
		    <td align="right" bgcolor="#e8e8e8">Email:</td>
		    <td bgcolor="#e8e8e8"><input type="text" name="email" value='<?php echo $_POST['email'];?>' />
            <?php echo(isset($error['email']))?$error['email']:"";?></td>
	      </tr>
		  <tr>
		    <td align="right" bgcolor="#e8e8e8">Has³o:</td>
		    <td bgcolor="#e8e8e8"><label> </label>
		      <input type="password" name="password" value='<?php echo $_POST['password'];?>' />
            <?php echo(isset($error['password']))?$error['password']:"";?></td>
	      </tr>
		  <tr>
		    <td align="right" bgcolor="#e8e8e8">Powt&oacute;rz has³o:</td>
		    <td bgcolor="#e8e8e8"><label> </label>
		      <input type="password" name="password2" value='<?php echo $_POST['password2'];?>' />
            <?php echo(isset($error['password2']))?$error['password2']:"";?></td>
	      </tr>
		  <tr>
		    <td align="right" bgcolor="#e8e8e8">Funkcja administratora:</td>
		    <td bgcolor="#e8e8e8"><input name="admin" type="checkbox" value="1" /></td>
	      </tr>
		  <tr>
		    <td align="right" bgcolor="#e8e8e8"><?php
		$_SESSION['captcha'] = rand(1, 7);
		?>
	        Przepisz podany numer:<br /><img src="php/images/captcha/<?php echo $_SESSION['captcha'];?>.jpg" /></td>
		    <td bgcolor="#e8e8e8"><input type="text" name="captcha" value='<?php echo $_POST['captcha'];?>' />
              <?php echo(isset($error['captcha']))?$error['captcha']:"";?>
            </p></td>
	      </tr>
		  <tr>
		    <td colspan="2" align="center"><input type='submit' name='register' value='Rejestruj konto' /></td>
	      </tr>
	  </table>
	<?php
}
?>
