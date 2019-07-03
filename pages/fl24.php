<?php

$fl	= $_GET['fln'];
$mode	= $_GET['mode'];
$content =     file_get_contents("https://www.flightradar24.com/v1/search/web/find?query=$fl&limit=1");

$result  = json_decode($content);
$id = $result->results[0]->detail->reg;

if ($id==null)
{

echo '
<script>
alert("Tracking pesawat tidak tersedia");
window.location = "/?opsi=item";
</script>';
}

?>

<title>APLOG Tracking System - Dashboard</title>

<div class="container-fluid">
  <div class="row">
    <div class="main-header">

    </div>
  </div>
  <!-- Register For Officer -->

  <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="card">
              <div class="card-header">
                  <h5 class="card-header-text">Track Flight
                  </h5>
              </div>
	      <iframe src="https://www.flightradar24.com/simple_index.php?z=8&reg=<?php echo $id;?>" scrolling="no" width="100%px" height="500px" style="pointer-events: none;"></iframe>
          </div>
      </div>
  </div>
</div>
