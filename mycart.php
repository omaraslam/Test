<? 
	include("includes/config.php");
	include("includes/members.class.php");
	include("includes/orders.class.php");
	include("includes/product.class.php");
	//unset($_SESSION['tland_cart']);
	$myMember = new Members();
	$myOrder = new Orders();
	$products= new Prod();
	if(!empty($_GET['error'])){$error=$_GET['error'];}else{$error="";}
	if($_SESSION[SESSION_NAME]!=""){
		$cust_id = $_SESSION[SESSION_NAME.'_cust_id'];
		$cust_email = $_SESSION[SESSION_NAME.'_cust_email'];
		$cust_lastvisited = $_SESSION[SESSION_NAME.'_cust_lastvisited'];
		$cust_fullname = $_SESSION[SESSION_NAME.'_cust_firstname']." ".$_SESSION[SESSION_NAME.'_cust_lastname'];
		$cust_stamp = $_SESSION[SESSION_NAME.'_cust_stamp'];
		$memberjoining = date('M \'d:',$cust_stamp);
		$lastvisited = date('l d-M-Y g:i a',$cust_lastvisited);
		$myMember->UpdateMember($_SESSION[SESSION_NAME.'_cust_id']);}
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
    <form name="mycart" id="mycart" method="post">
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
                                                                    <tr><td align="left" valign="middle" class="text_20_bold_black">&nbsp;&nbsp;&nbsp;<strong>My Cart Items</strong></td></tr>
                                                                    <tr><td align="center" valign="middle" class="td_height_15" ></td></tr>
                                                                    <tr>
                                                                        <td align="center" valign="middle">
                                                                        	<div style="min-height:320px;">
                                                                            <table cellspacing="0" cellpadding="0" border="0" align="center" width="719">
                                                                            	<tr>
                                                                                	<td width="10"></td>
                                                                                	<td align="center" valign="middle">
                                                                                    	<table cellspacing="0" cellpadding="0" border="0" align="left" width="550" style="border:1px solid #999999;">
                                                                                        	<tr class="text_12_black bgcolor_orange" style="height:21px;">
                                                                                            	<td align="center" valign="middle"><strong>Image</strong></td>
                                                                                                <td align="center" valign="middle" width="75"><strong>Qty</strong></td>
                                                                                                <td align="left" valign="middle" width="250"><strong>Product(s)</strong></td>
                                                                                                <td align="left" valign="middle" width="50"><strong>Price</strong></td>
                                                                                                <td align="left" valign="middle" width="50"><strong>Total</strong></td>
                                                                                                <td align="center" valign="middle" width="75"><strong>Remove</strong></td>
                                                                                                <td align="center" valign="middle" width="75"><strong>Update</strong></td>
                                                                                            </tr>
                                                                                            <?
																								$total= 0;
																								$totalpro=0;
																								$class_switch='bgcolor_grey_lite';
																								if(session_is_registered('tland_cart')){ 
																									if(sizeof($_SESSION['tland_cart'])<>0){
																									 $length=sizeof($_SESSION['tland_cart']);
																									 $temp = $_SESSION['tland_cart'];
																									 for ($i=0; $i<$length; $i++){
																									 	if($i%2!=0){
																											$class_switch="";
																										}else{
																											$class_switch='bgcolor_grey_lite';
																										}
																										$prod_id = $temp[$i][0];
																										$prod_name = $temp[$i][1];
																										$prod_price = $temp[$i][2];
																										$prod_qty = $temp[$i][3];
																										$cat_id=$temp[$i][4];
																										$prod_code=$temp[$i][5];
																										$total=$prod_price*$prod_qty;
																										$request_column="prod_image_medium";
																										$pic=$products->getPicbyId($prod_id,$request_column);
																										//$description=;
																							?>
                                                                                            <input type="hidden" name="prod_id_<?=$i?>" id="prod_id_<?=$i?>" value="<?=$prod_id?>" />
                                                                                            <tr class="text_12_black <? echo $class_switch;?>">
                                                                                            	<td align="center" valign="middle"><img src="images/products/medium/<?=$pic;?>" style="width:100px;height:100px;" border="0" /></td>
                                                                                                <td align="center" valign="middle" width="75"><input type="text" name="prod_qty_<?=$i?>" id="prod_qty_<?=$i?>" value="<?=$prod_qty;?>" class="text_9_bold_black input_text" style="width:25px; text-align:center;" /></td>
                                                                                                <td align="left" valign="middle" width="200"><?=$prod_name;?></td>
                                                                                                <td align="left" valign="middle" width="75"><?=$prod_price?></td>
                                                                                                <td align="left" valign="middle" width="75"><?=$total?></td>
                                                                                                <td align="center" valign="middle" width="75"><img src="images/del.gif" width="16" height="16" border="0" align="middle" title="Delete" alt="Delete" name="delete" id="delete" onclick="delCartitem('<?=$i?>');" style="cursor:pointer;" /></td>
                                                                                                <td align="center" valign="middle" width="75"><input type="button" name="update_<?=$i?>" id="update_<?=$i?>" class="input_button text_9_bold_black" value="Update" onclick="updateCart('<?=$i?>');" style="cursor:pointer;" /></td>
                                                                                            </tr><input type='hidden' name='index_in_cart[]' value='<?=$i?>' checked='true'>
                                                                                            <? 		
																									}
																								}else{echo "<tr><td align='center' valign='middle' class='text_error' colspan='7'>There Are NO Items In Your Cart</td></tr>";}
																								}?>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr><td align="center" valign="middle" class="td_height47"></td></tr>
                                                                                <tr>
                                                                                    <td align="left" valign="middle" colspan="2">
                                                                                        <table cellspacing="0" cellpadding="0" border="0" align="left" width="500">
                                                                                            <tr>
                                                                                                <?php /*?><? if(session_is_registered('tland_cart') && sizeof($_SESSION['tland_cart'])>0){ ?><td align="right" valign="middle"><input type="submit" name="updatecart" id="updatecart" value="Update Cart" class="text_10_bblack input_cart" style="text-align:center;" /><? }?></td><?php */?>
                                                                                                <td align="center" valign="middle"><input type="button" name="continue" id="continue" value="Continue Shopping" class="text_10_bblack input_cart" style="text-align:left" <? if(sizeof($_SESSION['tland_cart'])>0){?>onclick="goto(<?=$cat_id?>);"<? }else{?>onclick="location.replace('products.php')"<? }?> /></td>
                                                                                                <? if(session_is_registered('tland_cart') && sizeof($_SESSION['tland_cart'])>0){ ?><td align="left" valign="middle"><input type="button" name="buy" id="buy" value="Buy From 2CO" class="text_10_bblack input_cart" style="text-align:center;" /><? }?></td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr><td align="center" valign="middle" class="td_height47"></td></tr>
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
    </form>
</body>
</html>
