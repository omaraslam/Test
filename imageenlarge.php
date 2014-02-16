<?
	include("includes/config.php");
	include("includes/product.class.php");
	$myProduct=new Prod;
	$pic_id=mysql_escape_string($_GET['pic_id']);
	$prod_id=mysql_escape_string($_GET['prod_id']);
	if($pic_id=="main"){
		$request_column="prod_image_medium";
		$path="images/products/medium/";
	}else if($pic_id=="1"){
		$request_column="prod_image_1";
		$path="images/products/1/";
	}else if($pic_id=="2"){
		$request_column="prod_image_2";
		$path="images/products/2/";
	}else if($pic_id=="3"){
		$request_column="prod_image_3";
		$path="images/products/3/";
	}
	$img=$myProduct->getPicbyId($prod_id,$request_column);
	if($img==""){$img="noimage.png";}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="<?=CHARSET;?>" />
<title><?=SITE_TITLE;?></title>
</head>

<body>
	<table cellspacing="0" cellpadding="0" border="0" align="center" width="100%">
    	<tr>
        	<td align="center" valign="middle"><img src="<?=$path.$img?>" style="width:auto; height:auto;" align="absmiddle" alt="product" name="main" id="main" title="products" border="0" /></td>
        </tr>
    </table>
</body>
</html>
