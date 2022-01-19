<?php
	/*stergere din tabela detalii_vehicul*/
	$nr_vehicul = $_POST['id_vehicul'];
	include('connection.php');
	$sql_id = "select id_vehicul from vehicul where nr_vehicul='$nr_vehicul'";
	$stid_id = oci_parse($conn,$sql_id);
    oci_execute($stid_id,OCI_DEFAULT);
	$row = oci_fetch_row($stid_id);
	
	$sql = "DELETE FROM detalii_vehicul where id_vehicul='$row[0]'";
	$stid = oci_parse($conn,$sql);
    $r = oci_execute($stid);
	
?>     
<!DOCTYPE html>
<html>
	<title>Detalii Vehicul - Electro</title>
	<link rel="shortcut icon" href="images\logo.png">
	
	<body style="background-color:black;">
		<?php
			if($r)
			{
		?>
					
					<br><br><br><br><br><br><br>
					<center><h1 style="color:blue; position:absolute;top:200px;left:500px">Datele din detalii_vehicul au fost sterse</h1><br><br>
					</br></br></br></br></br></br></br></br></br>
				
			
		<?php
			}
			if(!$r)
			{
		?>
				
					<br><br><br><br><br><br><br>
					<center><h1 style="color:blue; position:absolute;top:200px;left:500px">Datele din detalii_vehicul au fost sterse</h1><br><br>
					</br></br></br></br></br></br></br></br></br>
				
			
		<?php
			}
		?>
	</body>
</html>