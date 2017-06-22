<p><strong>Jesteś zalogowany jako: <?php echo $_SESSION['auth_username'];?></strong> | <a href='?edit&pg=5'>Edytuj ustawienia</a> | <a href='?pg=0&logout'>Wyloguj</a></p>
<?php
if (isset($_GET['logout'])) {
	unset($_SESSION['auth_userID']);
	unset($_SESSION['auth_username']);
	echo "You are logged out now!";
header( 'Location: ?pg=0' ) ;	
}
?>