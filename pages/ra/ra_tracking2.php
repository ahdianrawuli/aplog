  <title>APLOG Tracking System - Regulated Agent</title>

<?php

$sql = "select b.nama_bandara from tbl_item a join tbl_bandara b on a.destination = b.id where a.id = ".$_POST[id];
select($sql,"row");

$destination = $get_row[0];


$sql = "select qty, kategori, panjang, lebar, tinggi, berat from tbl_item where id = ".$_POST[id];
select($sql,"row");

?>

<!-- untuk append data ra scan (ra_detail.php))-->

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">

    $(document).ready(function(){
        $(".add-row").keypress(function(e){
            if(e.which == 13)            
            {
                
	    var barcode = $("#barcode").val();            
            $.get("/pages/ra/ra_detail2.php?id="+barcode, function(data, status){
            var markup = data        
		if (markup == 6282114565515) {
			alert("Barcode tidak tersedia !");
            $("[id='barcode']").each(function(){
            $(this).val("");
            });			
		}
		else {
		    
		    
		    var elements = document.getElementsByClassName("key");

            var names = '';
            var y = '';
            for(var i=0; i<elements.length; i++) {
                names += elements[i].value+",";
            }
            trail = names.replace(/,\s*$/, "");
            var array = trail.split(",");
            
            var pos = array.indexOf(barcode)
            
            if (pos > -1) {
                alert('Data sudah di scan !');
                $("[id='barcode']").each(function(){
                $(this).val("");
                });
            }
            else {
                
                $("table tbody").append(markup);
                $("[id='barcode']").each(function(){
                $(this).val("");
                });
		    
            }
            
		}
	    });
            
        }
            
        });
        
        // Find and remove selected table rows
        $(".delete-row").click(function(){
            $("table tbody").find('input[name="record"]').each(function(){
            	if($(this).is(":checked")){
                    $(this).parents("tr").remove();
                }
            });
        });
    });    
    
</script>

<div class="container-fluid">
	<div class="main-header"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
			<div class="col-md-4">
                            <label>&nbsp;</label>
                            <input type="text" class="form-control form-control-lg add-row" id="barcode" placeholder="BARCODE SCAN" autofocus="autofocus">
                        </div>
                    </div>
		    <br><br>
		            <form method=POST action="/konfigurasi/cis_insert_ra.php">
		            

                    <!-- end of card-header  -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="project-table">
                                <div class="col-sm-12 table-responsive">
                                    
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center txt-primary"><button type="button" class="delete-row btn btn-danger waves-effect waves-light btn-mini">X</button></th>
                                                <th class="text-left txt-primary">Kode</th>
                                                <th class="text-left txt-primary">Kategori</th>
                                                <th class="text-center txt-primary">P(Cm)</th>
                                                <th class="text-center txt-primary">L(Cm)</th>
                                                <th class="text-center txt-primary">T(Cm)</th>
                                                <th class="text-center txt-primary">B(Kg)</th>
                                                <th class="text-left txt-primary">Tujuan</th>
                                                <th class="text-left txt-primary">Flight</th>
                                                <th class="text-left txt-primary">Harga</th>
					 	                        <th class="text-center txt-primary">Validasi</th>
                                            </tr>
                                        </thead>
    <tbody class="text-center">
    </tbody>
    </table>
    <div class="form-group row" align="right">
    <div class="col-sm-12">
        <input type="submit" class="btn btn-primary waves-effect waves-light" value="SIMPAN">
    </div>
    </div>

    <div class="col-sm-12">
    </div><br><br>
    <div class="col-sm-12">
    </div><br><br>
    <!-- end of table -->
    </div>
    <!-- end of table responsive -->
    </div>
    <!-- end of project table -->
    </div>
    <!-- end of col-lg-12 -->
    </div>
                    </form>
    <!-- end of row -->
    </div>
    </div>
    </div>
</div>
