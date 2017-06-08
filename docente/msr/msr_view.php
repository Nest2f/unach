<?php
include '../../connect_db.php';
$sql = "SELECT * FROM emisor_documento;";
$qry = mysqli_query($conex, $sql);
?>
<html>
    <head>
        <title>EMISOR</title>                
        <link rel="stylesheet" type="text/css" href="../../css/style_lista_1.css">        
    </head>
    <body>
        <div id="cuadro">
            <a href="../../docente/menu.php" style="border-style: none;box-shadow: none;"> <img src="../../imagenes/regresar.png" alt="Regresar" width="55" height="55" > </a>
            <center><img src="/unach/imagenes/msr.png" height="100" width="100"><br>
                <input type="submit" value="AGREGAR ESTADO" class="button" onclick="location = '../msr/msr.html'">
                <form name="datos1" method="REQUEST" action="dlt_msr.php" >                     
                    <label for="username" class="uname"  > ID DEL EMISOR: </label>
                    <input name="Id1" type="text" placeholder="Ejm: 1"/>                                               
                    <input type="submit" value="ELIMINAR ESTADO" class="button" onclick="return validar1(this)" />    
                </form>
                <form name="datos2" method="REQUEST" action="mdf_msr.php">
                    <label for="username" class="uname"  > ID DEL EMISOR: </label>
                    <input name="Id2" type="text" placeholder="Ejm: 1"/>                                               
                    <input type="submit" value="MODIFICAR ESTADO" class="button" onclick="return validar2(this)" /> 
                </form>
                <div id="titulo_1">
                    <center><h1>EMISORES REGISTRADOS</h1></center>
                </div>

                <table>
                    <thead>
                        <tr class="centro">
                            <td>Id del Emisor</td>
                            <td>Descripción del Emisor</td>					
                        </tr>
                    <tbody>
                        <?php while ($row = $qry->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row['Id_Emisor']; ?>
                                </td>
                                <td>
                                    <?php echo $row['Descripcion_Emisor']; ?>
                                </td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
        </div>          
    </body>
</html>


