<script language="javascript" src="php/js/dymek.js"></script>
<div id="dymek" style="position: absolute; left: 0px; top: 0px; visibility: hidden;"></div>

 {include file="admin/menu.tpl"}
<br /><br />

    <table width="900" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td align="center" class="tytul2">&nbsp;</td>
    <td align="center" bgcolor="#993333" class="tytul2">IMIE</td>
    <td align="center" bgcolor="#993333" class="tytul2">NAZWISKO</td>
    <td align="center" bgcolor="#993333" class="tytul2">LOGIN</td>
    <td align="center" bgcolor="#993333" class="tytul2">DATA REJESTRACJI</td>
    <td align="center" bgcolor="#993333" class="tytul2">EDYCJA</td>
    <td align="center" bgcolor="#993333" class="tytul2">USUN</td>
  </tr>
  {foreach from=$autorzy item=ks}
  <tr>
    <td bgcolor="#f4f4f4"></td>
    <td bgcolor="#f4f4f4">{$ks.imie}</td>
    <td bgcolor="#f4f4f4">{$ks.nazwisko}</td>
    <td bgcolor="#f4f4f4">{$ks.email}</td>
    <td bgcolor="#f4f4f4" align="center">{$ks.data_rejestracja}</td>
    <td bgcolor="#f4f4f4" align="center"><a href="?pg=10&id={$ks.userID}"><img src="php/images/edit.png" border="0" /></a></td>
    <td bgcolor="#f4f4f4"></td>
  </tr>
  {/foreach}
</table>

<table border="0" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <td width="50%"><a href="javascript: history.go(-1) ">Powrót do poprzedniej strony</a></td>
    </tr>
</table></td>
</tr>
</table>