<? 
	include("includes/config.php");
	include("includes/members.class.php");
	$myMember = new Members();
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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?=SITE_TITLE?></title>
    <?=PATH_CSS;?>
    <?=JAVASCRIPT_JQUERY;?>
    <?=JAVASCRIPT_MAIN;?>
</head>

<body>
	<div id='slider_div'>
		<? if(empty($_SESSION[SESSION_NAME])){include("includes/slider.php");}?>
    </div>
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
                                <tr><td align="center" valign="middle" class="td_height_15"></td></tr>
                                <!--PAGE NAVIGATION!-->
                                 <? include("includes/topnav.php");?>
                                <!--PAGE NAVIGATION!-->
                                <tr><td class="td_height_15" colspan="7"></td></tr>
                                <tr>
                                	<td align="center" valign="middle" colspan="7">
                                    	<table cellspacing="0" cellpadding="0" border="0" align="center" width="916">
                                        	<tr>
                                                <td align="center" valign="top">
                                                	<table cellspacing="0" cellpadding="0" border="0" align="center" width="916">
                                                    	<tr><td align="center" valign="top" colspan="3"><img src="images/img-021.gif" width="916" height="37" border="0" align="absbottom" alt="Contact Us" name="img-020" id="img-020" title="Contact Us" /></td></tr>
                                                        <tr>
                                                        	<td align="center" valign="middle" width="916">
                                                            	<table cellspacing="0" cellpadding="0" border="0" align="center" width="916" class="bgcolor_white border_blue_2px">
                                                                	<tr><td align="center" valign="middle" class="td_height_15" ></td></tr>
                                                                    <tr>
                                                                        <td align="center" valign="middle">
                                                                            <table cellspacing="0" cellpadding="0" border="0" align="center" width="894">
                                                                                <tr><td class="td_height_15" colspan="7"></td></tr>
                                                                                <tr>
                                                                                	<td align="center" valign="middle" class="text_12_black justifty">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</td>
                                                                                </tr>
                                                                                <tr><td class="td_height_15" colspan="7"></td></tr>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <!--<tr><td align="center" valign="top" colspan="7"><img src="images/img-019.gif" width="916" height="8" border="0" align="absmiddle" alt="img-019" name="img-019" id="img-019" /></td></tr>-->
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
</body>
</html>
