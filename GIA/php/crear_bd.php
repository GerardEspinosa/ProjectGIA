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

$sql = "DROP DATABASE IF EXISTS proyectogia_db";
if ($conn->query($sql) === TRUE) {
  echo "Database dropped successfully<br>";
} else {
  echo "Error dropping database: " . $conn->error."<br>"; 
}
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
    Nombre_Tarifa varchar(50) COLLATE latin1_spanish_ci NOT NULL,
    Descripcion_Tarifa varchar(200) COLLATE latin1_spanish_ci NOT NULL,
    Precio_Tarifa decimal(10,0) NOT NULL,
    Path_Tarifa varchar(50) COLLATE latin1_spanish_ci NOT NULL
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
("1", "78016273K", "Monica", "Sanchez", "931029384", "monicasanchez@gmail.com", "kuka999", "guisante31"),
("2", "97182918W", "Carlos", "Lopez", "691029384", "carloslopez@gmail.com", "cocos231", "guisante31213"),
("3", "78016273K", "Paula", "Galvez", "684192834", "conguitosrojos@gmail.com", "conguitosrojos", "conguitonegro"),
("4", "47098301N", "Ben", "Rodriguez", "691823013", "talkingben@gmail.com", "talkingben", "cristian921213"),
("5", "47973199X", "Daniel", "Agra", "938172831", "danielagra@gmail.com", "danielagra", "brais1"),
("6","93182193Z", "Anna", "Garcia", "594112999", "guaumiau@gmail.com", "friedrich", "engels"),
("7","3748984H", "admin", "admin", "928586878", "admin@gmail.com", "admin", "admin");';

if (mysqli_query($conn, $insert_clientes)) {
  echo "Insert clientes correcto<br>";
  } else {
  echo "Error Insert clientes: " . mysqli_error($conn)."<br>";
};

$insert_empleados='INSERT INTO empleado (id_Empleado,dni_Empleado,Nombre_Empleado,Apellidos_Empleado,
Cargo_Empleado,Sueldo_Empleado,Fecha_Nacimiento_Empleado,Correo_Empleado,Usuario_Empleado,
Constraseña_Empleado) VALUES
("1","47197735X","Ivan","Montoya Garcia","Admin","5000€","28/10/2000","ivanmontoya.79@gmai.com","ivanmoga","1234");
';

if (mysqli_query($conn, $insert_empleados)) {
  echo "Insert empleados correcto<br>";
  } else {
  echo "Error Insert empleados: " . mysqli_error($conn)."<br>";
};

$insert_tarifas='INSERT INTO tarifas (id_Tarifa, Nombre_Tarifa, Descripcion_Tarifa,
 Precio_Tarifa, Path_Tarifa) VALUES
("1", "Tarifa Base", "Tarifa base con los servicios mínimos, incluye una alarma 24 horas y atención al cliente las 24 horas.", "150€", "atencionCliente.jpg"),
("2", "Paneles Solares", "Estudio de posibilidades de instalación, estimación de presupesto y puesta en marcha.", "4000€", "panelSolar.jpg"),
("3", "Persianas y cortinas automáticas", "Instalación de persianas y cortinas automatizadas en toda la vivienda.", "1300€", "persiana.jpg"),
("4", "Automatizacion de las puertas","Las habitaciones cuentan con sensores, cuando detecta que vas a entrar o salir de una habitación, abre o cierra la puerta.","1300€","puerta.png"),
("5", "Automatización de las luces","Contarás con sensores en los marcos de las puertas que detectan cuando alguien entra, en ese momento enciende la luz. Si detecta que la habitación está vacia, se cierran.","1300€","bombilla.jpg");
("6", "Pack automatización","Los servicios 3, 4 y 5 de automatización en un pack, con un descuento del 30%.","6720€","automatizacion.jpg")';

if (mysqli_query($conn, $insert_tarifas)) {
  echo "Insert tarifas correcto<br>";
  } else {
  echo "Error Insert tarifas: " . mysqli_error($conn)."<br>";
};

    $conn->close();
  
  
?>