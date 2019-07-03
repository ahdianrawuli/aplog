<?php

include 'cis_database.php';

$sql="select * from tbl_wilayah";
select($sql,"column");

echo "<select>";

foreach($get_column as $data) {
	echo "<option value=".$data[0].">".$data['1']."</option>";
}

echo "</select>";

?> 

