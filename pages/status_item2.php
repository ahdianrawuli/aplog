<?php

session_start();

include '../konfigurasi/cis_database.php';

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

<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="https://ableproadmin.com/6.1/html/bower_components/bootstrap/css/bootstrap.min.css">

     <!-- Data Table Css -->
  <link rel="stylesheet" type="text/css" href="https://ableproadmin.com/6.1/html/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="https://ableproadmin.com/6.1/html/files/plugins/data-table/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://ableproadmin.com/6.1/html/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">

</head>
<body class="sidebar-mini fixed">
	       <table id="simpletable" class="table dt-responsive table-striped table-bordered nowrap">
               <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode</th>
				<th>Barcode</th>
				<th>Nama</th>
                                <th>Perusahaan</th>
                                <th>Destination</th>
                               	<th>Kategori</th>
                               	<th>Panjang</th>
                               	<th>Lebar</th>
                               	<th>Tinggi</th>
                               	<th>Berat</th>
                               	<th>Status</th>
                            </tr>
                        </thead>
                <tbody>
                    <?php

$sql = "select id,nama_perusahaan,destination,qty,kategori,panjang,lebar,tinggi,berat, nama_item from tbl_item where id_officer in ($fix_id)";
$result = $conn->query($sql);
$no=0;
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
	for ($i=0;$i<=$row[qty]-1;$i++) {
		$no++;
		/* start komparasi dari table item */

		$id = $row[id];
		$nama_perusahaan = $row[nama_perusahaan];

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

		/* komparasi dari table ra */

		$sql_tracking = "select * from tbl_tracking where id_item=".$row[id]." and posisi_item=".$i;
		$result_tracking = $conn->query($sql_tracking);
		$row_tracking = $result_tracking->fetch_assoc();

		/* $id_tracking = $row_tracking[id];
		$kategori_tracking = $row_tracking[kategori];
               	$panjang_tracking = $row_tracking[panjang];
               	$lebar_tracking = $row_tracking[lebar];
               	$tinggi_tracking = $row_tracking[tinggi];
               	$berat_tracking = $row_tracking[berat];
		$posisi_tracking = $row_tracking[posisi]; */
		$status_tracking = $row_tracking[posisi];

		if ($status_tracking == "ra") {
			$status_tracking = "RA";
		}
		else if ($status_tracking == "tko") {
                        $status_tracking = "TK-Out";
                }
		else if ($status_tracking == "tki") {
                        $status_tracking = "TK-In";
                }
		else {
                        $status_tracking = "--";
                }

		/* end */

		#echo $kategori[$i]."=$kategori_tracking $posisi_tracking $id_tracking ".$row[id]."<br>"; 
		$barcode = "$id-$i";
		echo "<tr>
		<td>$no</td>
		<td>$id-$i</td>
		<td><img src='https://aplog.tripme.co.id:444/barcode/barcode.php?f=png&s=ean-128&d=".$barcode."&h=50&w=100' style='width:100px;'></td>
		<td>$nama_item[$i]</td>
		<td>$nama_perusahaan</td>
		<td>$destination</td>
		<td>$kategori[$i]</td>
		<td>$panjang[$i]</td>
		<td>$lebar[$i]</td>
		<td>$tinggi[$i]</td>
		<td>$berat[$i]</td>
		<td>$status_tracking</td>
		</tr>";
	}


    }
}
$conn->close();

?>
                </tbody>
              </table>

<script type="text/javascript" src="https://ableproadmin.com/6.1/html/bower_components/jquery/js/jquery.min.js"></script>
<script type="text/javascript" src="https://ableproadmin.com/6.1/html/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://ableproadmin.com/6.1/html/bower_components/popper.js/js/popper.min.js"></script>


<!-- Scrollbar JS-->
<script type="text/javascript" src="https://ableproadmin.com/6.1/html/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
<script type="text/javascript" src="https://ableproadmin.com/6.1/html/files/plugins/jquery.nicescroll/js/jquery.nicescroll.min.js"></script>



<!-- data-table js -->
<script src="https://ableproadmin.com/6.1/html/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="https://ableproadmin.com/6.1/html/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="https://ableproadmin.com/6.1/html/files/plugins/data-table/js/jszip.min.js"></script>
<script src="https://ableproadmin.com/6.1/html/files/plugins/data-table/js/pdfmake.min.js"></script>
<script src="https://ableproadmin.com/6.1/html/files/plugins/data-table/js/vfs_fonts.js"></script>
<script src="https://ableproadmin.com/6.1/html/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="https://ableproadmin.com/6.1/html/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="https://ableproadmin.com/6.1/html/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="https://ableproadmin.com/6.1/html/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="https://ableproadmin.com/6.1/html/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<script src="https://ableproadmin.com/6.1/html/light-vertical/assets/pages/data-table.js"></script>

</body>
</html>

