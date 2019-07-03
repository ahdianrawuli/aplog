<?php

    include '../../konfigurasi/cis_database.php';
    #echo "<script>alert('".$_GET[id]."')</script>";
    #exit;

    $code_barcode = $_GET[id];
    $code_barcode = explode("/", $code_barcode);
    $smu_barcode = $code_barcode[0];
    $barcode = $code_barcode[1];
    $pack    = (int)$code_barcode[2];

    #echo "<script>alert('".$barcode."/".$pack."')</script>";

    $sql = "select count(*), origin, destination, kategori, panjang, lebar, tinggi, berat, flight from tbl_tracking where id_item = ".$barcode." and posisi_item = ".$pack." and posisi = 'ra'";
    select($sql,"row");
    $valid = $get_row[0];
    
    $sql = "select smu from tbl_item where id = ".$barcode;
    select($sql, "row");
    $smu = $get_row[0];    
    
    if(!$valid || $smu_barcode !== $smu){
        echo "<script>alert('Barcode Tidak Tersedia Pada Stock Related Agent')</script>";
    }
    else{
        $id_asal = $get_row[1];
        $id_tujuan = $get_row[2];
        $id_kategori = $get_row[3];
        $panjang = $get_row[4];
        $lebar = $get_row[5];
        $tinggi = $get_row[6];
        $berat = $get_row[7];
        $flight_number = $get_row[8];
        
        $sql = "select smu from tbl_item where id = ".$barcode;
        select($sql, "row");
        $smu = $get_row[0];
        
        $sql = "select kategori from tbl_kategori where id = ".$id_kategori;
        select($sql, "row");
        $kategori = $get_row[0];
        
        $sql = "select nama_bandara from tbl_bandara where id = ".$id_asal;
        select($sql, "row");
        $asal = $get_row[0];
        
        $sql = "select nama_bandara from tbl_bandara where id = ".$id_tujuan;
        select($sql, "row");
        $tujuan = $get_row[0];
        
        echo '<tr>
        <td><input type="checkbox" name="record" style="width: 17px; height: 17px;"></td>
        
        <td align="center"><input type=hidden class="form-control input-sm key" name=barcode[] value="'.$_GET[id].'" readonly>
            <label><font size=2>'.$smu.'</font></label>
        </td>
        
        <td align="center"><input type=hidden class="form-control input-lg" name=kategori[] value="'.$id_kategori.'" readonly>
            <label><font size=2>'.$kategori.'</font></label>
        </td>
        
        <td align="center"><input type=hidden class="form-control input-sm" name=panjang_awal[] value="'.$panjang.'">
        <input class="form-control input-sm" name=panjang[] value="'.$panjang.'" style="width: 50px; height: 20px; font-size: 12px;"></td>
        
        <td align="center"><input type=hidden class="form-control input-sm" name=lebar_awal[] value="'.$lebar.'">
        <input class="form-control input-sm" name=lebar[] value="'.$lebar.'" style="width: 50px; height: 20px; font-size: 12px;"></td>
        
        <td align="center"><input type=hidden class="form-control input-sm" name=tinggi_awal[] value="'.$tinggi.'">
        <input class="form-control input-sm" name=tinggi[] value="'.$tinggi.'" style="width: 50px; height: 20px; font-size: 12px;"></td>
        
        <td align="center"><input type=hidden class="form-control input-sm" name=berat[] value="'.$berat.'" readonly>
            <label><font size=2>'.$berat.'</font></label></td>
        
        <td align="center"><input type=hidden class="form-control input-lg" name=origin[] value="'.$id_asal.'" readonly>
            <label><font size=2>'.$asal.'</font></label>
        </td>
        
        <td align="center"><input type=hidden class="form-control input-lg" name=destination[] value="'.$id_tujuan.'" readonly>
            <label><font size=2>'.$tujuan.'</font></label>
        </td>
        
        <td align="center"><input type=hidden class="form-control input-lg" name=flight_number[] value="'.$flight_number.'" readonly>
            <label><font size=2>'.$flight_number.'</font></label>
        </td>
        
        <td align="center"><input type="checkbox" name="reject[]" value="1" style="width: 17px; height: 17px;"></td>
        
        <td align="right"><textarea rows="2" cols="15" class="form-control input-sm" name=alasan[] value="" style="vertical-align: middle; margin-top: -10px; font-size: 12px;"></textarea></td>
	    </tr>';
    }
?>

