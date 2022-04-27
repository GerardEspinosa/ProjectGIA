<?php
        $host = "localhost";
        $user = "root";
        $password = "";
        $db = "proyectogia";
    
        $connection = mysqli_connect($host, $user, $password, $db);

        $username = "'" . $_POST["user"] . "'";
        $pwd = "'" . $_POST["password"] . "'";

        if(!$connection)
        {
            die("No se ha podido conectar con la base de datos: " . mysqli_connection_error());
        }
        else
        {
            echo "Conectado con exito" . "<br>";
            $query = "SELECT * FROM `clientes` WHERE Nombre_Usuario = $username AND Contraseña_Cliente = $pwd";
            if($result = mysqli_query($connection, $query))
            {
                header("LOCATION: ../index.html");
            }
            else
            {
                $query = "SELECT * FROM `clientes` WHERE Correo_Cliente = $username AND Contraseña_Cliente = $pwd";
                if($result = mysqli_query($connection, $query))
                {
                    header("LOCATION: ../index.html");
                }
            }
        }

        mysqli_close($connection);
?>