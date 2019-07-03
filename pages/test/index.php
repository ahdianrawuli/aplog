<html>

<!-- DataTable CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css"/>

<!-- DataTable Script -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>

<script>
$('#post_list').dataTable({
	"bProcessing": true,
 	"serverSide": true,
 	"ajax":{
        url :"post_list.php",
        type: "POST",
        error: function(){
          $("#post_list_processing").css("display","none");
        }
  	}
});
</script>
<body>


<table id="post_list" class="dataTable" width="100%" cellspacing="0">
	<thead>
		<tr>
			<th>S.No.</th>
			<th>Post Name</th>
			<th>Description</th>
		</tr>
	</thead>

</table>

