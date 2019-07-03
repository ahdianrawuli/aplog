  <title>APLOG Tracking System - Register Officer</title>

<?php
    include "konfigurasi/cis_encrypt.php";
    include "konfigurasi/cis_decrypt.php";
  
    if($_POST['fname'] != "" && $_POST['lname'] != "" && $_POST['area'] != "" && $_POST['offadrs'] != "" && $_POST['nooff'] != "" && $_POST['offpass1'] != "" && $_POST['offpass2'] != "" && $_POST['email'] != ""){
        if($_POST['offpass1'] == $_POST['offpass2']){
            $validpass = $_POST['offpass1'];
            $validpass = Encrypt("418736^*&90416934hsdjkf27&*(&","$validpass");
            
            /*
            if($_SESSION['mode_login']==1){
                $id_parent = 0;
            }
            else
            {
                $sql="select id from tbl_partner where session='".$session."'";
                select($sql,"row");
                                                
                $id_parent = $get_row[0];
            }
            */
            
            /*
            $sql="insert into tbl_officer (fname, lname, id_parent, wilayah, alamat, no_telp, email, password) values('".$_POST['fname']."','".$_POST['lname']."','".$id_parent."','".$_POST['area']."','".$_POST['offadrs']."','".$_POST['nooff']."','".$_POST['email']."','".$validpass."')";
            */
            
            if($_SESSION['mode_login'] == 1){
                $sql="insert into tbl_user (fname, lname, id_parent, level, category, posisi, area, address, no_telp, email, password) values('".$_POST['fname']."','".$_POST['lname']."',".$_SESSION['id_user'].",".$_SESSION['mode_login'].",'officer','".$_POST['posisi']."',".$_POST['area'].",'".$_POST['offadrs']."','".$_POST['nooff']."','".$_POST['email']."','".$validpass."')";
            }
            else{
                $sql="insert into tbl_user (fname, lname, id_parent, level, category, posisi, area, address, no_telp, email, password) values('".$_POST['fname']."','".$_POST['lname']."',".$_SESSION['id_user'].",".$_SESSION['mode_login'].",'officer','rq',".$_POST['area'].",'".$_POST['offadrs']."','".$_POST['nooff']."','".$_POST['email']."','".$validpass."')";
            }
            
            insert($sql,"global","/?opsi=officer");
                 
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
  <!-- Register For Officer -->
  <div class="row">
      <div class="col-lg-12">
          <div class="card">
              <div class="card-header">
                  <h5 class="card-header-text">Registrasi Officer
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
						 <div class="col-md-3">
						    <div class="md-input-wrapper">
							    <input type="text" class="md-form-control" required="" name=fname require>
									<label>Nama Depan</label>
							</div>
						 </div>
						 <div class="col-md-3">
							<div class="md-input-wrapper">
								<input type="text" class="md-form-control" required="" name=lname require>
								<label>Nama Belakang</label>
							</div>
						</div>
					  </div>
					  
					  <?php
					    if($_SESSION['mode_login'] == 1){
					  ?>
					      <div class="form-group row">
                            <label class="col-xs-2 col-form-label form-control-label">Posisi</label>
                            <div class="col-sm-4">
                                <select class="js-example-basic-single col-xs-3 col-form-label form-control" id="pos" name='posisi'>
                                    <option value="rq">Ticket</option>
                                    <option value="ra">Related Agent</option>
                                    <option value="tko">Terminal Cargo Out</option>
                                    <option value="tki">Terminal Cargo In</option>
                                    <option value="sto">Site</option>
                                </select>
                            </div>
                          </div>
					  <?php
					    }
					  ?>
					  
					  <div class="form-group row">
					      <?php 
					        if($_SESSION['mode_login'] == 1){
					      ?>
                                <label class="col-xs-2 col-form-label form-control-label">Bandara</label>
                          <?php
					        }
					        else{
					      ?>
					            <label class="col-xs-2 col-form-label form-control-label">Wilayah</label>
					      <?php
					        }
					      ?>
                          <div class="col-sm-4">
                            <select class="js-example-basic-single col-xs-3 col-form-label form-control" id="rp1" name='area' value="<?php echo $_GET[rp1];?>">
                            <?php
                            if($_SESSION['mode_login'] == 1){
                                $sql = "select * from tbl_bandara";
                            }
                            else{
                                $sql = "select * from tbl_wilayah";    
                            }
                            
                            select($sql,"column");
                            
                            foreach($get_column as $data) {
                            
                            	if ($data[0] == $_GET[rp1])
                            		{$wilayah="selected";}
                            	else
                            		{$wilayah="";}
                            
                            	echo '<option value="'.$data[0].'" '.$wilayah.'>'.$data[1].'</option>';
                            }
                            
                            ?>
                            </select>
                          </div> 
                      </div>
                      
                      <div class="form-group row">
                            <label class="col-xs-2 col-form-label form-control-label">Alamat</label>
                            <div class="col-sm-4">
                                <textarea class="col-xs-3 col-form-label form-control" name="offadrs" rows="4" require></textarea>
                            </div>
                      </div>
                      
                      <div class="form-group row">
                            <label class="col-xs-2 col-form-label form-control-label">No. Telepon</label>
                            <div class="col-sm-4">
                                <input type="text" class="col-xs-3 col-form-label form-control" name="nooff" require></textarea>
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
                                <input type="password" class="col-xs-3 col-form-label form-control" name="offpass1" require></textarea>
                            </div>
                      </div>
                      
                      <div class="form-group row">
                            <label class="col-xs-2 col-form-label form-control-label">Konfirmasi Password</label>
                            <div class="col-sm-4">
                                <input type="password" class="col-xs-3 col-form-label form-control" name="offpass2" require></textarea>
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
                        include "table/table_officer.php";
                  ?>
              </div>
          </div>
      </div>
  </div>
</div>