<?php
	include('connection.php');
	$sql = "select id_problema,descriere_problema,locatie,nume,prenume,contract.nr_contract from contract,mecanic,problema 
			where problema.id_mecanic=mecanic.id_mecanic 
			and  problema.nr_contract=contract.nr_contract 
			order by nr_contract";
	$stid = oci_parse($conn,$sql);
    $r = oci_execute($stid);
?>

<!DOCTYPE html>
<html>
		<title>Problema - Electro </title>
		<link rel="shortcut icon" href="images\logo.png">
	<body style="background-color:black">

		<br><br><br><br><table align="center" border "1px" style="width:300px:line-height:30px;color:white">
		<thead>
            <tr>
                <th>Id_problema</th>
				<th>Descriere_problema</th>
				<th>Locatie</th>
				<th>Nume mecanic  </th>
				<th>Prenume mecanic </th>
                <th>Nr_contract </th>		
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
	
	