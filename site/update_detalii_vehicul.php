<?php
	/*update in tabela detalii_vehicul*/
	
    include('connection.php');
    $id_vehicul = $_POST['id_vehicul'];
	$id = explode(" ", $id_vehicul);
	
	$inchiriat=$_POST['inchiriat'];
	
    $strQuery = "UPDATE detalii_vehicul SET inchiriat='$inchiriat' WHERE id_vehicul= :id";
    $stid1 = oci_parse($conn, $strQuery);
    oci_bind_by_name($stid1, ":id", $id[0]);
    $r = @oci_execute($stid1);
 ?>     
<!DOCTYPE html>
<html>

	<title>Detalii Vehicul - Electro </title>
	<link rel="shortcut icon" href="images\logo.png">

	<body style="background-color:black;">
		<?php
			if($r)
			{
		?>
				
					<br><br><br><br><br><br><br>
					<center><h1 style="color:blue; position:absolute;top:200px;left:650px">A fost facut update</h1></center>   
					</br></br></br></br></br></br></br></br></br>

		<?php
			}
			if(!$r)
			{
		?>
			
				<br><br><br><br><br><br><br>
				<center><h1 style="color:blue; position:absolute;top:200px;left:600px">Nu a fost facut update</h1> </center> 
				</br></br></br></br></br></br></br></br></br>			
		<?php
			}
		?>
	
	</body>
</html>