<?php
$usuario = "'" . $_POST["user_loged"] . "'";
$tarifa = $_POST["tarifa"];

$host = "localhost";
$user = "root";
$password = "";
$db = "proyectogia_db";
if($connection = mysqli_connect($host, $user, $password, $db)){
    $result = mysqli_query( $connection, "SELECT `id_Cliente` FROM `clientes` WHERE `Nombre_Usuario_Cliente` = $usuario;");
    while($row = mysqli_fetch_assoc($result))
    {
        $id_Cliente = $row["id_Cliente"];
        $result2 = mysqli_query( $connection, "INSERT INTO `tarifas_clientes`(`id_Tarifa`, `id_Cliente`) VALUES ($tarifa, $id_Cliente)");
    } 
}
else{
    die("No se ha podido conectar con la base de datos: " . mysqli_connection_error());
}
mysqli_close($connection);
header("LOCATION: ../screens/userPanel.php");
?>