  <title>APLOG Tracking System - Register Partner</title>
  
  <?php
        include "konfigurasi/cis_encrypt.php";
        include "konfigurasi/cis_decrypt.php";

        if($_POST['partcode'] != "" && $_POST['partname'] != "" && $_POST['partpass1'] != "" && $_POST['partpass2'] != "" && $_POST['email'] != ""){
             if($_POST['partpass1'] == $_POST['partpass2']){

                 $validpass = $_POST['partpass1'];
		         $validpass = Encrypt("418736^*&90416934hsdjkf27&*(&","$validpass");
                 
                 /*
                 $sql="insert into tbl_partner (kode_perusahaan, nama_perusahaan, email, password) values('".$_POST['partcode']."','".$_POST['partname']."','".$_POST['email']."','".$validpass."')";
                 */
                 
                 $sql="insert into tbl_user (kode_perusahaan, nama_perusahaan, id_parent, level, category, email, password) values('".$_POST['partcode']."','".$_POST['partname']."',".$_SESSION['id_user'].",2,'admin','".$_POST['email']."','".$validpass."')";
                 
                 insert($sql,"global","/?opsi=partner");
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
                            <label class="col-xs-2 col-form-label form-control-label">Email</label>
							<div class="col-sm-4">
							    <input type="email" class="col-xs-3 col-form-label form-control" name=email />
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
                                <input type="submit" class="btn btn-warning waves-effect waves-light" value="Daftarkan">
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
