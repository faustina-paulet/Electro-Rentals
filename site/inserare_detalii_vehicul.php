<?php
	/*inserare date in tabela detalii_vehicul*/
	
	$marca=$_POST['marca'];
	$an_fabricare=$_POST['an_fabricare'];
	$culoare=$_POST['culoare'];
	$inchiriat=$_POST['inchiriat'];
	$nr_vehicul=$_POST['id_vehicul']; 	
	$tarif=$_POST['tarif']; 
	
	
    include('connection.php');
	$sql = "select id_vehicul from vehicul where nr_vehicul='$nr_vehicul'";
	$stid = oci_parse($conn,$sql);
    oci_execute($stid,OCI_DEFAULT);
	$row = oci_fetch_row($stid);
	
    $sql="INSERT INTO detalii_vehicul(marca,an_fabricare,culoare,inchiriat,id_vehicul,tarif)
						values('$marca','$an_fabricare','$culoare','$inchiriat','$row[0]','$tarif')";
	$stid=oci_parse($conn,$sql);
	$r=@oci_execute($stid);
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
					<center><h1 style="color:blue; position:absolute;top:200px;left:600px">Datele au fost inserate</h1></center><br><br>
					</br></br></br></br></br></br></br></br></br>
				
			
		<?php
			}
			if(!$r)
			{
		?>
					
				<br><br><br><br><br><br><br>
				<center><h1 style="color:blue; position:absolute;top:200px;left:600px">Datele nu au fost inserate</h1> </center><br><br>
				</br></br></br></br></br></br></br></br></br>
					
		<?php
			}
		?>
	</body>
 </html>	