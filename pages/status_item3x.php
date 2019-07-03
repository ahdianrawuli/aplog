<?php

session_start();
include '../konfigurasi/cis_session.php';

if ($_SESSION[mode_login] == 1) {
	$sql_user1 = "select id,id_parent,level,posisi from tbl_user where session='$session'";
	$result_user1 = $conn->query($sql_user1);
	$row_user1 = $result_user1->fetch_assoc();
	#echo $row_user1[id];

	if ($row_user1[level] == 1 and $row_user1[id_parent] == 0) {

	        $sql_user2 = "select id from tbl_user where id_parent=".$row_user1[id];
	        $result_user2 = $conn->query($sql_user2);
	        while($row_user2 = $result_user2->fetch_assoc())
		{
		$trim_id .= $row_user2[id].",";
		}
		$trim_id = rtrim($trim_id,",");

	        $sql_user3 = "select id from tbl_user where id_parent in ($trim_id) or id_parent in (select id from tbl_user where id_parent=0 and level=1)";
	        $result_user3 = $conn->query($sql_user3);
	        while($row_user3 = $result_user3->fetch_assoc())
		{
		$fix_id .= $row_user3[id].",";
		}
		$fix_id = rtrim($fix_id,",");
	}
	else if ($row_user1[level] == 1 and $row_user1[id_parent] > 0) {

               	$sql_user2 = "select id from tbl_user where id_parent in (select id from tbl_user where id_parent=0 and level=1)";
               	$result_user2 = $conn->query($sql_user2);
               	while($row_user2 = $result_user2->fetch_assoc())
               	{
               	$trim_id .= $row_user2[id].",";
               	}
               	$trim_id = rtrim($trim_id,",");

               	$sql_user3 = "select id from tbl_user where id_parent in ($trim_id) or id_parent in (select id from tbl_user where id_parent=0 and level=1)";
               	$result_user3 = $conn->query($sql_user3);
               	while($row_user3 = $result_user3->fetch_assoc())
               	{
                $fix_id .= $row_user3[id].",";
               	}
	        $fix_id = rtrim($fix_id,",");

	}
}
if ($_SESSION[mode_login] == 2) {
        $sql_user1 = "select id,id_parent,level,posisi,category from tbl_user where session='$session'";
        $result_user1 = $conn->query($sql_user1);
        $row_user1 = $result_user1->fetch_assoc();
        #echo $row_user1[id];

	if ($row_user1[level] == 2 and $row_user1[category] == "admin") {

                $sql_user3 = "select id from tbl_user where id_parent =".$row_user1[id];
               	$result_user3 = $conn->query($sql_user3);
               	while($row_user3 = $result_user3->fetch_assoc())
               	{
               	$fix_id .= $row_user3[id].",";
               	}
                $fix_id = rtrim($fix_id,",");
	}
	else if ($row_user1[level] == 2 and $row_user1[category] == "officer") {

                $sql_user2 = "select id from tbl_user where id_parent = '".$row_user1[id_parent]."'";
                $result_user2 = $conn->query($sql_user2);
                while($row_user2 = $result_user2->fetch_assoc())
                {
                $trim_id .= $row_user2[id].",";
                }
                $trim_id = rtrim($trim_id,",");

                $sql_user3 = "select id from tbl_user where id in ($trim_id)";
               	$result_user3 = $conn->query($sql_user3);
               	while($row_user3 = $result_user3->fetch_assoc())
               	{
               	$fix_id .= $row_user3[id].",";
               	}
               	$fix_id = rtrim($fix_id,",");
        }

}

?>

<html>
<head>

