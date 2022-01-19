<?php
	include('connection.php');
	$sql = "select detalii_vehicul.id_vehicul,denumire_tip_vehicul,nr_vehicul,marca,an_fabricare,
			culoare,inchiriat,tarif
			from vehicul,detalii_vehicul
			where vehicul.id_vehicul=detalii_vehicul.id_vehicul order by id_vehicul";
	$stid = oci_parse($conn,$sql);
    $r = oci_execute($stid);
?>

<!DOCTYPE html>
<html>
		<title>Detalii Vehicul - Electro</title>
		<link rel="shortcut icon" href="images\logo.png">
		<body style="background-color:black">

		<br><br><table align="center" border "1px" style="width:300px:line-height:30px;color:white">
		<thead>
            <tr>
				<th>ID vehicul</th>
				<th>Denumire tip vehicul</th>
				<th>Numar vehicul</th>
                <th>Marca</th>
                <th>An fabricare</th>
                <th>Culoare</th>
                <th>Inchiriat</th>
                <th>Tarif</th>
				
            </tr>
        </thead>

		<?php
			while ($row = oci_fetch_row($stid)) 
			{
		?>
				<tr>
					
					<td><?php echo $row[0];?></td>
					<td><?php echo $row[1];?></td>
					<td><?php echo $row[2];?></td>
					<td><?php echo $row[3];?></td>
					<td><?php echo $row[4];?></td>
					<td><?php echo $row[5];?></td>
					<td><?php echo $row[6];?></td>
					<td><?php echo $row[7];?></td>
					
					
				</tr>
		<?php
			}
		?>

			
		
	</body>
</html>
	
	