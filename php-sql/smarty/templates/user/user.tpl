{include file="user/menu.tpl"}

{$userid}

{foreach from=$autorzy item=ks}
{if $ks.password eq '5706f39bd5d1a602eb6f0dd48e8d926a321383a3'}
   musisz zmienic haslo!
{else}
    Welcome, whatever you are.
{/if}

{/foreach}