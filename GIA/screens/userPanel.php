<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Panel</title>
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
    </head>
    <body>
        <div class="content-full">
        <h3>PRODUCTOS</h3>
        <div class="row">
        <!-- TABLA DINAMICA DE PRODUCTOS-->
        <?php
        $host = "localhost";
        $user = "root";
        $password = "";
        $db = "proyectogia_db";
        if($connection = mysqli_connect($host, $user, $password, $db)){
            $sql = mysqli_query( $connection, "SELECT * FROM tarifas");
            while($row = mysqli_fetch_assoc($sql))
            {
                echo "<div class='col-12 col-md-6 col-xxl-4'>";
                echo "<div class='panel m-3 p-3 shadow bg-white'>";
                echo "<h5>" . $row["Nombre_Tarifa"] . "</h5>";
                echo "<div class='mb-3'>";
                echo "<img width='300' height='auto' src='../img/" . $row["Path_Tarifa"] . "'>";
                echo "</div>";
                echo "<p>" . $row["Descripcion_Tarifa"] . "</p>";
                echo "<p>" . $row["Precio_Tarifa"] . "€</p>";
                echo "<form action='../php/comprarProducto.php'  method='post'>";
                echo "<input type='hidden' name='user_loged' id='user_loged'>";
                echo "<input type='hidden' name='tarifa' value='" . $row["id_Tarifa"] . "'>";
                echo "<button class='btn btn-primary rounded-30'>Comprar</button>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
            }
        }
        else{
            die("No se ha podido conectar con la base de datos: " . mysqli_connection_error());
        }
        mysqli_close($connection);
        ?>
        </div>
        </div>
        <script src="../js/bootstrap.js"></script>
        <script src="../js/userPanel.js"></script>
    </body>
</html>