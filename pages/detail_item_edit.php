<title>APLOG Tracking System - Edit Item</title>
<?php
#include "../konfigurasi/cis_database.php";

if($_GET[status]=="save"){
    if($_SESSION['mode_login'] == 1){
        $sql="select area from tbl_user where id = ".$_SESSION[id_user];
        select($sql,"row");
        
        $origin = $get_row[0];
    }
    else{
        $origin = $_POST[origin];
    }

    $destination = $_POST[destination];

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
    
    $item_panjang   = $_POST['panjang'];
    foreach ($item_panjang as $key_panjang) { $val_panjang .= $key_panjang."|"; }
    $item_panjang = rtrim($val_panjang,'|');
    
    $item_lebar  = $_POST['lebar'];
    foreach ($item_lebar as $key_lebar) { $val_lebar .= $key_lebar."|"; }
    $item_lebar = rtrim($val_lebar,'|');
    
    $item_tinggi   = $_POST['tinggi'];
    foreach ($item_tinggi as $key_tinggi) { $val_tinggi .= $key_tinggi."|"; }
    $item_tinggi = rtrim($val_tinggi,'|');
    
    $item_berat   = $_POST['berat'];
    foreach ($item_berat as $key_berat) { $val_berat .= $key_berat."|"; }
    $item_berat = rtrim($val_berat,'|');
    
    /* hitung harga */
    include "konfigurasi/cis_calculation.php";
    $temp_panjang = $_POST['panjang'];
    $temp_tinggi = $_POST['tinggi'];
    $temp_lebar = $_POST['lebar'];
    $temp_berat = $_POST['berat'];
    
    $i=0;
    foreach($temp_tinggi as $looping){
        hitung($temp_panjang[$i], $temp_tinggi[$i], $temp_lebar[$i], $temp_berat[$i], $t_distance);
        $sum_harga += $harga;
        $val_harga .= $harga."|";
        $item_harga = rtrim($val_harga,"|");
        
        $i++;
    }

    $sql="update tbl_item set origin=".$origin.", destination=".$destination.", panjang='".$item_panjang."', lebar='".$item_lebar."', tinggi='".$item_tinggi."', berat='".$item_berat."', harga='".$item_harga."', total_harga=".$sum_harga." where id=".$_GET[id];
    insert($sql,"global","/?opsi=detail_item&id=".$_GET[id]);
}

$sql = "select b.nama_bandara from tbl_item a join tbl_bandara b on a.destination = b.id where a.id = ".$_GET[id];
select($sql,"row");
$destination = $get_row[0];


$sql = "select qty, kategori, panjang, lebar, tinggi, berat from tbl_item  where id = ".$_GET[id];
select($sql,"row");

?>

<div class="container-fluid">
	<div class="main-header"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <form action="/?opsi=detail_item_edit&id=<?php echo $_GET[id]; ?>&status=save" method="post">
                        <div div>
                            <label class="card-header-text"><font size="3">Edit Detail Barang</font></label>
                            <label>&nbsp;</label>
                            <input type="submit" class="btn btn-warning waves-effect waves-light" value="Simpan Data">
                        </div>
                    </div>
                    </br>
                    
                    <?php
                        if($_SESSION['mode_login']==2){
                    ?>
                            <div class="col-sm-12">
                              <div class="col-sm-2" align="left">
                                  <label><font size="2"><b>Bandara Asal</b></font></label>
                              </div>
                              
                              <div class="col-sm-3">
                                <select class="js-example-basic-single" id="o4" value="<?php echo $_GET[o4];?>" name="origin">
                        		<?php
                        		$sql = "select id, nama_bandara from tbl_bandara";
                        		select($sql,"column");
                        
                        		foreach($get_column as $data) {
                        			if ($data[0] == $_GET[o4])
                        				{$bandara_select="selected";}
                        			else
                        				{$bandara_select="";}
                        			echo '<option value="'.$data[0].'" '.$bandara_select.'>'.$data[1].'</option>';
                        		}
                                ?>
                                </select>
                              </div>
                              
                              <div class="col-sm-3" align="right">
                                  <label class="text-danger"><font size="2"><i>* Pilih Kembali Asal Bandara</i></font></label>
                              </div>
                            </div>
                    
                    <?php
                        }
                    ?>
                    
                    
                    
                    <div class="col-sm-12">
                      <div class="col-sm-2" align="left">
                          <label><font size="2"><b>Bandara Tujuan</b></font></label>
                      </div>
                      
                      <div class="col-sm-3">
                        <select class="js-example-basic-single" id="d4" value="<?php echo $_GET[d4];?>" name="destination">
                		<?php
                		$sql = "select id, nama_bandara from tbl_bandara";
                		select($sql,"column");
                
                		foreach($get_column as $data) {
                			if ($data[0] == $_GET[d4])
                				{$bandara_select="selected";}
                			else
                				{$bandara_select="";}
                			echo '<option value="'.$data[0].'" '.$bandara_select.'>'.$data[1].'</option>';
                		}
                        ?>
                        </select>
                      </div>
                      
                      <div class="col-sm-3" align="right">
                          <label class="text-danger"><font size="2"><i>* Pilih Kembali Tujuan Bandara</i></font></label>
                      </div>
                    </div>
                    <!-- end of card-header  -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="project-table">
                                <div class="col-sm-12 table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
							                    <th class="text-center txt-primary">No.</th>
                                                <th class="text-center txt-primary">Kategori</th>
                                                <th class="text-center txt-primary">Panjang (Cm)</th>
                                                <th class="text-center txt-primary">Lebar (Cm)</th>
                                                <th class="text-center txt-primary">Tinggi (Cm)</th>
							                    <th class="text-center txt-primary">Berat (Kg)</th>
                                            </tr>
                                        </thead>
                                    <tbody class="text-center">
<?php

    for ($x=0;$x<=$get_row{0}-1;$x++) {
        $no ++;
        for ($i=0;$i<=5;$i++) {
        $part = explode("|", $get_row{$i});
        $array .= $part[$x]."*aplog*";
    }

	$array = rtrim($array,'*aplog*');
    $array = explode("*aplog*",$array);
    $hasil = array();

    foreach ($array as $item) {
        $hasil[] = explode("*aplog*",$item);
    }

    $id_kategori = implode($hasil[1]);
    $sql_cat="select kategori from tbl_kategori where id =".$id_kategori;
    $result_cat = $conn->query($sql_cat);
    $row_cat = $result_cat->fetch_assoc();
    
    $kategori   = $row_cat[kategori];
    $panjang    = implode($hasil[2]);
    $lebar      = implode($hasil[3]);
    $tinggi     = implode($hasil[4]);
	$berat      = implode($hasil[5]);
	
	echo '
    <tr>
	<td>'.$no.'.</td>
	<td align="left"><label><font size=2>'.$kategori.'</font></label></td>
	<td><input type="number" value="'.$panjang.'" name=panjang[]></td>
	<td><input type="number" value="'.$lebar.'" name=lebar[]></td>
	<td><input type="number" value="'.$tinggi.'" name=tinggi[]></td>
	<td><input type="number" value="'.$berat.'" name=berat[]></td>
	</tr>';
}
?>
    </tbody>
    </table>
    </form>
    <!-- end of table -->
    </div>
    <!-- end of table responsive -->
    </div>
    <!-- end of project table -->
    </div>
    <!-- end of col-lg-12 -->
    </div>
    <!-- end  of row -->
    </div>
    </div>
    </div>
</div>


