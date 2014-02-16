<? 
	include("includes/config.php");
	include("includes/members.class.php");
	include("includes/orders.class.php");
	include("includes/product.class.php");	
	$myMember = new Members();
	$myOrder = new Orders();
	$products= new Prod();
	$error="";
	if(!empty($_GET['bingo'])){
		$cat_id=$_GET['bingo'];
	}else{
		$cat_id='2';
	}
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
    <meta http-equiv="Content-Type" content="<?=CHARSET;?>" />
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

<body onload="MM_preloadImages('images/slider.gif','images/log_sub.gif');">
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
                                <tr><td class="td_height_15" colspan="7"><div id="msg"><?=$error?></div></td></tr>
                                <tr>
                                	<td align="center" valign="middle" colspan="7">
                                    	<table cellspacing="0" cellpadding="0" border="0" align="center" width="916">
                                        	<tr>
                                            	<td align="left" valign="top" width="181"><? include("leftmenu.php");?></td>
                                                <td width="10"></td>
                                                <td align="center" valign="top">
                                                	<table cellspacing="0" cellpadding="0" border="0" align="center" width="723">
                                                    	<tr><td align="center" valign="top" colspan="3"><img src="images/img-023.png" width="723" height="37" border="0" align="absbottom" alt="Welcome To Toy Land" name="img-008" id="img-008" title="Welcome To Toy Land" /></td></tr>
                                                        <tr>
                                                        	<td align="center" valign="middle" width="723">
                                                            	<table cellspacing="0" cellpadding="0" border="0" align="center" width="719" class="bgcolor_white border_blue_2px">
                                                                    <tr><td align="center" valign="middle" class="td_height_15" ></td></tr>
                                                                    <tr>
                                                                        <td align="center" valign="middle">
                                                                        	<div style="height:400px;">
                                                                            <table cellspacing="0" cellpadding="0" border="0" align="left" width="719">
                                                                            	<tr>
                                                                                <?	echo $products->getProdbyCatid($cat_id);?>
                                                                            </table>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
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
</body>
</html>
