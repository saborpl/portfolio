<?php
session_start();
include "../configs/db.php";
include "../configs/login.php";
?>
<!--
Copyright 2010 YCScripts
This script has been developed by Yanling Chin owner of YCScripts.
This file is part of the Usermanagement System script.

Usermanagement System is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

Usermanagement System is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Usermanagement System.  If not, see <http://www.gnu.org/licenses/>.
-->
<h1>Index</h1>
<a href='index.php'>Index</a> | <a href='index.php?register'>Register</a> | <a href='index.php?edit'>Edit</a> | 
<a href='admin.php'>Admin</a>
<?php
if (isset($_GET['register'])) {
	//execution when completed the add user form and pressed submit button ---------------------
	if (isset($_POST['register'])) {
		//validate data ------------------------------------------------------------------------
		//check empty fields
		foreach ($_POST as $k=>$v) {
			if ($v == "") {
				$error[$k] = "<strong>This field is empty</strong>";
			}
		}
		//escape string
		$username = mysql_real_escape_string($_POST['username']);
		$password = mysql_real_escape_string($_POST['password']);
		$password2 = mysql_real_escape_string($_POST['password2']);
		$email = mysql_real_escape_string($_POST['email']);
		
		//check email validation, the function is available at config.php
		if (!check_email($_POST['email'])) {
			$error['email'] .= " <strong>Email is not valid!</strong>";
		}
		//check email exists in database
		$res = mysql_query("SELECT email FROM user WHERE email='".$email."'");
		if (mysql_num_rows($res) == 1) {
			$error['email'] .= " <strong>Email already existst in database!</strong>";
		}
		
		//check username exists in database
		$res = mysql_query("SELECT username FROM user WHERE username='".$username."'");
		if (mysql_num_rows($res) == 1) {
			$error['username'] .= " <strong>Username already existst in database!</strong>";
		}
		
		//check both passwords are the same
		if ($password != $password2) {
			$error['password'] .= " <strong>Passwords do not match!</strong>";
		}
		//check captcha
		 $aCaptcha = array (
            array(),
            array('crocodile'),
            array('panda', 'panda bear', 'giant panda'),
            array('pig'),
            array('tiger'),
            array('zebra'),
            array('cow'),
            array('elephant')
        );
        if (!in_array(strtolower($_POST['captcha']), $aCaptcha[$_SESSION['captcha']])) {
            $error['captcha'] .= "<strong>The name of the animal is not correct.</strong>";
        }
		//end validate data ---------------------------------------------------------------------
		
		//save to database when no errors are detected ------------------------------------------
		if (count($error) == 0) {
			$salt = rand(100,999);
			$password = sha1(sha1($password).sha1($salt));
			$query = "INSERT INTO user SET username='".$username."', email='".$email."', password='".$password."', salt='".$salt."', ".
			"`registration-date`='".date('Y-m-d H:i:s')."', active='1', admin='0'";
			if (mysql_query($query)) {
				echo "<p><strong>Thanks for the registration, you can now log in!</strong></p>";
				//empty fields
				foreach ($_POST as $k=>$v) {
					$_POST[$k] = "";
				}
			} else {
				echo "<strong>Something went wrong: ".mysql_error()."</strong>";
			}
		}
	}
	?>
	<form action="index.php?register" method="post">
		<p><label>*Username: </label><input type="text" name="username" value='<?php echo $_POST['username'];?>' />
		<?php echo(isset($error['username']))?$error['username']:"";?></p>
		
		<p><label>*Email: </label><input type="text" name="email" value='<?php echo $_POST['email'];?>' />
		<?php echo(isset($error['email']))?$error['email']:"";?></p>
		
		<p><label>*Password: </label><input type="password" name="password" value='<?php echo $_POST['password'];?>' />
		<?php echo(isset($error['password']))?$error['password']:"";?></p>
		
		<p><label>*Password repeat: </label><input type="password" name="password2" value='<?php echo $_POST['password2'];?>' />
		<?php echo(isset($error['password2']))?$error['password2']:"";?></p>
		
		<?php
		$_SESSION['captcha'] = rand(1, 7);
		?>	
		<p><label>*What animal is this? </label> <img src="<?php echo $path;?>captcha/<?php echo $_SESSION['captcha'];?>.jpg" /></p>
		<input type="text" name="captcha" value='<?php echo $_POST['captcha'];?>' /> 
		<?php echo(isset($error['captcha']))?$error['captcha']:"";?></p>
		<p><label>&nbsp;</label><input type='submit' name='register' value='register' /></p>
	</form>
	<?php
}
//execution when you have completed the login form and pressed submit button
if (isset($_POST['login'])) {
	//how a password is encrypted:
	//1. set up a salt which is a random number: $salt = rand(100,999);
	//2. encrypts the salt and password with sha1: $password = sha1(sha1("admin").sha1($salt));
	
	$username = mysql_real_escape_string($_POST['username']);
	
	//get salt to combine with the typed password, this will be needed for a SQL query to get username and password combination
	$res = mysql_query("SELECT salt FROM user WHERE username = '".$username."'");
	$salt = mysql_fetch_assoc($res);
	$password = mysql_real_escape_string($_POST['password']);
	$password = sha1(sha1($password).sha1($salt['salt']));
	
	//check if username and password combination is matching
	$result = mysql_query("SELECT username,userID FROM `user` WHERE `username` = '".$username."' AND password = '".$password."' AND active=1");
	
	//if username and password matches put in authentication session for later use
	if (mysql_num_rows($result) == 1) {
		$row = mysql_fetch_assoc($result);
		$_SESSION['auth_userID'] = $row['userID'];
		$_SESSION['auth_username'] = $username;
	} else {
		?><p><strong>Wrong username/password combination! You don't have access.</strong></p><?php 
	}
}
//show login form when not logged in
if (!isset($_SESSION['auth_userID'])) {
	if (!isset($_GET['register'])) { //to register no need to be logged in
		?>
		<form action="index.php" method="post">
			<p><label>Username: </label><input type="text" name="username" /></p>
			<p><label>Password: </label><input type="password" name="password" /></p>
			<input type='submit' name='login' value='log in' />
		</form>
		<?php
	}
	die();
}
?><p><strong>You are now logged in as: <?php echo $_SESSION['auth_username'];?></strong> <a href='index.php?logout'>Log out</a></p>
<?php
if (isset($_GET['logout'])) {
	unset($_SESSION['auth_userID']);
	unset($_SESSION['auth_username']);
	echo "You are logged out now!";
}
if (isset($_GET['edit'])) {
	//execution when completed the edit user form and pressed submit button ---------------------
	if (isset($_POST['editUser'])) {
		//validate data ------------------------------------------------------------------------
		//check empty fields
		$notRequired = array("password","password2"); //passwords won't be checked, as they are not required
		foreach ($_POST as $k=>$v) {
			if ($v == "" && !in_array($k,$notRequired)) {
				$error[$k] = "<strong>This field is empty</strong>";
			}
		}
		//escape string
		$username = mysql_real_escape_string($_POST['username']);
		$password = mysql_real_escape_string($_POST['password']);
		$password2 = mysql_real_escape_string($_POST['password2']);
		$oldPassword = mysql_real_escape_string($_POST['oldPassword']);
		$email = mysql_real_escape_string($_POST['email']);
		
		//check email validation, the function is available at config.php
		if (!check_email($_POST['email'])) {
			$error['email'] .= " <strong>Email is not valid!</strong>";
		}
		//check email exists in database
		$res = mysql_query("SELECT email FROM user WHERE email='".$email."' AND userID != '".$_SESSION['auth_userID']."'");
		if (mysql_num_rows($res) == 1) {
			$error['email'] .= " <strong>Email already existst in database!</strong>";
		}
		//check username exists in database
		$res = mysql_query("SELECT username FROM user WHERE username='".$username."' AND username != '".$username."'");
		if (mysql_num_rows($res) == 1) {
			$error['username'] .= " <strong>Username already existst in database!</strong>";
		}
		//check both passwords are the same when password fields are not empty
		if (($password != "" && $password2 != "") && ($password != $password2)) {
			$error['password'] .= " <strong>Passwords do not match!</strong>";
		}
		
		//check if you are the owner in order to have permission to edit
		$res = mysql_query("SELECT salt FROM user WHERE userID = '".$_SESSION['auth_userID']."'");
		$salt = mysql_fetch_assoc($res);
		$oldPassword = sha1(sha1($oldPassword).sha1($salt['salt']));
		$res = mysql_query("SELECT password FROM user WHERE userID='".$_SESSION['auth_userID']."' AND password = '".$oldPassword."'");
		if (mysql_num_rows($res) == 0) {
			$error['oldPassword'] .= " <strong>Password is not correct!</strong>";
		}
		//end validate data ---------------------------------------------------------------------
		
		//save to database when no errors are detected ------------------------------------------
		if (count($error) == 0) {
			$query = "UPDATE user SET username='".$username."', email='".$email."'";
			if ($password != "") {
				$salt = rand(100,999);
				$password = sha1(sha1($password).sha1($salt));
				$query .= ", password='".$password."', salt='".$salt."',";
			}
			$query .= " WHERE userID='".$_SESSION['auth_userID']."'";
			$_SESSION['auth_username'] = $username; //update username in case it's changed.
			if (mysql_query($query)) {
				echo "<p><strong>Your account has been edited and saved into the database.</strong></p>";
			} else {
				echo "<p><strong>Your account has NOT been edited and saved into the database. ".mysql_error()."</strong></p>";
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
	<form action="index.php?edit" method="post">
		<p><label>*Username:</label><input type="text" name="username" value='<?php echo $_POST['username'];?>' />
		<?php echo(isset($error['username']))?$error['username']:"";?></p>
		
		<p><label>*Email:</label><input type="text" name="email" value='<?php echo $_POST['email'];?>' />
		<?php echo(isset($error['email']))?$error['email']:"";?></p>
		
		<p><label>*Password:</label><input type="password" name="oldPassword" value='<?php echo $_POST['oldPassword'];?>' />
		<?php echo(isset($error['oldPassword']))?$error['oldPassword']:"";?></p>
		
		<p><label>New Password:</label><input type="password" name="password" value='<?php echo $_POST['password'];?>' />
		<?php echo(isset($error['password']))?$error['password']:"";?></p>
		
		<p><label>New Password repeat: </label><input type="password" name="password2" value='<?php echo $_POST['password2'];?>' />
		<?php echo(isset($error['password2']))?$error['password2']:"";?></p>
		
		<input type='submit' name='editUser' value='edit user' />
	</form>
	<?php
}
?>