<?php
	include('connection.php');
	$sql = "select * from vehicul order by id_vehicul";
	$stid = oci_parse($conn,$sql);
    $r = oci_execute($stid);
?>
<!DOCTYPE html>
<html>
	<title>Vehicul - Electro </title>
	<link rel="shortcut icon" href="images\logo.png">
	<body style="background-color:black">
		<center>
			<br><br><table align="center" border "1px" style="width:300px:line-height:30px; color:white">
			<thead>
				<tr>
					<th>ID vehicul</th>
					<th>Denumire tip vehicul </th>
					<th>Nr vehicul</th>
					
				</tr>
			</thead>

			<?php
				while ($row = oci_fetch_row($stid))   //oci_fetch_ro=returnează următorul rând dintr-o interogare
				{
			?>
					<tr>
						<td><?php echo $row[0];?></td>
						<td><?php echo $row[1];?></td>
						<td><?php echo $row[2];?></td>
					</tr>
			<?php
				}
			?>

				</table><br><br>
		</center>
	</body>
</html>
	
	