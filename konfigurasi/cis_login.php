<?php

include 'cis_database.php';
include 'cis_decrypt.php';
include 'cis_encrypt.php';

$email	= $_POST['email'];
$pass	= $_POST['password'];
$mode_login = $_POST['mode'];

/*
if ($mode_login == 1) {
	$sql = "select email, password, session from tbl_user where email='$email'";
} else
if ($mode_login	== 2) {
        $sql = "select email, password, session from tbl_user where email='$email'";
} else {
	echo "<script>alert('Mode tidak ada');window.location='/cis_login.php'</script>";
}
*/

$sql="select id, level, category, posisi, email, password, session from tbl_user where email='$email' and level='$mode_login'";

select($sql,"row");
$id_user        = $get_row[0];
$mode_user      = $get_row[1];
$category_user  = $get_row[2];
$posisi_user    = $get_row[3];
$email          = $get_row{4};
$hash   	    = $get_row{5};
$cek_pass       = trim(Decrypt("418736^*&90416934hsdjkf27&*(&","$hash"));

if ($pass == $cek_pass){

    $session = Encrypt("hfhasf7f98ae7f90rh3rfewf71312%%23421$", "$hash");
	$session = str_replace("+"," ",$session);

        /*
		if ($mode_login == 1){ 
		    $sql_update_session = "update user_reg set session='$session' where email='$email'"; }
		else if ($mode_login == 2){ 
		    $sql_update_session = "update tbl_partner set session='$session' where email='$email'"; }
		else if ($mode_login == 3){ 
		    $sql_update_session = "update tbl_officer set session='$session' where email='$email'"; }
        */
        
    $sql_update_session="update tbl_user set session='$session' where email='$email' and level='$mode_login'";
	update($sql_update_session);

	session_start();
	$_SESSION['id_user']        = $id_user;
	$_SESSION['category_user']  = $category_user;
	$_SESSION['posisi_user']    = $posisi_user;
	$_SESSION['session_hash']   = $session;
	$_SESSION['mode_login']     = $mode_login;
	echo "<script>window.location='/?opsi=dashboard'</script>";
}
else
{
	echo "<script>alert('Login Failed [User not available]')</script>";
	echo "<script>window.location='/cis_login.php'</script>";
}

$conn->close();
?>
