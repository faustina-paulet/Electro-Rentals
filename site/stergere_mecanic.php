<?php
	$id_mecanic= $_POST['id_mecanic'];
	include('connection.php');
	$sql = "DELETE FROM mecanic where id_mecanic='$id_mecanic'";
	$stid = oci_parse($conn,$sql);
    $r = oci_execute($stid);
?>
<!DOCTYPE html>
<html>

	<title>Mecanic - Electro</title>
	<link rel="shortcut icon" href="images\logo.png">

	<body style="background-color:black;">	
		<?php
			if($r)
			{
		?>
			  
						
					<br><br><br><br><br><br><br>
					<center><h1 style="color:blue; position:absolute;top:200px;left:500px">Datele din tabela mecanic au fost sterse</h1></center><br><br>
					</br></br></br></br></br></br></br></br></br>
				
			<?php
				}
				if(!$r)
				{
			?>
						
							
						<br><br><br><br><br><br><br>
						<center><h1 style="color:blue; position:absolute;top:200px;left:500px">Datele din tabela mecanic nu au fost sterse</h1><center><br><br>
						</br></br></br></br></br></br></br></br></br>
					
				
			<?php
				}
			?>
	</body>
</html>