<?php
    //////////////////////////////////////////////////////////////////////
    //CREAMOS LA CONEXiÓN
    //////////////////////////////////////////////////////////////////////
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "proyectogia";

    $connection = mysqli_connect($host, $user, $password, $db);


    //////////////////////////////////////////////////////////////////////
    //RECOGEMOS LOS VALORES
    //////////////////////////////////////////////////////////////////////
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $correo = $_POST["correo"];
    $dni = $_POST["dni"];
    $telefono = $_POST["telefono"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];


    //////////////////////////////////////////////////////////////////////
    //COMPROBAMOS LA CONEXIÓN
    //////////////////////////////////////////////////////////////////////
    if(!$connection){
        die("No se ha podido conectar a la base de datos: " . mysqli_connection_error());
    }

    else{
        echo "Conectado con exito" . "<br>";
        $query = "INSERT INTO clientes(dni_Cliente, Nombre_Cliente, Apellido_Cliente, Telefono_Cliente, Correo_Cliente, Fecha_Nacimiento_Cliente) VALUES(?, ?, ?, ?, ?, ?)";
        if($result = mysqli_query($connection, $query)){
            echo "Usuario registrado";
        }
        
    }

    //$dni, $nombre, $apellido, $telefono, $correo, $fecha_nacimiento

    echo $nombre;

    mysqli_close($connection);
?>