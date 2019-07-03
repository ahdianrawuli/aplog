<?php

session_start();
include '../konfigurasi/cis_session.php';

?>

<title>APLOG Tracking System - Detail Item</title>

<!-- untuk append data ra scan (ra_detail.php))-->

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">

    $(document).ready(function(){

        $(".add-row").keypress(function(e){
            if(e.which == 13)
            {
             	var barcode = $("#barcode").val();
             	var barcode = barcode.split("/");
                var barcode = barcode[0]+'/'+barcode[1]+'/'+barcode[2];
                document.getElementById(barcode).value = "1";
                document.getElementById('checkin_'+barcode).innerHTML = "<font color=green><b>MASUK</b></font>";
                $("[id='barcode']").each(function(){
                $(this).val("");
                });

           }

	});
    });

</script>
<div class="container-fluid">
	<div class="main-header"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
			<b>DEPART > </b><label class="text-success"><b>MANIFEST ITEM</b></label>
	                    <input type="text" class="form-control form-control-lg add-row" id="barcode" placeholder="BARCODE SCAN" autofocus="autofocus">
            </div>
                    <!-- end of card-header  -->
	<div class="row">
       	    <div class="col-lg-12">
            	<div class="project-table">
                     <div class="col-sm-12 table-responsive">

	<form method=POST action="/konfigurasi/cis_insert_site_onboard.php">

	<table class="table table-hover">
        <thead>
            <tr>
                <th><font size="2">No.</font></th>
		<th><font size="2">SMU Number</font></th>
		<th><font size="2">Name</font></th>
                <th><font size="2">Company</font></th>
                <th><font size="2">Origin</font></th>
                <th><font size="2">Destination</font></th>
               	<th><font size="2">Category</font></th>
               	<th><font size="2">P</font></th>
               	<th><font size="2">L</font></th>
               	<th><font size="2">T</font></th>
               	<th><font size="2">B</font></th>
		<th><font size="2">Flight Number</font></th>
               	<th><font size="2"></font></th>
            </tr>
        </thead>

		<tbody class="text-center">
                    <?php

$sql = "select * from tbl_tracking where flight='".$_GET[fln]."' and posisi='tko'";
$result = $conn->query($sql);
$no=0;
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

	$kode = $row[barcode];
	$nama_perusahaan = $row[nama_perusahaan];
	$nama_item = $row[nama_item];

                $sql_smu = "select smu from tbl_item where id = ".$row[id_item];
                $result_smu = $conn->query($sql_smu);
                $row_smu = $result_smu->fetch_assoc();
                $smu = $row_smu[smu];
                
                $sql_origin = "select nama_bandara from tbl_bandara where id=".$row[origin];
                $result_origin = $conn->query($sql_origin);
                $row_origin = $result_origin->fetch_assoc();
                $origin = $row_origin[nama_bandara];

                $sql_dest = "select nama_bandara from tbl_bandara where id=".$row[destination];
             	$result_dest = $conn->query($sql_dest);
                $row_dest = $result_dest->fetch_assoc();
                $destination = $row_dest[nama_bandara];

               	$sql_kategori = "select kategori from tbl_kategori where id=".$row[kategori];
                $result_kategori = $conn->query($sql_kategori);
                $row_kategori = $result_kategori->fetch_assoc();

	$panjang = $row[panjang];
	$lebar = $row[lebar];
	$tinggi = $row[tinggi];
	$berat = $row[berat];
	$flight = $row[flight];
	
	$kode = str_replace("-","/",$kode);
	$kode = "$smu/$kode";

	$no++;
	echo "<tr color=red>
	<td><font size=2>$no</font></td>
	<td><font size=2><input type=hidden class='form-control input-sm key' name=barcode[] value='$kode' readonly>$smu</font></td>
	<td><font size=2>".strtoupper($nama_item)."</font></td>
	<td><font size=2>".strtoupper($nama_perusahaan)."</font></td>
	<td><font size=2>$origin</font></td>
	<td><font size=2><input type=hidden class='form-control input-sm key' name=destination[] value='$destination' readonly> $destination</font></td>
	<td><font size=2><input type=hidden class='form-control input-sm key' name=kategori[] value='$row_kategori[kategori]' readonly> $row_kategori[kategori]</font></td>
	<td><font size=2><input type=hidden class='form-control input-sm key' name=panjang[] value='$panjang' readonly> $panjang</font></td>
	<td><font size=2><input type=hidden class='form-control input-sm key' name=lebar[] value='$lebar' readonly> $lebar</font></td>
	<td><font size=2><input type=hidden class='form-control input-sm key' name=tinggi[] value='$tinggi' readonly> $tinggi</font></td>
	<td><font size=2><input type=hidden class='form-control input-sm key' name=berat[] value='$berat' readonly> $berat</font></td>
	<td><font size=2><input type=hidden class='form-control input-sm key' name=flight_number[] value='$flight' readonly> <b>$flight</b></font></td>
	<td><font size=2><input type=hidden id='$kode' name='validasi[]' value=0 readonly><div id='checkin_$kode'>________</div></font></td>
	</tr>";
    }
}
$conn->close();

?>
                                        </tbody>
                                    </table>
    <div class="form-group row" align="right">
    <div class="col-sm-12">
        <input type="submit" class="btn btn-primary waves-effect waves-light" value="SIMPAN">
    </div>
    </div>
				    </form>
                                    <!-- end of table -->
                                </div>
                                <!-- end of table responsive -->
                            </div>
                            <!-- end of project table -->
                        </div>
                        <!-- end of col-lg-12 -->
                    </div>
                <!-- end of row -->
                </div>
            </div>
        </div>
    </div>
