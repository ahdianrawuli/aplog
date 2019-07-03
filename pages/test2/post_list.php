<?php

session_start();
include '../../konfigurasi/cis_session.php';

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

	$params = $columns = $totalRecords = $data = array();

	$params = $_REQUEST;

	$columns = array(
		0 => 'id',
		5 => 'qty', 
		13 => 'nama_perusahaan'
	);

	$where_condition = $sqlTot = $sqlRec = "";

	if( !empty($params['search']['value']) ) {
		$where_condition .=	" WHERE ";
		$where_condition .= " ( email LIKE '%".$params['search']['value']."%' ";    
		$where_condition .= " OR password LIKE '%".$params['search']['value']."%' )";
	}

	$sql = "select id,smu,nama_perusahaan,destination,qty,kategori,panjang,lebar,tinggi,berat, nama_item, origin from tbl_item where      id_officer in ($fix_id) order by id DESC";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
    		while($row2 = $result->fetch_assoc()) {
		$col = $row2[qty]-1;
		}
	}

	$sql_query = " select id,smu,qty from tbl_item where id_officer in ($fix_id) ";
	$sqlTot .= $sql_query;
	$sqlRec .= $sql_query;
	
	if(isset($where_condition) && $where_condition != '') {

		$sqlTot .= $where_condition;
		$sqlRec .= $where_condition;
	}

 	$sqlRec .=  " ORDER BY ". $columns[$params['order'][0]['column']]."   ".$params['order'][0]['dir']."  LIMIT ".$params['start']." ,".$params['length']." ";

	$queryTot = mysqli_query($conn, $sqlTot) or die("Database Error:". mysqli_error($conn));

	$totalRecords = mysqli_num_rows($queryTot);

	$queryRecords = mysqli_query($conn, $sqlRec) or die("Error to Get the Post details.");

	while( $row = mysqli_fetch_assoc($queryRecords) ) { 
		#$col = $row[qty]-1;
		for ($i=0;$i<=$col;$i++) {
			$data[] = $row;
		}
	}	

	$json_data = array(
		"draw"            => intval( $params['draw'] ),   
		"recordsTotal"    => intval( $totalRecords ),  
		"recordsFiltered" => intval($totalRecords),
		"data"            => $data
	);

var_dump($data[3]);

	#echo json_encode($json_data);
?>
	