<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
<link rel="stylesheet" type="text/css" href="/media/css/site-examples.css?_=19472395a2969da78c8a4c707e72123a">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<style type="text/css" class="init"></style>
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
<script type="text/javascript" class="init">
$(document).ready(function() {
	$('#example').DataTable({
	dom: 'Bfrtip',
        buttons: [
            {
                extend: 'pdfHtml5',
                customize: function ( doc ) {
                    doc.content.splice( 1, 0, {
                        margin: [ 0, 0, 0, 12 ],
                        alignment: 'left',
			image: 'data:image/png;base64,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',
			width: 150
                    } );
                },
		title: 'DATA REPORT APLOG',
		filename: 'Data Report APLOG',
                orientation: 'landscape',
                pageSize: 'LEGAL'
            }
        ],
        "oLanguage": {
	    "sZeroRecords": "Data tidak ada..",
            "sLengthMenu": "Tampilkan _MENU_ data",
	    "sSearch": "Mencari _INPUT_",
	    "sInfo": "Tampilkan _START_ ke _END_ dari _TOTAL_"

        }

    });
} );
</script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
</head>

<body>

<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th><font size="2">No.</font></th>
                <th><font size="2">Time</font></th>
				<!--<th><font size="2">Kode</font></th>
				<th><font size="2">Barcode</font></th>-->
				<th><font size="2">SMU Number</font></th>
				<th><font size="2">Description</font></th>
                <th><font size="2">Company</font></th>
                <th><font size="2">Origin</font></th>
                <th><font size="2">Destination</font></th>
               	<th><font size="2">Category</font></th>
               	<th><font size="2">P</font></th>
               	<th><font size="2">L</font></th>
               	<th><font size="2">T</font></th>
               	<th><font size="2">B</font></th>
		        <th><font size="2">Flight Number</font></th>
               	<th><font size="2">Status</font></th>
            </tr>
        </thead>

                <tbody>
                    <?php

$sql = "select id,smu,nama_perusahaan,destination,qty,kategori,panjang,lebar,tinggi,berat, nama_item, origin from tbl_item where id_officer in ($fix_id) order by id DESC";

