<? 
	include("includes/config.php");
	include("includes/members.class.php");
	include("includes/orders.class.php");
	include("includes/product.class.php");
	include("includes/pager.class.php");
	$myMember = new Members();
	$myOrder = new Orders();
	$products= new Prod();
	
	if(!empty($_REQUEST['page'])){
		$page = $_REQUEST['page'];
	}else{
		$page = 1;
	}
	$limit=1;
	$result = mysql_query("select count(*) from ".PRODUCT." where ".PRODUCT.".prod_status='1'");
	$total = mysql_result($result, 0, 0) or die(mysql_error());
	
	$pager  = Pager::getPagerData($total, $limit, $page);
	$offset = $pager->offset;
	$limit  = $pager->limit;
	$page   = $pager->page;
	
	if(!empty($_GET['error'])){$error=$_GET['error'];}else{$error="";}
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
                                                    	<tr><td align="center" valign="top" colspan="3"><img src="images/img-008.png" width="723" height="37" border="0" align="absbottom" alt="Welcome To Toy Land" name="img-008" id="img-008" title="Welcome To Toy Land" /></td></tr>
                                                        <tr>
                                                        	<td align="center" valign="middle" width="723">
                                                            	<table cellspacing="0" cellpadding="0" border="0" align="center" width="719" class="bgcolor_white border_blue_2px">
                                                                	<tr><td align="center" valign="middle" class="td_height_15" ></td></tr>
                                                                    <tr><td align="left" valign="middle" class="text_14_black">&nbsp;&nbsp;&nbsp;<strong>OUR PRODUCTS</strong></td></tr>
                                                                    <tr><td align="center" valign="middle" class="td_height_15" ></td></tr>
                                                                    <tr>
                                                                        <td align="center" valign="middle">
                                                                        	<div style="min-height:320px;">
                                                                            <table cellspacing="0" cellpadding="0" border="0" align="center" width="719">
                                                                            	<tr>
                                                                            	<?=$products->getLatestProd($offset,$limit);?>
                                                                                <tr><td align="center" class="td_height_15" colspan="9"></td></tr>
                                                                                <tr>
                                                            	<td align="left" valign="top" width="723" colspan="9">
                                                                	<table cellspacing="0" cellpadding="0" border="0" align="center" width="298">
                                                                    	<tr>
                                                                            <td align="left" valign="top" width="7"><img src="images/img_094.gif" width="7" height="23" border="0" alt="" /></td>
                                                                            <td align="left" valign="top" width="12"><img src="images/img_095.gif" width="12" height="23" border="0" alt="" /></td>
                                                                            <td align="left" valign="middle" width="259" class="bgimg_sponsorhip_003">
                                                                            	<table cellspacing="0" cellpadding="0" border="0" align="right" width="259">
                                                                                	<tr>
                                                                                    	<td align="left" valign="middle" width="50" class="text_white_10">
																						<?
																						if ($page == 1){
																							echo "&nbsp;Previous";
																						}else{
																							$pagenumprev=($page-1);
																							echo "&nbsp;<a href=\"index.php?page=$pagenumprev\" class='text_white_10_link'>Previous</a>";
																						}
																						?>
                                                                                        </td>
                                                                                        <td align="center" valign="middle" width="159" class="text_white_10">
																						<?
                                                                                        for ($i = 1; $i <= $pager->numPages; $i++) { 
                                                                                            echo "&nbsp;"; 
                                                                                            if ($i == $pager->page){
                                                                                                echo "$i";
                                                                                            }else{
                                                                                                echo "<a href=\"index.php?page=$i\" class='text_white_10_link'>$i</a>";
                                                                                            }
                                                                                        }
                                                                                        ?>
                                                                                    	</td>
                                                                                        <td align="right" valign="middle" width="50" class="text_white_10">
																						<?
                                                                                        if ($page == $pager->numPages){
                                                                                            echo "&nbsp;Next";
                                                                                        }else{
																							$pagenumnext=($page+1);
                                                                                            echo "&nbsp;<a href=\"index.php?page=$pagenumnext\" class='text_white_10_link'>Next</a>";
                                                                                        }
                                                                                        ?>&nbsp;
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            <td align="left" valign="top" width="12"><img src="images/img_096.gif" width="12" height="23" border="0" alt="" /></td>
                                                                            <td align="left" valign="top" width="8"><img src="images/img_097.gif" width="8" height="23" border="0" alt="" /></td>
                                                                        </tr>
                                                                    </table>
                                                           		</td>
                                                            </tr>
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
