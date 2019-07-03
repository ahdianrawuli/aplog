</br>

<div class="col-lg-12 col-sm-12">
    <div><font size=5>Tracking Status of The Month</font></div>
</div>
</br></br></br>
<!-- Total Item -->
<div class="col-lg-2 col-sm-6">
    <div class="col-sm-12 card dashboard-product">
        <span class="label label-primary">Total of Item</span>
        <div>&nbsp;</div>
        <div class="text-success"><font size=2>
            <?php
                $sum_of_item=0;
                if($_SESSION['mode_login'] == 1){
                    $sql="select sum(qty) from tbl_item";
                }
                else{
                    $sql="select sum(qty) from tbl_item where id_officer = (select id from tbl_user where session = '$session')";
                }
                select($sql,"row");
                $sum_of_item = $get_row[0];
                echo $sum_of_item;
            ?>
        Koli</font></div>
        <div>&nbsp;</div>
        <!--
        <div class="side-box bg-warning">
            <i class="icon-social-soundcloud"></i>
        </div>
        -->
    </div>
</div>

<!-- Unprocess -->
<div class="col-lg-2 col-sm-6">
    <div class="col-sm-12 card dashboard-product">
        <span class="label label-danger">Item on Request</span>
        <div>&nbsp;</div>
        <div class="text-success"><font size=2>
            <?php
                #$sql="select sum(qty) from tbl_item where id_officer = (select id from tbl_user where session = '$session')";
                #select($sql,"row");
                #$number_of_item = $get_row[0];
                
                $number_of_item_process=0;
                if($_SESSION['mode_login'] == 1){
                    $sql="select count(*) from tbl_tracking";
                }
                else{
                    $sql="select count(*) from tbl_tracking where id_item in (select id from tbl_item where id_officer=(select id from tbl_user where session='$session'))";
                }
                select($sql,"row");
                $number_of_item_process = $get_row[0];
            
                $number_of_item_unprocess = $sum_of_item - $number_of_item_process;
                echo $number_of_item_unprocess;
            ?>
        Koli</font></div>
        <div>&nbsp;</div>
        <!--
        <div class="side-box bg-warning">
            <i class="icon-social-soundcloud"></i>
        </div>
        -->
    </div>
</div>

<div class="col-lg-2 col-sm-6">
    <div class="col-sm-12 card dashboard-product">
        <span class="label label-warning">Item on RA</span>
        <div>&nbsp;</div>
        <div class="text-success"><font size=2>
            <?php
                $number_of_item_ra=0;
                if($_SESSION['mode_login'] == 1){
                    $sql="select count(*) from tbl_tracking where posisi='ra'";
                }
                else{
                    $sql="select count(*) from tbl_tracking where posisi='ra' and id_item in (select id from tbl_item where id_officer=(select id from tbl_user where session='$session'))";
                }
                select($sql,"row");
                $number_of_item_ra = $get_row[0];
                echo $number_of_item_ra;
            ?>
        Koli</font></div>
        
        <!-- Rejected on RA -->
        <div class="text-danger"><i><font size=2>
            <?php
                $number_of_item_ra_reject=0;
                if($_SESSION['mode_login'] == 1){
                    $sql="select count(*) from tbl_tracking where posisi='reject on ra'";
                }
                else{
                    $sql="select count(*) from tbl_tracking where posisi='reject on ra' and id_item in (select id from tbl_item where id_officer=(select id from tbl_user where session='$session'))";
                }
                select($sql,"row");
                $number_of_item_ra_reject = $get_row[0];
                echo $number_of_item_ra_reject;
            ?>
        
        Koli Rejected</font></i></div>
        
        <!--
        <div class="side-box bg-warning">
            <i class="icon-social-soundcloud"></i>
        </div>
        -->
    </div>
</div>

