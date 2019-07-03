<?php
session_start();

include 'cis_database.php';
include 'cis_calculation.php';

$item_barcode   = $_POST['barcode'];
foreach ($item_barcode as $key_barcode) { $val_barcode .= $key_barcode."|"; }
$item_barcode = rtrim($val_barcode,'|');
$item_barcode = explode("|", $item_barcode);
$count_barcode = count($item_barcode);

$item_berat_awal   = $_POST['berat_awal'];
foreach ($item_berat_awal as $key_berat_awal) { $val_berat_awal .= $key_berat_awal."|"; }
$item_berat_awal = rtrim($val_berat_awal,'|');
$item_berat_awal = explode("|", $item_berat_awal);

$item_berat   = $_POST['berat'];
foreach ($item_berat as $key_berat) { $val_berat .= $key_berat."|"; }
$item_berat = rtrim($val_berat,'|');
$item_berat = explode("|", $item_berat);

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

$item_origin   = $_POST['origin'];
foreach ($item_origin as $key_origin) { $val_origin .= $key_origin."|"; }
$item_origin = rtrim($val_origin,'|');
$item_origin = explode("|", $item_origin);

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

$item_reject   = $_POST['reject'];
foreach ($item_reject as $key_reject) { $val_reject .= $key_reject."|"; }
$item_reject = rtrim($val_reject,'|');
$item_reject = explode("|", $item_reject);

$item_alasan   = $_POST['alasan'];
foreach ($item_alasan as $key_alasan) { $val_alasan .= $key_alasan."|"; }
$item_alasan = rtrim($val_alasan,'|');
$item_alasan = explode("|", $item_alasan);

#$item_harga   = $_POST['harga_item'];
#foreach ($item_harga as $key_harga) { $val_harga .= $key_harga."|"; }
#$item_harga = rtrim($val_harga,'|');
#$item_harga = explode("|", $item_harga);

$item_perusahaan   = $_POST['nama_perusahaan'];
foreach ($item_perusahaan as $key_perusahaan) { $val_perusahaan .= $key_perusahaan."|"; }
$item_perusahaan = rtrim($val_perusahaan,'|');
$item_perusahaan = explode("|", $item_perusahaan);

$item_nama   = $_POST['nama_item'];
foreach ($item_nama as $key_nama) { $val_nama .= $key_nama."|"; }
$item_nama = rtrim($val_nama,'|');
$item_nama = explode("|", $item_nama);

for ($i=0;$i<=$count_barcode-1;$i++)
{
    
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
    
    $posisi = 'ra';
    
    $alasan="";
    $reject=0;
    if($item_reject[$i]!=null || $item_reject[$i]!=""){
        $alasan=$item_alasan[$i];
        $reject=1;
        $posisi="reject on ra";
    }
 
    hitung_real($item_panjang[$i], $item_tinggi[$i], $item_lebar[$i], $item_berat[$i], $posisi);
    $harga_ra = $harga;
 
    $sql="insert into tbl_tracking (dateinsert,id_item,posisi_item,origin,destination,kategori,panjang,lebar,tinggi,berat,barcode,flight,posisi, reject, alasan, harga_ra, nama_item, nama_perusahaan) values(NOW(),'".$arr_barcode[1]."','".$arr_barcode[2]."', '".$item_origin[$i]."', '".$item_destination[$i]."', '".$item_kategori[$i]."','".$item_panjang[$i]."', '".$item_lebar[$i]."', '".$item_tinggi[$i]."', '".$item_berat[$i]."', '".$arr_barcode[1]."-".$arr_barcode[2]."', '".$item_flight[$i]."', '".$posisi."',".$reject.", '".$alasan."',".$harga_ra.",'".$item_nama[$i]."','".$item_perusahaan[$i]."');";
    insert($sql,"ra");
    
    /* Log Process into RA */
    $sql="select id from tbl_user where session='".$_SESSION['session_hash']."'";
    select($sql,"row");
    $iduser = $get_row[0];
    
    $sql="insert into log_tracking_item (dateinsert, id_item, posisi_item, id_officer, posisi) values(NOW(),'".$arr_barcode[1]."','".$arr_barcode[2]."', '".$iduser."', 'ra')";
    insert($sql,"ra"); 
    
    /* Get Last Insert ID */
    $sql="select id from log_tracking_item where id_item = '".$arr_barcode[1]."' and posisi_item = '".$arr_barcode[2]."' and id_officer = '".$iduser."' and posisi = 'ra'";
    select($sql,"row");
    $last_id = $get_row[0];
    
    /* Update Keterangan Perubahan Nilai Parameter */
    if($item_berat_awal[$i] != $item_berat[$i]){
        $sql="update log_tracking_item set keterangan = 'Nilai Berat di revisi dari ".$item_berat_awal[$i]." menjadi ".$item_berat[$i]." oleh RA' where id=".$last_id;
        insert($sql,"ra");
    }
    
    /* Update status Rejected */
    if($reject==1){
        $sql="update log_tracking_item set status='rejected' where id=".$last_id;
        insert($sql,"ra");
    }
    
    echo "<script>alert('Data berhasil disimpan')</script>";
    echo "<script>window.location='/?opsi=ra_tracking'</script>";
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
    $pesan = "Kepada $arr_perusahaan[$v]%5Cn%5CnSMU : $smu%5CnFlight : $arr_flight[$v]%5CnTLP : $arr_telp[$v]%5Cn%5CnItem :%5Cn$arr_item[$v]%5Cn%5CnPOS : RA";
    
    $ch = curl_init();

     // set url 
    curl_setopt($ch, CURLOPT_URL, "http://103.54.218.11/api/sms_api.php?submit=true&hp=$arr_telp[$v]&pesan=$pesan"); 
    
    //return the transfer as a string 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

    // $output contains the output string 
    curl_exec($ch);     
    
}

?>
