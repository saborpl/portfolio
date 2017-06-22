<script src="php/js/menubar.js" type="text/javascript"></script>
<link href="php/css/menubar.css" rel="stylesheet" type="text/css" />
<table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td colspan="4"><b>Strefa autora</b> Jeste¶ zalogowany jako: <span class="login">{$authUser}</span></td>
  </tr>
</table>
<ul id="MenuBar1" class="MenuBarHorizontal">
  <li><a class="MenuBarItemSubmenu" href="?pg=11">Twoje Ksia¿ki</a>
    <ul>
      <li><a href="?pg=11">lista ksi±¿ek</a></li>
    </ul>
  </li>
  <li><a href="?edit&pg=5">zmiana has³a</a></li>
  <li><a href="?edit&pg=6">ustawienia</a></li>
  <li><a href="?pg=0&logout">wyloguj</a></li>
</ul>
{literal}
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"php/images/SpryMenuBarDownHover.gif", imgRight:"php/images/SpryMenuBarRightHover.gif"});
//-->
</script>
{/literal} <br />
<br />
