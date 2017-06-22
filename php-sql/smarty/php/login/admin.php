<?php
session_start();
include "config.php";
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
<h1>Admin</h1>
<a href='index.php'>Index</a> | <a href='admin.php?add'>Add user</a> | <a href='admin.php?viewUsers'>View users</a> (including edit and delete 
users)
<?php
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
	$result = mysql_query("SELECT userID FROM `user` WHERE `username` = '".$username."' AND password = '".$password."' AND admin=1".
	" AND active=1");
	
	//if username and password matches put userID in authentication session for later use
	if (mysql_num_rows($result) == 1) {
		$row = mysql_fetch_assoc($result);
		$_SESSION['auth_admin_userID'] = $row['userID'];
		$_SESSION['auth_admin_username'] = $username;
	} else {
		?><p><strong>Wrong username/password combination! You don't have access to the admin part.</strong></p><?php 
	}
}
//show login form when not logged in
if (!isset($_SESSION['auth_admin_userID'])) {
	?>
	<p><b>Default login values:</b><br />
	Username: admin<br />
	Password: admin</p>
	<form action="admin.php" method="post">
		<p><label>Username: </label><input type="text" name="username" /></p>
		<p><label>Password: </label><input type="password" name="password" /></p>
		<input type='submit' name='login' value='log in' />
	</form>
	<?php
	die();
}
?><p><strong>You are now logged in as: <?php echo $_SESSION['auth_admin_username'];?></strong> <a href='admin.php?logout'>Log out</a></p>
<?php
if (isset($_GET['logout'])) {
	unset($_SESSION['auth_admin_userID']);
	unset($_SESSION['auth_admin_username']);
	echo "You are logged out now!";
}
//action: add user -----------------------------------------------------------------------------
if (isset($_GET['add'])) {
	?><h2>Add user</h2><?php
	//execution when completed the add user form and pressed submit button ---------------------
	if (isset($_POST['addUser'])) {
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
		if (isset($_POST['admin'])) $admin = "1";
		else $admin = "0";
		
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
		//end validate data ---------------------------------------------------------------------
		
		//save to database when no errors are detected ------------------------------------------
		if (count($error) == 0) {
			$salt = rand(100,999);
			$password = sha1(sha1($password).sha1($salt));
			$query = "INSERT INTO user SET username='".$username."', email='".$email."', password='".$password."', salt='".$salt."', ".
			"`registration-date`='".date('Y-m-d H:i:s')."', active='1', admin='".$admin."'";
			if (mysql_query($query)) {
				echo "<strong>User has been added to the database.</strong>";
				//empty fields
				foreach ($_POST as $k=>$v) {
					$_POST[$k] = "";
				}
			} else {
				echo "<strong>User has NOT been added to the database. ".mysql_error()."</strong>";
			}
		}
	}
	?>
	<form action="admin.php?add" method="post">
		<p><label>*Username:</label><input type="text" name="username" value='<?php echo $_POST['username'];?>' />
		<?php echo(isset($error['username']))?$error['username']:"";?></p>
		
		<p><label>*Email:</label><input type="text" name="email" value='<?php echo $_POST['email'];?>' />
		<?php echo(isset($error['email']))?$error['email']:"";?></p>
		
		<p><label>*Password:</label><input type="password" name="password" value='<?php echo $_POST['password'];?>' />
		<?php echo(isset($error['password']))?$error['password']:"";?></p>
		
		<p><label>*Password repeat: </label><input type="password" name="password2" value='<?php echo $_POST['password2'];?>' />
		<?php echo(isset($error['password2']))?$error['password2']:"";?></p>
		
		<p><label>Admin: </label><input type="checkbox" name="admin" value='<?php echo(isset($_POST['admin']))?"checked='checked'":"";?>' /></p>
		<input type='submit' name='addUser' value='add user' />
	</form>
	<?php
}
//action: view users -----------------------------------------------------------------------------
if (isset($_GET['viewUsers'])) {
	//get all active users
	$query = "SELECT userID, username, email, `registration-date`, admin FROM user WHERE active=1";
	$rs = mysql_query($query);
	?>
	<table border='1'>
		<tr><th>Action</th><th>Username</th><th>Email</th><th>Registration Date</th><th>admin</th></tr>
		<?php
		//show the users
		while ($row = mysql_fetch_assoc($rs)) {
			?>
			<tr>
				<td><a href='admin.php?edit&amp;id=<?php echo $row['userID'];?>'>Edit</a>, 
				<a href='admin.php?delete&amp;id=<?php echo $row['userID'];?>'>Delete</a></td>
				<td><?php echo $row['username'];?></td>
				<td><?php echo $row['email'];?></td>
				<td><?php echo $row['registration-date'];?></td>
				<td><?php echo ($row['admin']==1)?"yes":"no";?></td>
			</tr>
			<?php
		}
		?>
	</table>
	<?php
}
//action: edit user -----------------------------------------------------------------------------
if (isset($_GET['edit']) && isset($_GET['id'])) {
	$userID = (int) $_GET['id'];
	if ($userID == 0) {
		die("Invalid ID provided.");
	}
	//execution when completed the edit user form and pressed submit button ---------------------
	if (isset($_POST['editUser'])) {
		//validate data ------------------------------------------------------------------------
		//check empty fields
		$notRequired = array("password","password2","admin"); //passwords won't be checked, as they are not required
		foreach ($_POST as $k=>$v) {
			if ($v == "" && !in_array($k,$notRequired)) {
				$error[$k] = "<strong>This field is empty</strong>";
			}
		}
		//escape string
		$username = mysql_real_escape_string($_POST['username']);
		$password = mysql_real_escape_string($_POST['password']);
		$password2 = mysql_real_escape_string($_POST['password2']);
		$email = mysql_real_escape_string($_POST['email']);
		if (isset($_POST['admin'])) $admin = "1";
		else $admin = "0";
		
		//check email validation, the function is available at config.php
		if (!check_email($_POST['email'])) {
			$error['email'] .= " <strong>Email is not valid!</strong>";
		}
		//check email exists in database
		$res = mysql_query("SELECT email FROM user WHERE email='".$email."' AND userID != '".$userID."'");
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
		//end validate data ---------------------------------------------------------------------
		
		//save to database when no errors are detected ------------------------------------------
		if (count($error) == 0) {
			$query = "UPDATE user SET username='".$username."', email='".$email."', ";
			if ($password != "") {
				$salt = rand(100,999);
				$password = sha1(sha1($password).sha1($salt));
				$query .= "password='".$password."', salt='".$salt."', ";
			}
			$query .= "admin='".$admin."' WHERE userID='".$userID."'";
			
			//update username session if you edit yourself
			if ($userID == $_SESSION['auth_admin_userID']) {
				$_SESSION['auth_admin_username'] = $username;
			}
			
			if (mysql_query($query)) {
				echo "<p><strong>User has been edited and saved to the database.</strong></p>";
			} else {
				echo "<strong>User has NOT been edited and saved into the database. ".mysql_error()."</strong>";
			}
		}
	}
	//get user from the database and put data into $_POST variables.
	$rs = mysql_query("SELECT username, email, admin FROM user WHERE userID = ".$userID." AND active='1'");
	if (mysql_num_rows($rs) == 0) {
		die("User does not exists!");
	}
	$row = mysql_fetch_assoc($rs);
	$_POST['username'] = $row['username'];
	$_POST['email'] = $row['email'];
	//if is admin, then $_POST['admin'] exists
	if ($row['admin'] == 1) {
		$_POST['admin'] = 1;
	}
	?>
	<form action="admin.php?edit&amp;id=<?php echo $userID;?>" method="post">
		<p><label>*Username:</label><input type="text" name="username" value='<?php echo $_POST['username'];?>' />
		<?php echo(isset($error['username']))?$error['username']:"";?></p>
		
		<p><label>*Email:</label><input type="text" name="email" value='<?php echo $_POST['email'];?>' />
		<?php echo(isset($error['email']))?$error['email']:"";?></p>
		
		<p><label>Password:</label><input type="password" name="password" value='<?php echo $_POST['password'];?>' />
		<?php echo(isset($error['password']))?$error['password']:"";?></p>
		
		<p><label>Password repeat: </label><input type="password" name="password2" value='<?php echo $_POST['password2'];?>' />
		<?php echo(isset($error['password2']))?$error['password2']:"";?></p>
		
		<p><label>Admin: </label><input type="checkbox" name="admin" value='<?php echo(isset($_POST['admin']))?"checked='checked'":"";?>' /></p>
		<input type='submit' name='editUser' value='edit user' />
	</form>
	<?php
}
//action: delete user -----------------------------------------------------------------------------
if (isset($_GET['delete']) && isset($_GET['id'])) {
	$userID = (int) $_GET['id'];
	if ($userID == 0) {
		die("Invalid ID provided.");
	}
	$rs = mysql_query("SELECT username FROM user WHERE userID = ".$userID." AND active='1'");
	if (mysql_num_rows($rs) == 0) {
		die("User does not exists!");
	} else {
		$row = mysql_fetch_assoc($rs);
	}
	//execution when pressed delete button --------------------------------------------------------
	if (isset($_POST['deleteUser'])) {
		$result = mysql_query("UPDATE user SET active='0' WHERE userID = ".$userID);
		if ($result) {
			echo "<strong>User has been deleted!</strong>";
		}
	}
	?>
	<form action="admin.php?delete&amp;id=<?php echo $userID;?>" method="post">
		<p>Are you sure you want to delete <?php echo $row['username'];?>?</p>
		<input type='submit' name='deleteUser' value='yes, delete user' />
	</form>
	<?php
}
?>
