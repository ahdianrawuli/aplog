<title>APLOG Tracking System - Detail Item</title>
<div class="container-fluid">
	<div class="main-header"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form action="<?php echo "/?opsi=detail_item_edit&id=".$_GET[id]; ?>" method="post">
                    <div class="card-header">
                        <?php
                            $sql="select count(*) from tbl_tracking where id_item=".$_GET[id];
                            select($sql,"row");
                            $valid=$get_row[0];
                            
                            if($valid){
                        ?>
                                <label class="text-danger">Item On Process</label>
                        <?php    
                            }
                            else{
                        ?>
                                <input type="submit" class="btn btn-warning waves-effect waves-light" value="Edit Data">
                        <?php
                            }
                            
                            $sql = "select b.nama_bandara from tbl_item a join tbl_bandara b on a.destination = b.id and a.id = ".$_GET[id];
                            select($sql,"row");

                            $destination = $get_row[0];


                            $sql = "select qty, kategori, panjang, lebar, tinggi, berat, nama_item, harga, cek_coli, smu from tbl_item where id = ".$_GET[id];
                            select($sql,"row");
                        ?>
			&nbsp;&nbsp;
			<a href="javascript: void(0)" onclick="window.open('/pages/print_item.php?id=<?php echo $_GET[id];?>','_blank','width=815,height=600');">
			<input type="button" class="btn btn-success waves-effect waves-light" value="PRINT">
			</a>
                    </div>
                    </br>
                    <div>
                        <label for="example-search-input" class="text-center col-xs-1 col-form-label form-control-label">Tujuan</label>
                     
                        <div class="form-group row">    
                            <div class="col-sm-3">
                                <input class="form-control" type="tel" id="destination" value="<?php echo $destination; ?>" readonly name="bandara">
                            </div>
                        </div>
                    </form>
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
                        						<th class="text-center txt-primary">Nama Item</th>
                                                <th class="text-left txt-primary">Kategori</th>
                                                <th class="text-center txt-primary">Panjang (Cm)</th>
                                                <th class="text-center txt-primary">Lebar (Cm)</th>
                                                <th class="text-center txt-primary">Tinggi (Cm)</th>
                        						<th class="text-center txt-primary">Berat (KG)</th>
                        						<th class="text-center txt-primary">Biaya (Rp.)</th>
						                        <th class="text-center txt-primary">PTI (dokumen)</th>
                                                <th class="text-center txt-primary">Barcode</th>
                                            </tr>
                                        </thead>
                                    <tbody class="text-center">
<?php

    for ($x=0;$x<=$get_row{0}-1;$x++) {
        $no ++;
        for ($i=0;$i<=8;$i++) {
        $part = explode("|", $get_row{$i});
        $array .= $part[$x]."^";
    }

	$array = rtrim($array,'^');
    $array = explode("^",$array);
    $hasil = array();

    foreach ($array as $item) {
        $hasil[] = explode("^",$item);
    }

    $kategori	= implode($hasil[1]);
    $panjang    = implode($hasil[2]);
    $lebar      = implode($hasil[3]);
    $tinggi     = implode($hasil[4]);
    $berat      = implode($hasil[5]);
    $nama_item	= implode($hasil[6]);
    $harga_item	= implode($hasil[7]);
    $cek_coli 	= implode($hasil[8]);
    $smu        = $get_row{9};
    $barcode	= "$smu/$_GET[id]/$x";

    if ($cek_coli == 1) {
	$cek_coli = "<input type=checkbox checked onclick='return false;'>";
    }
    else {
        $cek_coli = "<input type=checkbox onclick='return false;'>";
    }

    $sql = "select kategori from tbl_kategori where id=$kategori";
    select($sql,"column");

	echo '
	<tr>
	<td>'.$no.'.</td>
	<td>'.$nama_item.'</td>';

    foreach($get_column as $data) {
	    echo '<td class="text-left">'.$data[0].'</td>';
	}

	echo '
	<td>'.$panjang.'</td>
	<td>'.$lebar.'</td>
	<td>'.$tinggi.'</td>
	<td>'.$berat.'</td>
	<td>'.number_format($harga_item,0).'</td>
	<td>'.$cek_coli.'</td>
	<td><img src="http://aplog.tripme.co.id/barcode/barcode.php?f=png&s=code-93&d='.$barcode.'&h=50&w=100" style="width:100px;"></td>
	</tr>';

}

?>
                                        </tbody>
                                    </table>
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


