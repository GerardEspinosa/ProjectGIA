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
            //select * from clientes where Nombre_Cliente = 'Gerard'
            $g query = "SELECT * FROM clientes Where Nombre_Cliente = $user";
            if($result = mysqli_query($connection, $query)){
                echo "Query Correcta";
            }
        }
?>