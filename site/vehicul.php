<!DOCTYPE html>
<html>
<head><title>Vehicul - Electro</title>
      <link rel="shortcut icon" href="images\logo.png">

</head>
<style> 

		.tab { 
            display: inline-block; 
            margin-left: 30px; 
        } 	

		a:link {
			color: white;
			text-decoration: none;
			font-family: "Verdana";
			font-size: 120%;
			}
			
 		input[type=submit]{
		background-color: #367CD0 ;
		border: none;
		color: black;
		padding: 15px 15px;
		text-decoration: none;
		}	
</style>

 
<body style="background-color:black;">

	<br>
			 <img style="float:right; margin-right:10px; padding-right:10px;" src="images\logo_w.png"  > 		
            <ol>
				<a href="home.html" >HOME</a>
                <a href="vehicul.php"><span class="tab"></span> VEHICUL </a>
                <a href="detalii_vehicul.php"><span class="tab"></span>DETALII VEHICUL</a>
                <a href="client.php"><span class="tab"></span>CLIENT</a>
				<a href="contract.php"><span class="tab"></span>CONTRACT</a>
				<a href="mecanic.php"><span class="tab"></span>MECANIC</a>
				<a href="problema.php"><span class="tab"></span>PROBLEMA</a>
            </ol>
					
	</br>
	 
<!-- ADAUGA VEHICUL  -->

	<br><br><br>
		<h3 style="color:white;">ADAUGA VEHICUL</h3>
		<form method="post" action="inserare_vehicul.php">
			<label style="color:white; font-size:20px;position:absolute; left:10px;top:250px">Denumire tip vehicul</label>:
			<select style="font-size:20px;position:absolute;height:35px;width:238px;left:250px;top:250px " name="denumire_tip_vehicul" type="text"  required><br><br>
						<option value="trotineta">trotineta</option>
						<option value="bicicleta">bicicleta</option>
						<option value="tricicleta">tricicleta</option>
			</select><br><br><br>
		
			<label style="color:white; font-size:20px;position:absolute; left:10px;top:300px">Numar vehicul</label>:
			<input style="font-size:20px;position:absolute;height:25px;width:230px;left:250px;top:300px" name="nr_vehicul" type="numar" required ><br><br><br>
			<input style="font-size:20px;position:absolute; left:250px;top:350px;" type="submit" value="Adauga vehicul             " ><br>	
		</form>

<!--AFISARE  VEHICUL-->	
		<form method="post" action="afisare_vehicul.php">
		<input style="font-size:20px;position:absolute; left:250px;top:450px" type="submit" value="Afisare tabela vehicul   "></form>


<!--STERGERE VEHICUL-->
	
	<form method="post" action="stergere_vehicul.php">
			<label for="id_vehicul" style="color: white; font-size:20px;position:absolute; left:10px;top:530px" >Selectati numar vehiculului pe care doriti sa il stergeti</label><br>
			<select style="font-size:20px;position:absolute;top:530px;left:450px" id="id_vehicul" name="id_vehicul" >  
			<?php 
					include('connection.php');
					$sql_id="SELECT nr_vehicul from vehicul where id_vehicul not in (select id_vehicul from contract) 
					and id_vehicul not in (select id_vehicul from detalii_vehicul)";
					$stid_id=oci_parse($conn,$sql_id);
					$r_id=@oci_execute($stid_id);
					while(($row = oci_fetch_assoc($stid_id)))
					{				
					   echo '<option value="'.$row[(array_keys($row)[0])].'">'.$row[(array_keys($row)[0])].'</option>';
					}
			?> </select> <br><br>
			<input style="font-size:20px;position:absolute; left:250px;top:600px" type="submit" value="Stergere vehicul           ">
		</form></br>
			
</body>	
</html>