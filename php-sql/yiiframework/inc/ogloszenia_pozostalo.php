<?
		$dni = $ogloszenie['czas_publikacji'];
		$data = substr($ogloszenie['dodano'], 0, 10);
		//echo $data;
		$wynik = date("Y-m-d",(strtotime($data) + (60*60*24*$dni)));
		//echo "Za ".$dni." będzie ".$wynik;
		$data = $wynik;
		$obecna_data = date("Y-m-d"); // pobieranie aktualnej daty
		$pozostalo = (strtotime($data) - strtotime($obecna_data)) / (60*60*24);
		//echo "Pozostało ".$pozostalo." dni do ".$data;		


//$data = substr($ogloszenie['dodano'], 0, 10);
//$ile_dni = $ogloszenie['czas_publikacji'];
//$nowa_data = strtotime("+ ".$ile_dni. " day",strtotime($data));
//echo "publikujemy od: " .substr($ogloszenie['dodano'], 0, 10)."<br>";
//echo "publikujemy do: ".date ("Y-m-d", $nowa_data);

?>