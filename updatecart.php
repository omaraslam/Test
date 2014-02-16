<?
	include("includes/config.php");
	if(!empty($_GET['i_id'])){
		$index=$_GET['bingo'];
		$prod_id=$_POST['prod_id_'.$index.''];
		$prod_qty=$_POST['prod_qty_'.$index.''];
		$NameofCart='tland_cart';
		$temp = $_SESSION[$NameofCart];
		unset($_SESSION[$NameofCart]);
		$length = sizeof($temp);
		$price=$temp[$index][2];
		$total=$price*$prod_qty;
		$temp[$index][3]= $prod_qty;
		$_SESSION[$NameofCart] = $temp;
		//header("Location:mycart.php");
		echo "<scr"."ipt type='text/javascript'>location.replace('mycart.php')</scr"."ipt>";
	}
?>