<?php
	include('connection.php');
    
    $nr_contract = $_POST['nr_contract'];
	
	$nr = explode(" ", $nr_contract);
	
    $data_stop_contract=$_POST['data_stop_contract'];
    $timestamp = strtotime($data_stop_contract);
	$new_date = date("d-M-Y", $timestamp);
    
	$sql_tarif_detalii = "select detalii_vehicul.tarif
						from detalii_vehicul,vehicul,contract where vehicul.id_vehicul=contract.id_vehicul 
						and vehicul.id_vehicul=detalii_vehicul.id_vehicul and contract.nr_contract='$nr[0]'";
						 
	$stid_tarif_detalii = oci_parse($conn,$sql_tarif_detalii);
    oci_execute($stid_tarif_detalii);
	$row = oci_fetch_row($stid_tarif_detalii);
	
	$final=$row[0];
	
	
	$sql_data_start_contract="select data_start_contract from contract where nr_contract='$nr[0]'";
	$stid_data_start_contract = oci_parse($conn,$sql_data_start_contract);
    oci_execute($stid_data_start_contract);
	$row2 = oci_fetch_row($stid_data_start_contract);
	
	$diff = abs(strtotime($new_date) - strtotime($row2[0]))/60/60/24;
	$final2=$diff*$final;
	
	
	$sql_test1="SELECT MAX(data_stop_contract) FROM Contract WHERE id_vehicul 
				= (select id_vehicul from contract where nr_contract='$nr[0]')";
	$stid_test1= oci_parse($conn,$sql_test1);
    oci_execute($stid_test1);
	$max_retur = oci_fetch_row($stid_test1);
	
	$sql_test2="SELECT MAX(data_start_contract) FROM Contract WHERE id_vehicul 
				= (select id_vehicul from contract where nr_contract='$nr[0]')";
	$stid_test2= oci_parse($conn,$sql_test2);
    oci_execute($stid_test2);
	$max_inchiriere = oci_fetch_row($stid_test2);
	
	$incercare="SELECT COUNT(*) FROM Contract WHERE id_vehicul =(select id_vehicul from contract where nr_contract='$nr[0]')";
    $incerc=oci_parse($conn,$incercare);
	oci_execute($incerc);
	$nr_inchirieri = oci_fetch_row($incerc);
	
	$sql_ultima="select id_vehicul from contract where  nr_contract='$nr[0]'";
	$ultima=oci_parse($conn,$sql_ultima);
	oci_execute($ultima);
	$row_ultima = oci_fetch_row($ultima);
	
	$plus="SELECT nr_contract from contract where data_stop_contract=(SELECT MAX (data_stop_contract) FROM Contract where id_vehicul='$row_ultima[0]') order by nr_contract desc";
	$plusplus=oci_parse($conn,$plus);
	oci_execute($plusplus);
	$contract_maxim = oci_fetch_row($plusplus);
 ?>
 
<!DOCTYPE html>
<html>

	<title>Contract - Electro</title>
		<link rel="shortcut icon" href="images\logo.png">
	
	<body style="background-color:black;">	
	
		
<?php
	
	if($nr_inchirieri[0] == 1)
	{
		$strQuery = "UPDATE contract SET data_stop_contract='$new_date',tarif='$final2' WHERE nr_contract= :nr";
		$stid = oci_parse($conn, $strQuery);
		oci_bind_by_name($stid, ":nr", $nr[0]);
		$r = @oci_execute($stid);
		if($r)
		{
?>
		
			<br><br><br><br><br><br><br>
			<h1 style="color:blue; position:absolute;top:200px;left:500px">A fost facut update in tabela contract</h1>  <br><br>
			</br></br></br></br></br></br></br></br></br>
		
	<?php
		}
		else
		{
	?>
			
				<br><br><br><br><br><br><br>
				<h1 style="color:blue; position:absolute;top:200px;left:500px">Nu a fost facut update in tabela contract</h1><br><br>
				</br></br></br></br></br></br></br></br></br>
			
		<?php
		}
	}
	if($nr_inchirieri[0]>1)
	{
		if( $nr[0]==$contract_maxim[0])
		{
			$strQuery = "UPDATE contract SET data_stop_contract='$new_date',tarif='$final2' WHERE nr_contract= :nr";
			$stid = oci_parse($conn, $strQuery);
			oci_bind_by_name($stid, ":nr", $nr[0]);
			$r = @oci_execute($stid);
			if($r)
			{
			?>
				<br><br><br><br><br><br><br>
				<h1 style="color:blue; position:absolute;top:200px;left:500px">A fost facut update in tabela contract</h1>  <br><br>
				</br></br></br></br></br></br></br></br></br>
			<?php
			}
		}
		if($new_date<$row2[0])
		{
			?>	
			<br><br><br><br><br><br><br>
				<h1 style="color:blue; position:absolute;top:200px;left:430px">data_stop_contract trebuie sa fie mai mare decat data_start_contract</h1>
			</br></br></br></br></br></br></br></br></br>
			<?php
		}
		
		if($new_date>=$max_inchiriere[0])
		{
		?>
			<div class="inner-banner">
					
				<br><br><br><br><br><br><br>
				<h1 style="color:blue; position:absolute;top:200px;left:480px">Vehiculul nu a fost returnata la data de <?php echo $new_date?></h1><br><br>
				<h1 style="color:blue; position:absolute;top:250px;left:500px">Vehiculul va fi returnata la data de <?php echo $max_retur[0] ?></h1>
				</br></br></br></br></br></br></br></br></br>
			</div>	
		<?php
		}
		
		else
		{
		
			$strQuery = "UPDATE contract SET data_stop_contract='$new_date',tarif='$final2' WHERE nr_contract= :nr";
			$stid = oci_parse($conn, $strQuery);
			oci_bind_by_name($stid, ":nr", $nr[0]);
			$r = @oci_execute($stid);
			if($r)
			{
			?>
				<br><br><br><br><br><br><br>
				<h1 style="color:blue; position:absolute;top:200px;left:500px">A fost facut update in tabela contract</h1>  <br><br>
				</br></br></br></br></br></br></br></br></br>
			<?php
			}		
		}
	}
	?>
	</body>
 </html>
