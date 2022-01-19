<?php
	/*inserare date in tabela contract*/
	
	$id_client = $_POST['id_client'];
	$nr_vehicul = $_POST['id_vehicul'];
	
	$data_start_contract=$_POST['data_start_contract'];
	$timestamp = strtotime($data_start_contract);
	$new_date = date("d-M-Y", $timestamp);
	
	$data_stop_contract=$_POST['data_stop_contract'];
	$timestamp2 = strtotime($data_stop_contract);
	$new_date2 = date("d-M-Y", $timestamp2);
	
	$inchiriat=$_POST['inchiriat'];
	
	include('connection.php');
	
	$sql_tarif_detalii = "select tarif from detalii_vehicul,vehicul where detalii_vehicul.id_vehicul=(select vehicul.id_vehicul 
						 from vehicul where vehicul.nr_vehicul='$nr_vehicul') and detalii_vehicul.id_vehicul=vehicul.id_vehicul";
						 
	$stid_tarif_detalii = oci_parse($conn,$sql_tarif_detalii);
    oci_execute($stid_tarif_detalii);
	$row = oci_fetch_row($stid_tarif_detalii);
			
	$final=$row[0];
	$diff = abs(strtotime($data_stop_contract) - strtotime($data_start_contract))/60/60/24;
	$final2=$diff*$final;
	
	$sql_id = "select id_client from client where id_client='$id_client'";
	$stid_id = oci_parse($conn,$sql_id);
    oci_execute($stid_id,OCI_DEFAULT);
	$row_id = oci_fetch_row($stid_id);
	
	$sql_nr = "select id_vehicul from vehicul where nr_vehicul='$nr_vehicul'";
	$stid_nr = oci_parse($conn,$sql_nr);
    oci_execute($stid_nr,OCI_DEFAULT);
	$row_nr = oci_fetch_row($stid_nr);
	
	$sql_test1="SELECT MAX(data_stop_contract) FROM Contract WHERE id_vehicul 
				= (select id_vehicul from vehicul where nr_vehicul='$nr_vehicul')";
	$stid_test1= oci_parse($conn,$sql_test1);
    oci_execute($stid_test1);
	$row_test1 = oci_fetch_row($stid_test1);
	
	$sql = "INSERT INTO contract (nr_contract,id_vehicul,data_start_contract,data_stop_contract,tarif,id_client,inchiriat) 
				values (null,'$row_nr[0]','$new_date','$new_date2','$final2','$row_id[0]','$inchiriat')";
	$stid = oci_parse($conn,$sql);
	$r = @oci_execute($stid);

?>
<!DOCTYPE html>
<html>

	<title>Contract- Electro</title>
	<link rel="shortcut icon" href="images\logo.png">
	
	<body style="background-color:black;">	
	
	
<?php	
		if($r)
		{
			
?>
			
					
				<br><br><br><br><br><br><br>
				<center><h1 style="color:blue; position:absolute;top:200px;left:500px">Datele au fost inserate in tabela contract</h1></center><br><br>
				</br></br></br></br></br></br></br></br></br>
	
		<?php
		}
		else
		{
			
	?>
			
				
				<br><br><br><br><br><br><br>
				<center><h1 style="color:blue; position:absolute;top:200px;left:500px">Datele nu au fost inserate in tabela contract</h1></center> 
				</br></br></br></br></br></br></br></br></br>
			
	<?php 
		}
		?>
		
 </body>
 </html>