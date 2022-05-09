<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database="proyectogia";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password,$database);
    // Check connection
    if (!$conn) {
     die("Connection failed: " . mysqli_connect_error()."<br>");
    };


    $drops='DROP TABLE IF EXISTS clientes,empleado,tarifas,tarifas_clientes;';
    if (mysqli_query($conn, $drops)) {
      echo "Drops hechos<br>";
     } else {
      echo "Error haciendo drops " . mysqli_error($conn)."<br>";
     }

    $clientes='CREATE TABLE clientes (
        id_Cliente int(11) NOT NULL,
        dni_Cliente varchar(9) NOT NULL,
        Nombre_Cliente varchar(20)  NOT NULL,
        Apellido_Cliente varchar(30)  NOT NULL,
        Telefono_Cliente int(9) NOT NULL,
        Correo_Cliente varchar(45) NOT NULL,
        Nombre_Usuario varchar(15) NOT NULL,
        Contraseña_Cliente varchar(20) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4 COLLATE=utf8mb4_spanish_ci;
        ';
    
    if (mysqli_query($conn, $clientes)) {
      echo "Table clientes created successfully<br>";
     } else {
      echo "Error creating table: " . mysqli_error($conn)."<br>";
     }
    
     $empleados='CREATE TABLE empleado (
      id_Empleado int(11) NOT NULL,
      dni_Empleado varchar(9) NOT NULL,
      Nombre_Empleado varchar(20)  NOT NULL,
      Apellidos_Empleado varchar(30)  NOT NULL,
      Cargo_Empleado enum("Admin","SuperAdmin","Jefe")  NOT NULL,
      Sueldo_Empleado decimal(10,0) NOT NULL,
      Fecha_Nacimiento_Empleado date NOT NULL,
      Usuario_Empleado varchar(15)  NOT NULL,
      Constraseña_Empleado varchar(30)  NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4 COLLATE=utf8mb4_spanish_ci;';
   

   if (mysqli_query($conn, $empleados)) {
    echo "Table empleado created successfully<br>";
   } else {
    echo "Error creating table: " . mysqli_error($conn)."<br>";
   }

  $tarifas='CREATE TABLE tarifas (
    id_Tarifa int(11) NOT NULL,
    Nombre_Tarifa varchar(15) COLLATE latin1_spanish_ci NOT NULL,
    Descripcion_Tarifa varchar(50) COLLATE latin1_spanish_ci NOT NULL,
    Precio_Tarifa decimal(10,0) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4 COLLATE=utf8mb4_spanish_ci;';
    
  if (mysqli_query($conn, $tarifas)) {
      echo "Table tarifas created successfully<br>";
  } else {
      echo "Error creating table: " . mysqli_error($conn)."<br>";
    }

  $tarifas_clientes='CREATE TABLE tarifas_clientes (
    id_Tarifas_Clientes int(11) NOT NULL,
    id_Tarifa int(11) NOT NULL,
    id_Cliente int(11) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4 COLLATE=utf8mb4_spanish_ci;';

  if (mysqli_query($conn, $tarifas_clientes)) {
  echo "Table tarifas_clientes created successfully<br>";
  } else {
  echo "Error creating table: " . mysqli_error($conn)."<br>";
 }

 $alter_clientes='ALTER TABLE `clientes`
 ADD PRIMARY KEY (`id_Cliente`),
 MODIFY id_Cliente int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1231537;';

  if (mysqli_query($conn, $alter_clientes)) {
    echo "Alter clientes correcto<br>";
    } else {
    echo "Error alter clientes: " . mysqli_error($conn)."<br>";
  }

  $alter_empleado='ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_Empleado`),
  MODIFY `id_Empleado` int(11) NOT NULL AUTO_INCREMENT;';

  if (mysqli_query($conn, $alter_empleado)) {
    echo "Alter empleado correcto<br>";
    } else {
    echo "Error alter empleado: " . mysqli_error($conn)."<br>";
  }

  $alter_tarifas='ALTER TABLE `tarifas`
  ADD PRIMARY KEY (`id_Tarifa`),
  MODIFY `id_Tarifa` int(11) NOT NULL AUTO_INCREMENT;';

if (mysqli_query($conn, $alter_tarifas)) {
  echo "Alter tarifas correcto<br>";
  } else {
  echo "Error alter tarifas: " . mysqli_error($conn)."<br>";
}


  $alter_tarifas_clientes='ALTER TABLE `tarifas_clientes`
  ADD PRIMARY KEY (`id_Tarifas_Clientes`),
  ADD KEY `id_Cliente` (`id_Cliente`),
  ADD KEY `id_Tarifa` (`id_Tarifa`),
  ADD CONSTRAINT `id_Cliente` FOREIGN KEY (`id_Cliente`) REFERENCES `clientes` (`id_Cliente`),
  ADD CONSTRAINT `id_Tarifa` FOREIGN KEY (`id_Tarifa`) REFERENCES `tarifas` (`id_Tarifa`);';

if (mysqli_query($conn, $alter_tarifas_clientes)) {
  echo "Alter tarifas_clientes correcto<br>";
  } else {
  echo "Error alter tarifas_clientes: " . mysqli_error($conn)."<br>";
};
    
    $conn->close();
  
  
?>