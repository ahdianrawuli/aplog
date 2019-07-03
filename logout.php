<?php

session_start();
session_destroy();

header("Location: /cis_login.php");

?>
