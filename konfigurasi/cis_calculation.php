<?php
function hitung($panjang, $tinggi, $lebar, $berat, $charge_distance){
    global $harga;
    
#    $berat_volum = round(($panjang * $lebar * $tinggi) / 6000); /* unit cm */
#    $berat_normal = round($berat / 1000); /* unit Kg */
    
    $harga_per_cm = 200;
    $harga_per_kg = 10000;

    $berat_volum = (($panjang*$harga_per_cm) + ($lebar*$harga_per_cm) + ($tinggi*$harga_per_cm));
    $berat_normal = $berat * $harga_per_kg;

#    $harga_per_kg = 10000;
    
#    if($berat_volum > $berat_normal){
#        $harga = $berat_volum * $harga_per_kg;
#    }
#    else{
#        /* konvert gramm --> kilogram */
#        $harga = $berat_normal * $harga_per_kg;
#    }

    if($berat_volum > $berat_normal){
        $harga = $berat_volum + $charge_distance;
    }
    else{
	/* konvert gramm --> kilogram */
        $harga = $berat_normal + $charge_distance;
    }
    
    /*
    $harga_dimensi = 6000;
    $harga_beban = 6000;
    
    $volume = (($panjang * $lebar * $tinggi) * $harga_dimensi);
    $harga_volumebased = ($volume * $harga_beban);
    
    $harga_massbased = $berat * $harga_beban;
    
    if($harga_volumebased > $harga_massbased){
        $harga = $harga_volumebased;
    }
    else{
        $harga = $harga_massbased;
    }
    */
}



function hitung_real($panjang, $tinggi, $lebar, $berat, $pos){
    global $harga;
    
    $harga_per_cm = 200;
    $harga_per_kg = 10000;

    $berat_volum = (($panjang*$harga_per_cm) + ($lebar*$harga_per_cm) + ($tinggi*$harga_per_cm));
    $berat_normal = $berat * $harga_per_kg;

    if($pos=="ra"){
        $harga = $berat_normal;
    }
    else if($pos=="tko"){
        if($berat_volum > $berat_normal){
            $harga = $berat_volum;
        }
        else{
    	/* konvert gramm --> kilogram */
            $harga = $berat_normal;
        }
    }
    else{
        $harga = 0;
    }
}

?>
