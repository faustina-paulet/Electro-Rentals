<!DOCTYPE html>
<html>

<head>
		<title>Mecanic - Electro</title>
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
		
<!-- ADAUGA MECANIC -->
			
				<br><h3 style="color:white">ADAUGA MECANIC</h3><br><br><br>
				  
				<form method="post" action="inserare_mecanic.php">
					
					<label style="color:white; font-size:20px;position:absolute; left:10px;top:200px">Nume</label>:
					<input style="font-size:20px;position:absolute;height:25px;width:275px;left:155px;top:200px" name="nume" type="text"   pattern="[A-Za-z]+"  maxlength="20" required><br><br><br>
						
					<label style="color:white; font-size:20px;position:absolute; left:10px;top:250px">Prenume</label>:
					<input style="font-size:20px;position:absolute;height:25px;width:275px;left:155px;top:250px " name="prenume" type="text"   pattern="[A-Za-z]+" maxlength="20" required><br><br><br>
						
					<label style="color:white; font-size:20px;position:absolute; left:10px;top:300px">Email</label>:
					<input style="font-size:20px;position:absolute;height:25px;width:275px;left:155px;top:300px" name="email" type="email"  required ><br><br><br>
						
					<label for="nr_telefon" style="color:white; font-size:20px;position:absolute; left:10px;top:350px">Numar de telefon</label>:
					<input style="font-size:20px;position:absolute;height:25px;width:275px;left:155px;top:350px" name="nr_telefon" pattern="[0-9]+" type="tel" maxlength="10"  required ><br><br><br>
					
					
					<input style="font-size:20px;position:absolute; left:155px;top:400px" type="submit" value="Adauga mecanic                   ">
				
				</form>
				
<!--AFISARE MECANIC-->
				
			<form method="post" action="afisare_mecanic.php">
				<input style="font-size:20px;position: absolute; left:155px;top:500px" type="submit" value="Afisare tabela mecanic         ">
			</form>			
	
<!--UPDATE MECANIC-->
				 
				 
				<form method="post" action="update_mecanic.php">
					<label for="title" style="color:white;font-size:20px;position:absolute; top:600px; " >Selectati numarul de telefon al mecanicului pe care doriti sa il modificati </label><br><br>	
					<select style="font-size:20px;width 285;height:25px;position:absolute;left:600px;top:600px; " id="id_mecanic" name="id_mecanic" onchange="change_nume(this.value),
					change_prenume(this.value),change_email(this.value)" class="form-control">   
						<?php 
								include('connection.php');
								$sql_id="SELECT id_mecanic,nr_telefon,nume,prenume,email FROM mecanic";
								$stid_id=oci_parse($conn,$sql_id);
								$r_id=@oci_execute($stid_id);
								while($row = oci_fetch_assoc($stid_id))
								{                  
								   echo '<option value="'.$row[(array_keys($row)[0])].' '.$row[(array_keys($row)[2])].' '.$row[(array_keys($row)[3])].'
								   '.$row[(array_keys($row)[4])].'">'.$row[(array_keys($row)[1])].'</option>';
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
						 
					<input style="font-size:20px;position: absolute; left:155px;top:880px" type="submit" value="Update                                  ">
			</form>
			

<!--STERGERE MECANIC-->	


			<form method="post" action="stergere_mecanic.php">
				<label for="id_mecanic" style="color:white;font-size:20px;position:absolute; top:1000px" >Selectati numarul de telefon al mecanicului pe care doriti sa il stergeti </label><br>
				<select style="font-size:20px;width 285;height:25px;position:absolute;left:600px; top:1000px" id="id_mecanic" name="id_mecanic" >  		
				<?php 
						include('connection.php');
						$sql_id="SELECT id_mecanic,nr_telefon from mecanic where id_mecanic not in (select id_mecanic from problema) order by id_mecanic";
						$stid_id=oci_parse($conn,$sql_id);
						$r_id=@oci_execute($stid_id);
						while(($row = oci_fetch_assoc($stid_id)))
						{				
						   echo '<option value="'.$row[(array_keys($row)[0])].'">'.$row[(array_keys($row)[1])].'</option>';
						}

				?> 
				</select><br><br>
				<input style="font-size:20px;position: absolute; left:155px;top:1050px" type="submit" value="Sterge mecanic                     ">
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