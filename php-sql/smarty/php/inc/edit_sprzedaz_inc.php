<!-- kazda ksiazka w petli -->
   <table width="900" border="0" align="center" cellpadding="2" cellspacing="2">
     <tr>
       <td align="" bgcolor="">
       <br />
       	<strong><?php echo $atr['nazwa'];?></strong>
		<?
       		$resB = mysql_query("SELECT userID,username FROM user WHERE admin !='1' AND userID=$atr[id_autora]");		  
			while($atra = mysql_fetch_assoc($resB)){
				echo $atra['username'];
			}
		?>
       </td>
       </tr>
       <tr>
       <td bgcolor="#e8e8e8"><table border="0" cellspacing="2" cellpadding="2">
         <tr>
           <td align="center">01</td>
           <td align="center">02</td>
           <td align="center">03</td>
           <td align="center">04</td>
           <td align="center">05</td>
           <td align="center">06</td>
           <td align="center">07</td>
           <td align="center">08</td>
           <td align="center">09</td>
           <td align="center">10</td>
           <td align="center">11</td>
           <td align="center">12</td>
           <td align="center">UWAGI</td>
         </tr>
         <tr>
           <td align="center"><input name="ilosc_sprzedana1" type="text" size="3" maxlength="5" value="<? echo $atr['ilosc_sprzedana1'] ?>" /></td>
           <td align="center"><input name="ilosc_sprzedana2" type="text" size="3" maxlength="5" value="<? echo $atr['ilosc_sprzedana2'] ?>" /></td>
           <td align="center"><input name="ilosc_sprzedana3" type="text" size="3" maxlength="5" value="<? echo $atr['ilosc_sprzedana3'] ?>" /></td>
           <td align="center"><input name="ilosc_sprzedana4" type="text" size="3" maxlength="5" value="<? echo $atr['ilosc_sprzedana4'] ?>" /></td>
           <td align="center"><input name="ilosc_sprzedana5" type="text" size="3" maxlength="5" value="<? echo $atr['ilosc_sprzedana5'] ?>" /></td>
           <td align="center"><input name="ilosc_sprzedana6" type="text" size="3" maxlength="5" value="<? echo $atr['ilosc_sprzedana6'] ?>" /></td>
           <td align="center"><input name="ilosc_sprzedana7" type="text" size="3" maxlength="5" value="<? echo $atr['ilosc_sprzedana7'] ?>" /></td>
           <td align="center"><input name="ilosc_sprzedana8" type="text" size="3" maxlength="5" value="<? echo $atr['ilosc_sprzedana8'] ?>" /></td>
           <td align="center"><input name="ilosc_sprzedana9" type="text" size="3" maxlength="5" value="<? echo $atr['ilosc_sprzedana9'] ?>" /></td>
           <td align="center"><input name="ilosc_sprzedana10" type="text" size="3" maxlength="5" value="<? echo $atr['ilosc_sprzedana10'] ?>" /></td>
           <td align="center"><input name="ilosc_sprzedana11" type="text" size="3" maxlength="5" value="<? echo $atr['ilosc_sprzedana11'] ?>" /></td>
           <td align="center"><input name="ilosc_sprzedana12" type="text" size="3" maxlength="5" value="<? echo $atr['ilosc_sprzedana12'] ?>" /></td>
           <td align="center"><textarea name="uwagi" cols="25" rows="2" id="uwagi"><?php echo $atr['uwagi'];?></textarea></td>
         </tr>
       </table></td>
     </tr>
</table>
<!-- koniec petli -->