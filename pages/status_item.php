<?php

session_start();

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

  <!-- Contextual classes table starts -->
  <div class="card">
        <!--
        <div class="card-header">
            <h5 class="card-header-text">Contextual classes</h5>
            <p>For Make row Contextual add Contextual class like <code>.table-success</code> in <code> tr tag</code> and For cell add Contextual class in <code> td or th tag</code> . </p>
        </div>
        -->
        <!--<div class="card-block">-->
            <div class="row">
                <div class="col-sm-6 table-responsive">
                    <table class="table">
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
		<td><img src='https://aplog.tripme.co.id:444/barcode/barcode.php?f=png&s=ean-128&d=".$barcode."&h=50&w=200' style='width:100px;'></td>
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
                </div>
            </div>
        <!--</div>-->
    </div>
    <!-- Contextual classes table ends -->
