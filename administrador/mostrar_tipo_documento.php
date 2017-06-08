<?php

include '../connect_db.php';
	$sql= "SELECT Id_Usuario, Us_Nombres, Us_Apellidos, Us_Cedula, Us_Password, Us_Correo_electronico, Us_Fecha_Nacimiento, Us_Sexo, Us_Telefono, Id_Tipo_Usuario, Us_Direccion, Id_Departamento FROM usuario;";
        $qry= mysqli_query($conex, $sql); 	
?>

<html>
	<head>
		<title>Usuarios</title>
<style type="text/css">


/* Datagrid */
	body {
  font: normal medium/1.4 sans-serif;
  background: linear-gradient( 0deg, #C0C0C0   , #F8F8F8);}
table {
  border-collapse: collapse;
  width: 100%;
}
th, td {
  padding: 0.25rem;
  border: 1px solid #ccc;
}
tbody tr:nth-child(odd) {
  background: #eee;
}
.centro{
  padding: 0.5rem;
  background: #484848 ;
  color: white;
  text-align: center;
  font-size: 21px;

}

#cuadro{
	width: 90%;
	background: #F8F8F8 ;
	padding: 25px;
	margin: 5px auto;
	border: 3px solid #D8D8D8;
}
#titulo{
	width: 100%;
	background: #282828;
	color:white;

}
	</style>
	</head>
	<body>
	<div id="cuadro">
		<center><img src="/unach/imagenes/contact.png"><br>
		<div id="titulo">
		<center><h1>Regristos</h1></center>
		</div>
		
		<table>
			<thead>
				<tr class="centro">
					<td>Id_Usuario</td>
					<td>Nombres</td>
					<td>Apellidos</td>
                                        <td>Cédula</td>
					<td>Password</td>
					<td>Correo electrónico</td>
                                        <td>Fecha Nacimiento</td>
                                        <td>Género</td>
                                        <td>Teléfono</td>
                                        <td>Tipo de Usuario</td>
                                        <td>Dirección</td>
                                        <td>Departamento</td>
				</tr>
				<tbody>
					<?php while($row=$qry->fetch_assoc()){ ?>
						<tr>
							<td><?php echo $row['Id_Usuario'];?>
							</td>
							<td>
								<?php echo $row['Us_Nombres'];?>
							</td>
							<td>
								<?php echo $row['Us_Apellidos'];?>
							</td>
							<td>
								<?php echo $row['Us_Cedula'];?>
							</td>
							<td>
								<?php echo $row['Us_Password'];?>
							</td>
                                                        <td>
								<?php echo $row['Us_Correo_electronico'];?>
							</td>
                                                        <td>
								<?php echo $row['Us_Fecha_Nacimiento'];?>
							</td>
                                                        <td>
								<?php echo $row['Us_Sexo'];?>
							</td>
                                                        <td>
								<?php echo $row['Us_Telefono'];?>
							</td>
                                                        <td>
								<?php echo $row['Id_Tipo_Usuario'];?>
							</td>
                                                        <td>
								<?php echo $row['Us_Direccion'];?>
							</td>
                                                        <td>
								<?php echo $row['Id_Departamento'];?>
							</td>                                                        
						</tr>
					<?php } ?>
				</tbody>
			</table>	
			</center
		</div>
		</body>
	</html>	
	