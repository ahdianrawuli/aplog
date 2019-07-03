<?php

include 'cis_database.php';
session_start();

$ses	= $_GET[ses];

if ($_SESSION["session_hash"] !== NULL)
{

$get_sess = $_SESSION["session_hash"];

/*
if ($_SESSION["mode_login"] == 1) {
    $sql = "select session from user_reg where session='$get_sess'";
}
else if ($_SESSION["mode_login"] == 2) {
    $sql = "select session from tbl_partner where session='$get_sess'";
}
else if ($_SESSION["mode_login"] == 3) {
    $sql = "select session from tbl_officer where session='$get_sess'";
}
*/

$sql = "select session from tbl_user where session='$get_sess'";

select($sql,"row");
$session	= $get_row{0};
$session	= str_replace("+"," ",$session);
$_SESSION['session_hash'] = str_replace("+"," ",$_SESSION['session_hash']);

	if ($_SESSION["session_hash"] == $session)
	{
		$_SESSION["session_hash"] = $session;
	}
	else
	{
		// jika session tidak sama
		header("Location: /cis_login.php");
	}
}
else
{
	// jika session kosong
	header("Location: /cis_login.php");
}
?>
