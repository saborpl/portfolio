<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso8859-2" />
<title>Fortunet. Jak wydać książkę i na tym zarobić.</title>
<meta name="keywords" content="" />
<meta name="Premium Series" content="" />
<link href="default.css" rel="stylesheet" type="text/css" media="screen" />
<link href="php/css/strefa.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/prototypelite.js"></script>
<script type="text/javascript" src="js/moofx.js"></script>
<script type="text/javascript" src="js/litebox.js"></script>


</head>
<body onload="initLightbox()">
<!-- start header -->
<div id="header">
<?PHP
  
//include "php/inc/pasek_info.php";  
include('header.php'); 

?>
</div>
<!-- end header -->
<div id="wrapper">
	<!-- start page -->
	<div id="page">
		<!-- start content -->
		<div id="content">
		  <div class="post">
		    <div class="entry">
					<div id="text">
<?
	session_start();
	//print_r($_SESSION);;
	require('libs/Smarty.class.php');
	$smarty = new Smarty;
	//$smarty->force_compile = true;
	//$smarty->debugging = true;
	//$smarty->caching = true;
	//$smarty->cache_lifetime = 120;
	//db configuration
	include "php/configs/db.php";
	include "php/inc/check_mysql.php";
	include "php/inc/text.php";
	$data_dodania = date('Y-m-d H:i:s');
	$widok = $_REQUEST['widok'];
	$smarty->assign("widok", $widok);
	$skad = $_SERVER['HTTP_REFERER'];
	$smarty->assign("skad", $skad);

	
	switch ($pg) {
		// strona glowna
    	case 0:// strona glowna
			include "php/inc/login.php";
			$authUserAdmin = $_SESSION['czy_admin'];
$authUser = $_SESSION['auth_username'];
			$smarty->assign("authUser", $authUser);
			if (!$authUser) 	header( 'Location: ?pg=0' ) ;	
		
			if ($authUserAdmin == "1") {
				$smarty->display("admin/glowna.tpl");		
			} else {
			  $query = "SELECT * FROM user WHERE username='$authUser'";
			  $res = mysql_query($query) or die("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $query . "<br />\nError: (" . mysql_errno() . ") " . mysql_error());
			  $autorzy = array();
			  while($tmp = mysql_fetch_assoc($res)){
			  $autorzy[] = $tmp;
						if ($tmp['password'] == "5706f39bd5d1a602eb6f0dd48e8d926a321383a3") {
						 header( 'Location: ?edit&pg=5' ) ;
						 echo $tmp['password'];
					}

																																																																																																																																																																																																			  }
			  $smarty->assign("autorzy", $autorzy);
			  $smarty->display("user/user.tpl");		
			}
		
			if (isset($_GET['logout'])) {
				unset($_SESSION['auth_userID']);
				unset($_SESSION['auth_username']);
				echo "You are logged out now!";
				header( 'Location: ?pg=0' ) ;	
			}

		break;
    	case 1:// admin autorzy
			$authUserAdmin = $_SESSION['czy_admin'];
			$authUser = $_SESSION['auth_username'];
			$smarty->assign("authUser", $authUser);	
			if (!$authUser) 	header( 'Location: ?pg=0' ) ;	
			$cols = 4;	
			$smarty->assign("cols", $cols);	
			if ($authUserAdmin == "1") {				
                //ile na strone
			  $ile = 15;
			  $numrows = mysql_num_rows(mysql_query("SELECT * FROM user"));
			  if(!$p) $p = 0;
				  // zabezpieczenie przed nienumerycznymi wartosciami
			  $p = (int)$p;
			  $ile = (int)$ile;
			  $query = "SELECT * FROM user WHERE admin !=1 ORDER BY `data_rejestracja` DESC LIMIT $p,$ile";
			  $res = mysql_query($query) or die("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $query . "<br />\nError: (" . mysql_errno() . ") " . mysql_error());
			  $autorzy = array();
			  			  
			  while($tmp = mysql_fetch_assoc($res)){
			  $autorzy[] = $tmp;
		  }
				//exit;

			   include "php/inc/mysql_error.php";
			  $smarty->assign("isr", $isr);
			  $smarty->assign("autorzy", $autorzy);
			  $smarty->display("admin/autorzy.tpl");		
			  
			  echo "<br />Strona: ";
			  for($i=0;$i<ceil($numrows/$ile);$i++) {
			  echo '<a href="?pg=1&p='.($i*$ile).'">'.($i+1).'</a> ';
			  }
			} else {
				$smarty->display("user/menu.tpl");
					echo 'Brak uprawnien!';
			}
		break;
    	case 2:// panel ksiazka
			$authUserAdmin = $_SESSION['czy_admin'];
$authUser = $_SESSION['auth_username'];
			$smarty->assign("authUser", $authUser);	
			if (!$authUser) 	header( 'Location: ?pg=0' ) ;	
			$cols = 4;	
			$smarty->assign("cols", $cols);	
			if ($authUserAdmin == "1") {				
                //ile na strone
			  $ile = 25;
			  $numrows = mysql_num_rows(mysql_query("SELECT * FROM ksiazki"));
			  if(!$p) $p = 0;
				  // zabezpieczenie przed nienumerycznymi wartosciami
			  $p = (int)$p;
			  $ile = (int)$ile;
			  
			  $query = mysql_query("SELECT * FROM user");
			  $autorzy = array();
			  while($tmp = mysql_fetch_assoc($query)){
			  $autorzy[] = $tmp;
			   include "php/inc/mysql_error.php";
			  }
			  $smarty->assign("autorzy", $autorzy);
			  
			  $query = mysql_query("SELECT * FROM ksiazki ORDER BY data_edycja DESC LIMIT $p,$ile");
			  $ksiazki = array();
			  while($tmp = mysql_fetch_assoc($query)){
			  $ksiazki[] = $tmp;
				$is1 = $tmp['ilosc_sprzedana1'];
				$is2 = $tmp['ilosc_sprzedana2'];
				$is3 = $tmp['ilosc_sprzedana3'];
				$is4 = $tmp['ilosc_sprzedana4'];
				$is5 = $tmp['ilosc_sprzedana5'];
				$is6 = $tmp['ilosc_sprzedana6'];
				$is7 = $tmp['ilosc_sprzedana7'];
				$is8 = $tmp['ilosc_sprzedana8'];
				$is9 = $tmp['ilosc_sprzedana9'];
				$is10 = $tmp['ilosc_sprzedana10'];
				$is11 = $tmp['ilosc_sprzedana11'];
				$is12 = $tmp['ilosc_sprzedana12'];
				$isr = $is1+$is2+$is3+$is4+$is5+$is6+$is7+$is8+$is9+$is10+$is11+$is12;
				//echo $isr;
		  }
				//exit;

			   include "php/inc/mysql_error.php";
			  $smarty->assign("isr", $isr);
			  $smarty->assign("ksiazki", $ksiazki);
			  $smarty->display("admin/ksiazki.tpl");		
			  
			  echo "<br />Strona: ";
			  for($i=0;$i<ceil($numrows/$ile);$i++) {
			  echo '<a href="?pg=2&p='.($i*$ile).'">'.($i+1).'</a> ';
			  }
				} else {
				$smarty->display("user/menu.tpl");
					echo 'Brak uprawnien!';
			}
			
		break;
		
		case 3: // register
			$authUserAdmin = $_SESSION['czy_admin'];
$authUser = $_SESSION['auth_username'];
			$smarty->assign("authUser", $authUser);		
			if (!$authUser) 	header( 'Location: ?pg=0' ) ;	
				if ($authUserAdmin == "1") {
				include "php/configs/login.php";
				include "php/inc/register.php";
				} else {
				$smarty->display("user/menu.tpl");
					echo 'Brak uprawnien do rejestracji nowego autora!';
			}
		break;
		
		case 5: // edit passwd
			//include "php/configs/login.php";
			$authUserAdmin = $_SESSION['czy_admin'];
$authUser = $_SESSION['auth_username'];
			$smarty->assign("authUser", $authUser);		
			if (!$authUser) 	header( 'Location: ?pg=0' ) ;	
			if ($authUserAdmin == "1") {
				$smarty->display("admin/menu.tpl");
			} else {
				$smarty->display("user/menu.tpl");
			}
			include "php/inc/edit_login.php";
		break;

		case 6: // ustawienia
			include "php/configs/login.php";
			$authUserAdmin = $_SESSION['czy_admin'];
$authUser = $_SESSION['auth_username'];
			$smarty->assign("authUser", $authUser);		
			if (!$authUser) 	header( 'Location: ?pg=0' ) ;	
			if ($authUserAdmin == "1") {
				$smarty->display("admin/menu.tpl");
			} else {
				$smarty->display("user/menu.tpl");
			}
			include "php/inc/edit_dane.php";
		break;

		case 7: // dodaj ksiazka
			$authUserAdmin = $_SESSION['czy_admin'];
$authUser = $_SESSION['auth_username'];
			$smarty->assign("authUser", $authUser);		
			if (!$authUser) 	header( 'Location: ?pg=0' ) ;	
			if ($authUserAdmin == "1") {
				$smarty->display("admin/menu.tpl");
				include "php/inc/add_ksiazka.php";
			} else {
				$smarty->display("user/menu.tpl");
				echo "Brak uprawnien";
			}
		break;

		case 8: // edycja ksiazka
			$authUserAdmin = $_SESSION['czy_admin'];
$authUser = $_SESSION['auth_username'];
			$smarty->assign("authUser", $authUser);		
			if (!$authUser) 	header( 'Location: ?pg=0' ) ;	
			if ($authUserAdmin == "1") {
				$smarty->display("admin/menu.tpl");
				include "php/inc/edit_ksiazka.php";
			} else {
				$smarty->display("user/menu.tpl");
				echo "brak uprawnien do edycji";
			}
		break;

		case 9: // sprzedaz
			$authUserAdmin = $_SESSION['czy_admin'];
$authUser = $_SESSION['auth_username'];
			$smarty->assign("authUser", $authUser);		
			if (!$authUser) 	header( 'Location: ?pg=0' ) ;	
			if ($authUserAdmin == "1") {
				$smarty->display("admin/menu.tpl");
			} else {
				$smarty->display("user/menu.tpl");
				"brak uprawnien do edycji";
			}
			include "php/inc/edit_sprzedaz.php";
		break;
		
		case 10: // edycja autor
			$authUserAdmin = $_SESSION['czy_admin'];
$authUser = $_SESSION['auth_username'];
			$smarty->assign("authUser", $authUser);		
			if (!$authUser) 	header( 'Location: ?pg=0' ) ;	
			if ($authUserAdmin == "1") {
				$smarty->display("admin/menu.tpl");
			} else {
				$smarty->display("user/menu.tpl");
				"brak uprawnien do edycji";
			}
			include "php/inc/edit_autorzy.php";
		break;
		
    	case 11:// panel ksiazka
			$authUserAdmin = $_SESSION['czy_admin'];
$authUser = $_SESSION['auth_username'];
			$authUserId = $_SESSION['auth_userID'];;
			$smarty->assign("authUser", $authUser);	
			if (!$authUser) 	header( 'Location: ?pg=0' ) ;	
			$cols = 4;	
			$smarty->assign("cols", $cols);	
			if ($authUser) {				
                //ile na strone
			  $ile = 25;
			  $numrows = mysql_num_rows(mysql_query("SELECT * FROM ksiazki WHERE id_autora=$authUserId"));
			  if(!$p) $p = 0;
				  // zabezpieczenie przed nienumerycznymi wartosciami
			  $p = (int)$p;
			  $ile = (int)$ile;
			  			  
			  $query = mysql_query("SELECT * FROM ksiazki WHERE id_autora=$authUserId ORDER BY data_dodania DESC LIMIT $p,$ile");
			  $ksiazki = array();
			  while($tmp = mysql_fetch_assoc($query)){
			  $ksiazki[] = $tmp;
				$is1 = $tmp['ilosc_sprzedana1'];
				$is2 = $tmp['ilosc_sprzedana2'];
				$is3 = $tmp['ilosc_sprzedana3'];
				$is4 = $tmp['ilosc_sprzedana4'];
				$is5 = $tmp['ilosc_sprzedana5'];
				$is6 = $tmp['ilosc_sprzedana6'];
				$is7 = $tmp['ilosc_sprzedana7'];
				$is8 = $tmp['ilosc_sprzedana8'];
				$is9 = $tmp['ilosc_sprzedana9'];
				$is10 = $tmp['ilosc_sprzedana10'];
				$is11 = $tmp['ilosc_sprzedana11'];
				$is12 = $tmp['ilosc_sprzedana12'];
				$isr = $is1+$is2+$is3+$is4+$is5+$is6+$is7+$is8+$is9+$is10+$is11+$is12;
				//echo $isr;
		  }
				//exit;

			   include "php/inc/mysql_error.php";
			  $smarty->assign("isr", $isr);
			  $smarty->assign("ksiazki", $ksiazki);
			  $smarty->display("user/ksiazki.tpl");		
			  
			  echo "<br />Strona: ";
			  for($i=0;$i<ceil($numrows/$ile);$i++) {
			  echo '<a href="?pg=11&p='.($i*$ile).'">'.($i+1).'</a> ';
			  }
			}
		break;
		

    	default:
       		echo "STRONA NIE ISTNIEJE";
			
	}
	
?> 

		    </div>
			</div>
		  </div>
	      <div class="post"></div>
	  </div>
		<!-- end content -->
		<!-- start sidebars -->
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
