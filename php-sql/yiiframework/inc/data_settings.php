<?
	  $dzien = date('d');
	  $dzientygodnia = date('l');
	  $miesiac = date('m');
	  $rok = date('Y');
	  
	  $miesiac_PL = array('01' => 'styczeń', '02' => 'luty', '03' => 'marzec',
	  '04' => 'kwiecień', '05' => 'maj', '06' => 'czerwiec', '07' => 'lipiec',
	  '08' => 'sierpień', '09' => 'wrześień', 10=> 'paźdz',
	  11 => 'listopad', 12 => 'grudzień');
	  
	  $dzientygodnia_PL = array('Monday' => 'poniedziałek',
	  'Tuesday' => 'wtorek', 'Wednesday' => 'środę',
	  'Thursday' => 'czwartek', 'Friday' => 'piątek',
	  'Saturday' => 'sobotę', 'Sunday' => 'niedzielę');
	  //echo $miesiac;
	  //echo "Dziś mamy " . $dzientygodnia_PL[$dzientygodnia].",
	  //".$dzien." ".$miesiac_PL[$miesiac]." ".$rok."roku";
?>