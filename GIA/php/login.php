<?php
        $host = "localhost";
        $user = "root";
        $password = "";
        $db = "proyectogia_db";
    
        $connection = mysqli_connect($host, $user, $password, $db);

        $user = "'" . $_POST["user"] . "'";
        $pwd = "'" . $_POST["password"] . "'";

        if(!$connection)
        {
            die("No se ha podido conectar con la base de datos: " . mysqli_connection_error());
        }
        else
        {


            echo "Conectado con exito" . "<br>";
            $query = "SELECT * FROM `clientes` WHERE Nombre_Usuario_Cliente = $user AND Contraseña_Cliente = $pwd";
            $query2 = "SELECT * FROM `clientes` WHERE Correo_Cliente = $user AND Contraseña_Cliente = $pwd";
            $result = mysqli_query($connection, $query);
            $result2 = mysqli_query($connection, $query2);
            if(mysqli_num_rows($result)==1 || mysqli_num_rows($result2)==1)
            {
                header("LOCATION: ../index.php");
            }
            else
            {
                $query = "SELECT * FROM `empleado` WHERE Correo_Empleado = $user AND Constraseña_Empleado = $pwd";
                $query2 = "SELECT * FROM `empleado` WHERE Usuario_Empleado = $user AND Constraseña_Empleado = $pwd";
                $result = mysqli_query($connection, $query);
                $result2 = mysqli_query($connection, $query2);
                if(mysqli_num_rows($result)==1 || mysqli_num_rows($result2)==1)
                {
                    $row = mysqli_fetch_assoc($result);
                    $row2 = mysqli_fetch_assoc($result2);
                    if ($row["Cambiar_Contraseña"] == TRUE || $row2["CambiarContraseña"] == TRUE){
                        $id = $row["id_Empleado"];
                        $empleadoUsuario = "'" . $row["Usuario_Empleado"] . "'";
                        $queryCambiarContraseña = "UPDATE `empleado` SET `Cambiar_Contraseña`= false WHERE `id_Empleado` = 1 AND `Usuario_Empleado` = $empleadoUsuario";
                        $cambiarContraseñaFalse = mysqli_query($connection, $queryCambiarContraseña);
                        if (mysqli_num_rows($cambiarContraseñaFalse)==1){
                            echo "Contraseña Cambiada";
                        }
                    }
                    else{
                        header("LOCATION: ../index.php");
                    }
                }
                else{
                    echo "Usuario no encontrado";
                }
            }

        }

        mysqli_close($connection);
?>