<?php

    include '../../konfigurasi/cis_database.php';

    #echo "<script>alert('".$_GET[id]."')</script>";
    #exit;

    $code_barcode = $_GET[id];
    $code_barcode = explode("-", $code_barcode);

    $barcode = $code_barcode[0];
    $pack    = (int)$code_barcode[1];

    #echo "<script>alert('".$barcode."/".$pack."')</script>";

    $sql = "select count(*), destination, kategori, panjang, lebar, tinggi, berat, flight from tbl_tracking where id_item = ".$barcode." and posisi_item = ".$pack." and posisi = 'st_on'";

    select($sql,"row");
    
    $valid = $get_row[0];
    
    if(!$valid){
        echo "<script>alert('Barcode Tidak Tersedia Pada Stock On Board')</script>";
    }
    else{
        $id_tujuan = $get_row[1];
        $id_kategori = $get_row[2];
        $panjang = $get_row[3];
        $lebar = $get_row[4];
        $tinggi = $get_row[5];
        $berat = $get_row[6];
        $id_flight = $get_row[7];
        
        $sql = "select kategori from tbl_kategori where id = ".$id_kategori;
        select($sql, "row");
        
        $kategori = $get_row[0];
        
        $sql = "select nama_bandara from tbl_bandara where id = ".$id_tujuan;
        select($sql, "row");
        
        $tujuan = $get_row[0];
        
        $sql = "select nama_pesawat from tbl_flight_number where id = ".$id_flight;
        select($sql,"row");
        
        $flight = $get_row[0];

        echo '<tr>
        <td><input type="checkbox" name="record"></td>
        <td>
            <input type=hidden class="form-control input-sm key" name=barcode[] value="'.$_GET[id].'" readonly>
            <label><font size=2>'.$_GET[id].'</font></label>
        </td>';

        echo '<td>
        <input type=hidden class="form-control input-lg" name=kategori[] value="'.$id_kategori.'" readonly>
        <label><font size=2>'.$kategori.'</font></label>
        </td>';
        
    
        echo '
       	<td><input type=hidden class="form-control input-sm" name=panjang[] value="'.$panjang.'" readonly>
       	    <label><font size=2>'.$panjang.'</font></label></td>
        <td><input type=hidden class="form-control input-sm" name=lebar[] value="'.$lebar.'" readonly>
            <label><font size=2>'.$lebar.'</font></label></td>
        <td><input type=hidden class="form-control input-sm" name=tinggi[] value="'.$tinggi.'" readonly>
            <label><font size=2>'.$tinggi.'</font></label></td>
        <td><input type=hidden class="form-control input-sm" name=berat[] value="'.$berat.'" readonly>
            <label><font size=2>'.$berat.'</font></label></td>
        <td>
            <input type=hidden class="form-control input-lg" name=destination[] value="'.$id_tujuan.'" readonly>
            <label><font size=2>'.$tujuan.'</font></label>
        </td>
        <td>
            <input type=hidden class="form-control input-lg" name=flight_number[] value="'.$id_flight.'" readonly>
            <label><font size=2>'.$flight.'</font></label>
        </td>
        <td><input type="checkbox" name="validasi[]"></td>
	    </tr>';
    }
?>

