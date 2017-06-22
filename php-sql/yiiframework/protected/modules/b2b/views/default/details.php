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
	$b2b = Yii::app()->db->createCommand("
	SELECT * FROM b2b WHERE id = ".$_GET['id']." ORDER BY id DESC")
	->queryRow();
}

// numer oferty pracy - usuwanie -
$data_short = substr($b2b['dodano'], 5, 5);
$data_short = str_replace("-", "", $data_short);


$this->breadcrumbs=array(
	$this->module->id,
);

//echo "<pre>";
//print_r($b2b);
//echo "</pre>";


?>

<h2>Giełda B2B</h2>
<hr />
<table width="100%">
  <tr>
    <td width="70%">
    
<table width="100%">
  <tr>
    <td><? echo $b2b['tresc'] ?></td>
  </tr>
  <tr>
    <td width="65%">
    <a name="oferta"></a>
      <? if (!$_GET['id'] or $b2b['id'] != $_GET['id']) {
	 		echo "<div class=flash-notice>brak ogloszenia o podanym numerze lub nie podano numeru</div>";
     	} else {
	?>
      <h1 style="color:#C36; text-transform: capitalize;"><? echo $b2b['tytul'] ?></h1>
      <h4>Miejsce: <? echo $b2b['miejsce'] ?></h4>
      <hr />
      <h3 style="text-align:center; color:#666;">Oferta nr <? echo $b2b['id'] ?>/<? echo $data_short ?></h3>
      <h3 style="text-align:center; color:#690;">
        <?
			//if ($b2b['opis']) echo $b2b['opis'];
		?>
      </h3>
		
        <? if (isset($b2b['obowiazki'])) { ?>
      <h4>Obowiązki:</h4>
      <p>
      <? echo $b2b['obowiazki'] ?>
      </p>
      <hr/>
		<? } if (isset($b2b['wymagania'])) { ?>
      <h4>Wymagania:</h4>
      <p>
      <? echo $b2b['wymagania'] ?>
      </p>
      <hr/>
		<? } if (isset($b2b['oferujemy'])) { ?>
      <h4>Oferujemy:</h4>
      <p>
      <? echo $b2b['oferujemy'] ?>
      </p>
      <hr/>
		<? } if (isset($b2b['opis'])) { ?>
      <h4>Informacje dodatkowe:</h4>
      <p>
      <? echo $b2b['opis'] ?>
      </p>
      <hr/>
      <? } ?>
	  <? if (isset($b2b['zdjecie2'])) { ?>
      <a href="/upload/images/<? echo $b2b['zdjecie2'] ?>" class="lightbox">
      <img src="/upload/images/<? echo $b2b['zdjecie2'] ?>" width="<? echo $width ?>" height="<? echo $height ?>" alt="<? echo $b2b['tytul'] ?>" />
      </a>

	  <? } if (isset($b2b['zdjecie3'])) { ?>
      <a href="/upload/images/<? echo $b2b['zdjecie3'] ?>" class="lightbox">
      <img src="/upload/images/<? echo $b2b['zdjecie3'] ?>" width="<? echo $width ?>" height="<? echo $height ?>" alt="<? echo $b2b['tytul'] ?>" />
      </a>

	  <? } if (isset($b2b['zdjecie4'])) { ?>
      <a href="/upload/images/<? echo $b2b['zdjecie4'] ?>" class="lightbox">
      <img src="/upload/images/<? echo $b2b['zdjecie4'] ?>" width="<? echo $width ?>" height="<? echo $height ?>" alt="<? echo $b2b['tytul'] ?>" />
      </a>

	  <? } if (isset($b2b['zdjecie5'])) { ?>
      <a href="/upload/images/<? echo $b2b['zdjecie5'] ?>" class="lightbox">
      <img src="/upload/images/<? echo $b2b['zdjecie5'] ?>" width="<? echo $width ?>" height="<? echo $height ?>" alt="<? echo $b2b['tytul'] ?>" />
      </a>

	  <? } if (isset($b2b['zdjecie6'])) { ?>
      <a href="/upload/images/<? echo $b2b['zdjecie6'] ?>" class="lightbox">
      <img src="/upload/images/<? echo $b2b['zdjecie6'] ?>" width="<? echo $width ?>" height="<? echo $height ?>" alt="<? echo $b2b['tytul'] ?>" />
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
