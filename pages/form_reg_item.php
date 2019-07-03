<title>APLOG Tracking System - Register Item</title>

<div class="container-fluid">
  <!-- start input untuk daftar barang -->
  <div class="row">
    <br>
    <img class="col-lg-12" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRQNwzKjahccqBnq1nWzf26hNEPahYhhQp58ALtwnJjoBOYVr57Iw" height=20px>
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-header-text">Item Registration
          </h5>
          <div class="f-right">
            <a href="" data-toggle="modal" data-target="#textual-input-Modal">
              <i class="icofont icofont-code-alt">
              </i>
            </a>
          </div>
        </div>
        <div class="modal fade modal-flex" id="textual-input-Modal" tabindex="-1" role="dialog">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;
                  </span>
                </button>
                <h5 class="modal-title">Silahkan melakukan input untuk barang/dokumen yang akan di daftarkan ke aplog 
                </h5>
              </div>
            </div>
            <!-- end of modal-content -->
          </div>
          <!-- end of modal-dialog -->
        </div>
        <!-- end of modal -->
        <div class="card-block">

          <form method=POST action="/konfigurasi/cis_insert_data.php">
            <div class="form-group row">
                <label><b><i><u>Requestor</b></u></i></label>
            </div>
            <div class="form-group row">
              <label for="example-text-input" class="col-xs-2 col-form-label form-control-label">Company
              </label>
              <div class="col-sm-10">
                <?php
                    $sql="select fname, lname, email, no_telp, id_parent from tbl_user where session='".$_SESSION['session_hash']."'";
                    select($sql,"row");
                    
                    $fname      = $get_row[0];
                    $lname      = $get_row[1];
                    $email      = $get_row[2];
                    $no_telp    = $get_row[3];
                    
                    if($_SESSION['mode_login'] == 1){
                        $company = "Angkasa Pura";   
                    }
                    else{
                        $sql="select nama_perusahaan from tbl_user where id=".$get_row[4];
                        select($sql,"row");
                    
                        $company    = $get_row[0];
                    }
                ?>
                <input class="col-sm-4" type="text" id="d1" value="<?php echo $company; ?>" readonly name="nama_perusahaan">
              </div>
            </div>
            <div class="form-group row">
              <label for="example-search-input" class="col-xs-2 col-form-label form-control-label">Person In Charge
              </label>
              <div class="col-sm-10">
                <input class="col-sm-4" type="tel" id="d5" value="<?php echo $fname." ".$lname; ?>" readonly name="nama_officer">
              </div>
            </div>
            <div class="form-group row">
              <label for="example-search-input" class="col-xs-2 col-form-label form-control-label">Contact Number
              </label>
              <div class="col-sm-10">
                <input class="col-sm-4" type="tel" id="d2" value="<?php echo $no_telp; ?>" readonly name="no_telp">
              </div>
            </div>
            <div class="form-group row">
              <label for="example-email-input" class="col-xs-2 col-form-label form-control-label">Email
              </label>
              <div class="col-sm-10">
                <input class="col-sm-4" type="email" id="d3" value="<?php echo $email;?>" readonly name="email">
              </div>
            </div>
            </br>
            <div class="form-group row">
                <label><b><i><u>Item Information</b></u></i></label>
            </div>
            
            <?php
                
            ?>
            <div class="form-group row">
              <label for="example-email-input" class="col-xs-2 col-form-label form-control-label">Origin
              </label>
              <div class="col-sm-10">
                <select class="js-example-basic-single col-sm-4" id="o4" value="<?php echo $_GET[o4];?>" name="origin">
		      <?php
		        $state="";
		        
                if($_SESSION['mode_login']==2){
            		#$sql = "select id, kode_data, nama_bandara from tbl_bandara order by nama_bandara asc";
			        $sql = "select DISTINCT a.id, a.kode_data, a.nama_bandara, b.lat, b.lon from tbl_bandara a join tbl_airports b on a.kode_data = b.code order by a.nama_bandara";
                }
                else{
                    $sql="select DISTINCT a.id, a.kode_data, a.nama_bandara, b.lat, b.lon from tbl_bandara a join tbl_airports b on a.kode_data = b.code and a.id = (select area from tbl_user where session='".$_SESSION['session_hash']."') order by a.nama_bandara";
                    
                    $statet="readonly";
                }
                
                select($sql,"column");
            
            	foreach($get_column as $data) {
            		if ($data[1] == $_GET[o4])
            		{$bandara_select="selected";}
            		else
            		{$bandara_select="";}
            		
            		echo '<option value="'.$data[0].'" '.$bandara_select.'>'.$data[2].' ('.$data[1].')</option>';
            	}

		      ?>

                </select>
              </div> 
            </div>
            
            <?php

            ?>
            <div class="form-group row">
              <label class="col-xs-2 col-form-label form-control-label">Destination
              </label>
              <div class="col-sm-10">
                <select class="js-example-basic-single col-sm-4" id="d4" value="<?php echo $_GET[d4];?>" name="destination">
		      <?php

            		#$sql = "select id, kode_data, nama_bandara from tbl_bandara order by nama_bandara asc";
			        $sql = "select DISTINCT a.id, a.kode_data, a.nama_bandara, b.lat, b.lon from tbl_bandara a join tbl_airports b on a.kode_data = b.code order by a.nama_bandara";
            		select($sql,"column");
            
            		foreach($get_column as $data) {
            			if ($data[1] == $_GET[d4])
            				{$bandara_select="selected";}
            			else
            				{$bandara_select="";}
            			echo '<option value="'.$data[0].'" '.$bandara_select.'>'.$data[2].' ('.$data[1].')</option>';
            		}

		      ?>

                </select>
              </div> 
            </div>

