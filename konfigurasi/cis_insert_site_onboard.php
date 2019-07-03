<?php
session_start();

include 'cis_database.php';

$item_barcode   = $_POST['barcode'];
foreach ($item_barcode as $key_barcode) { $val_barcode .= $key_barcode."|"; }
$item_barcode = rtrim($val_barcode,'|');
$item_barcode = explode("|", $item_barcode);
$count_barcode = count($item_barcode);

$item_berat   = $_POST['berat'];
foreach ($item_berat as $key_berat) { $val_berat .= $key_berat."|"; }
$item_berat = rtrim($val_berat,'|');
$item_berat = explode("|", $item_berat);

$item_validasi   = $_POST['validasi'];
foreach ($item_validasi as $key_validasi) { $val_validasi .= $key_validasi."|"; }
$item_validasi = rtrim($val_validasi,'|');
$item_validasi = explode("|", $item_validasi);

$item_panjang   = $_POST['panjang'];
foreach ($item_panjang as $key_panjang) { $val_panjang .= $key_panjang."|"; }
$item_panjang = rtrim($val_panjang,'|');
$item_panjang = explode("|", $item_panjang);

$item_lebar   = $_POST['lebar'];
foreach ($item_lebar as $key_lebar) { $val_lebar .= $key_lebar."|"; }
$item_lebar = rtrim($val_lebar,'|');
$item_lebar = explode("|", $item_lebar);

$item_tinggi   = $_POST['tinggi'];
foreach ($item_tinggi as $key_tinggi) { $val_tinggi .= $key_tinggi."|"; }
$item_tinggi = rtrim($val_tinggi,'|');
$item_tinggi = explode("|", $item_tinggi);

$item_destination   = $_POST['destination'];
foreach ($item_destination as $key_destination) { $val_destination .= $key_destination."|"; }
$item_destination = rtrim($val_destination,'|');
$item_destination = explode("|", $item_destination);

$item_kategori   = $_POST['kategori'];
foreach ($item_kategori as $key_kategori) { $val_kategori .= $key_kategori."|"; }
$item_kategori = rtrim($val_kategori,'|');
$item_kategori = explode("|", $item_kategori);

$item_flight   = $_POST['flight_number'];
foreach ($item_flight as $key_flight) { $val_flight .= $key_flight."|"; }
$item_flight = rtrim($val_flight,'|');
$item_flight = explode("|", $item_flight);


for ($i=0;$i<=$count_barcode-1;$i++)
{
#echo $item_barcode[$i];

if ($item_validasi[$i] == 1) {

    $arr_barcode = explode("/",$item_barcode[$i]);
    
    ## goku

    $xxx = "select * from tbl_item where smu='$arr_barcode[0]'";
    $result_xxx = $conn->query($xxx);
    if ($result_xxx->num_rows > 0)  {
        while($row_xxx = $result_xxx->fetch_assoc()) {
            $perusahaan = $row_xxx[nama_perusahaan];
            $flight = $row_xxx[flight_number];
            $telp = $row_xxx[no_telp];
            $item = explode("|",$row_xxx[nama_item]);
            $itemx .= $arr_barcode[0]."=".$item[$arr_barcode[2]]."=".$perusahaan.'='.$flight.'='.$telp.',';
        }
	}    
	
	### end goku
	
    $sql="update tbl_tracking set posisi = 'st_on' where id_item =".$arr_barcode[1]." and posisi_item = ".$arr_barcode[2];
    insert($sql,"ra");
    
    /* Log process into TKO */
    
    $sql="insert into log_tracking_item (dateinsert, id_item, posisi_item, id_officer, posisi) values(NOW(),'".$arr_barcode[1]."','".$arr_barcode[2]."', '".$_SESSION['id_user']."', 'st_on')";
    
    insert($sql,"ra");

}

    echo "<script>alert('Data berhasil disimpan')</script>";
    echo "<script>window.location='/?opsi=sto_on_tracking'</script>";

}

$string = rtrim($itemx,',');
$arr_string = explode(",",$string);
$hasil = array();
foreach ($arr_string as $key) {
    $hasil = explode("=",$key);
    $arr_hasil[] = array("smu"=>$hasil[0],"item"=>$hasil[1],"perusahaan"=>$hasil[2],"flight"=>$hasil[3],"telp"=>$hasil[4]);
}

function _group_by($array, $key) {
    $return = array();
    foreach($array as $val) {
        $return[$val[$key]][] = $val;
    }
    return $return;
}

$arr_result = _group_by($arr_hasil, 'smu');

foreach ($arr_result as $op) {
    $v++;
    $smu = $op[0]['smu'];
    foreach($op as $ip) {
        $no[$v]++;
        $arr_item[$v] .= "$no[$v]) $ip[item]%5Cn";
        $arr_flight[$v] = $ip[flight];
        $arr_telp[$v] = $ip[telp];
        $arr_perusahaan[$v] = $ip[perusahaan];
    }
    $pesan = "Kepada $arr_perusahaan[$v]%5Cn%5CnSMU : $smu%5CnFlight : $arr_flight[$v]%5CnTLP : $arr_telp[$v]%5Cn%5CnItem :%5Cn$arr_item[$v]%5Cn%5CnPOS : Departure";
    
    $ch = curl_init();

     // set url 
    curl_setopt($ch, CURLOPT_URL, "http://103.54.218.11/api/sms_api.php?submit=true&hp=$arr_telp[$v]&pesan=$pesan"); 
    
    //return the transfer as a string 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

    // $output contains the output string 
    curl_exec($ch);     
    
}

?>
