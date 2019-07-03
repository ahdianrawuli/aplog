<?php

include 'cis_database.php';
include 'cis_encrypt.php';

$fname	=	$_POST['fname'];
$lname	=	$_POST['lname'];
$email	=	$_POST['email'];
$pass1	=	$_POST['password1'];
$pass2	=	$_POST['password2'];

if ($pass1 !== $pass2)
{
	echo "<script>alert('Maaf, password tidak sama')</script>";
	echo "<script>window.location='/cis_reg.php'</script>";
}
else
{

	$pass1 = Encrypt("418736^*&90416934hsdjkf27&*(&", "$pass1");

	$sql = "insert into user_reg (fname, lname, email, password)
	value ('$fname', '$lname', '$email', '$pass1')";

	insert($sql,"register");

}

?>
