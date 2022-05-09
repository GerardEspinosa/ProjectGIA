<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database="proyectogia_db";
    
// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS proyectogia_db";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully<br>";
} else {
  echo "Error creating database: " . $conn->error."<br>"; 
}

$conn = mysqli_connect($servername, $username, $password,$database);

    $drops='DROP TABLE IF EXISTS clientes,empleado,tarifas,tarifas_clientes;';
    if (mysqli_query($conn, $drops)) {
      echo "Drops hechos<br>";
     } else {
      echo "Error haciendo drops " . mysqli_error($conn)."<br>";
     }

    $clientes='CREATE TABLE clientes (
              id_Cliente int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
              dni_Cliente varchar(9) NOT NULL,
              Nombre_Cliente varchar(20)  NOT NULL,
              Apellido_Cliente varchar(30) NOT NULL,
              Telefono_Cliente int(9) NOT NULL,
              Correo_Cliente varchar(45) NOT NULL,
              Codigo_Postal_Cliente int(5) NOT NULL,
              Provincia_Cliente varchar(45) NOT NULL,
              Ciudad_Cliente varchar(45) NOT NULL,
              Direccion_Cliente varchar(45) NOT NULL,
              Fecha_Nacimiento_Cliente date NOT NULL,
              Fecha_Registro_Cliente date NOT NULL,
              Nombre_Usuario_Cliente varchar(15) COLLATE latin1_spanish_ci NOT NULL,
              Contraseña_Cliente varchar(30) COLLATE latin1_spanish_ci NOT NULL
              ) ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4 COLLATE=utf8mb4_spanish_ci;
              ';
    
    if (mysqli_query($conn, $clientes)) {
      echo "Table clientes created successfully<br>";
     } else {
      echo "Error creating table: " . mysqli_error($conn)."<br>";
     }
    
     $empleados='CREATE TABLE empleado (
      id_Empleado int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
      dni_Empleado varchar(9) NOT NULL,
      Nombre_Empleado varchar(20)  NOT NULL,
      Apellidos_Empleado varchar(30)  NOT NULL,
      Cargo_Empleado enum("Admin","SuperAdmin","Jefe")  NOT NULL,
      Sueldo_Empleado decimal(10,0) NOT NULL,
      Fecha_Nacimiento_Empleado date NOT NULL,
      Correo_Empleado varchar(30) NOT NULL,
      Usuario_Empleado varchar(15)  NOT NULL,
      Constraseña_Empleado varchar(30)  NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4 COLLATE=utf8mb4_spanish_ci;';
   

   if (mysqli_query($conn, $empleados)) {
    echo "Table empleado created successfully<br>";
   } else {
    echo "Error creating table: " . mysqli_error($conn)."<br>";
   }

  $tarifas='CREATE TABLE tarifas (
    id_Tarifa int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
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
    id_Tarifas_Clientes int(11) NOT NULL PRIMARY KEY,
    id_Tarifa int(11) NOT NULL,
    id_Cliente int(11) NOT NULL,
    FOREIGN KEY (id_Tarifa) REFERENCES tarifas(id_Tarifa),
    FOREIGN KEY (id_Cliente) REFERENCES clientes(id_Cliente)
    ) ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4 COLLATE=utf8mb4_spanish_ci;';

  if (mysqli_query($conn, $tarifas_clientes)) {
  echo "Table tarifas_clientes created successfully<br>";
  } else {
  echo "Error creating table: " . mysqli_error($conn)."<br>";
 }

$insert_clientes='INSERT INTO clientes (id_Cliente, dni_Cliente, Nombre_Cliente,
 Apellido_Cliente, Telefono_Cliente, Correo_Cliente, Nombre_Usuario_Cliente, Contraseña_Cliente) VALUES
("1", "123456", "Gerard", "Espinosa", "431425", "gerard@gmail.com", "", "12345"),
("2", "1293891Q", "Usuario", "Prueba", "701704653", "correo@gmail.com", "", ""),
("23", "34819481Q","Gerard", "Espinosa", "294308", "gerarde@gmail.com", "", ""),
("1234", "839193Q", "Gerard", "Espinosa", "0", "", "", ""),
("1235", "", "", "", "0", "", "", ""),
("1236", "47197735X", "Ivan", "Montoya", "666444555", "ivan@gmail.com", "", ""),
("12345", "9123891Q", "Gerard", "Espinosa", "605701038", "geymix@gmail.com", "", ""),
("1231534", "2319418Q", "Prueba", "1", "239892391", "prueba231@gmail.com", "", ""),
("1231535", "12345678Q", "Marcos", "Antonio", "2147483647", "prueba@prueba.com", "", ""),
("1231536", "12314511", "Prueba", "Prueba", "3841741", "Prueba@prueba.com", "", "");';


if (mysqli_query($conn, $insert_clientes)) {
  echo "Insert clientes correcto<br>";
  } else {
  echo "Error Insert clientes: " . mysqli_error($conn)."<br>";
};

$insert_tarifas='INSERT INTO tarifas (id_Tarifa, Nombre_Tarifa, Descripcion_Tarifa,
 Precio_Tarifa) VALUES
("1", "Tarifa Base", "Tarifa base con los servicios mínimos", "150€"),
("2", "Instalación solar", "Estudio de posibilidades de instalación y pusta en marcha", "2000€")';

if (mysqli_query($conn, $insert_tarifas)) {
  echo "Insert tarifas correcto<br>";
  } else {
  echo "Error Insert tarifas: " . mysqli_error($conn)."<br>";
};

    $conn->close();
  
  
?>