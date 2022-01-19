<?php
	/*inserare date in tabela client*/
	
	$nume=$_POST['nume'];
	$prenume=$_POST['prenume'];
	$email=$_POST['email'];
	$nr_telefon=$_POST['nr_telefon'];

	$data_nasterii=$_POST['data_nasterii'];
	$timestamp = strtotime($data_nasterii);
	$new_date =date('d-M-Y', $timestamp);
	
	include('connection.php');
	
	
	$sql = "INSERT INTO client (id_client,nume,prenume,email,nr_telefon,data_nasterii) 
			values (null,'$nume','$prenume','$email','$nr_telefon','$new_date')";
			
	$stid = oci_parse($conn,$sql);
    $r = @oci_execute($stid);
	
?>
<!DOCTYPE html>
<html>

	<title>Client - Electro </title>
	<link rel="shortcut icon" href="images\logo.png">
	
	<body style="background-color:black;">		
		<?php
			if($r )
			{
		?>
					
					<br><br><br><br><br><br><br>
					<center><h1 style="color:blue; position:absolute;top:200px;left:600px">Datele au fost inserate</h1> </center><br><br>
					</br></br></br></br></br></br></br></br></br>
				
			<?php
			}
				if(!$r)
				{
			?>
					
						<br><br><br><br><br><br><br>
						<center><h1 style="color:blue; position:absolute;top:200px;left:600px">Datele nu au fost inserate</h1><center>
						<br><br>
						
			<?php
				}
			?>
					
	</body>
 </html>