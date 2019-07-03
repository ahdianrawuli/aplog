  <?php
       	include "../konfigurasi/cis_encrypt.php";
        include "../konfigurasi/cis_decrypt.php";

$a=1;

if ($a==1)
{

        $word = "TEST";
	$encryption_word = Encrypt("418736^*&90416934hsdjkf27&*(&","$word");
	echo $encryption_word;
}
?>
