<?php

include '../../konfigurasi/cis_database.php';

$code_barcode = $_GET[id];

$code_barcode = explode("-", $code_barcode);

$barcode = $code_barcode[0];

$pack    = (int)$code_barcode[1];

$sql = "select b.id, b.nama_bandara from tbl_item a join tbl_bandara b on a.destination = b.id where a.id = ".$barcode;
select($sql,"row");
$destination_kode = $get_row[0];
$destination = $get_row[1];


$sql = "select qty, kategori, panjang, lebar, tinggi, berat, nama_item, harga from tbl_item where id = ".$barcode;
select($sql,"row");

    #for ($x=0;$x<=$get_row{0}-1;$x++) {

 for ($x=$pack;$x<=$pack;$x++) {
     
        $no ++;
        for ($i=0;$i<=7;$i++) {
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

    if ($kategori==NULL || $panjang==NULL || $lebar==NULL || $tinggi==NULL || $berat==NULL)
    {echo "6282114565515";exit;}
	
   $sql = "select kategori from tbl_kategori where id=$kategori";
    select($sql,"column");

        echo '
        <td><input type="checkbox" name="record"></td>
        <td><input type=hidden class="form-control input-sm key" name=barcode[] value="'.$_GET[id].'" readonly>
            <lable><font size=2>'.$_GET[id].'</font></label></td>';

        foreach($get_column as $data) {
        echo '<td>
        <input type=hidden class="form-control input-lg" name=kategori[] value="'.$kategori.'" readonly>
        <lable><font size=2>'.$data[0].'</font></label>
        </td>';
        }

        echo '
       	<td><input type=hidden class="form-control input-sm" name=panjang[] value="'.$panjang.'" readonly>
       	    <lable><font size=2>'.$panjang.'</font></label></td>
        <td><input type=hidden class="form-control input-sm" name=lebar[] value="'.$lebar.'" readonly>
            <lable><font size=2>'.$lebar.'</font></label></td>
        <td><input type=hidden class="form-control input-sm" name=tinggi[] value="'.$tinggi.'" readonly>
            <lable><font size=2>'.$tinggi.'</font></label></td>
        <td><input type=hidden class="form-control input-sm" name=berat[] value="'.$berat.'" readonly>
            <lable><font size=2>'.$berat.'</font></label></td>
        <td>
        <input type=hidden class="form-control input-lg" name=destination[] value="'.$destination_kode.'" readonly>
            <lable><font size=2>'.$destination.'</font></label></td>
        <td valign="middle">
        	<div class="form-group row">
        	<div class="col-xs-2 col-form-label form-control-label">
                <select class="js-example-basic-single" id="d4" name="flight_number[]">';
        
                        $sql = "select * from tbl_flight_number";
                        select($sql,"column");
        
                        foreach($get_column as $data) {
                            echo '<option value="'.$data[0].'">'.$data[1].'</option>';
                        }
                echo '</select>
        	</div>
        	</div>
        </td>
        <td><input type=hidden class="form-control input-sm" name=harga_item[] value="'.$harga_item.'" readonly>
            <lable><font size=2>'.number_format($harga_item,0).'</font></label></td></td>
        <td><input type="checkbox" name="validasi[]"></td><br>
	';
}
?>
