<?php
        $host = "localhost";
        $user = "root";
        $password = "";
        $db = "proyectogia";
    
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
            $query = "SELECT * FROM `clientes` WHERE Nombre_Cliente = $user AND Contraseña_Cliente = $pwd";
            $query2 = "SELECT * FROM `clientes` WHERE Correo_Cliente = $user AND Contraseña_Cliente = $pwd";
            if($result = mysqli_query($connection, $query) || $result = mysqli_query($connection, $query2))
            {
                header("LOCATION: ../index.html");
            }
            else
            {
                $query = "SELECT * FROM `empleado` WHERE Correo_Empleado = $user AND Constraseña_Empleado = $pwd";
                $query2 = "SELECT * FROM `empleado` WHERE Usuario_Empleado = $user AND Constraseña_Empleado = $pwd";
                if($result = mysqli_query($connection, $query) || $result = mysqli_query($connection, $query2))
                {
                    header("LOCATION: ../index.html");
                }
            }

        }

        mysqli_close($connection);
?>