$result = $conn->query($sql);
$no=0;
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
	$col = $row[qty]-1;
	for ($i=0;$i<=$col;$i++) {
		$no++;
		/* start komparasi dari table item */

		$id = $row[id];
		$nama_perusahaan = $row[nama_perusahaan];
		
		$smu= $row[smu];
		
		$sql_origin = "select nama_bandara from tbl_bandara where id=".$row[origin];
		$result_origin = $conn->query($sql_origin);
		$row_origin = $result_origin->fetch_assoc();
		$origin = $row_origin[nama_bandara];

		$sql_dest = "select nama_bandara from tbl_bandara where id=".$row[destination];
		$result_dest = $conn->query($sql_dest);
		$row_dest = $result_dest->fetch_assoc();
		$destination = $row_dest[nama_bandara];

		$kategori = $row[kategori];	
		$kategori = explode("|", $kategori);

        $panjang = $row[panjang];
       	$panjang = explode("|", $panjang);

       	$lebar = $row[lebar];
       	$lebar = explode("|", $lebar);

       	$tinggi = $row[tinggi];
       	$tinggi = explode("|", $tinggi);

       	$berat = $row[berat];
       	$berat = explode("|", $berat);
	
        $nama_item = $row[nama_item];
        $nama_item = explode("|", $nama_item);
                
		/* end */

		/* komparasi table tracking vs item */
		$sql_tracking = "select count(*) as jumlah from tbl_tracking where id_item=".$row[id]." and posisi_item=".$i;
		$result_tracking = $conn->query($sql_tracking);
		$row_tracking = $result_tracking->fetch_assoc();
		if($row_tracking[jumlah]){
		    $sql_flight = "select flight, posisi from tbl_tracking where id_item=".$row[id]." and posisi_item=".$i;
		}
		else{
		    $sql_flight = "select flight_number as flight from tbl_item where id=".$row[id];
		}
		$result_flight = $conn->query($sql_flight);
        $row_flight = $result_flight->fetch_assoc();
        if($row_flight[flight]==""){
            $get_flight_data = "--";
            $status_tracking = "--";
		}
		else
		{
		    $get_flight_data = $row_flight[flight];
		    $status_tracking = $row_flight[posisi];
		}
		
        /*
		$sql_tracking = "select * from tbl_tracking where id_item=".$row[id]." and posisi_item=".$i;
		$result_tracking = $conn->query($sql_tracking);
		$row_tracking = $result_tracking->fetch_assoc();

		if ($row_tracking[flight] == "")
		{
		    $get_flight = 0;
		}
		else
		{
		    $get_flight = $row_tracking[flight];
		}

                $sql_flight = "select kode_pesawat from tbl_flight_number where id=".$get_flight;
               	$result_flight = $conn->query($sql_flight);
               	$row_flight = $result_flight->fetch_assoc();

		if ($row_flight[kode_pesawat] == null)
		{
		$get_flight_data = "--";
		}
		else
		{
		$get_flight_data = $row_flight[kode_pesawat];
		}
		*/
        
		/* $id_tracking = $row_tracking[id];
		$kategori_tracking = $row_tracking[kategori];
        $panjang_tracking = $row_tracking[panjang];
       	$lebar_tracking = $row_tracking[lebar];
       	$tinggi_tracking = $row_tracking[tinggi];
       	$berat_tracking = $row_tracking[berat];
		$posisi_tracking = $row_tracking[posisi]; */
		
		
		$sql_time="select dateinsert, count(*) from log_tracking_item where id_item=".$id." and posisi_item=".$i."  and posisi ='".$status_tracking."'";

		select($sql_time,"row");
		
		$valid=$get_row[1];
		
		if ($valid){
		    $time = $get_row[0];
		}
		else{
		    $sql_time="select dateinsert from tbl_item where id=".$id;
		    select($sql_time,"row");
		    
		    $time = $get_row[0];
		}
		
		
		
		if ($status_tracking == "ra") {
			$status_tracking = "<font color=red><b>RA</b></font>";
		}
		else if ($status_tracking == "tko") {
            $status_tracking = "<font color=orange><b>TK-Out</b></font>";
        }
        else if ($status_tracking == "st_on") {
            $status_tracking = "<font color=green><b>Depart</b></font>";
        }
        else if ($status_tracking == "st_off") {
            $status_tracking = "<font color=green><b>Arive</b></font>";
        }
		else if ($status_tracking == "tki") {
            $status_tracking = "<font color=blue><b>TK-In</b></font>";
        }
        else if ($status_tracking == "reject on ra") {
			$status_tracking = "<font color=red><b>Rejected on RA</b></font>";
		}
		else if ($status_tracking == "reject on tko") {
            $status_tracking = "<font color=orange><b>Rejected on TK-Out</b></font>";
        }
		else {
            $status_tracking = "--";
        }

		/* end */

                $sql_kategori = "select kategori from tbl_kategori where id=".$kategori[$i];
               	$result_kategori = $conn->query($sql_kategori);
                $row_kategori = $result_kategori->fetch_assoc();

		#echo $kategori[$i]."=$kategori_tracking $posisi_tracking $id_tracking ".$row[id]."<br>"; 
		$barcode = "$id-$i";
		echo "<tr color=red>
		<td><font size=2>$no</font></td>
		<td><font size=2>$time</font></td>
        <!--<td><font size=2>$id-$i</font></td>
		<td><font size=2><img src='https://aplog.tripme.co.id:444/barcode/barcode.php?f=png&s=code-93&d=".$barcode."&h=50&w=100' style='width:100px;'></font></td>-->
		<td><font size=2>".$smu."</font></td>
		<td><font size=2>".strtoupper($nama_item[$i])."</font></td>
		<td><font size=2>".strtoupper($nama_perusahaan)."</font></td>
		<td><font size=2>$origin</font></td>
		<td><font size=2>$destination</font></td>
		<td><font size=2>$row_kategori[kategori]</font></td>
		<td><font size=2>$panjang[$i]</font></td>
		<td><font size=2>$lebar[$i]</font></td>
		<td><font size=2>$tinggi[$i]</font></td>
		<td><font size=2>$berat[$i]</font></td>
		<td><font size=2>$get_flight_data</font></td>
		<td><font size=2>$status_tracking</font></td>
		</tr>";
	}


    }
}
$conn->close();

?>
    </tbody>
</table>
</body>
</html>
