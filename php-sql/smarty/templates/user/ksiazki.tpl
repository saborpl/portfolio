<script language="javascript" src="php/js/dymek.js"></script>
<div id="dymek" style="position: absolute; left: 0px; top: 0px; visibility: hidden;"></div>

 {include file="user/menu.tpl"}
<br /><br />

    <table width="900" align="center" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td align="center" class="tytul2">&nbsp;</td>
    <td align="center" bgcolor="#993333" class="tytul2">TYTU£</td>
    <td align="center" bgcolor="#993333" class="tytul2">EDYCJA</td>
    <td align="center" bgcolor="#993333" class="tytul2">SPRZEDANO</td>
    </tr>
  {foreach from=$ksiazki item=ks}
  <tr>
    <td bgcolor="#f4f4f4">
		{if $ks.okladka}<img src=image.php?fid={$ks.id}&foto=1 border=0 width=120 height=170 vspace=5 hspace=5 />{/if}
<!--		<a href="#" onmouseover="dymekKom('<table width=400 border=0 cellspacing=2 cellpadding=2><tr>{if $ks.okladka}<td width=150><img src=image.php?fid={$ks.id}&foto=1 border=0 width=120 height=170 vspace=5 hspace=5 /></td>{/if}<td valign=top><strong>{$ks.nazwa}</strong><br />Autor: {$ks.id_autora}{$ks.nazwisko}<br />Stron: {$ks.stron}.<br />Format: {$ks.format}.<br />Oprawa: {$ks.oprawa}.</td></tr></table>')" onmousemove="dymekLinkPrzesun();" onmouseout="dymekZamknij();"><img src="php/images/lupa.png" border="0" /></a>
-->
    </td>
    <td bgcolor="#f4f4f4" align="center"><p>{$ks.nazwa}</p></td>
    <td bgcolor="#f4f4f4" align="center">{$ks.data_edycja|truncate:10:""}</td>
    <td bgcolor="#f4f4f4" align="center">
    <table border="0" cellspacing="2" cellpadding="2" style="border:#666 1px solid">
      <tr >
        <td style="border:#666 1px solid" colspan="5" align="center" bgcolor="#e8e8e8" class="tytul3">Wykaz sprzeda¿y</td>
        </tr>
      <tr>
        <td align="right" class="miesiace_bold">styczen</td>
        <td align="left">{$ks.ilosc_sprzedana1}</td>
        <td align="left">&nbsp;</td>
        <td align="right" class="miesiace_bold">lipiec</td>
        <td align="left">{$ks.ilosc_sprzedana7}</td>
        </tr>
      <tr>
        <td align="right" class="miesiace_bold">luty</td>
        <td align="left">{$ks.ilosc_sprzedana2}</td>
        <td align="left">&nbsp;</td>
        <td align="right" class="miesiace_bold">sierpien</td>
        <td align="left">{$ks.ilosc_sprzedana8}</td>
        </tr>
      <tr>
        <td align="right" class="miesiace_bold">marzec</td>
        <td align="left">{$ks.ilosc_sprzedana3}</td>
        <td align="left">&nbsp;</td>
        <td align="right" class="miesiace_bold">wrzesien</td>
        <td align="left">{$ks.ilosc_sprzedana9}</td>
        </tr>
      <tr>
        <td align="right" class="miesiace_bold">kwiecien</td>
        <td align="left">{$ks.ilosc_sprzedana4}</td>
        <td align="left">&nbsp;</td>
        <td align="right" class="miesiace_bold">pa¼dziernik</td>
        <td align="left">{$ks.ilosc_sprzedana10}</td>
        </tr>
      <tr>
        <td align="right" class="miesiace_bold">maj</td>
        <td align="left">{$ks.ilosc_sprzedana5}</td>
        <td align="left">&nbsp;</td>
        <td align="right" class="miesiace_bold">listopad</td>
        <td align="left">{$ks.ilosc_sprzedana11}</td>
        </tr>
      <tr>
        <td align="right" class="miesiace_bold">czerwiec</td>
        <td align="left">{$ks.ilosc_sprzedana6}</td>
        <td align="left">&nbsp;</td>
        <td align="right" class="miesiace_bold">grudzien</td>
        <td align="left">{$ks.ilosc_sprzedana12}</td>
        </tr>
      <tr >
        <td align="right" bgcolor="#f4f4f4">razem</td>
        <td colspan="4" align="left" bgcolor="#f4f4f4"><b>{$ks.ilosc_sprzedana1+$ks.ilosc_sprzedana2+$ks.ilosc_sprzedana3+$ks.ilosc_sprzedana4+$ks.ilosc_sprzedana5+$ks.ilosc_sprzedana6+$ks.ilosc_sprzedana7+$ks.ilosc_sprzedana8+$ks.ilosc_sprzedana9+$ks.ilosc_sprzedana10+$ks.ilosc_sprzedana11+$ks.ilosc_sprzedana12}</b></td>
        </tr>
    </table></td>
    </tr>
  {/foreach}
</table>
  {foreach from=$ksiazki item=ks}

<!--<table border=0 cellspacing=2 cellpadding=2><tr><td>{if $ks.okladka}<img src=image.php?fid={$ks.id}&foto=1 border=0 width=120 height=170 />{/if}</td><td><h2>{$ks.nazwa}</h2>Autor: {$ks.imie}{$ks.nazwisko}<br />Stron: {$ks.stron}.<br />Format: {$ks.format}.<br />Oprawa: {$ks.oprawa}.</td></tr></table>-->


<!--                      <div class="book">
					<a title="{$ks.nazwa}" href=" image.php?fid={$ks.id}&foto=1" rel="lightbox">{if $ks.okladka} <img src=image.php?fid={$ks.id}&foto=1 border=0 width="120" height="170" />{/if}</a>
					<div class="desc">
						<a class="naglowek_sklep" href=""><h2>{$ks.nazwa}</h2></a>
					
            	 	 <p><p>Autor: {$ks.imie}{$ks.nazwisko}<br />Stron: {$ks.stron}.<br />Format: {$ks.format}.<br />Oprawa: {$ks.oprawa}.</p>
				        </div>
				    </div>
-->
{/foreach}
<table width="900" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <td width="50%" align="center"><a href="javascript: history.go(-1) ">Powrót do poprzedniej strony</a></td>
    </tr>
</table></td>
</tr>
</table>