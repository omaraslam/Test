<? 
	include("includes/config.php");
	include("includes/members.class.php");
	include("includes/orders.class.php");
	include("includes/product.class.php");	
	//htmlspecialchars(mysql_escape_string(trim($_POST['brand_name'])))."')
	$myMember = new Members();
	$myOrder = new Orders();
	$products= new Prod();
	$error="";
	if(!empty($_GET['bingo'])){
		/*GET PRODUCT DESCRIPTION*/
		$prod_id=$_GET['bingo'];
		$f_prod=$products->getProddescByid($prod_id);
		$prod_name=$f_prod['prod_name'];
		$prod_image=$f_prod['prod_image_medium'];
		$prod_image_large=$f_prod['prod_image_large'];
		$prod_description=$f_prod['prod_description'];
		$prod_price=$f_prod['prod_price'];
		$prod_material=$f_prod['prod_material'];
		$prod_image_1=$f_prod['prod_image_1'];
		$prod_image_2=$f_prod['prod_image_2'];
		$prod_image_3=$f_prod['prod_image_3'];
		$prod_quantity=$f_prod['prod_image_3'];
		if($prod_image==""){$prod_image="noimage.png";}
		if($prod_image_large==""){$prod_image_large="noimage.png";}
		if($prod_image_1==""){$prod_image_1="noimage.png";}
		if($prod_image_2==""){$prod_image_2="noimage.png";}
		if($prod_image_3==""){$prod_image_3="noimage.png";}
		/*GET PRODUCT DESCRIPTION*/
	}else{
		header("Location:products.php");
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
    <?PATH_CSS;?>
    <link rel="stylesheet" type="text/css" href="includes/styles.css" />
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
                                                <td align="center" valign="middle">
                                                	<table cellspacing="0" cellpadding="0" border="0" align="center" width="370">
                                                        <tr><td align="left" valign="middle" colspan="2" class="border_blue_1px td_height37 text_20_bold_black bgcolor_white">&nbsp;&nbsp;<?=$prod_name;?></td></tr>
                                                        <tr><td align="center" valign="middle" class="td_height_10" colspan="2"></td></tr>
                                                        <tr><td align="center" valign="middle" colspan="2" class="border_blue_1px"><div id="pic_viwer" style="height:305px; vertical-align:middle;" align="center" class="bgcolor_white"><img src="<?="thumb.php?file=images/products/medium/".$prod_image."&sizex=360&sizey=280";?>" align="absmiddle" alt="product" name="main" id="main" title="products" border="0" /></div></td></tr>
                                                        <tr><td align="center" valign="middle" class="td_height_10"></td></tr>
                                                        <tr>
                                                        	<td align="center" valign="middle" class="border_blue_1px td_height37 bgcolor_white">
                                                            	<table cellspacing="0" cellpadding="0" border="0" align="center" width="100%">
                                                                	<tr>
                                                                    	<td align="right" valign="middle" class="text_14_blue_bold">Enlarge Image&nbsp;</td>
			                                                            <td align="right" valign="middle" width="29"><img src="images/img-024.png" width="29" height="30" align="right" alt="Enlarge" id="Enlarge" name="Enlarge" title="Enlarge" border="0" onclick="popup(<?=$prod_id;?>);" style="cursor:pointer;" /></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <!--<tr>
                                                        	<td align="center" valign="middle" width="723">
                                                            	<table cellspacing="0" cellpadding="0" border="0" align="center" width="719" class="bgcolor_white border_blue_2px">
                                                                    <tr><td align="center" valign="middle" class="td_height_15" ></td></tr>
                                                                    <tr>
                                                                    	
                                                                        <td align="center" valign="middle">
                                                                            <table cellspacing="0" cellpadding="0" border="0" align="center" width="719">
                                                                            	<tr>
                                                                                	<td align="center" valign="middle">
                                                                                    	
                                                                                    </td>
                                                                                </tr>
                                                                                <?
																					if(!empty($_GET['bingo'])){
																						//$prod=$products->getProdbyCatid($_GET['bingo']);
																						//echo $prod;
																					}else{
																						//$prod=$products->getProdbyCatid(1);
																						//echo $prod;
																					}
																				?>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>-->
                                                    </table>
                                                </td>
                                                <td width="16"></td>
                                                <td align="center" valign="top">
                                                	<table cellspacing="0" cellpadding="0" border="0" align="center" width="530">
                                                    	<tr><td align="left" valign="middle" class="border_blue_1px td_height37 text_20_bold_black bgcolor_white">&nbsp;&nbsp;Detail</td></tr>
                                                        <tr><td align="center" valign="middle" class="td_height_10"></td></tr>
                                                        <tr>
                                                        	<td align="center" valign="top" class="bgcolor_white border_blue_1px" style="height:355px;">
                                                            	<table cellspacing="0" cellpadding="0" border="0" align="center" width="510" class="bgcolor_white">
                                                                	<tr><td align="center" valign="middle" class="td_height_10" colspan="2"></td></tr>
                                                                	<tr><td align="center" valign="top" class="text_12_black_light" colspan="2" style="text-align:justify; height:100px;"><strong><?=$prod_description;?></strong></td></tr>
                                                                    <tr>
                                                                    	<td align="center" valign="middle" colspan="2">
                                                                        	<table cellspacing="0" cellpadding="0" border="0" align="center" width="100%">
                                                                            	<tr>
                                                                                	<td align="center" valign="middle"><img src="<?="thumb.php?file=images/products/medium/".$prod_image."&sizex=100&sizey=120";?>" align="absmiddle" onclick="GetPic(this.id,'main');" alt="product" name="pic_main" id="<?=$prod_image;?>" title="products" border="0" style="cursor:pointer;" /></td>
                                                                                	<td align="center" valign="middle"><img src="<?="thumb.php?file=images/products/1/".$prod_image_1."&sizex=100&sizey=120";?>" align="absmiddle" onclick="GetPic(this.id,'1');" alt="product" name="pic_1" id="<?=$prod_image_1;?>" title="products" border="0" style="cursor:pointer;" /></td>
                                                                                    <td align="center" valign="middle"><img src="<?="thumb.php?file=images/products/2/".$prod_image_2."&sizex=100&sizey=120";?>" align="absmiddle" onclick="GetPic(this.id,'2');" alt="product" name="pic_2" id="<?=$prod_image_2;?>" title="products" border="0" style="cursor:pointer;" /></td>
                                                                                    <td align="center" valign="middle"><img src="<?="thumb.php?file=images/products/3/".$prod_image_3."&sizex=100&sizey=120";?>" align="absmiddle" onclick="GetPic(this.id,'3');" alt="product" name="pic_3" id="<?=$prod_image_3;?>" title="products" border="0" style="cursor:pointer;" /></td>
                                                                                </tr>
                                                                                <tr>
                                                                                	<td align="center" valign="middle" class="text_12_black"><strong>Main:</strong></td>
                                                                                	<td align="center" valign="middle" class="text_12_black"><strong>View 1:</strong></td>
                                                                                    <td align="center" valign="middle" class="text_12_black"><strong>View 2:</strong></td>
                                                                                    <td align="center" valign="middle" class="text_12_black"><strong>View 3:</strong></td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    <tr><td class="td_height47"></td></tr>
                                                                    <tr><td class="td_height27"></td></tr>
                                                                    <tr>
                                                                    	<td align="left" valign="bottom" class="text_14_blue_bold">Our Price: Rs&nbsp;<?=$prod_price;?></td>
                                                                        <td align="right" valign="bottom"><input type="button" name="AddToCart" id="AddToCart" value="&nbsp;Add To Cart" class="input_cart text_14_black" onclick="addCart('<?=$prod_id?>');" /></td>
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
