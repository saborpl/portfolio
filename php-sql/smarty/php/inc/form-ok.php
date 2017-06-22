<?

$boundary = md5(uniqid(time()));

$data = date("Y-m-d H:i:s");
$ip = ($_SERVER['REMOTE_ADDR']);
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$from = "Zamowienia FORTUNET <zamowienia-fortunet@fortunet.eu>";
$to = "poligraf1@interia.pl";
//$cc = "robert@mpi.pl";
$cc = "robert@luczynski.eu";
$subject = "Zlozono zamowienie";
$info2 = nl2br($info);
$body_html = "
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-2\" />
<title>Untitled Document</title>
<style type=\"text/css\">
<!--
body,td,th {
    font-family: Verdana, Arial, Helvetica, sans-serif;
    font-size: 11px;
    color: #333333;
}
.style1 {
    color: #993300;
    font-weight: bold;
}
-->
</style></head>

<body>
<span class=\"style1\">Zamowienie ksiazki</span> <b>$tytul</b><br>
<br>
Masz <b>1</b> zgloszenie od: <b>$imie $nazwisko</b>
<br /><br />
IP wysylajacego: <b>$ip</b><br />
HOST wysylajacego: <b>$hostname</b>
<br><br>
<b>Dane osobowe:</b><br>
Imie i Nazwisko: $imie $nazwisko<br>
Telefon: $telefon<br>
Adres email: $email<br>
<br><br>
Data otrzymania informacji: <b>$data</b><br>
<br>
</body>
</html>

";

$headers  = 'From: ' . $from . "\n";
$headers .= 'To: ' . $to . "\n";
$headers .= 'Cc: ' . $cc . "\n";
$headers .= 'Return-Path: ' . $from . "\n";
$headers .= 'MIME-Version: 1.0' ."\n";
$headers .= 'Content-Type: multipart/alternative; boundary="' . $boundary . '"' . "\n\n";
$headers .= $body_html_simple . "\n";
$headers .= '--' . $boundary . "\n";
$headers .= 'Content-Type: text/plain; charset=ISO-8859-2' ."\n";
$headers .= 'Content-Transfer-Encoding: 8bit'. "\n\n";
$headers .= $body_html_plain . "\n";
$headers .= '--' . $boundary . "\n";
$headers .= 'Content-Type: text/HTML; charset=ISO-8859-2' ."\n";
$headers .= 'Content-Transfer-Encoding: 8bit'. "\n\n";
$headers .= $body_html . "\n";
$headers .= '--' . $boundary . "--\n";

//include "lib/connect.php";
//include "lib/upload_pliki.php";
//include "lib/db.php";
echo $tytul;
$mailOk=mail('', $subject,'', $headers);

?>

<table width="750" height="400" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="">
  <tr>
    <td align="center" valign="top"><div align="left"></div>
	<br />  
        <br />
        <h1>TWOJE ZAMOWIENIE ZOSTAŁO PRZYJĘTE.<br />
        PROSIMY CZEKAĆ NA ODPOWIEDŹ</td>
  </tr>
</table>
