<script language="javascript" src="js/dymek.js"></script>
<div id="dymek" style="position: absolute; left: 0px; top: 0px; visibility: hidden;"></div>

 {include file="admin/menu.tpl"}
<br /><br />


    <table width="900" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td  class="tytul2"><strong><a href="?pg=7">dodaj ksi±¿kê</a></strong></td>
<!--    <td  class="tytul2">
    {if $widok == "txt"}
    <form action="?pg=2&widok=gfx" method="post">
    {elseif $widok == "gfx"}
    <form action="?pg=2&widok=txt" method="post">
	{else}
    <form action="?pg=2&widok=txt" method="post">
    {/if}
      <input type="submit" name="widoks" value="zmien widok" onchange="submit()" />
    </form>
    </td>-->
    </tr>
</table>

{if $widok == "gfx"}

																																																																																																																																																																																																																																																			<table id="tresc2a">
<tr>
  <td>&nbsp;&nbsp;&nbsp;<img src="images/n_katalog_firm.png" width="241" height="64" />
  <hr align="left" color="#666666" size="1" width="80%" />
  </td></tr>
  <tr>
    <td>
    <!-- -->
{* $cols is the number of columns you want *}
<table border="1" cellpadding="0" cellspacing="0" align="center">
    <TR>
    {section name=f loop=$ksiazki}
        <TD>
    {if $ksiazki[f].okladka} <img src="image.php?fid={$ksiazki[f].id}&foto=1" width="150" border="0" />{/if}
        </TD>
        {* see if we should go to the next row *}
        {if not ($smarty.section.f.rownum mod $cols)}
                {if not $smarty.section.f.last}
                        </TR><TR>
                {/if}
        {/if}
        {if $smarty.section.f.last}
                {* pad the cells not yet created *}
                {math equation = "n - a % n" n=$cols a=$ksiazki|@count assign="cells"}
                {if $cells ne $cols}
                {section name=pad loop=$cells}
                        <TD>&nbsp;</TD>
                {/section}
                {/if}
                </TR>
        {/if}
    {/section}
</TABLE>
<!-- -->

{else}


    <table width="900" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td align="center" class="tytul2">&nbsp;</td>
    <td align="center" bgcolor="#993333" class="tytul2">TYTU£</td>
    <td align="center" bgcolor="#993333" class="tytul2">AUTOR</td>
    <td align="center" bgcolor="#993333" class="tytul2">SPRZEDANO</td>
    <td align="center" bgcolor="#993333" class="tytul2">EDYCJA</td>
    <td align="center" bgcolor="#993333" class="tytul2">USUN</td>
  </tr>
  {foreach from=$ksiazki item=ks}
  <tr>
    <td bgcolor="#f4f4f4">
		<a href="#" onmouseover="dymekKom('dssdsd')" onmousemove="dymekLinkPrzesun();" onmouseout="dymekZamknij();"><img src="php/images/lupa.jpg" border="0" /></a>
    </td>
    <td bgcolor="#f4f4f4">{$ks.nazwa}</td>
    <td bgcolor="#f4f4f4">{$ks.autor}</td>
    <td bgcolor="#f4f4f4">{$ks.ilosc_sprzedana}</td>
    <td bgcolor="#f4f4f4"></td>
    <td bgcolor="#f4f4f4"></td>
  </tr>
  {/foreach}
</table>
  {foreach from=$ksiazki item=ks}

                      <div class="book">
					<a title="{$ks.nazwa}" href=" image.php?fid={$ks.id}&foto=1" rel="lightbox"><img src=" {if $ks.okladka} <img src=image.php?fid={$ks.id}&foto=1  border=0 width=150 align=left />{/if}" border=0 width="120" height="170" /></a>
					<div class="desc">
						<a class="naglowek_sklep" href=""><h2>{$ks.nazwa}</h2></a>
					
            	 	 <p><p>Autor: {$ks.imie}{$ks.nazwisko}<br />Stron: {$ks.stron}.<br />Format: {$ks.format}.<br />Oprawa: {$ks.oprawa}.</p>
				        </div>
				    </div>

{/foreach}
<table border="0" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <td width="50%"><a href="javascript: history.go(-1) "><img src="images/b_powrot.png" alt="Powrót do poprzedniej strony" width="50" height="50" border="0" /></a></td>
    </tr>
</table></td>
</tr>
</table>
{/if}