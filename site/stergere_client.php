<?php
	$id_client= $_POST['id_client'];
	include('connection.php');
	$sql = "DELETE FROM client where id_client='$id_client'";
	$stid = oci_parse($conn,$sql);
    $r = oci_execute($stid);
?>
<!DOCTYPE html>
<html>

	<title>Client - Electro</title>
	<link rel="shortcut icon" href="images\logo.png">

	<body style="background-color:black;">	
		<?php
			if($r)
			{
		?>
			  
						
					<br><br><br><br><br><br><br>
					<center><h1 style="color:blue; position:absolute;top:200px;left:500px">Datele din tabela client au fost sterse</h1><br><br></center>
					</br></br></br></br></br></br></br></br></br>
				
			<?php
				}
				if(!$r)
				{
			?>
						
							
						<br><br><br><br><br><br><br>
						<center><h1 style="color:blue; position:absolute;top:200px;left:500px">Datele din tabela client nu au fost sterse</h1><center><br><br>
						</br></br></br></br></br></br></br></br></br>
					
				
			<?php
				}
			?>
	</body>
</html>