<div class="col-lg-2 col-sm-6">
    <div class="col-sm-12 card dashboard-product">
        <span class="label label-info">Item on TK-Out</span>
        <div>&nbsp;</div>
        <div class="text-success"><font size=2>
            <?php
                $number_of_item_tkout=0;
                if($_SESSION['mode_login'] == 1){
                    $sql="select count(*) from tbl_tracking where posisi='tko'";
                }
                else{
                    $sql="select count(*) from tbl_tracking where posisi='tko' and id_item in (select id from tbl_item where id_officer=(select id from tbl_user where session='$session'))";
                }
                select($sql,"row");
                $number_of_item_tkout = $get_row[0];
                echo $number_of_item_tkout;
            ?>
        Koli</font></div>
        
        <!-- Rejected on TKO -->
        <div class="text-danger"><i><font size=2>
            <?php
                $number_of_item_ra_reject=0;
                if($_SESSION['mode_login'] == 1){
                    $sql="select count(*) from tbl_tracking where posisi='reject on tko'";
                }
                else{
                    $sql="select count(*) from tbl_tracking where posisi='reject on tko' and id_item in (select id from tbl_item where id_officer=(select id from tbl_user where session='$session'))";
                }
                select($sql,"row");
                $number_of_item_ra_reject = $get_row[0];
                echo $number_of_item_ra_reject;
            ?>
        
        Koli Rejected</font></i></div>
        <!--
        <div class="side-box bg-warning">
            <i class="icon-social-soundcloud"></i>
        </div>
        -->
    </div>
</div>

<div class="col-lg-2 col-sm-6">
    <div class="col-sm-12 card dashboard-product">
        <span class="label label-success">On Flight</span>
        <div>&nbsp;</div>
        <div class="text-success"><font size=2>Depart : 
            <?php
                $number_of_item_tkin = 0;
                if($_SESSION['mode_login'] == 1){
                    $sql="select count(*) from tbl_tracking where posisi='st_on'";
                }
                else{
                    $sql="select count(*) from tbl_tracking where posisi='st_on' and id_item in (select id from tbl_item where id_officer=(select id from tbl_user where session='$session'))";
                }
                select($sql,"row");
                $number_of_item_tkin = $get_row[0];
                echo $number_of_item_tkin;
            ?>
        Koli</font></div>
        
        <div class="text-success"><font size=2>Arived : 
            <?php
                $number_of_item_tkin = 0;
                if($_SESSION['mode_login'] == 1){
                    $sql="select count(*) from tbl_tracking where posisi='st_off'";
                }
                else{
                    $sql="select count(*) from tbl_tracking where posisi='st_off' and id_item in (select id from tbl_item where id_officer=(select id from tbl_user where session='$session'))";
                }
                select($sql,"row");
                $number_of_item_tkin = $get_row[0];
                echo $number_of_item_tkin;
            ?>
        Koli</font></div>
    </div>
</div>

<div class="col-lg-2 col-sm-6">
    <div class="col-sm-12 card dashboard-product">
        <span class="label label-closed">Item on TK-In</span>
        <div>&nbsp;</div>
        <div class="text-success"><font size=2>
            <?php
                $number_of_item_tkin = 0;
                if($_SESSION['mode_login'] == 1){
                    $sql="select count(*) from tbl_tracking where posisi='tki'";
                }
                else{
                    $sql="select count(*) from tbl_tracking where posisi='tki' and id_item in (select id from tbl_item where id_officer=(select id from tbl_user where session='$session'))";
                }
                select($sql,"row");
                $number_of_item_tkin = $get_row[0];
                echo $number_of_item_tkin;
            ?>
        Koli</font></div>
        <div>&nbsp;</div>
    </div>
</div>

<!--
<div class="col-lg-2 col-sm-6">
    <div class="col-sm-12 card dashboard-product">
        <span class="label label-closed">Delivered</span>
        <div class="text-success dashboard-total-products counter"><font size=3>
            <?php
            /*
                $number_of_item_closed=0;
                if($_SESSION['mode_login'] == 1){
                    $sql="select count(*) from tbl_tracking where posisi='closed'";
                }
                else{
                    $sql="select count(*) from tbl_tracking where posisi='closed' and id_item in (select id from tbl_item where id_officer=(select id from tbl_user where session='$session'))";
                }
                select($sql,"row");
                $number_of_item_closed = $get_row[0];
                echo $number_of_item_closed;
            */
            ?>
        Koli</font></div>
        <div>&nbsp;</div>
    </div>
</div>
-->

</br></br></br></br></br></br></br></br></br>


