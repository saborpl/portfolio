<script type="text/javascript">
$(function() {
	// Use this example, or...
	//$('a[@rel*=lightbox]').lightBox(); // Select all links that contains lightbox in the attribute rel
	// This, or...
	//$('#gallery a').lightBox(); // Select all links in object with gallery ID
	// This, or...
	$('a.lightbox').lightBox(); // Select all links with lightbox class
	// This, or...
	//$('a').lightBox(); // Select all links in the page
	// ... The possibility are many. Use your creative or choose one in the examples above
});
</script>



<?php
/* @var $this DefaultController */

if (isset($_GET['id'])) {
	$ogloszenia = Yii::app()->db->createCommand("
	SELECT a.id AS id_uzytkownika, b.user_id AS id_uzytkownika_profil, c.id AS id_ogloszenia, c.id_users AS id_uzytkownika_ogloszenie, a.*, b.*, c.* FROM users a, profiles b, ogloszenia c WHERE b.user_id=a.id AND a.id=c.id_users AND c.id = ".$_GET['id']." ORDER BY c.edytowano DESC")
	->queryRow();
}

// numer oferty pracy - usuwanie -
$data_short = substr($ogloszenia['dodano'], 5, 5);
$data_short = str_replace("-", "", $data_short);


$this->breadcrumbs=array(
	$this->module->id,
);

//echo "<pre>";
//print_r($ogloszenia);
//echo "</pre>";


?>

<h2>Giełda maszyn</h2>
<hr />
<table width="100%">
  <tr>
    <td width="70%">
    
<table width="100%">
  <tr>
    <td><? echo $ogloszenia['tresc'] ?></td>
  </tr>
  <tr>
    <td width="65%">
    <a href="img/image-1.jpg" data-lightbox="image-1" title="My caption">image #1</a>

    <a name="oferta"></a>
      <? if (!$_GET['id'] or $ogloszenia['id'] != $_GET['id']) {
	 		echo "<div class=flash-notice>brak ogloszenia o podanym numerze lub nie podano numeru</div>";
     	} else {
	?>
      <h1 style="color:#C36; text-transform: capitalize;"><? echo $ogloszenia['tytul'] ?></h1>
      <h4>Kategoria: <? echo $ogloszenia['kategoria'] ?></h4>
      <hr />
      <h3 style="text-align:center; color:#666;">Ogłoszenie nr <? echo $ogloszenia['id'] ?>/<? echo $data_short ?></h3>
      <h3 style="text-align:center; color:#690;">
        Cena:
        <?
			if ($ogloszenia['cena'] == "0.00") { 
				echo "do negocjacji";
			} else {
				echo $ogloszenia['cena']." PLN";
			}
		?>
      </h3>
      <p>
        Stan: <strong><? if (isset($ogloszenia['stan'])) echo $ogloszenia['stan'] ?></strong>
        <br />
        Ogłaszający: <strong><? if (isset($ogloszenia['firstname'])) echo $ogloszenia['firstname'] ?> <? if (isset($ogloszenia['lastname'])) echo $ogloszenia['lastname'] ?></strong>
        <br />
        Telefon: <strong><? if (isset($ogloszenia['telefon'])) echo $ogloszenia['telefon'] ?></strong>
        <br />
        Email: <strong><? if (isset($ogloszenia['email'])) echo $ogloszenia['email'] ?></strong>
        <br />
        Rodzaj konta: <strong>
		<? if ($ogloszenia['rodzaj'] = 1) {
			echo "Firmowe";
		} else {
			echo "Prywatne";
		}
		
		?></strong>
      </p>
      <h4>Treść ogłoszenia</h4>
      <p>
      <? echo $ogloszenia['opis'] ?>
      </p>
      <hr/>
      
	  <? if (isset($ogloszenia['zdjecie2'])) { ?>
      <a href="/upload/images/<? echo $ogloszenia['zdjecie2'] ?>" class="lightbox">
      <img src="/upload/images/<? echo $ogloszenia['zdjecie2'] ?>" width="<? echo $width ?>" height="<? echo $height ?>" alt="<? echo $ogloszenia['tytul'] ?>" />
      </a>

	  <? } if (isset($ogloszenia['zdjecie3'])) { ?>
      <a href="/upload/images/<? echo $ogloszenia['zdjecie3'] ?>" class="lightbox">
      <img src="/upload/images/<? echo $ogloszenia['zdjecie3'] ?>" width="<? echo $width ?>" height="<? echo $height ?>" alt="<? echo $ogloszenia['tytul'] ?>" />
      </a>

	  <? } if (isset($ogloszenia['zdjecie4'])) { ?>
      <a href="/upload/images/<? echo $ogloszenia['zdjecie4'] ?>" class="lightbox">
      <img src="/upload/images/<? echo $ogloszenia['zdjecie4'] ?>" width="<? echo $width ?>" height="<? echo $height ?>" alt="<? echo $ogloszenia['tytul'] ?>" />
      </a>

	  <? } if (isset($ogloszenia['zdjecie5'])) { ?>
      <a href="/upload/images/<? echo $ogloszenia['zdjecie5'] ?>" class="lightbox">
      <img src="/upload/images/<? echo $ogloszenia['zdjecie5'] ?>" width="<? echo $width ?>" height="<? echo $height ?>" alt="<? echo $ogloszenia['tytul'] ?>" />
      </a>

	  <? } if (isset($ogloszenia['zdjecie6'])) { ?>
      <a href="/upload/images/<? echo $ogloszenia['zdjecie6'] ?>" class="lightbox">
      <img src="/upload/images/<? echo $ogloszenia['zdjecie6'] ?>" width="<? echo $width ?>" height="<? echo $height ?>" alt="<? echo $ogloszenia['tytul'] ?>" />
      </a>
      <? } ?>
      
      <? } ?>
    </td>
  </tr>
  <tr>
    <td align="center"><a href="javascript:history.go(-1)"><div class=button_blue style="text-align:center">powrót</div></a></td>
  </tr>
</table>
    
    
    </td>
    <td width="30%" style="vertical-align:top"><? include "inc/grid_left.php" ?></td>
  </tr>
</table>
