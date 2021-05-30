<?php 
require_once CONTROLLER_DIR."hospitalDashboard.php";
require_once VIEW_DIRECTORY."hospitalHeader.php";
$record = $hospitalDashboard->hospitalRecord;
echo "<div class='container'><div class='text-center p-2 border mb-3 bg-light'>Available Samples</div><div class='row'><div class='col-sm-12'><div class='table-responsive'><table class='table table-bordered table-hover'><tbody><tr><th>Sample Name</th><th>Quantity(gm)</th></tr></thead><tbody>";
foreach ($record as $key => $value) {
	echo "
	<tr>
		<td class=''>".$value['ss_name']."</td>
		<td class=''>".$value['hs_quantity']."</td>
	</tr>";
	
}
echo "</tbody></table></div></div></div></div>";
?>

