<?php
    //////////////////////////////////////////////////////////////////////
    //CREAMOS LA CONEXiÓN
    //////////////////////////////////////////////////////////////////////
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "proyectogia_db";

    $connection = mysqli_connect($host, $user, $password, $db);


    //////////////////////////////////////////////////////////////////////
    //RECOGEMOS LOS VALORES
    //////////////////////////////////////////////////////////////////////
    $nombre = "'" . $_POST["nombre"] . "'";
    $apellido = "'" . $_POST["apellido"] . "'";
    $correo = "'" . $_POST["correo"] . "'";
    $dni = "'" . $_POST["dni"] . "'";
    $telefono = "'" . $_POST["telefono"] . "'";
    $userName = "'" . $_POST["nombre_usuario"] . "'";
    $pwd = "'" . $_POST["contraseña_cliente"] . "'";
    //$fecha_nacimiento = $_POST["fecha_nacimiento"];

    //////////////////////////////////////////////////////////////////////
    //COMPROBAMOS LA CONEXIÓN
    //////////////////////////////////////////////////////////////////////
    if(!$connection)
    {
        die("No se ha podido conectar a la base de datos: " . mysqli_connection_error());
    }
    else
    {
        echo "Conectado con exito" . "<br>";
        //$query = "INSERT INTO clientes(dni_Cliente, Nombre_Cliente, Apellido_Cliente, Telefono_Cliente, Correo_Cliente, Fecha_Nacimiento_Cliente) VALUES(?, ?, ?, ?, ?, ?)";
        $query = "INSERT INTO `clientes` ( `dni_Cliente`, `Nombre_Cliente`, `Apellido_Cliente`, `Telefono_Cliente`, `Correo_Cliente`, `Nombre_Usuario_Cliente`, `Contraseña_Cliente`) VALUES ( $dni, $nombre, $apellido, $telefono, $correo, $userName, $pwd)";
        //echo ($query);
        /*
        $result = mysqli_query($connection, $query);
        if(mysqli_num_rows($result)==1){
            if($row = mysqli_fetch_assoc($result))
            {
                $nickDeUsuario = $row["Nombre_Usuario_Cliente"];
                $nombreDeUsuario = $row["Nombre_Cliente"];
                $apellido = $row["Apellido_Cliente"];
                $tel = $row["Telefono_Cliente"];
                $mail = $row["Correo_Cliente"];
                header("LOCATION: ../index.php?t1=".$nickDeUsuario."&t2=".$nombreDeUsuario."&t3=".$apellido."&t4=".$tel."&t5=".$mail);        
            }
        }
        */
        if($result = mysqli_query($connection, $query))
        {
            $nombreDeUsuario = $_POST["nombre"];
            $apellidos = $_POST["apellido"];
            $mail = $_POST["correo"];
            $tel = $_POST["telefono"];
            $nickDeUsuario = $_POST["nombre_usuario"];
            header("LOCATION: ../index.php?t1=".$nickDeUsuario."&t2=".$nombreDeUsuario."&t3=".$apellidos."&t4=".$tel."&t5=".$mail);    
        }
    }

    mysqli_close($connection);
?>