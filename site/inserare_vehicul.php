<?php
	/*inserare date in tabela vehicul*/
	$denumire_tip_vehicul = $_POST['denumire_tip_vehicul'];
	$nr_vehicul= $_POST['nr_vehicul'];
	include('connection.php');
	$sql = "INSERT INTO vehicul (id_vehicul, denumire_tip_vehicul, nr_vehicul) values (null, '$denumire_tip_vehicul','$nr_vehicul')";
	$stid = oci_parse($conn,$sql);
    $r = @oci_execute($stid);
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
					<center><<h1 style="color:blue;position:absolute;top:200px;left:600px">Datele au fost inserate</h1><center><<br><br>
					</br></br></br></br></br></br></br></br></br>

		<?php
			}
			if(!$r)
			{
		?>
				
					<br><br><br><br><br><br><br>
					<center><h1 style="color:blue;position:absolute;top:200px;left:600px">Datele nu au fost inserate</h1></center><br><br>
					</br></br></br></br></br></br></br></br></br>
				
		<?php
			}
		?>
	</body>
 </html>