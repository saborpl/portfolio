<script src="php/js/menubar.js" type="text/javascript"></script>
<link href="php/css/menubar.css" rel="stylesheet" type="text/css" />
<table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td colspan="4"><b>Strefa autora</b> Jeste¶ zalogowany jako: <span class="login">{$authUser}</span></td>
  </tr>
</table>

<ul id="MenuBar1" class="MenuBarHorizontal">
  <li><a class="MenuBarItemSubmenu" href="?pg=1">autorzy</a>
      <ul>
        <li><a href="?pg=1">lista autorów</a></li>
		  <li><a href="?pg=3&register">dodaj autora</a></li>
      </ul>
  </li>  
  <li><a class="MenuBarItemSubmenu" href="?pg=2">publikacje</a>
      <ul>
        <li><a href="?pg=2">lista publikacji</a></li>
        <li><a href="?pg=7">dodaj ksiazke</a></li>
        <!--<li><a href="?pg=9">sprzeda?</a></li>-->
      </ul>
  </li> 
  <li><a href="?edit&pg=5">zmiana has³a</a></li>
  <li><a href="?edit&pg=6">ustawienia</a></li>
  <li><a href="?pg=3&register">rejestracja</a></li>
    <li><a href="?pg=0&logout">wyloguj</a></li>
</ul>
<!--<ul id="MenuBar1" class="MenuBarHorizontal">
  <li><a class="MenuBarItemSubmenu" href="#">Item 1</a>
      <ul>
        <li><a href="#">Item 1.1</a></li>
        <li><a href="#">Item 1.2</a></li>
        <li><a href="#">Item 1.3</a></li>
      </ul>
  </li>
  <li><a href="#">Item 2</a></li>
  <li><a class="MenuBarItemSubmenu" href="#">Item 3</a>
      <ul>
        <li><a class="MenuBarItemSubmenu" href="#">Item 3.1</a>
            <ul>
              <li><a href="#">Item 3.1.1</a></li>
              <li><a href="#">Item 3.1.2</a></li>
            </ul>
        </li>
        <li><a href="#">Item 3.2</a></li>
        <li><a href="#">Item 3.3</a></li>
      </ul>
  </li>
  <li><a href="#">Item 4</a></li>
</ul>
-->

{literal}
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"php/images/SpryMenuBarDownHover.gif", imgRight:"php/images/SpryMenuBarRightHover.gif"});
//-->
</script>
{/literal}
<br /><br />