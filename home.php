<?php

session_start();

include 'konfigurasi/cis_session.php';

$opsi	= $_GET['opsi'];

if ($opsi == "welcome")
{
	include 'konfigurasi/coba.php';
}

?>