<?php
if($_SESSION['mode_login'] == 1){
?>
<div class="col-lg-12 col-sm-6">
<div class="card">
    <div class="card-header">
        <h5 class="card-header-text">EMPU Request of the Month</h5>
    </div>
        
    <div class="card-block">
        <div class="row">
            <div class="col-sm-12 table-responsive">
                <table class="table">
                    <thead>
                        <tr class="table-active">
                            <th class="text-center"><font size="2">No.</font></th>
                            <th class="text-center"><font size="2">EMPU</font></th>
                            <th class="text-center"><font size="2">Koli</font></th>
                            <th class="text-center"><font size="2">Request</font></th>
                            <th class="text-center"><font size="2">On Process</font></th>
                            <th class="text-center"><font size="2">Rejected</font></th>
                            <th class="text-center"><font size="2">Completed</font></th>
                        </tr>
                    </thead>
                                        
                    <tbody>
<?php
    $sql="select distinct nama_perusahaan from tbl_user where nama_perusahaan <> 'Angkasa Pura' and (nama_perusahaan <> '' or nama_perusahaan is NULL)";
    $result = $conn->query($sql);
    $no=0;
    
    if ($result->num_rows > 0) {
        $request=0;
        $process=0;
        $reject=0;
        $complete=0;
        
        while($row = $result->fetch_assoc()) {
        $no++;
?>
        <tr>
            <td class="text-center"><font size="2"><?php echo $no."."; ?></font></td>
            <td class="text-left"><font size="2"><?php echo $row[nama_perusahaan]; ?></font></td>
            <td class="text-center">
                <font size="2">
<?php 
                    $sql_qty="select sum(qty) from tbl_item where nama_perusahaan='".$row[nama_perusahaan]."'";
                    select($sql_qty,"row");
                    $number = $get_row[0];
                    $sum_number += $number;
                                        
                    echo number_format($number,0);
?>
                </font>
            </td>
            
<?php
            $sql_qty="select count(*) from tbl_tracking where nama_perusahaan='".$row[nama_perusahaan]."' and reject = 0 and
                      posisi <> 'tki'";
            select($sql_qty,"row");
            $process=$get_row[0];
            $sum_process += $process;
            
            $sql_qty="select count(*) from tbl_tracking where nama_perusahaan='".$row[nama_perusahaan]."' and reject = 1";
            select($sql_qty,"row");
            $reject=$get_row[0];
            $sum_reject += $reject;
            
            $sql_qty="select count(*) from tbl_tracking where nama_perusahaan='".$row[nama_perusahaan]."' and reject = 0 and   
                      posisi='tki'";
            select($sql_qty,"row");
            $complete=$get_row[0];
            $sum_complete += $complete;
?>
            
            <td class="text-center">
                <font size="2">
<?php
                    $request=$number-($process+$reject+$complete);
                    $sum_request += $request;
                    echo number_format($request,0);
?>
                </font>
            </td>
            
            <td class="text-center">
                <font size="2">
<?php 
                    echo number_format($process,0);
?>
                </font>
            </td>
            
            <td class="text-center">
                <font size="2">
<?php 
                    echo number_format($reject,0);
?>
                </font>
            </td>
            
            <td class="text-center">
                <font size="2">
<?php 
                    echo number_format($complete,0);
?>
                </font>
            </td>
        </tr>
<?php
        }
?>
        <tr class="table-active">
           <th class="text-center"><font size="2">Total</font></th>
           <th class="text-left"><font size="2"></font></th>
           <th class="text-center"><font size="2"><?php echo number_format($sum_number,0); ?></font></th>
           <th class="text-center"><font size="2"><?php echo number_format($sum_request,0); ?></font></th>
           <th class="text-center"><font size="2"><?php echo number_format($sum_process,0); ?></font></th>
           <th class="text-center"><font size="2"><?php echo number_format($sum_reject,0); ?></font></th>
           <th class="text-center"><font size="2"><?php echo number_format($sum_complete,0); ?></font></th>
        </tr>
<?php
    }
?>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
</div>
<?php
    }
?>

<!--<div class="row">-->
<!--
<div class="col-lg-12 col-sm-12">
    <div class="col-sm-12 card dashboard-product">
        <div class="col-md-12">
                <div class="card-header">
                    <h5 class="card-header-text">Grafik Permintaan</h5>
                </div>
                <div class="card-block">
                    <div id="line-example"></div>
                </div>
            </div>
    </div>
</div>
-->
