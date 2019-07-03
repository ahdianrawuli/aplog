<?php

$dbservername 	= "127.0.0.1";
$dbusername 	= "root";
$dbpassword 	= "rawuli1234";
$dbname		= "cis_aplog";

$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname, "3308");

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
else {

	//fungsi untuk insert
	function insert($sql,$mode, $redirect) 

	{
		if ($mode == "register")
		{
			global $conn;
			global $email;
			$cek_email = "select email from user_reg where email='$email'";
			$result_cek_email = $conn->query($cek_email);
			if ($result_cek_email->num_rows > 0) 
			{
        		        echo "<script>alert('Maaf, email $email sudah ada. gunakan email yang lain')</script>";
	        	        echo "<script>window.location='/cis_reg.php'</script>";
			}
			else
			{
			$insert = $sql;
			if ($conn->query($insert) === TRUE) 
				{
	   			echo "Data register berhasil masukl";
				} 
			else
				{
    				echo "Error: " . $insert . "<br>" . $conn->error;
				}
			}
		}
		else if ($mode == "ra")
	        {
			global $conn;
	       		$insert = $sql;

	        	$conn->query($insert);
		}
		else if ($mode == "global")
	        {
			    global $conn;
	       		$insert = $sql;
	       		
	        	if ($conn->query($insert) === TRUE)
	               		{
                               	echo "<script>alert('Data berhasil disimpan')</script>";
                               	echo "<script>window.location='$redirect'</script>";
	               		}
	       		else
	            		{
	               		        echo "Error: " . $insert . "<br>" . $conn->error;
                               	echo "<script>alert('Error: " . $insert . $conn->error."')</script>";
                               	echo "<script>window.location='$redirect'</script>";				
	                	}
		}
		else
		{ 
			echo "Mode tidak ada"; 
		}
	}

	function select($sql, $mode)

	{
		if ($mode == "row")
		{

			global $conn;
			global $get_row;
			global $get_row2;

			$query = $sql;
			$result_query = $conn->query($query);
			$jumlah_column = mysqli_num_fields($result_query)-1;

		        if ($result_query->num_rows > 0)
			    {
    			    while($row = $result_query->fetch_row()) 
    				{
    				for ($i=0;$i<=$jumlah_column;$i++)
    					{
    					global $get_row;
    					$get_row{$i} = $row[$i];
					$get_row2{$i} = $row[$i];
    					}
	    	    }
			}
		} 
		else if ($mode == "row2")
               	{

                       	global $conn;

                       	$query2 = $sql;
                       	$result_query2 = $conn->query($query2);
                       	$jumlah_column2 = mysqli_num_fields($result_query2)-1;

                       	if ($result_query2->num_rows > 0)
                            {
                       	    while($row2 = $result_query2->fetch_row())
                               	{
                               	for ($v=0;$v<=$jumlah_column2;$v++)
                                       	{
                                       	global $get_row2;
                                       	$get_row2{$v} = $row2[$v];
                                       	}
                    		}
                     	}
                }
                else if ($mode == "column")
                {

                       	global $conn;
			            global $get_column;

                       	$query = $sql;
                       	$result_query = $conn->query($query);
			            $jumlah_column = mysqli_num_fields($result_query)-1;

                       	if ($result_query->num_rows > 0) {
                       		while($row = $result_query->fetch_row()) {
                               			#global $array;
						for ($i=0;$i<=$jumlah_column;$i++) {
							$array .= $row[$i].",";
						}
						

						$array = rtrim($array,',');
						
						$array = $array."^";

                               		}
                       	}

			    $array = rtrim($array,'^');
			    
			    $array = explode("^",$array);

			    $get_column = array();
		    		foreach ($array as $item){
    				$get_column[] = explode(",",$item);
			        }
    #var_dump($get_column[2]);
                }
	}

        function update($sql)
        {
            global $conn;
            $update = $sql;
            
		    if ($conn->query($update) === FALSE)
		    {
			    echo "Gagal login";
            }
        }
}

?> 
