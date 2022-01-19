<!DOCTYPE html>
<html>
<head><title>Detalii Vehicul - Electro</title>
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
	
<!-- ADAUGA DETALII VEHICUL-->
	<br><br><br>
		<h3 style="color:white;">ADAUGA DETALIILE DESPRE VEHICUL </h3>
		<form method="post" action="inserare_detalii_vehicul.php">
            <br><label for="id_vehicul" style="color:white;font-size:20px" >Selectează numarul vehiculului ales </label>
          <select style="font-size:20px;" id="id_vehicul" name="id_vehicul" >   
			<?php 
				include('connection.php');
				$sql_id="SELECT nr_vehicul FROM vehicul where vehicul.id_vehicul not in (select id_vehicul from detalii_vehicul) order by nr_vehicul";
				$stid_id=oci_parse($conn,$sql_id);
				$r_id=@oci_execute($stid_id);
				while(($row = oci_fetch_assoc($stid_id)))
				{				            
				   echo '<option value="'.$row[(array_keys($row)[0])].'">'.$row[(array_keys($row)[0])].'</option>';
                }
            ?> 	
		</select></br>
		 
			<br><br>
			
            <label style="color:white; font-size:20px;position:absolute; left:10px;top:300px">Marca vehicul</label><br><br>
            <input style="font-size:20px;position:absolute;height:25px;width:275px;left:150px;top:300px" name="marca" type="text"  pattern="[A-Za-z]+" maxlength="20" required><br><br>
          
         
            <label  style="color:white; font-size:20px;position:absolute; left:10px;top:350px">An fabricare</label><br><br>
            <input style="font-size:20px;position:absolute;height:25px;width:275px;left:150px;top:350px" name="an_fabricare" type="number" min="2000" required><br><br>
          
			<label style="color:white; font-size:20px;position:absolute; left:10px;top:400px">Culoare</label><br>
            <input style="font-size:20px;position:absolute;height:25px;width:275px;left:150px;top:400px" name="culoare" type="text" maxlength="15" min="2" pattern="[a-z]+" required><br>
			
            <label  for="inchiriat" style="color:white; font-size:20px;position:absolute; left:10px;top:450px">De Inchiriat</label><br><br>
			<select style="font-size:20px;position:absolute;height:35px;width:285px;left:150px;top:450px"  name="inchiriat" type="text" maxlength="2" min="2" pattern="[A-Za-z]+">
				<option value="Da">Da</option>
			</select><br>
			<label  style="color:white; font-size:20px;position:absolute; left:10px;top:500px">Tarif </label><br>
            <input style="font-size:20px;position:absolute;height:25px;width:275px;left:150px;top:500px" name="tarif" type="number" min="10" required><br><br><br>
			
			
			<input style="font-size:20px;position:absolute; left:150px;top:550px" type="submit" value="Adaugă detaliile vehiculului  "><br><br><br>
			
			
		</form><br><br>
		
<!-- AFISARE DETALII VEHICUL-->
					
		<form method="post" action="afisare_detalii_vehicul.php">
		<input style="font-size:20px;position: absolute; left:150px;top:650px" type="submit" value="Afisare tabela detalii_vehicul"></form><br><br><br><br><br><br><br>		

<!-- UPDATE VEHICUL  -->
			 
			 
		<form method="post" action="update_detalii_vehicul.php">
			<label for="id_vehicul" style="color:white;font-size:20px;position:absolute; top:750px;" >Selectati numarul vehiculului pe care doriti sa il modificati </label><br><br>
			<select style="font-size:20px;width 285;height:25px;position:absolute;top:750px; left:500px" id="id_vehicul" name="id_vehicul" onchange= "change_inchiriat(this.value)">  
				<?php 
						include('connection.php');
						$sql_id="SELECT vehicul.id_vehicul,nr_vehicul,culoare,inchiriat,tarif FROM vehicul,
						detalii_vehicul where vehicul.id_vehicul=detalii_vehicul.id_vehicul order by nr_vehicul";
						$stid_id=oci_parse($conn,$sql_id);
						$r_id=@oci_execute($stid_id);
						while(($row = oci_fetch_assoc($stid_id)))
						{                 
							echo '<option value="'.$row[(array_keys($row)[0])].' '.$row[(array_keys($row)[2])].' '.$row[(array_keys($row)[3])].' 
							 '.$row[(array_keys($row)[4])].'">'.$row[(array_keys($row)[1])].'</option>';
						}

				?>
			</select></br>
				   
			<br><br><br> 
            <label  for="inchiriat" style="color:white; font-size:20px;position:absolute; left:10px;top:900px">De Inchiriat</label><br><br>
				<select style="font-size:20px;position:absolute;height:35px;width:285px;left:150px;top:900px"  name="inchiriat"type="text" maxlength="2" min="2" pattern="[A-Za-z]+">
				<option value="Nu">Nu</option>
				<option value="Da">Da</option>
			 
			</select><br>
				
       
			
				
					 
			<input style="font-size:20px;position: absolute; left:150px;top:1000px" type="submit" value="Update                                  ">
		</form>
		
<!--        STERGERE VEHICUL DIN DETALII VEHICUL   -->
			 
			 
		<form method="post" action="stergere_detalii_vehicul.php">
		<label for="id_vehicul" style="color:white;font-size:20px;position:absolute; top:1100px" >Selectați numarul vehiculului pe care doriti sa il stergeti din Detalii_vehicul </label><br>
        <select style="font-size:20px;width 285;height:25px;position:absolute;left:620px; top:1100px" id="id_vehicul" name="id_vehicul" >    
			<?php 
				include('connection.php');
				$sql_id="SELECT nr_vehicul from vehicul where id_vehicul not in (select id_vehicul from contract) 
				and id_vehicul in (select id_vehicul from detalii_vehicul) order by nr_vehicul";
				$stid_id=oci_parse($conn,$sql_id);
				$r_id=@oci_execute($stid_id);
				while(($row = oci_fetch_assoc($stid_id)))
				{				            
				   echo '<option value="'.$row[(array_keys($row)[0])].'">'.$row[(array_keys($row)[0])].'</option>';
                }
            ?> 	
		</select></br>
		<input style="font-size:20px;position: absolute; left:150px;top:1140px " type="submit" value="Stergere detaliile vehiculului">
		</form></br>
		
<script>
function change_inchiriat(str){
		var x=str.split(" ");
        document.getElementById("inchiriat").value=x[6];
    }

</script>

</body>	
</html>