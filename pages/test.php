  <?php
        include "../konfigurasi/cis_encrypt.php";
        include "../konfigurasi/cis_decrypt.php";

        $word = "TEST";
        $encryption_word = Encrypt("418736^*&90416934hsdjkf27&*(&","$word");
        #$decryption_word = Decrypt("418736^*&90416934hsdjkf27&*(&","$encryption_word");

        #echo "<script>alert('".$encryption_word."')</script>";
  
         if($_POST['partcode'] != "" && $_POST['partname'] != "" && $_POST['partpass1'] != "" && $_POST['partpass2'] != ""){
             if($_POST['partpass1'] == $_POST['partpass2']){

                 $validpass = $_POST['partpass1'];
		 $validpass = Encrypt("418736^*&90416934hsdjkf27&*(&","$validpass");
                 
                 $sql="insert into tbl_partner (kode_perusahaan, nama_perusahaan, password) values('".$_POST['partcode']."','".$_POST['partname']."','".$validpass."')";

echo $sql;
                 #insert($sql,"global","/?opsi=partner");
                 
                 #echo "<script>alert('".$sql."')</script>";
             }
             else{
                 echo "<script>alert('Password Tidak Cocok')</script>";
             }
         }

  ?>
  
<div class="container-fluid">
  <div class="row">
    <div class="main-header">
      &nbsp;
    </div>
  </div>

  <!-- Register For Partner -->
  <div class="row">
      <div class="col-lg-12">
          <div class="card">
              <div class="card-header">
                  <h5 class="card-header-text">Registrasi Partner
                  </h5>
                  <!--
                  <div class="f-right">
                    <a href="" data-toggle="modal" data-target="#textual-input-Modal">
                      <i class="icofont icofont-code-alt">
                      </i>
                    </a>
                  </div>
                  -->
              </div>
              
              <div class="card-block">
                  <form action="" method="post">
                      <div class="form-group row">
                            <label class="col-xs-2 col-form-label form-control-label">Kode Partner</label>
                            <div class="col-sm-4">
                                <input type="text" class="col-xs-3 col-form-label form-control" name="partcode" required></input>
                            </div>
                      </div>
                      
                      <div class="form-group row">
                            <label class="col-xs-2 col-form-label form-control-label">Nama Partner</label>
                            <div class="col-sm-4">
                                <input type="text" class="col-xs-3 col-form-label form-control" name="partname" required></input>
                            </div>
                      </div>
                      
                      <div class="form-group row">
                            <label class="col-xs-2 col-form-label form-control-label">Password</label>
                            <div class="col-sm-4">
                                <input type="password" class="col-xs-3 col-form-label form-control" name="partpass1" required></input>
                            </div>
                      </div>
                      
                      <div class="form-group row">
                            <label class="col-xs-2 col-form-label form-control-label">Konfirmasi Password</label>
                            <div class="col-sm-4">
                                <input type="password" class="col-xs-3 col-form-label form-control" name="partpass2" required></input>
                            </div>
                      </div>
                      
                      <div class="form-group row" align="right">
                          <div class="col-sm-6">
                                <input type="submit" class="btn btn-primary waves-effect waves-light" value="Daftarkan">
                          </div>
                      </div>
                  </form>
                  
                  </br></br></br>
                  
                  <?php
                        include "table/table_partner.php";
                  ?>
              </div>
          </div>
      </div>
  </div>
</div>
