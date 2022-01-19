<?php
    include('connection.php');
    
    $id_problema = $_POST['id_problema'];
	$id = explode(" ", $id_problema);
	
	$descriere_problema = $_POST['descriere_problema'];
	$locatie= $_POST['locatie'];
	

    $strQuery = "UPDATE problema SET descriere_problema='$descriere_problema',locatie='$locatie'WHERE id_problema= :id";
    $stid = oci_parse($conn, $strQuery);
    oci_bind_by_name($stid, ":id", $id[0]);
    $r = @oci_execute($stid);
	
	
	

 ?>     
<!DOCTYPE html>
<html>

	<title>Problema - Electro </title>
	<link rel="shortcut icon" href="images\logo.png">
	
	<body style="background-color:black;">	
	
	
		<?php
			if($r)
			{
		?>
			   	
					<br><br><br><br><br><br><br>
					<center><h1 style="color:blue; position:absolute;top:200px;left:650px">A fost facut update</h1></center><br><br>
					</br></br></br></br></br></br></br></br></br>
			
			<?php
				}
				if(!$r)
				{
			?>
					
						<br><br><br><br><br><br><br>
						<center><h1 style="color:blue; position:absolute;top:200px;left:650px">Nu a fost facut update</h1></center><br><br>
						</br></br></br></br></br></br></br></br></br>
					
				
			<?php
				}
			?>
	</body>
 </html>