<script>

function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi,
    function(m,key,value) {
      vars[key] = value;
    });
    return vars;
  }

var encrypted = getUrlVars()["code"];

var decrypted = CryptoJS.AES.decrypt(encrypted, "*aplog*");

//document.getElementById("demo3").innerHTML = decrypted.toString(CryptoJS.enc.Utf8);

str = decrypted.toString(CryptoJS.enc.Utf8);
res = str.split("|");
document.getElementById("d1").value = res[0];
document.getElementById("d2").value = res[1];
document.getElementById("d3").value = res[2];
document.getElementById("d4").value = res[3];
document.getElementById("o4").value = res[4];

</script>
    <div class="form-group row">
        <label for="example-email-input" class="col-xs-2 col-form-label form-control-label">SMU Number
        </label>
        <div class="col-sm-10">
            <input class="col-sm-4" id="no_smu" type="text" value="<?php echo $_GET['smu']; ?>" name="nomor_smu" required>
        </div>
    </div>
    
    <div class="form-group row">
        <label for="example-email-input" class="col-xs-2 col-form-label form-control-label">Airlines
        </label>
        <div class="col-sm-10">
            <input class="col-sm-4" id="airlines" type="text" value="<?php echo $_GET['airl']; ?>" name="airlines" required>
        </div>
    </div>
    
    <div class="form-group row">
        <label for="example-email-input" class="col-xs-2 col-form-label form-control-label">Flight Number
        </label>
        <div class="col-sm-10">
            <input class="col-sm-4" id="no_flight" type="text" value="<?php echo $_GET['flightnum']; ?>" name="flight_number" required>
        </div>
    </div>


<?php
    if($_GET['jumlah_data']==''){
        $jumlah_barang = 0;
    }
    else{
        $jumlah_barang = $_GET['jumlah_data'];
    }
?>
    <div class="form-group row">
      <label for="example-email-input" class="col-xs-2 col-form-label form-control-label">Number of Comodity</label>
      <div class="col-sm-3">
        <div class="col-sm-2>">
            <input class="col-sm-4" value="<?php echo $jumlah_barang; ?>"type="number" id="userInput" onchange="jumlah_data()" name="qty" required>
        </div>
        <div class="col-sm-2">
            <a class"col-sm-2"><button type="button" class="btn btn-mini btn-warning waves-effect waves-light">
                                                <i class="icofont icofont-refresh"></i></button></a>
        </div>

        <!-- Edit to input text type    
              <select class="form-control" id="userInput" onchange="jumlah_data()" name="qty">
			  <option value=0>0 Coli</option>
<?php 
            /*
			for ($x=1;$x<=10;$x++)
			{
				if ($_GET['jumlah_data']==$x)
			{
				$select='selected';
			}
			else
			{
				$select='';
			}
				echo '<option value="'.$x.'" '.$select.'>'.$x.' Coli</option>';
			}
			*/
?>
                </select>
        -->
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-10">

                <script>
                  function jumlah_data(){
                    var d1 = document.getElementById('d1').value;
                    var d2 = document.getElementById('d2').value;
                    var d3 = document.getElementById('d3').value;
                    var d4 = document.getElementById('d4').value;
		            var o4 = document.getElementById('o4').value;
                    var userInput = document.getElementById('userInput').value;
                    var no_smu = document.getElementById('no_smu').value
                    var no_flight = document.getElementById('no_flight').value
                    var airlines = document.getElementById('airlines').value

		    // untuk encrypt

		    string = d1+'|'+d2+'|'+d3+'|'+d4+'|'+o4;
		    var encrypted = CryptoJS.AES.encrypt(string, "*aplog*");

                    //window.location.href = "/?opsi=item&jumlah_data="+userInput+'&d1='+d1+'&d2='+d2+'&d3='+d3+'&d4='+d4;
		    window.location.href = "/?opsi=item&code="+encrypted+"&jumlah_data="+userInput+"&d4="+d4+"&o4="+o4+"&smu="+no_smu+"&flightnum="+no_flight+"&airl="+airlines;
                  }
                </script>
                <ul class="nav nav-tabs  tabs" role="tablist">
                      <?php
