<?php

include '../konfigurasi/cis_database.php';

$sql = "select b.nama_bandara from tbl_item a join tbl_bandara b on a.destination = b.id where a.id = ".$_GET[id];
select($sql,"row");

$destination = $get_row[0];


$sql = "select qty, kategori, panjang, lebar, tinggi, berat, nama_item, nama_perusahaan, smu from tbl_item where id = ".$_GET[id];
select($sql,"row");

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Print Barcode</title>
    <link href="labels.css" rel="stylesheet" type="text/css" >
    <style>
    body {
        width: 8.5in;
        margin: 0in .1875in;
        }
    .label{
        /* Avery 5160 labels -- CSS and HTML by MM at Boulder Information Services */
        width: 3.5in; /* plus .6 inches from padding */
        height: 1.400in; /* plus .125 inches from padding */
        padding: .125in .3in 0;
        margin-right: .125in; /* the gutter */

        float: left;

        text-align: center;
        overflow: hidden;

        outline: 1px dotted; /* outline doesn't occupy space like border does */
        }
    .page-break  {
        clear: left;
        display:block;
        page-break-after:always;
        }
    </style>

</head>
<body>
<br>

<?php

    for ($x=0;$x<=$get_row{0}-1;$x++) {
        $no ++;
        for ($i=0;$i<=7;$i++) {
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
    $smu        = $get_row{8};
    $barcode	= "$smu/$_GET[id]/$x";

    $sql = "select kategori from tbl_kategori where id=$kategori";
    select($sql,"column");

	echo '
	<div class="label"><img src="http://aplog.tripme.co.id/barcode/barcode.php?f=png&s=code-93&d='.$barcode.'&h=100&w=350" style="width:300px;"><br>'.strtoupper($nama_item).' <img src="/assets/images/flight.png" height="15" width="15"> '.strtoupper($destination).'<br><b>'.strtoupper($get_row[7]).'</b></div>
	';
}

?>

</body>
</html>
