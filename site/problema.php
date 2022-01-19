<!DOCTYPE html>
<html>
<head>
		<title>Problema - Electro</title>
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
		
		 
<!-- ADAUGA PROBLEMA -->
				
			
				<br><h3 style="color:white">ADAUGA PROBLEMA</h3><br><br><br>
				  
				<form method="post" action="inserare_problema.php">
					
					<label style="color:white; font-size:20px;position:absolute; left:10px;top:200px">Descrie problema</label>:
					<input style="font-size:20px;position:absolute;height:30px;width:1000px;left:300px;top:200px" name="descriere_problema" type="text" maxlength="100" required><br><br><br>
							
					<label style="color:white; font-size:20px;position:absolute; left:10px;top:250px">Localitate</label>:
					<input style="font-size:20px;position:absolute;height:30px;width:1000px;left:300px;top:250px" name="locatie" type="text" maxlength="20"  required><br><br><br>
					
				
					<label for="id_mecanic" style="color:white; font-size:20px;position:absolute; left:10px;top:300px " >Selectati numele mecanicului</label>
					<select style="font-size:20px;position:absolute;height:35px;width:1010px;left:300px;top:300px" name="id_mecanic" >   
					<?php 
							include('connection.php');
							$sql_id="SELECT id_mecanic,nume,prenume FROM mecanic";
							$stid_id=oci_parse($conn,$sql_id);
							$r_id=@oci_execute($stid_id);
							while(($row = oci_fetch_assoc($stid_id)))
							{                 
							   echo '<option value="'.$row[(array_keys($row)[0])].'">'.$row[(array_keys($row)[1])].' '.$row[(array_keys($row)[2])].'</option>';
							}

					?> 
					</select><br><br><br>
					
					<label for="nr_contract" style="color:white; font-size:20px;position:absolute; left:10px;top:350px " >Selectati numarul contractului</label>
					<select style="font-size:20px;position:absolute;height:35px;width:1010px;left:300px;top:350px" id="nr_contract" name="nr_contract" >   
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
					</select><br><br><br>
					
				
						
					<input style="font-size:20px;position:absolute; left:650px;top:400px" type="submit" value="Adauga problema intampinata">
				
				</form>
				
			
<!-- AFISARE PROBLEMA-->
			
				
				<form method="post" action="afisare_problema.php">
					<input style="font-size:20px;position: absolute; left:650px;top:500px" type="submit" value="Afisare tabela problema          ">
				</form><br><br><br><br><br><br>

<!--UPDATE PROBLEMA-->
				 
				 
				<form method="post" action="update_problema.php">
					<label for="id_problema" style="color:white;font-size:20px;position:absolute; top:600px " >Selectati ID-ul problemei pe care doriti sa o modificati</label><br><br>
					<select style="font-size:20px;width 285;height:25px;position:absolute;left:500px;top:600px" id="id_problema" name="id_problema" 
					onchange="change_descriere_problema(this.value),change_locatie(this.value)" >   
					<?php 
							include('connection.php');
							$sql_id="SELECT id_problema,descriere_problema,locatie FROM problema";
							$stid_id=oci_parse($conn,$sql_id);
							$r_id=@oci_execute($stid_id);
							while(($row = oci_fetch_assoc($stid_id)))
							{                 
							   echo '<option value="'.$row[(array_keys($row)[0])].' '.$row[(array_keys($row)[1])].'">'.$row[(array_keys($row)[0])].'</option>';
							}

					?> 
					</select><br><br><br>
					<label for="descriere_problema" style="color:white; font-size:20px;position:absolute; left:10px;top:700px">Descriere problema</label><br><br>
					<input  style="font-size:20px;position:absolute;height:30px;width:1000px;left:300px;top:700px" id="descreire_problema" name="descriere_problema" type="text"     required><br><br><br>	
					
					<label for="locatie" style="color:white; font-size:20px;position:absolute; left:10px;top:750px">Locatie</label><br><br>
					<input  style="font-size:20px;position:absolute;height:30px;width:1000px;left:300px;top:750px" id="locatie" name="locatie" type="text"     required><br><br><br>	
					
					<input style="font-size:20px;position: absolute; left:650px;top:850px" type="submit" value="Update                                     ">
				</form>
					
	
<!-- STERGERE PROBLEMA-->

			<form method="post" action="sterge_problema.php">
				<label for="id_problema" style="color:white; font-size:20px;position:absolute; left:10px;top:950px" >Selectati ID-ul problemei pe care doriti sa o stergeti </label><br>
				<select style="font-size:20px;position:absolute;height:25px;left:500px;top:950px" id="id_problema" name="id_problema" >  		
				<?php 
						include('connection.php');
						$sql_id="SELECT id_problema FROM problema";
						$stid_id=oci_parse($conn,$sql_id);
						$r_id=@oci_execute($stid_id);
						while(($row = oci_fetch_assoc($stid_id)))
						{				
						   echo '<option value="'.$row[(array_keys($row)[0])].'">'.$row[(array_keys($row)[0])].'</option>';
						}

				?> 
				</select> <br><br>
				<input style="font-size:20px;position: absolute; left:650px;top:1050px" type="submit" value="Sterge problema                       ">
			</form></br>
			
		 
	</body>
	
	<script>
	 function change_descriere_problema(str){
		var x=str.split(" ");
        document.getElementById("descreire_problema").value=x[1];
    }
	
	 function change_locatie(str){
		var x=str.split(" ");
        document.getElementById("locatie").value=x[2];
    }
	
	</script>
</html>