<?php
	/*stergere din tabela vehicul*/
	$nr_vehicul= $_POST['id_vehicul'];
	include('connection.php');
	$sql = "DELETE FROM vehicul where nr_vehicul='$nr_vehicul'";
	$stid = oci_parse($conn,$sql);
    $r = oci_execute($stid);
?>     
<!DOCTYPE html>
<html>

	<title>Vehicul - Electro </title>
	<link rel="shortcut icon" href="images\logo.png">

	<body style="background-color:black;">
		<?php
			if($r)
			{
		?>
				
					<br><br><br><br><br><br><br>
					<center><h1 style="color:blue; position:absolute;top:200px;left:560px">Datele din vehicul au fost sterse</h1><br><br>
					</br></br></br></br></br></br></br></br></br>
				
			
		<?php
			}
			if(!$r)
			{
		?>
					<br><br><br><br><br><br><br>
					<center><h1 style="color:blue; position:absolute;top:200px;left:560px">Datele din vehciul nu au fost sterse</h1><br><br>
					</br></br></br></br></br></br></br></br></br>	
		<?php
			}
		?>	
	</body>
</html>