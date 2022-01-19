<?php
	/*inserare date in tabela mecanic*/
	$nume=$_POST['nume'];
	$prenume=$_POST['prenume'];
	$email=$_POST['email'];
	$nr_telefon=$_POST['nr_telefon'];

	
	include('connection.php');
	
	$sql = "INSERT INTO mecanic (id_mecanic,nume,prenume,email,nr_telefon) 
			values (null,'$nume','$prenume','$email','$nr_telefon')";
	
	$stid = oci_parse($conn,$sql);
    $r = @oci_execute($stid);
	
	$sql_telefon="select nr_telefon from mecanic";
	$stid_nr=oci_parse($conn,$sql_telefon);
	oci_execute($stid_nr);
		
	$sql_email="select email from mecanic";
	$stid_email=oci_parse($conn,$sql_email);
	oci_execute($stid_email);
						
?>
<!DOCTYPE html>
<html>

	<title>Mecanic - Electro </title>
	<link rel="shortcut icon" href="images\logo.png">
	
	<body style="background-color:black;">		
		<?php
			if($r and strlen($nr_telefon)==10)
			{
		?>
				
					<br><br><br><br><br><br><br>
					<center><h1 style="color:blue; position:absolute;top:200px;left:600px">Datele au fost inserate</h1> </center><br><br>
					</br></br></br></br></br></br></br></br></br>
				
			<?php
				}
				if(!$r or strlen($nr_telefon)!=10)
				{
			?>
						
						<br><br><br><br><br><br><br>
						<center><h1 style="color:blue; position:absolute;top:200px;left:600px">Datele nu au fost inserate</h1><center>
						<br><br></br></br></br></br></br></br></br>
							
			<?php
				}
			?>
	</body>
 </html>