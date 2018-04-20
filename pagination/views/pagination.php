<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pagination</title>
</head>
<body>

<table border="1">
	<tr>
		<td>ID</td>
		<td>Name</td>
		<td>Age</td>
	</tr>
	<?php
		// Show data
		foreach ($results as $data) {
			echo '<tr>';
				echo '<td>'.$data->id.'</td>';
				echo '<td>'.$data->name.'</td>';
				echo '<td>'.$data->age.'</td>';
			echo '</tr>';
		}
	?>
</table>

<!-- Show pagination links -->
<?php 
	foreach ($links as $link) {
		echo "<span>". $link."</span>";
	} 
?>


</body>
</html>