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
                                <th>No.</th>
                                <th>Kode Perusahan</th>
                                <th>Nama Perusahaan</th>
                                <th>E-Mail</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        <?php
                            $sql = "select count(*) from tbl_user where level >= ".$_SESSION['mode_login']." and category = 'admin' and id_parent = ".$_SESSION['id_user'];
                            select($sql,"row");
                            $valid = $get_row[0];
                            
                            if($valid){
                                $no=0;
                                $sql = "select id, kode_perusahaan, nama_perusahaan, email from tbl_user where level >= ".$_SESSION['mode_login']." and category = 'admin' and id_parent = ".$_SESSION['id_user'];
                                select($sql,"column");
                            
                                foreach($get_column as $data) {
                                    $no++;
                        ?>
                                    <tr>
                        <?php
                                    	echo '<td>'.$no.'</td>';
                                    	echo '<td>'.$data[1].'</td>';
                                    	echo '<td>'.$data[2].'</td>';
                                    	echo '<td>'.$data[3].'</td>'
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