if ($_GET['jumlah_data'] !== NULL)
{
$jumlah_data = $_GET['jumlah_data'];
for ($i = 1;$i <= $jumlah_data;$i++)
{
	if ($i == 1) {$active="active";}
	else {$active="";}
echo '<li class="nav-item"><a class="nav-link '.$active.'" data-toggle="tab" href="#data' . $i . '" role="tab"><label class="badge bg-info">' . $i . '</label><a></li>';
}
}
?>
            </ul>
        <div class="tab-content tabs">
	<br>
<?php
if ($_GET['jumlah_data'] !== NULL)
{
$jumlah_data = $_GET['jumlah_data'];
for ($i = 1;$i <= $jumlah_data;$i++)
{

       	if ($i == 1) {$active="active";}
       	else {$active="";}

echo '
<div class="tab-pane '.$active.'" id="data' . $i . '" role="tabpanel">

<div class="form-group row">
<label for="example-email-input" class="col-xs-2 col-form-label form-control-label">Catagory
</label>
<div class="col-xs-2 col-form-label form-control-label">
<select class="js-example-basic-single" name="kategori[]">
';

                $sql = "select id,kategori from tbl_kategori";
                select($sql,"column");

                foreach($get_column as $data) {
                        if ($data[0] == $_GET[d4])
                               	{$bandara_select="selected";}
                        else
                            	{$bandara_select="";}
                        echo '<option value="'.$data[0].'" '.$bandara_select.'>'.$data[1].'</option>';
                }


echo '</select>
</div> 
</div>

<div class="form-group row">
<label for="example-email-input" class="col-xs-2 col-form-label form-control-label">Name
</label>
<div class="col-xs-2 col-form-label form-control-label">
<input class="form-control" type="text" placeholder="ex : Koper" name="nama_item[]" required>
</div>
</div>

<div class="form-group row">
<label for="example-email-input" class="col-xs-2 col-form-label form-control-label">Dimension (cm) 
</label>
<div class="col-xs-2 col-form-label form-control-label">
<input class="form-control" type="number" placeholder="Panjang" id="example-email-input" name="panjang[]" required>
</div>

<div class="col-xs-2 col-form-label form-control-label">
<input class="form-control" type="number" placeholder="Lebar" id="example-email-input" name="lebar[]" required>
</div>

<div class="col-xs-2 col-form-label form-control-label">
<input class="form-control" type="number" placeholder="Tinggi" id="example-email-input" name="tinggi[]" required>
</div>
</div>

<div class="form-group row">
<label for="example-email-input" class="col-xs-2 col-form-label form-control-label">Mass (KG)
</label>
<div class="col-xs-2 col-form-label form-control-label">
<input class="form-control" type="number" placeholder="Berat" id="example-email-input" name="berat[]" required>
</div>
</div>

<div class="form-group row">
<label for="example-email-input" class="col-xs-2 col-form-label form-control-label">Number of Koli
</label>
<div class="col-xs-2 col-form-label form-control-label">
<input class="form-control" type="number" placeholder="Koli" id="jumlah_coli_'.$i.'" name="jumlah_coli[]" oninput="myFunction'.$i.'()" required>
<p id="show_coli_'.$i.'"></p>
<script>
function myFunction'.$i.'() {
    var x = document.getElementById("jumlah_coli_'.$i.'").value;

	if (x>1) {
	document.getElementById("show_coli_'.$i.'").innerHTML = "<b>*Lampirkan PTI</b><input type=hidden value=1 name=cek_coli[]>";
	}
	else
	{
	document.getElementById("show_coli_'.$i.'").innerHTML = "<input type=hidden value=0 name=cek_coli[]>";
	}
}
</script>
</div>
<!--
<div class="col-xs-6 col-form-label form-control-label">
<input type="checkbox" name="cek_koli[]" value="1" style="vertical-align: middle; width: 15px; height: 15px; font-size: 2px; margin-top: 1px;">
<label style="font-size: 12px; margin-top: 10px;"><i>Followed With PTI Document</i></label></div>
</div> 
-->
</div> 
</div>';
}
}
?>
                    </div>
                  </div>
              </div>  
            <div class="form-group row">
              <div class="col-sm-10">
		        <input type="submit" class="btn btn-warning waves-effect waves-light" value="register">
              </div>
            </div>
            </form>
            </br></br></br>
            <?php
                include "table/table_item.php";
            ?>
            </div>
        </div>
      </div>
    </div>
    <!-- end innput untuk daftar barang -->
  </div>
