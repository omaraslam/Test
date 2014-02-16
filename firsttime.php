<?
	if($_GET['ding']){
		$cust_id=base64_decode($_GET['ding']);
		$Mymember=new Members;
		$Mymember->Activateuser($cust_id);
		header("location:index.php?error=you can now sign-in");
	}
?>