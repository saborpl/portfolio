<form action="<? echo $this->createAbsoluteUrl('default/search') ?>" method="post" enctype="multipart/form-data" name="search">

Wyniki wyszukiwania: <b><? echo $s ?></b>
<hr>
<table width="100%" style="background-color:#CCC">
  <tr>
    <td align="right" style="text-align:right">wyszukiwanie:</td>
    <td align="center" width="280"><input name="s" type="text" size="35"></td>
    <td style="text-align:left"><input name="submit" type="submit" value="wyszukaj"></td>
  </tr>
</table>
</form>
