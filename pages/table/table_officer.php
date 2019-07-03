  <!-- Contextual classes table starts -->
  <div class="card">
        <!--
        <div class="card-header">
            <h5 class="card-header-text">Contextual classes</h5>
            <p>For Make row Contextual add Contextual class like <code>.table-success</code> in <code> tr tag</code> and For cell add Contextual class in <code> td or th tag</code> . </p>
        </div>
        -->
                        
        <!--<div class="card-block">-->
            <div class="row">
                <div class="col-sm-6 table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><font size="2">No.</font></th>
                                <th><font size="2">Nama Officer</font></th>
                                <th><font size="2">Nama Perusahaan</font></th>
                                <th><font size="2">Posisi</font></th>
                                <th><font size="2">Bandara / Wilayah</font></th>
                                <th><font size="2">Alamat</font></th>
                                <th><font size="2">Email</font></th>
                                <th><font size="2">No. Tlp</font></th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        <?php
                            $sql="select count(*) from tbl_user where level >= ".$_SESSION['mode_login']." and category = 'officer' and id_parent = ".$_SESSION['id_user'];
                            select($sql,"row");
                            $valid = $get_row[0];
                        
                            if($valid){
                                $no=0;
                                
                                if($_SESSION['mode_login'] == 1){
                                    $sql = "select a.fname, a.lname, a.id_parent, b.nama, a.level, a.address, a.email, a.no_telp, a.area
                                            from tbl_user a
                                            join tbl_ref_posisi b
                                            on a.posisi = b.kode
                                            and a.level >=".$_SESSION['mode_login']."
                                            and a.category = 'officer'";
                                }
                                else{
                                    $sql = "select fname, lname, id_parent, 'Request', level, address, email, no_telp, area
                                            from tbl_user
                                            where level >=".$_SESSION['mode_login']."
                                            and category='officer'
                                            and id_parent=".$_SESSION['id_user'];
                                }
                                select($sql,"column");
                                
                                foreach($get_column as $data) {
                                    $no++;
                        ?>
                                    <tr>
                        <?php
                                        if($data[4]!=0 || $data[4]!=''){
                                            if($data[4]==1){
                                                $company_name = "Angkasa Pura";
                                            }
                                            else{
                                                $sql_company="select nama_perusahaan from tbl_user where id=".$data[2];
                                                select($sql_company,"row");
                                    
                                                $company_name=$get_row[0];
                                            }
                                            
                                            if($data[4]==1){
                                                $sql_address="select nama_bandara from tbl_bandara where id=".$data[8];
                                            }
                                            else{
                                                $sql_address="select nama_prov from tbl_wilayah where id=".$data[8];
                                            }
                                            
                                            select($sql_address,"row");
                                            
                                            $address=$get_row[0];
                                            
                                        	echo '<td><font size="2">'.$no.'</font></td>';
                                        	echo '<td><font size="2">'.$data[0]." ".$data[1].'</font></td>';
                                        	echo '<td><font size="2">'.$company_name.'</font></td>';
                                        	echo '<td><font size="2">'.$data[3].'</font></td>';
                                        	echo '<td><font size="2">'.$address.'</font></tf>';
                                        	echo '<td><font size="2">'.$data[5].'</font></td>';
                                        	echo '<td><font size="2">'.$data[6].'</font></td>';
                                        	echo '<td><font size="2">'.$data[7].'</font></td>';
                                        }
                        ?>
                            	    </tr>
                        <?php  
                                }
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <!--</div>-->
    </div>
    <!-- Contextual classes table ends -->