<?php
$servername = "127.0.0.1";
$username = "root";
$password = "rawuli1234";
$dbname = "cis_aplog";

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT id as Empid,nama_bandara as Name,kategori as Salary FROM tbl_bandara LIMIT 20";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
$data = array();

while( $rows = mysqli_fetch_assoc($resultset) ) {
$data[] = $rows;
}

$results = array(
"sEcho" => 1,
"iTotalRecords" => count($data),
"iTotalDisplayRecords" => count($data),
"aaData"=>$data);

echo json_encode($results);

?>
