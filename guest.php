<?php
if (isset($_COOKIE['nueva'])) {

    header("refresh:0;url=invitado/mostrar_documentos_inv.php");
} else {
    ?>
    <html>
        <head>        
            <title>Autenticaci�n</title>
            <style>
                /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
                @import url(http://fonts.googleapis.com/css?family=Exo:100,200,400);
                @import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);

                body{
                    margin: 0;
                    padding: 0;
                    background: #fff;

                    color: #fff;
                    font-family: Arial;
                    font-size: 12px;
                }

                .body{
                    position: absolute;
                    top: 0px;
                    left: 0px;
                    right: 0px;
                    bottom: 0px;
                    width: auto;
                    height: auto;
                    background-color: #D8D8D8;
                    background-size: cover;
                    -webkit-filter: blur(5px);
                    z-index: 0;
                }

                .grad{
                    position: absolute;
                    top: 0px;
                    left: 0px;
                    right: 0px;
                    bottom: 0px;
                    width: auto;
                    height: auto;
                    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0)), color-stop(100%,rgba(255, 255, 255, 0.65))); /* Chrome,Safari4+ */
                    z-index: 1;
                    opacity: 0.7;
                }

                .header{
                    position: absolute;
                    top: calc(38% - 35px);
                    left: calc(47% - 255px);
                    z-index: 2;
                }

                .header div{
                    float: left;
                    color: #424242;
                    font-family: 'Exo', sans-serif;
                    font-size: 32px;
                    font-weight: 200;
                }

                .header div span{
                    color: #5379fa !important;
                }

                .login{
                    position: absolute;
                    top: calc(50% - 75px);
                    left: calc(50% - 50px);
                    height: 150px;
                    width: 350px;
                    padding: 10px;
                    z-index: 2;
                }

                .login input[type=text]{
                    width: 250px;
                    height: 30px;
                    background: transparent;
                    border: 1px solid rgba(78, 141, 251, 0.46);
                    border-radius: 2px;
                    color: #424242;
                    font-family: 'Exo', sans-serif;
                    font-size: 16px;
                    font-weight: 400;
                    padding: 4px;                    
                }

                .login input[type=password]{
                    width: 250px;
                    height: 30px;
                    background: transparent;
                    border: 1px solid rgba(78, 141, 251, 0.46);
                    border-radius: 2px;
                    color: #424242;
                    font-family: 'Exo', sans-serif;
                    font-size: 16px;
                    font-weight: 400;
                    padding: 4px;
                    margin-top: 10px;
                }

                .login input[type=submit]{
                    width: 260px;
                    height: 35px;
                    background: #fff;
                    border: 1px solid #fff;
                    cursor: pointer;
                    border-radius: 2px;
                    color: #a18d6c;
                    font-family: 'Exo', sans-serif;
                    font-size: 16px;
                    font-weight: 400;
                    padding: 6px;
                    margin-top: 10px;
                    
                }

                .login input[type=submit]:hover{
                    opacity: 0.8;
                }

                .login input[type=submit]:active{
                    opacity: 0.6;
                }

                .login input[type=text]:focus{
                    outline: none;
                    border: 1px solid rgba(255,255,255,0.9);
                }

                .login input[type=password]:focus{
                    outline: none;
                    border: 1px solid rgba(255,255,255,0.9);
                }

                .login input[type=submit]:focus{
                    outline: none;
                }

                ::-webkit-input-placeholder{
                    color: rgba(0, 0, 0, 0.46);
                }

                ::-moz-input-placeholder{
                    color: rgba(0, 0, 0, 0.46);
                }
            </style>
<!--            <script src="js/prefixfree.min.js"></script>-->
            <link href='css/style_hmain.css' rel='stylesheet' type='text/css'>
            <script>

                function validar()
                {
                    if (!dato.usuario.value)
                    {
                        alert("Ingrese su C�dula!");
                        dato.usuario.focus();
                        return false;
                    }
                    else {
                        if (!/^[0-9]{10}$/.test(dato.usuario.value))
                        {
                            alert("C�dula Invalida");
                            dato.usuario.focus();
                            return false;
                        }
                    }
                }

            </script>

        </head>
        <body>

            <div class="body">
                
            </div>
            <div class="grad">
                <ul>                
                    <li><a href="http://www.unach.edu.ec">P�gina Oficial UNACH</a></li>
                <li><a href="main.php">Acceder como Usuario</a></li>
                <li><a href="#news">Documentaci�n del Sistema</a></li>
                <li style="float:right"><a class="active" href="#about">Acerca de..</a></li>
            </ul>
            </div>                  
            <div class="header">                        
                <div>Invitado<img src="images/sysc.png" align="left">
            </div>
            </div>    
            <br>
            <div class="login">
                <form method="POST" name="dato"  action="invitado.php" onsubmit="return validar(this);">
                    <input type="text" placeholder="C�dula" name="usuario"/><br>                
                    <input type="submit" value="Acceder" >                
                    <br>                
                </form>
                <form method="POST" name="datos"  action="main.php">							
                    <input type="submit" value="P�gina Anterior" >
                </form>
            </div>
            <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        </body>
    </html>
    <?php
}
?>