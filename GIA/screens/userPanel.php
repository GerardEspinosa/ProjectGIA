<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Panel</title>
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/sweetalert2.min.css">
        <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
        <script src="https://kit.fontawesome.com/a076d05399.js"
        crossorigin="anonymous"></script>
        <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        rel="stylesheet">
        <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <div class="content-full">
        <h3>PRODUCTOS</h3>
        <?php
        $nickUser = $_GET["t1"];
        $nombreUser = $_GET["t2"];
        $apellidoUser = $_GET["t3"];
        $telefonoUser = $_GET["t4"];
        $mailUser = $_GET["t5"];
        ?>
        <a class="btn btn-primary rounded-30" <?php $url = "href='../index.php?t1=" . $nickUser . "&t2=" . $nombreUser . "&t3=" . $apellidoUser  . "&t4=" . $telefonoUser  ."&t5=" . $mailUser . "'";  echo $url; ?>>Volver al Menú</a>
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
                echo "<form action='../php/comprarProducto.php?t1=".$nickUser."&t2=".$nombreUser."&t3=".$apellidoUser."&t4=".$telefonoUser."&t5=".$mailUser."'"."method='post'>";
                echo "<form action='../php/comprarProducto.php method='post'>";
                echo "<input type='hidden' name='user_loged' class='user_loged'>";
                echo "<input type='hidden' name='tarifa' value='" . $row["id_Tarifa"] . "'>";
                echo "<input type='submit' class='btn btn-primary rounded-30' value='Comprar'>";
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