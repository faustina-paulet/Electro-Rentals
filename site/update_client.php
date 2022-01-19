<?php
    include('connection.php');
    
    $id_client = $_POST['id_client'];
	$id = explode(" ", $id_client);
	
	$nume = $_POST['nume'];
	$prenume = $_POST['prenume'];
	$email=$_POST['email'];

    $strQuery = "UPDATE client SET nume='$nume',prenume='$prenume',email='$email' WHERE id_client= :id";
    $stid = oci_parse($conn, $strQuery);
    oci_bind_by_name($stid, ":id", $id[0]);
    $r = @oci_execute($stid);
	
 ?>     
<!DOCTYPE html>
<html>

	<title>Client - Electro </title>
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
