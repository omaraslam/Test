<?
	$total_items=0;
	if(session_is_registered('tland_cart')){ 
		for($i=0; $i<sizeof($_SESSION['tland_cart']); $i++){
			$total_items=$total_items+$_SESSION['tland_cart'][$i][3];
		}
	}
?>
<tr>
    <td align="center" valign="bottom" class="td_height27">
        <table cellspacing="0" cellpadding="0" border="0" align="center" width="915">
            <tr>
                <td align="right" valign="middle"><img src="images/img-012.gif" width="19" height="17" border="0" name="img-012" id="img-012" title="Cart Items" alt="Cart" /></td>
                <td align="right" valign="middle" class="text_9_bold_black" width="215">&nbsp;<a href="mycart.php"><?=$total_items?> Items</a>&nbsp;&nbsp;|&nbsp;&nbsp;<span id="welcome" class="text_11_bold_green"><? if($_SESSION[SESSION_NAME]!=""){ echo "<a href='signout.php'><strong>Signout</strong></a>&nbsp;&nbsp;".$_SESSION[SESSION_NAME.'_cust_firstname']."&nbsp;".$_SESSION[SESSION_NAME.'_cust_lastname']."&nbsp;&nbsp;";}?></span>|&nbsp;&nbsp;Help</td>
            </tr>
        </table>
    </td>
</tr>