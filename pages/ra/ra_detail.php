<?php

include '../../konfigurasi/cis_database.php';

$code_barcode = $_GET[id];
$code_barcode = explode("/", $code_barcode);
$smu_barcode = $code_barcode[0];
$barcode = $code_barcode[1];
$pack = (int)$code_barcode[2];

$sql = "select b.id, b.nama_bandara from tbl_item a join tbl_bandara b on a.destination = b.id where a.id = '".$barcode."'";
select($sql,"row");
$destination_kode = $get_row[0];
$destination = $get_row[1];

$sql = "select b.id, b.nama_bandara from tbl_item a join tbl_bandara b on a.origin = b.id where a.id = '".$barcode."'";
select($sql,"row");
$origin_kode = $get_row[0];
$origin = $get_row[1];

$sql = "select smu from tbl_item where id = ".$barcode;
select($sql, "row");
$smu = $get_row[0];


$sql = "select qty, kategori, panjang, lebar, tinggi, berat, nama_item, harga, cek_coli, flight_number, nama_perusahaan from tbl_item where id = '".$barcode."'";
select($sql,"row");

$flight_number=$get_row[9];

#for ($x=0;$x<=$get_row{0}-1;$x++) {

for ($x=$pack;$x<=$pack;$x++) {
     
        $no ++;
        for ($i=0;$i<=9;$i++) {
        $part = explode("|", $get_row{$i});
        $array .= $part[$x]."^";
    }

    $array = rtrim($array,'^');
    $array = explode("^",$array);
    $hasil = array();

    foreach ($array as $item) {
        $hasil[] = explode("^",$item);
    }

    $kategori	= implode($hasil[1]);
    $panjang    = implode($hasil[2]);
    $lebar      = implode($hasil[3]);
    $tinggi     = implode($hasil[4]);
    $berat      = implode($hasil[5]);
    $nama_item	= implode($hasil[6]);
    $harga_item	= implode($hasil[7]);
    $cek_coli   = implode($hasil[8]);
    $nama_perusahaan   = $get_row[10];

    if ($cek_coli == 1) {
       	$cek_coli = "<td><input type=checkbox checked onclick='return false;' style='width: 17px; height: 17px;'></td>";
    }
    else {
	    $cek_coli = "<td><input type=checkbox onclick='return false;' style='width: 17px; height: 17px;'></td>";
    }

    if ($kategori==NULL || $panjang==NULL || $lebar==NULL || $tinggi==NULL || $berat==NULL || $smu_barcode !== $smu)
    {echo "6282114565515";exit;}
	
    $sql = "select kategori from tbl_kategori where id=$kategori";
    select($sql,"column");

    echo '<tr>
        <td align="center"><input type="checkbox" name="record" style="width: 17px; height: 17px;"></td>
        
        <td align="center"><input type=hidden class="form-control input-sm key" name=barcode[] value="'.$_GET[id].'" readonly>
            <lable><font size=2>'.$smu.'</font></label></td>';

        foreach($get_column as $data) {
            echo '<td align="left">
            <input type=hidden class="form-control input-lg" name=kategori[] value="'.$kategori.'" readonly>
            <lable><font size=2>'.$data[0].'</font></label>
            </td>';
        }
        
        echo '
       	<td align="center"><input type=hidden class="form-control input-sm" name=panjang[] value="'.$panjang.'" readonly>
       	    <lable><font size=2>'.$panjang.'</font></label></td>
       	    
        <td align="center"><input type=hidden class="form-control input-sm" name=lebar[] value="'.$lebar.'" readonly>
            <lable><font size=2>'.$lebar.'</font></label></td>
            
        <td align="center"><input type=hidden class="form-control input-sm" name=tinggi[] value="'.$tinggi.'" readonly>
            <lable><font size=2>'.$tinggi.'</font></label></td>
            
        <td align="center"><input type=hidden class="form-control input-sm" name=berat_awal[] value="'.$berat.'">
        <input class="form-control input-sm" name=berat[] value="'.$berat.'" style="vertical-align: middle; margin-top: 2px; width: 50px; height: 20px; font-size: 12px;"></td>
        
        <td align="center"><input type=hidden class="form-control input-lg" name=origin[] value="'.$origin_kode.'" readonly>
            <lable><font size=2>'.$origin.'</font></label></td>
            
        <td align="center"><input type=hidden class="form-control input-lg" name=destination[] value="'.$destination_kode.'" readonly>
            <lable><font size=2>'.$destination.'</font></label></td>
            
        <td align="center"><input type=hidden class="form-control input-lg" name=flight_number[] value="'.$flight_number.'" readonly>
            <lable><font size=2>'.$flight_number.'</font></label></td>
            
        <!--<td align="right"><input type=hidden class="form-control input-sm" name=harga_item[] value="'.$harga_item.'" readonly>
        <lable><font size=2>'.number_format($harga_item,0).'</font></label></td></td>-->
        
	    '.$cek_coli.'
	    
        <td><input type="checkbox" name="reject[]" value="1" style="width: 17px; height: 17px;"></td>
        
        <td align="right"><textarea rows="2" cols="15" class="form-control input-sm" name=alasan[] value="" style="vertical-align: middle; margin-top: -10px; font-size: 12px;"></textarea></td>
	<input type="hidden" name="nama_perusahaan[]" value="'.$nama_perusahaan.'">
	<input type="hidden" name="nama_item[]" value="'.$nama_item.'">
	</tr>';
}
?>
