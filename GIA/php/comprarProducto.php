<?php
$usuario = $_POST["user_loged"];
$tarifa = $_POST["tarifa"];

$host = "localhost";
$user = "root";
$password = "";
$db = "proyectogia_db";
$id_usuario = 1;
if($connection = mysqli_connect($host, $user, $password, $db)){
    $query = "INSERT into tarifas_clientes (id_Tarifa, id_Cliente) values($tarifa, $id_usuario)";
    $sql = mysqli_query( $connection, $query);
}
else{
    die("No se ha podido conectar con la base de datos: " . mysqli_connection_error());
}
mysqli_close($connection);

header("LOCATION: ../screens/userPanel.php");
?>