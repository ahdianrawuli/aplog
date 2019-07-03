<?php

session_start();
include 'cis_database.php';
include 'cis_calculation.php';

$smu                = $_POST['nomor_smu'];
$nama_perusahaan    = $_POST['nama_perusahaan'];
$email		        = $_POST['email'];
$no_telp	        = $_POST['no_telp'];
$qty_comodity		= $_POST['qty'];
$destination	    = $_POST['destination'];
$flight_number      = $_POST['flight_number'];

if($_SESSION['mode_login']==1){
    $sql="select area from tbl_user where id=".$_SESSION['id_user'];
    select($sql,"row");

    $origin=$get_row[0];
}
else{
    $origin=$_POST['origin'];

}

$sql_lat_lon_o = "select DISTINCT a.id, a.kode_data, a.nama_bandara, b.lat, b.lon from tbl_bandara a join tbl_airports b on a.kode_data = b.code where id = $destination order by a.nama_bandara";
$result_lat_lon_o = $conn->query($sql_lat_lon_o);
$row_lat_lon_o = $result_lat_lon_o->fetch_assoc();

$sql_lat_lon_d = "select DISTINCT a.id, a.kode_data, a.nama_bandara, b.lat, b.lon from tbl_bandara a join tbl_airports b on a.kode_data = b.code where id = $origin order by a.nama_bandara";
$result_lat_lon_d = $conn->query($sql_lat_lon_d);
$row_lat_lon_d = $result_lat_lon_d->fetch_assoc();

function distance($lat1, $lon1, $lat2, $lon2, $unit) {

  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);

  if ($unit == "K") {
      return ($miles * 1.609344);
  } else if ($unit == "N") {
      return ($miles * 0.8684);
  } else {
      return $miles;
  }
}

$harga_distance = 15; /* 15 rupiah */

$t_distance = distance($row_lat_lon_o[lat], $row_lat_lon_o[lon], $row_lat_lon_d[lat], $row_lat_lon_d[lon], "K") * $harga_distance;

$sql_id_officer	= "select id from tbl_user where session='".$_SESSION['session_hash']."'";
select($sql_id_officer,"row");
$id_perusahaan	= $get_row[0];


$index_coli=0;
$item_jlm_coli    = $_POST['jumlah_coli'];
foreach ($item_jlm_coli as $key_jlm_coli){
    $jlm_coli_per_comodity[$index_coli]=$key_jlm_coli;
    $qty+=$key_jlm_coli;
    $index_coli++;
}

$cnt=0;
$item_kategori   = $_POST['kategori'];
foreach ($item_kategori as $key_kategori) {
    for($x=0; $x<$jlm_coli_per_comodity[$cnt]; $x++){
        $val_kategori .= $key_kategori."|";
    }
    $cnt++;
}
$item_kategori = rtrim($val_kategori,'|');

$cnt=0;
$item_panjang	= $_POST['panjang'];
foreach ($item_panjang as $key_panjang) {
    for($x=0; $x<$jlm_coli_per_comodity[$cnt]; $x++){
        $val_panjang .= $key_panjang."|";
    }
    $cnt++;
}
$item_panjang = rtrim($val_panjang,'|');

$cnt=0;
$item_lebar     = $_POST['lebar'];
foreach ($item_lebar as $key_lebar) {
    for($x=0; $x<$jlm_coli_per_comodity[$cnt]; $x++){
        $val_lebar .= $key_lebar."|";
    }
    $cnt++;
}
$item_lebar = rtrim($val_lebar,'|');

$cnt=0;
$item_tinggi    = $_POST['tinggi'];
foreach ($item_tinggi as $key_tinggi) {
    for($x=0; $x<$jlm_coli_per_comodity[$cnt]; $x++){
        $val_tinggi .= $key_tinggi."|";
    }
    $cnt++;
}
$item_tinggi = rtrim($val_tinggi,'|');

$cnt=0;
$item_berat    = $_POST['berat'];
foreach ($item_berat as $key_berat) {
    for($x=0; $x<$jlm_coli_per_comodity[$cnt]; $x++){
        $val_berat .= $key_berat."|";
    }
    $cnt++;
}
$item_berat = rtrim($val_berat,'|');

$cnt=0;
$item_nama    = $_POST['nama_item'];
foreach ($item_nama as $key_nama) {
    for($x=0; $x<$jlm_coli_per_comodity[$cnt]; $x++){
        $val_nama .= $key_nama."|";
    }
    $cnt++;
}
$item_nama = rtrim($val_nama,'|');

$cnt=0;
$cek_coli    = $_POST['cek_coli'];
foreach ($cek_coli as $key_cek_coli) {
    for($x=0; $x<$jlm_coli_per_comodity[$cnt]; $x++){
        $val_cek_coli .= $key_cek_coli."|";
    }
    $cnt++;
}
$cek_coli = rtrim($val_cek_coli,'|');

/* hitung harga */
$temp_panjang = $_POST['panjang'];
$temp_tinggi = $_POST['tinggi'];
$temp_lebar = $_POST['lebar'];
$temp_berat = $_POST['berat'];

for($i=0; $i<$qty_comodity; $i++){
    for($x=0; $x<$jlm_coli_per_comodity[$i]; $x++){
        hitung($temp_panjang[$i], $temp_tinggi[$i], $temp_lebar[$i], $temp_berat[$i], $t_distance);
        $sum_harga += $harga;
        $val_harga .= $harga."|";
    }
    $item_harga = rtrim($val_harga,"|");
}

$sql = "insert into tbl_item (smu,dateinsert,id_officer,nama_perusahaan,email,no_telp,qty_comodity,qty,origin,destination,flight_number,kategori,panjang,lebar,tinggi,berat,nama_item,harga, total_harga, cek_coli) 
	    values ('$smu',NOW(),'$id_perusahaan','$nama_perusahaan','$email','$no_telp','$qty_comodity','$qty','$origin','$destination','$flight_number','$item_kategori','$item_panjang','$item_lebar','$item_tinggi','$item_berat','$item_nama','$item_harga','$sum_harga','$cek_coli')";

insert($sql,"global","/?opsi=item");

?>
