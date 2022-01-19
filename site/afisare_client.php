<?php
	include('connection.php');
	$sql = "SELECT * FROM client order by id_client";
	$stid = oci_parse($conn,$sql);
    $r = oci_execute($stid);
?>

<!DOCTYPE html>
<html>
	<title>Client - Electro </title>
	<link rel="shortcut icon" href="images\logo.png">
	<body style="background-color:black">

		<br><br><br><br><br><table align="center" border "1px" style="width:300px:line-height:30px;color:white">
		<thead>
            <tr>
                <th>Id client</th>
                <th>Nume</th>
                <th>Prenume</th>
                <th>Email</th>
                <th>Numar de telefon</th>
				<th>Data nasterii</th>
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
					
				</tr>
		<?php
			}
		?>
	</body>
</html>
	
	