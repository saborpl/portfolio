<div id="box_polecamy">
<table width="100%" border="0" cellspacing="2" cellpadding="2">
{foreach from=$firmy_wizytowka item=fw}
  <tr>
    <td>
<div id="wizytowka" style="background-image:url(../images/wizytowka_tlo{$fw.wizytowka_tlo}.png)">
    <div id="wizytowka_tytul"><a href="?pg=2&fid={$fw.id}">{$fw.nazwa}</a> - id: {$fw.id}</div>
    <div id="wizytowka_tresc">
    {if $fw.kod}{$fw.kod}{/if}
    {if $fw.miasto}{$fw.miasto}<br />{/if}
    {if $fw.ulica} ul. {$fw.ulica}<br />{/if}
    {if $fw.telkom} tel. kom. {$fw.telkom}<br />{/if}    
    {if $fw.email} email: <a href="" class="link1">{$fw.email}</a><br />{/if}
    </div>
    </div>    
    </td>
  </tr>
{/foreach}
</table>
</div>