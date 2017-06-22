<?
	$authUser = $_SESSION['auth_username'];
	$smarty->assign("authUser", $authUser);

	if ($authUser == "admin") {
		$sql = "SELECT * FROM user WHERE admin='0' ORDER BY id DESC LIMIT 2";
		include "php/inc/mysql_error.php";
		$autorzy = array();

		while($tmp = mysql_fetch_assoc($result)){
			$autorzy[] = $tmp;
		}
		$smarty->assign("autorzy", $autorzy);
		$smarty->display("admin.tpl");		
	} else {
		$smarty->display("user.tpl");		
	}

	if (isset($_GET['logout'])) {
		unset($_SESSION['auth_userID']);
		unset($_SESSION['auth_username']);
		echo "You are logged out now!";
		header( 'Location: ?pg=0' ) ;	
	}
?>