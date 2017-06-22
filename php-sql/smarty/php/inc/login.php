<?
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
	$result = mysql_query("SELECT username,userID,admin FROM `user` WHERE `username` = '".$username."' AND password = '".$password."' AND active=1");
	
	//if username and password matches put in authentication session for later use
	if (mysql_num_rows($result) == 1) {
		$row = mysql_fetch_assoc($result);
		$_SESSION['auth_userID'] = $row['userID'];
		$_SESSION['czy_admin'] = $row['admin'];
		$_SESSION['auth_username'] = $username;
	} else {
		?><p><strong><? echo WRONG_LOGIN ?></strong></p>
		<pre>
        <? //print_r(get_defined_constants(true)); ?>
        </pre>
		<?php 
	}
}
//show login form when not logged in
if (!isset($_SESSION['auth_userID'])) {
	if (!isset($_GET['register'])) { //to register no need to be logged in
		?>
		<form action="?pg=0" method="post">
			<table width="500" border="0" align="center" cellpadding="2" cellspacing="2">
			  <tr>
			    <td align="right">&nbsp;</td>
			    <td>&nbsp;</td>
		      </tr>
			  <tr>
			    <td colspan="2" bgcolor="#f4f4f4">LOGOWANIE DO STREFY AUTORA</td>
		      </tr>
			  <tr>
			    <td align="right" bgcolor="#e8e8e8">Login: </td>
			    <td bgcolor="#e8e8e8"><input type="text" name="username" /></td>
		      </tr>
			  <tr>
			    <td align="right" bgcolor="#e8e8e8">Haslo:</td>
			    <td bgcolor="#e8e8e8"><label>
			      <input type="password" name="password" />
                </label></td>
		      </tr>
			  <tr>
			    <td colspan="2" align="center"><input type='submit' name='login' value='Zaloguj' /></td>
		      </tr>
		  </table>
			<p>&nbsp;</p>
		</form>
		    </div>
			</div>
		  </div>
	      <div class="post"></div>
	  </div>
		<!-- end content -->
		<!-- start sidebars -->
		<div id="sidebar2" class="sidebar">
<?PHP
  
include('ppanel.php'); 

?>
	  </div>
      
		<!-- end sidebars -->
		<div style="clear: both;">&nbsp;</div>
	</div>
	<!-- end page -->
</div>
<div id="footer">
<?PHP
  
include('footer.php'); 

?>
</div>
</body>
</html>
        
		<?php
	}
		die();
}
?>
