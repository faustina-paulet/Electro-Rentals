<?php
	/*inserare date in tabela problema*/
	$descriere_problema=$_POST['descriere_problema'];
	$locatie=$_POST['locatie'];
	$id_mecanic = $_POST['id_mecanic'];
	$nr_contract = $_POST['nr_contract'];
	
	include('connection.php');
	
	$sql_id = "select id_mecanic from mecanic where id_mecanic='$id_mecanic'";
	$stid_id = oci_parse($conn,$sql_id);
    oci_execute($stid_id,OCI_DEFAULT);
	$row_id = oci_fetch_row($stid_id);
	
	$sql_nr= "select nr_contract from contract where nr_contract='$nr_contract'";
	$stid_nr= oci_parse($conn,$sql_nr);
    oci_execute($stid_nr,OCI_DEFAULT);
	$row_nr = oci_fetch_row($stid_nr);

	
	$sql = "INSERT INTO problema(id_problema,descriere_problema,locatie,id_mecanic,nr_contract) 
			values (null,'$descriere_problema','$locatie',
			'$row_id[0]','$row_nr[0]')";
	$stid = oci_parse($conn,$sql);
    $r = @oci_execute($stid);
	
		
?>
<!DOCTYPE html>
<html>

	<title>Mecanic - Electro </title>
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
				if(!$r )
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
