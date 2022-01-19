<!DOCTYPE html>
<html>
<head>
		<title>Contract - Electro</title>
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
		
		
<!-- ADAUGA CONTRACT -->
				
			
				<br><h3 style="color:white">ADAUGA CONTRACT</h3><br><br><br>
				  
				<form method="post" action="inserare_contract.php">
				
					<label for="id_client" style="color:white; font-size:20px;position:absolute; left:10px;top:200px " >Selectati numele clientului</label>
					<select style="font-size:20px;position:absolute;height:35px;width:225px;left:300px;top:200px" name="id_client" >   
					<?php 
							include('connection.php');
							$sql_id="SELECT id_client,nume,prenume FROM client";
							$stid_id=oci_parse($conn,$sql_id);
							$r_id=@oci_execute($stid_id);
							while(($row = oci_fetch_assoc($stid_id)))
							{                 
							   echo '<option value="'.$row[(array_keys($row)[0])].'">'.$row[(array_keys($row)[1])].' '.$row[(array_keys($row)[2])].'</option>';
							}

					?> 
					</select><br><br><br>
					
					<label for="id_vehicul" style="color:white; font-size:20px;position:absolute; left:10px;top:250px " >Selectati numarul vehiculului</label>
					<select style="font-size:20px;position:absolute;height:35px;width:225px;left:300px;top:250px" id="id_vehicul" name="id_vehicul" >   
					<?php 
							include('connection.php');
							$sql_id="SELECT nr_vehicul FROM vehicul,detalii_vehicul  where vehicul.id_vehicul=detalii_vehicul.id_vehicul and detalii_vehicul.inchiriat='Da'";
							$stid_id=oci_parse($conn,$sql_id);
							$r_id=@oci_execute($stid_id);
							while(($row = oci_fetch_assoc($stid_id)))
							{                 
							   echo '<option value="'.$row[(array_keys($row)[0])].'">'.$row[(array_keys($row)[0])].'</option>';
							}

					?> 
					</select><br><br><br>
					
					<label style="color:white; font-size:20px;position:absolute; left:10px;top:300px">Data start contract</label>:
					<input style="font-size:20px;position:absolute;height:30px;width:220px;left:300px;top:300px" name="data_start_contract" type="date"  min="2020-01-01" max="2025-01-01"required><br><br><br>
							
					<label style="color:white; font-size:20px;position:absolute; left:10px;top:350px">Data stop contract</label>:
					<input style="font-size:20px;position:absolute;height:30px;width:220px;left:300px;top:350px" name="data_stop_contract" type="date"  min="2020-01-01" max="2025-01-01"  required><br><br><br>
					
					<label  for="inchiriat" style="color:white; font-size:20px;position:absolute; left:10px;top:400px">De Inchiriat</label><br><br>
					<select style="font-size:20px;position:absolute;height:35px;width:227px;left:300px;top:400px"  name="inchiriat" type="text" maxlength="2" min="2" pattern="[A-Za-z]+">
					<option value="Nu">Nu</option>
			 
					</select><br>
					<input style="font-size:20px;position:absolute; left:300px;top:450px" type="submit" value="Adauga contract         ">
				
				</form>
				
			
			
<!--AFISARE  CONTRACT-->
			
				
				<form method="post" action="afisare_contract.php">
					<input style="font-size:20px;position: absolute; left:300px;top:530px" type="submit" value="Afisare tabela contract">
				</form><br><br><br><br><br><br>

<!-- UPDATE CONTRACT-->
				 
				 
				<form method="post" action="update_contract.php">
					<label for="nr_contract" style="color:white;font-size:20px;position:absolute; top:600px " >Selectați numarul contractului pe care vreți să il modificați </label><br><br>
					<select style="font-size:20px;width 285;height:25px;position:absolute;left:500px;top:600px" id="nr_contract" name="nr_contract" onchange="change_data_stop_contract(this.value)" >   
					<?php 
							include('connection.php');
							$sql_id="SELECT nr_contract,data_stop_contract FROM contract";
							$stid_id=oci_parse($conn,$sql_id);
							$r_id=@oci_execute($stid_id);
							while(($row = oci_fetch_assoc($stid_id)))
							{                 
							   echo '<option value="'.$row[(array_keys($row)[0])].' '.$row[(array_keys($row)[1])].'">'.$row[(array_keys($row)[0])].'</option>';
							}

					?> 
					</select><br><br><br>
					<label for="data_stop_contract" style="color:white; font-size:20px;position:absolute; left:10px;top:700px">Data stop contract</label><br><br>
					<input  style="font-size:20px;position:absolute;height:30px;width:220px;left:300px;top:700px" id="data_stop_contract" name="data_stop_contract" type="date"     required><br><br><br>	
					<input style="font-size:20px;position: absolute; left:300px;top:800px" type="submit" value="Update                        ">
				</form>
					
<!-- STERGERE CONTRACT-->

			<form method="post" action="sterge_contract.php">
				<label for="nr_contract" style="color:white; font-size:20px;position:absolute; left:10px;top:900px" >Selectați numărul contractului pe care vreți să îl ștergeți </label><br>
				<select style="font-size:20px;position:absolute;height:25px;left:500px;top:900px" id="nr_contract" name="nr_contract" >  		
				<?php 
						include('connection.php');
						$sql_id="SELECT nr_contract FROM contract";
						$stid_id=oci_parse($conn,$sql_id);
						$r_id=@oci_execute($stid_id);
						while(($row = oci_fetch_assoc($stid_id)))
						{				
						   echo '<option value="'.$row[(array_keys($row)[0])].'">'.$row[(array_keys($row)[0])].'</option>';
						}

				?> 
				</select> <br><br>
				<input style="font-size:20px;position: absolute; left:300px;top:1000px" type="submit" value="Sterge contract            ">
			</form></br>
			
		 
	</body>
	
	<script>
	 function change_data_stop_contract(str){
		var x=str.split(" ");
        document.getElementById("data_stop_contract").value=x[1];
    }
	
	</script>
</html>