<!DOCTYPE html>
<html>

<head>
		<title>Client - Electro</title>
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
		
<!-- ADAUGA CLIENT -->
			
				<br><h3 style="color:white">ADAUGA CLIENT</h3><br><br><br>
				  
			
				<form method="post" action="inserare_client.php">
					
					<label style="color:white; font-size:20px;position:absolute; left:10px;top:200px">Nume</label>:
					<input style="font-size:20px;position:absolute;height:25px;width:275px;left:155px;top:200px" name="nume" type="text"   pattern="[A-Za-z]+"  maxlength="20" required><br><br><br>
						
					<label style="color:white; font-size:20px;position:absolute; left:10px;top:250px">Prenume</label>:
					<input style="font-size:20px;position:absolute;height:25px;width:275px;left:155px;top:250px " name="prenume" type="text"   pattern="[A-Za-z]+" maxlength="20" required><br><br><br>
						
					<label style="color:white; font-size:20px;position:absolute; left:10px;top:300px">Email</label>:
					<input style="font-size:20px;position:absolute;height:25px;width:275px;left:155px;top:300px" name="email" type="email"  required ><br><br><br>
						
					<label for="nr_telefon" style="color:white; font-size:20px;position:absolute; left:10px;top:350px">Numar de telefon</label>:
					<input style="font-size:20px;position:absolute;height:25px;width:275px;left:155px;top:350px" name="nr_telefon" pattern="[0-9]+" type="tel" maxlength="10"  required ><br><br><br>
					
					<label style="color:white; font-size:20px;position:absolute; left:10px;top:400px">Data nasterii</label>:
					<input style="font-size:20px;position:absolute;height:25px;width:275px;left:155px;top:400px" name="data_nasterii" type="date"  min="1951-12-31" max="2007-12-31"required><br><br><br>
					
					<input style="font-size:20px;position:absolute; left:155px;top:450px" type="submit" value="Adauga clientul                     ">
				
				</form>

<!-- AFISARE  CLIENT -->
				
			<form method="post" action="afisare_client.php">
				<input style="font-size:20px;position: absolute; left:155px;top:550px" type="submit" value="Afisare tabela client              ">
			</form>			
	
<!--UPDATE CLIENT-->
				 
				 
				<form method="post" action="update_client.php">
					<label for="title" style="color:white;font-size:20px;position:absolute; top:650px; " >Selectati numarul de telefon al clientului pe care doriti sa il modificati </label><br><br>	
					<select style="font-size:20px;width 285;height:25px;position:absolute;left:580px;top:650px; " id="id_client" name="id_client" onchange="change_nume(this.value),
					change_prenume(this.value),change_email(this.value)" class="form-control">   
						<?php 
								include('connection.php');
								$sql_id="SELECT id_client,nr_telefon,nume,prenume,email,data_nasterii FROM client";
								$stid_id=oci_parse($conn,$sql_id);
								$r_id=@oci_execute($stid_id);
								while($row = oci_fetch_assoc($stid_id))
								{                  
								   echo '<option value="'.$row[(array_keys($row)[0])].' '.$row[(array_keys($row)[2])].' '.$row[(array_keys($row)[3])].' '.$row[(array_keys($row)[4])].'
								   '.$row[(array_keys($row)[5])].'">'.$row[(array_keys($row)[1])].'</option>';
								}

						?>
					</select>
					<br><br><br>
						<label style="color:white; font-size:20px;position:absolute; left:10px;top:700px">Nume</label>:
						<input style="font-size:20px;position:absolute;height:25px;width:275px;left:155px;top:700px" name="nume" type="text"   pattern="[A-Za-z]+"  maxlength="20" required><br><br><br>
						
						<label style="color:white; font-size:20px;position:absolute; left:10px;top:750px">Prenume</label>:
						<input style="font-size:20px;position:absolute;height:25px;width:275px;left:155px;top:750px " name="prenume" type="text"   pattern="[A-Za-z]+" maxlength="20" required><br><br><br>
						
						<label style="color:white; font-size:20px;position:absolute; left:10px;top:800px">Email</label>:
						<input style="font-size:20px;position:absolute;height:25px;width:275px;left:155px;top:800px" name="email" type="email"  required ><br><br><br>
						 
					<input style="font-size:20px;position: absolute; left:155px;top:900px" type="submit" value="Update                                  ">
			</form>
			

<!--STERGERE CLIENT-->	
			<form method="post" action="stergere_client.php">
				<label for="id_vehicul" style="color:white;font-size:20px;position:absolute; top:1000px" >Selectati numarul de telefon al clientului pe care doriti sa il stergeti </label><br>
				<select style="font-size:20px;width 285;height:25px;position:absolute;left:580px; top:1000px" id="id_client" name="id_client" >  		
				<?php 
						include('connection.php');
						$sql_id="SELECT id_client,nr_telefon from client where id_client not in (select id_client from contract) order by id_client";
						$stid_id=oci_parse($conn,$sql_id);
						$r_id=@oci_execute($stid_id);
						while(($row = oci_fetch_assoc($stid_id)))
						{				
						   echo '<option value="'.$row[(array_keys($row)[0])].'">'.$row[(array_keys($row)[1])].'</option>';
						}

				?> 
				</select><br><br>
				<input style="font-size:20px;position: absolute; left:155px;top:1050px" type="submit" value="Sterge client                          ">
			</form></br>




</body>

  <script type="text/javascript">
    function change_nume(str){
		var x=str.split(" ");
        document.getElementById("nume").value=x[1];
    }
	
	function change_prenume(str){
		var x=str.split(" ");
        document.getElementById("prenume").value=x[2];
    }
	function change_email(str){
		var x=str.split(" ");
        document.getElementById("email").value=x[3];
    }
</script>

</html>