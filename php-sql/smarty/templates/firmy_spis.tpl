																																																																																																																																																																																																																																																			<table id="tresc2a">
<tr>
  <td>&nbsp;&nbsp;&nbsp;<img src="images/n_katalog_firm.png" width="241" height="64" />
  <hr align="left" color="#666666" size="1" width="80%" />
  </td></tr>
  <tr>
    <td>
    <!-- -->
{* $cols is the number of columns you want *}
<table border="0" cellpadding="0" cellspacing="0" align="center">
    <TR>
    {section name=f loop=$firmy}
        <TD>
	<div id="wizytowka" style="background-image:url(../images/wizytowka_tlo{$firmy[f].wizytowka_tlo}.png)">
    <div id="wizytowka_tytul"><a href="?pg=2&fid={$firmy[f].id}">{$firmy[f].nazwa}</a> - id: {$firmy[f].id}</div>
    <div id="wizytowka_tresc">
    {if $firmy[f].kod}{$firmy[f].kod}{/if}
    {if $firmy[f].miasto}{$firmy[f].miasto}<br />{/if}
    {if $firmy[f].ulica} ul. {$firmy[f].ulica}<br />{/if}
    {if $firmy[f].telkom} tel. kom. {$firmy[f].telkom}<br />{/if}    
    {if $firmy[f].email} email: <a href="" class="link1">{$firmy[f].email}</a><br />{/if}
    </div>
    </div>

        
        </TD>
        {* see if we should go to the next row *}
        {if not ($smarty.section.f.rownum mod $cols)}
                {if not $smarty.section.f.last}
                        </TR><TR>
                {/if}
        {/if}
        {if $smarty.section.f.last}
                {* pad the cells not yet created *}
                {math equation = "n - a % n" n=$cols a=$firmy|@count assign="cells"}
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





<table border="0" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <td width="50%"><a href="javascript: history.go(-1) "><img src="images/b_powrot.png" alt="Powrót do poprzedniej strony" width="50" height="50" border="0" /></a></td>
    </tr>
</table></td>
</tr>
</table>