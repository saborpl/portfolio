<!--<pre>
{$firmy|print_r}
</pre>    
-->
{foreach from=$firmy item=f}
<table id="tresc">
  <tr>
    <td align="center">
    <table width="884" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="images/karta_gora.png" width="884" height="50" /></td>
  </tr>
  <tr>
    <td align="" background="images/karta_tlo.png">
    <!---->
    <table width="830" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td width="40" rowspan="3" valign="top">&nbsp;</td>
    <td width="450" valign="top">
    {if $f.logo} <img src="inc/image.php?fid={$fid}&foto=5" width="180" border="0" />
    {else}
    <img src="images/rings1.png" width="180" height="113" />
    {/if}
    </td>
    <td align="right" valign="top" class="text_big">
    	
        <span class="title1">{$f.nazwa}</span><br />
        {$f.kod} {$f.miasto}<br />
        {if $f.ulica} ul. {$f.ulica}<br />{/if}
        {if $f.tel} tel. {$f.tel}<br /> {/if}
        {if $f.telkom} tel. kom. {$f.telkom}<br />{/if}
    	{if $f.email} email: <a href="" class="link1">{$f.email}</a><br />{/if}
        {if $f.www} www: <a href="http://{$f.www}" class="link1" target="_blank">{$f.www}</a><br />{/if}
    </td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="top">
        <hr align="center" color="#999999" noshade="noshade" size="1" width="90%" />
        <table width="600" border="0" cellspacing="2" cellpadding="2">
          <tr>
            <td>{$f.opis|nl2br}</td>
          </tr>
        </table>        <hr align="center" color="#999999" noshade="noshade" size="1" width="90%" />
    </td>
    </tr>
  <tr>
    <td colspan="2" align="center"><!---->
      <table border="0" cellspacing="2" cellpadding="2">
        <tr>
          <td align="center" valign="top">{if $f.foto1} <img src="inc/image.php?fid={$fid}&foto=1" width="180" border="1" />{/if}</td>
          <td align="center" valign="top">{if $f.foto2} <img src="inc/image.php?fid={$fid}&foto=2" width="180" border="1" />{/if}</td>
          <td align="center" valign="top">{if $f.foto3} <img src="inc/image.php?fid={$fid}&foto=3" width="180" border="1" />{/if}</td>
          <td align="center" valign="top">{if $f.foto4} <img src="inc/image.php?fid={$fid}&foto=4" width="180" border="1" />{/if}</td>
          </tr>
        </table>
      <!----></td>
    </tr>
  <tr>
    <td colspan="3" align="center" valign="top">{if $f.mapka}{$f.mapka}{/if}</td>
    </tr>
    </table>
    <!----></td>
  </tr>
  <tr>
    <td><img src="images/karta_dol.png" width="884" height="50" /></td>
  </tr>
</table>
<br />
<table width="884" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <td width="50%"><a href="javascript: history.go(-1) "><img src="images/b_powrot.png" alt="Powrót do poprzedniej strony" width="50" height="50" border="0" /></a></td>
    <td width="50%" align="right"><a href="?pg=1&kid={$f.kategoria}"><img src="images/b_katalog.png" alt="Pozostałe firmy w katalogu" width="50" height="50" border="0" /></a></td>
  </tr>
</table>
    </td>
  </tr>
</table>
{/foreach}


