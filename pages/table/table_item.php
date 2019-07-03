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
                                <?php
                                    $sql="select id from tbl_user where session='".$_SESSION['session_hash']."'";
                                    select($sql,"row");
                                                    
                                    $id_officer = $get_row[0];
                                ?>
                                <th>No.</th>
                                <th>SMU Number</th>
                                <th>Flight Number</th>
                                <th>Count of Item</th>
                                <th>Origin</th>
                                <th>Destination</th>
                                <th>Fare</th>
                                <th>Detail</th>
				                <th>Flight Tracking</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        
                        <?php
                            $sql="select count(*) from tbl_item where id_officer=".$id_officer;
                            select($sql,"row");
                            
                            $valid=$get_row[0];
                            
                            if($valid){
                                $no=0;
                                $sql="select id, qty, origin, destination, total_harga, smu,flight_number
                                      from tbl_item
                                      where id_officer=".$id_officer;
                                select($sql,"column");
    
                                foreach($get_column as $data) {
                                    $no++;
                            ?>
                                    <tr>
                            <?php
                                    echo '<td>'.$no.".".'</td>';
                                    echo '<td>'.$data[5].'</td>';
                                    echo '<td>'.$data[6].'</td>';
                                    echo '<td>'.$data[1].'</td>';
                                    
                                    $biaya = $data[4];

                                    $sql_bandara="select nama_bandara from tbl_bandara where id=".$data[2];
                                    select($sql_bandara,"row");
                                    
                                    $origin=$get_row[0];
                                    
                                    $sql_bandara="select nama_bandara from tbl_bandara where id=".$data[3];
                                    select($sql_bandara,"row");
                                    
                                    $destination=$get_row[0];
                                    
                                    echo '<td>'.$origin.'</td>';
                                    echo '<td>'.$destination.'</td>';
                                    echo '<td>'.number_format($biaya,0).'</td>';
                                    
                                    echo '<td align="center"><a href="/?opsi=detail_item&id='.$data[0].'"><button type="button" class="btn btn-mini btn-warning waves-effect waves-light"><i class="icofont icofont-search-alt-2"></i></button></a></td>';
                                    echo '<td align="center"><a href="/?opsi=fl24&fln='.$data[6].'"><button type="button" class="btn btn-mini btn-warning waves-effect waves-light"><i class="icofont icofont-map"></i></button></a></td>';
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
