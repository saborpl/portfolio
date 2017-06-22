<script language="javascript" type="text/javascript">
		function submitbutton() {
			var form = document.form1;
			// do field validation
			if (form.telefon.value == "" || form.imie.value == "" || form.nazwisko.value == "" || form.email.value == "" || form.telefon.value == "" ) {
				alert( 'Wszystkie pola formularza nalezy wypelnic' );
				return false;
			}
			return true;
		}
		</script>
		
<form id="form1" name="form1" method="post" action="zamowienie-ok.php" onSubmit="return submitbutton();" ENCTYPE="multipart/form-data">
  <table border="0" align="center" cellpadding="2" cellspacing="2">
    <tr>
      <td colspan="2"><div align="center" class="style1">ZAM&Oacute;WIENIE KSI¡¯KI <strong><? echo $nazwa ?></strong><br />
      </div></td>
    </tr>
    <tr>
      <td width="50%" align="right" class="style2">Imiê</td>
      <td width="50%"><input name="imie" type="text" class="input1" id="imie" size="40" /></td>
    </tr>
    <tr>
      <td width="50%" align="right" class="style2">Nazwisko </td>
      <td width="50%"><input name="nazwisko" type="text" class="input1" id="nazwisko" size="40" /></td>
    </tr>
    <tr>
      <td align="right" class="style2">Adres email kontaktowy </td>
      <td><input name="email" type="text" class="input1" id="email" size="40" /></td>
    </tr>
    <tr>
      <td align="right" class="style2">Telefon kontaktowy</td>
      <td><input name="telefon" type="text" class="input1" id="telefon" size="40" /></td>
    </tr>
    <tr>
      <td colspan="2" class="style2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="reset" class="input1" value="Wyczysc" />
      <input type="hidden" name="tytul" value="<? echo $nazwa ?>" />
        <input name="send" type="submit" class="input1" id="send" value="zamów ksi±¿kê" /></td>
    </tr>
  </table>
    </form>
