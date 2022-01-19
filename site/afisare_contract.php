<?php
	include('connection.php');
	$sql = "select nr_contract,nume,prenume,vehicul.nr_vehicul,data_start_contract,data_stop_contract,tarif,inchiriat from contract,client,vehicul 
			where contract.id_client=client.id_client 
			and  contract.id_vehicul=vehicul.id_vehicul 
			order by nr_contract";
	$stid = oci_parse($conn,$sql);
    $r = oci_execute($stid);
?>

<!DOCTYPE html>
<html>
		<title>Contract - Electro </title>
		<link rel="shortcut icon" href="images\logo.png">
	<body style="background-color:black">

		<br><br><br><br><table align="center" border "1px" style="width:300px:line-height:30px;color:white">
		<thead>
            <tr>
                <th>Nr_contract</th>
				<th>Nume client</th>
				<th>Prenume client</th>
				<th>Nr_vehicul</th>
				<th>Data_start_contract</th>
                <th>Data_stop_contract</th>
                <th>Tarif </th>
				<th>De Inchiriat </th>
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
	
	