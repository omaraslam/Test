<?
	header("Cache-control: private"); //IE 6 Fix
	@session_start();
	foreach ($_SESSION as $VarName => $Value)  {
		unset ($_SESSION[$VarName]);
	}
	session_destroy();
	header("Location: index.php");
?>