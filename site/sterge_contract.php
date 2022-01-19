<?php
	$nr_contract= $_POST['nr_contract'];
	include('connection.php');
	$sql = "DELETE FROM contract where nr_contract='$nr_contract'";
	$stid = oci_parse($conn,$sql);
    $r = oci_execute($stid);
	?>
<!DOCTYPE html>
<html>

	<title>Contract - Electro</title>
	<link rel="shortcut icon" href="images\logo.png">
	
	<body style="background-color:black;">		
	
		<?php
			if($r)
			{
		?>
			   
						
					<br><br><br><br><br><br><br>
					<center><h1 style="color:blue; position:absolute;top:200px;left:650px">Datele au fost sterse</h1></center><br><br>
					</br></br></br></br></br></br></br></br></br>
				
			<?php
				}
				if(!$r)
				{
			?>
					
						
						<br><br><br><br><br><br><br>
						<center><h1 style="color:blue; position:absolute;top:200px;left:650px">Datele nu au fost sterse</h1></center><br><br>
						</br></br></br></br></br></br></br></br></br>
				
			<?php
				}
			?>
	</body>
 </html>