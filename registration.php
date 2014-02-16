<? 
	include("includes/config.php");
	include("includes/tland.class.php");
	include("includes/members.class.php");
	$myMember = new Members();
	$userClass=new Tland;
	$months=$userClass->getMonths();
	$countries=$userClass->showCountry();
	if($_SESSION[SESSION_NAME]!=""){
		$cust_id = $_SESSION[SESSION_NAME.'_cust_id'];
		$cust_email = $_SESSION[SESSION_NAME.'_cust_email'];
		$cust_lastvisited = $_SESSION[SESSION_NAME.'_cust_lastvisited'];
		$cust_fullname = $_SESSION[SESSION_NAME.'_cust_firstname']." ".$_SESSION[SESSION_NAME.'_cust_lastname'];
		$cust_stamp = $_SESSION[SESSION_NAME.'_cust_stamp'];
		$memberjoining = date('M \'d:',$cust_stamp);
		$lastvisited = date('l d-M-Y g:i a',$cust_lastvisited);
		$myMember->UpdateMember($_SESSION[SESSION_NAME.'_cust_id']);
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="<?=CHARSET;?>"/>
    <title><?=SITE_TITLE;?></title>
    <?=PATH_CSS;?>
    <?=JAVASCRIPT_JQUERY;?>
    <?=JAVASCRIPT_MAIN;?>
    <script type="text/ecmascript">
		function MM_preloadImages() { //v3.0
		  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
			var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
			if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
		}
	</script>
</head>
<body onload="MM_preloadImages('images/img-003-1.png','images/aboutus-1.png','images/product-1.png','images/login-1.png','images/services-1.png','images/contactus-1.png','images/faq-1.png')">
	<div id='slider_div'>
		<? if(empty($_SESSION[SESSION_NAME])){include("includes/slider.php");}?>
    </div>
    <form name="resgisterForm" id="resgisterForm" method="post">
	<table cellspacing="0" cellpadding="0" border="0" align="center" width="100%">
    	<tr>
        	<td align="center" valign="top">
            	<table cellspacing="0" cellpadding="0" border="0" align="center" width="970" class="main_bg">
                	<? include("header.php");?>
                    <tr>
                    	<td align="center" valign="middle" width="100%">
                        	<table cellspacing="0" cellpadding="0" border="0" align="center" width="916">
                            	<!--HEADER SECTION!-->
                            	<tr><td align="center" valign="top" colspan="7" class="header"></td></tr>
                                <tr><td class="td_height_15"></td></tr>
                                <!--PAGE NAVIGATION!-->
                               <? include("includes/topnav.php");?>
                                <!--PAGE NAVIGATION!-->
                                <tr><td align="center" class="td_height_15" colspan="7"></td></tr>
                                <!--BODY SECTION!-->
                                <tr>
                                	<td align="center" valign="middle" colspan="7">
                                    	<table cellspacing="0" cellpadding="0" border="0" align="center" width="916">
                                        	<tr>
                                            	<td align="left" valign="top" width="181"><? include("leftmenu.php");?></td>
                                                <td width="10"></td>
                                                <td align="left" valign="top" width="723">
                                                	<table cellspacing="0" cellpadding="0" border="0" align="center" width="723" class="bgcolor_grey_lite">
                                                    	<tr><td valign="middle" class="body_title text_18_bold_white">&nbsp;&nbsp;Fill in the following form to Sign Up</td></tr>
                                                        <tr><td align="center" class="td_height27"><div id="msg" class="text_11_bold_green"></div></td></tr>
                                                    	<tr>
                                                        	<td align="center" valign="middle">
                                                            	<table cellspacing="5" cellpadding="0" border="0" align="center" width="703" class="bgcolor_grey_lite" >
                                                                    <tr><td align="left" valign="middle" class="text_12_black_light">First Name:</td></tr>
                                                                    <tr><td align="left" valign="middle"><input type="text" name="first_name" id="first_name" value="" class="text_12_black_light input_text" maxlength="55" /></td></tr>
                                                                    <tr><td align="left" valign="middle" class="text_12_black_light">Last Name:</td></tr>
                                                                    <tr><td align="left" valign="middle"><input type="text" name="last_name" id="last_name" value="" class="text_12_black_light input_text" maxlength="55" /></td></tr>
                                                                    <tr><td align="left" valign="middle" class="text_12_black_light">Birth Date&nbsp;&nbsp;<span class="text_9_bold_black">(Who wants to know?)</span></td></tr>
                                                                    <tr>
                                                                    	<td align="left" valign="middle">
                                                                        	<table cellspacing="0" cellpadding="0" border="0" align="left">
                                                                            	<tr>
                                                                                    <td align="left" valign="middle">
                                                                                        <select name="birth_year" id="birth_year" class="text_10_bblack input_select" style="width:50px;">
                                                                                            <option value="none">Year</option>
                                                                                            <?
                                                                                                for($i=1965; $i<=date('Y'); $i++){
                                                                                                    echo "<option value='$i'>$i</option>";
                                                                                                }
                                                                                            ?>
                                                                                        </select>
                                                                                    </td>
                                                                                    <td align="left" valign="middle">
                                                                                        <select name="birth_month" id="birth_month" class="text_10_bblack input_select" style="width:85px;">
                                                                                        	<option value="none">Month</option>
                                                                                            <?
                                                                                                for($i=1; $i<=sizeof($months); $i++){
                                                                                                    echo "<option value='$i'>$months[$i]</option>";
                                                                                                }
                                                                                            ?>
                                                                                        </select>
                                                                                    </td>
                                                                                    <td align="left" valign="middle">
                                                                                    	<select name="birth_day" id="birth_day" class="text_10_bblack input_select" style="width:50px;">
                                                                                        	<option value="none">Day</option>
																							<?
                                                                                                for($i=1; $i<=31; $i++){
                                                                                                    echo "<option value='$i'>$i</option>";
                                                                                                }
                                                                                            ?>
                                                                                        </select>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    <tr><td align="left" valign="middle" class="text_12_black_light">Country:</td></tr>
                                                                    <tr>
                                                                    	<td align="left" valign="middle">
                                                                        	<select name="user_country" id="user_country" class="text_10_bblack input_select">
                                                                                <option value="none">Please select a country</option>
                                                                                <?
																					for($i=1; $i<sizeof($countries); $i++){
																						echo "<option value=".$countries[$i].">".$countries[$i]."</option>";
																					}
                                                                                ?>
                                                                            </select>
	                                                                    </td>
                                                                    </tr>
                                                                    <tr><td align="left" valign="middle" class="text_12_black_light">E-mail Address:</td></tr>
                                                                    <tr>
                                                                    	<td align="center" valign="middle">
                                                                        	<table cellspacing="0" cellpadding="0" border="0" align="center" width="100%">
                                                                            	<tr>
                                                                                	<td align="left" valign="middle"><input type="text" name="user_email" id="user_email" class="text_12_black_light input_text" value="" onkeyup="validateEmail();" onblur="clearEmldiv();" maxlength="100" /></td>
                                                                                	<td align="left" valign="middle"><div id="email_status"></div></td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    <tr><td align="left" valign="middle" class="text_12_black_light">Password:</td></tr>
                                                                    <tr><td align="left" valign="middle"><input type="password" name="user_pass" id="user_pass" class="text_12_black_light input_text" value="" maxlength="55" /></td></tr>
                                                                    <tr><td align="left" valign="middle" class="text_12_black_light">Confirm Pass</td></tr>
                                                                    <tr>
                                                                    	<td align="center" valign="middle" height="34">
                                                                        	<table cellspacing="0" cellpadding="0" border="0" align="center" width="100%">
                                                                            	<tr>
                                                                                	<td align="left" valign="middle"><input type="password" name="user_cpass" id="user_cpass" class="text_12_black_light input_text" value="" maxlength="55" onkeyup="comp_pass(this.value)" onblur="clearPassdiv();" /></td>
                                                                                    <td align="left" valign="bottom"><div id="pas_status"></div></td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    <tr><td align="left" valign="middle" class="text_12_black_light">Telephone:</td></tr>
                                                                    <tr><td align="left" valign="middle"><input type="text" name="user_tel" id="user_tel" class="text_12_black_light input_text" value="" maxlength="55" /></td></tr>
                                                                    <tr><td align="left" valign="middle" class="text_12_black_light">Sign-Up For Newsletter:</td></tr>
                                                                    <tr><td align="left" valign="middle"><input type="button" name="Submit" id="Submit" value="Submit" class="input_button text_12_black" onclick="registerUser(this.form);" />&nbsp;&nbsp;<input type="reset" name="Reset" id="Reset" value="Reset" class="input_button text_12_black"  /></td></tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr><td class="td_height_15"></td></tr>
                               <? include("footer.php");?>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    </form>
</body>
</html>
