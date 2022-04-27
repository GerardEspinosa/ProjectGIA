<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "myDB";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    // sql to create table
    $sql = "CREATE DATABASE myDB";
    if ($conn->query($sql) === TRUE) {
      echo "Database created successfully";
    } else {
      echo "Error creating database: " . $conn->error;
    }
    
    $codigo='CREATE TABLE clientes (
        id_Cliente int(11) NOT NULL,
        dni_Cliente varchar(9) COLLATE latin1_spanish_ci NOT NULL,
        Nombre_Cliente varchar(20) COLLATE latin1_spanish_ci NOT NULL,
        Apellido_Cliente varchar(30) COLLATE latin1_spanish_ci NOT NULL,
        `Telefono_Cliente int(9) NOT NULL,
        `Correo_Cliente` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
        `Nombre_Usuario` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
        `Contraseña_Cliente` varchar(20) COLLATE latin1_spanish_ci NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

        CREATE TABLE `empleado` (
        `id_Empleado` int(11) NOT NULL,
        `dni_Empleado` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
        `Nombre_Empleado` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
        `Apellidos_Empleado` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
        `Cargo_Empleado` enum(`Admin`,`SuperAdmin`,`Jefe`) COLLATE latin1_spanish_ci NOT NULL,
        `Sueldo_Empleado` decimal(10,0) NOT NULL,
        `Fecha_Nacimiento_Empleado` date NOT NULL,
        `Usuario_Empleado` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
        `Constraseña_Empleado` varchar(30) COLLATE latin1_spanish_ci NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;


        CREATE TABLE `tarifas` (
            `id_Tarifa` int(11) NOT NULL,
            `Nombre_Tarifa` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
            `Descripcion_Tarifa` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
            `Precio_Tarifa` decimal(10,0) NOT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;


        CREATE TABLE `tarifas_clientes` (
        `id_Tarifas_Clientes` int(11) NOT NULL,
        `id_Tarifa` int(11) NOT NULL,
        `id_Cliente` int(11) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

        ALTER TABLE `clientes`
        ADD PRIMARY KEY (`id_Cliente`);

        ALTER TABLE `empleado`
        ADD PRIMARY KEY (`id_Empleado`);

        ALTER TABLE `tarifas`
        ADD PRIMARY KEY (`id_Tarifa`);

        ALTER TABLE `tarifas_clientes`
        ADD PRIMARY KEY (`id_Tarifas_Clientes`),
        ADD KEY `id_Cliente` (`id_Cliente`),
        ADD KEY `id_Tarifa` (`id_Tarifa`);

        ALTER TABLE `clientes`
        MODIFY `id_Cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1231537;

        ALTER TABLE `empleado`
        MODIFY `id_Empleado` int(11) NOT NULL AUTO_INCREMENT;

        ALTER TABLE `tarifas`
        MODIFY `id_Tarifa` int(11) NOT NULL AUTO_INCREMENT;

        ALTER TABLE `tarifas_clientes`
        MODIFY `id_Tarifas_Clientes` int(11) NOT NULL AUTO_INCREMENT;

        ALTER TABLE `tarifas_clientes`
        ADD CONSTRAINT `id_Cliente` FOREIGN KEY (`id_Cliente`) REFERENCES `clientes` (`id_Cliente`),
        ADD CONSTRAINT `id_Tarifa` FOREIGN KEY (`id_Tarifa`) REFERENCES `tarifas` (`id_Tarifa`);
        COMMIT;";
    
    if ($conn->query($sql) === TRUE) {
      echo "Table MyGuests created successfully";
    } else {
      echo "Error creating table: " . $conn->error;
    }
    
    $conn->close();
        
?>