  <?php

	session_start();

        $page = $_GET['opsi'];
        $dashboard_state="";
        $partner_state="";
        $officer_state="";
        $item_state="";

        if($page == 'welcome')
        { $dashboard_state = "active"; }

        if($page == 'partner')
        { $partner_state = "active"; }

        if($page == 'officer')
        { $officer_state = "active"; }

        if($page == 'item')
        { $item_state = "active"; }
        
        if($page == 'report')
        { $report_state = "active"; }

        if($page == 'ra_tracking')
        { $ra_state = "active"; }
        
        if($page == 'tko_tracking')
        { $tko_state = "active"; }
        
        if($page == 'tki_tracking')
        { $tki_state = "active"; }
        
        if($page == 'sto_tracking')
        { $sto_state = "active"; }

        $menu1 = '
       	<li class="'.$dashboard_state.' treeview">
        <a class="waves-effect" href="/?opsi=dashboard"><i class=""></i><span>Dashboard</span></a>
        </li>';

	    $menu2 = '
        <li class="'.$partner_state.' treeview">
        <a class="waves-effect" href="/?opsi=partner"><i class=""></i><span>Register Partner</span></a>
        </li>';

        $menu3 = '
        <li class="'.$officer_state.' treeview">
        <a class="waves-effect" href="/?opsi=officer"><i class=""></i><span>Register Officer</span></a>
        </li>';

        $menu4 = '
        <li class="'.$item_state.' treeview">
        <a class="waves-effect" href="/?opsi=item"><i class=""></i><span>Register Item</span></a>
        </li>';
        
        $menu5 = '
        <li class="'.$report_state.' treeview">
        <a class="waves-effect" href="/?opsi=report"><i class=""></i><span>Report</span></a>
        </li>';

        $menu6 = '
        <li class="'.$ra_state.' treeview">
        <a class="waves-effect" href="/?opsi=ra_tracking"><i class=""></i><span>Regulated Agent</span></a>
        </li>';
        
        $menu7 = '
        <li class="'.$tko_state.' treeview">
        <a class="waves-effect" href="/?opsi=tko_tracking"><i class=""></i><span>Terminal Cargo Outgoing</span></a>
        </li>';
        
        $menu8 = '
        <li class="'.$tki_state.' treeview">
        <a class="waves-effect" href="/?opsi=tki_tracking"><i class=""></i><span>Terminal Cargo Incoming</span></a>
        </li>';
        
        $menu9 = '
        <li class="'.$sto_state.' treeview">
        <a class="waves-effect" href="/?opsi=sto_on_tracking"><i class=""></i><span>Departure</span></a>
        </li>';
        
        $menu10 = '
        <li class="'.$sto_state.' treeview">
        <a class="waves-effect" href="/?opsi=sto_off_tracking"><i class=""></i><span>Arrival</span></a>
        </li>';

  ?>
  
  
  <ul class="sidebar-menu">
        <li class="nav-level">Navigation</li>

	<?php

    /* Admin Owner */
	if ($_SESSION['mode_login'] == 1 && $_SESSION['category_user'] == 'admin') {
		echo "$menu1 $menu2 $menu3";
    }else if ($_SESSION['mode_login'] == 1 && $_SESSION['category_user'] == 'officer' && $_SESSION['posisi_user'] == 'rq') {
        echo "$menu1 $menu4";
    }else if ($_SESSION['mode_login'] == 1 && $_SESSION['category_user'] == 'officer' && $_SESSION['posisi_user'] == 'ra') {
        echo "$menu1 $menu6";
    }else if ($_SESSION['mode_login'] == 1 && $_SESSION['category_user'] == 'officer' && $_SESSION['posisi_user'] == 'tko') {
        echo "$menu1 $menu7";
    }else if ($_SESSION['mode_login'] == 1 && $_SESSION['category_user'] == 'officer' && $_SESSION['posisi_user'] == 'tki') {
        echo "$menu1 $menu8";
    }else if ($_SESSION['mode_login'] == 1 && $_SESSION['category_user'] == 'officer' && $_SESSION['posisi_user'] == 'sto') {
        echo "$menu1 $menu9 $menu10";
    }
    
    else if ($_SESSION['mode_login'] == 2 && $_SESSION['category_user'] == 'admin') {
        echo "$menu1 $menu3";
    }else if ($_SESSION['mode_login'] == 2 && $_SESSION['category_user'] == 'officer' && $_SESSION['posisi_user'] == 'rq') {
        echo "$menu1 $menu4";
    }
    
    echo "$menu5";
    ?>
    </br>

<!--        <li class="<?php echo $dashboard_state." "; ?> treeview">
            <a class="waves-effect" href="/?opsi=dashboard"><i class=""></i><span>Dashboard</span></a>
        </li>
        
        <li class="<?php echo $partner_state." "; ?> treeview">
            <a class="waves-effect" href="/?opsi=partner"><i class=""></i><span>Register Partner</span></a>
        </li>
                    
        <li class="<?php echo $officer_state." "; ?> treeview">
            <a class="waves-effect" href="/?opsi=officer"><i class=""></i><span>Register Officer</span></a>
        </li>
                    
        <li class="<?php echo $item_state." "; ?> treeview">
            <a class="waves-effect" href="/?opsi=item"><i class=""></i><span>Register Item</span></a>
        </li> -->
                    
    </ul>
