<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/sweetalert2.min.css">
    <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
</head>
<body>
    <script src="../js/sweetalert2.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/userPanel.js"></script>
    <?php
        $nickUser = $_GET["t1"];
        $nombreUser = $_GET["t2"];
        $apellidoUser = $_GET["t3"];
        $telefonoUser = $_GET["t4"];
        $mailUser = $_GET["t5"];

        echo "<script>";
        echo "Swal.fire({";
        echo "    title: '¡Enhorabuena!',";
        echo "    text: 'Servicio contratado con exito',";
        echo "    icon: 'success',";
        echo "    confirmButtonText: 'Ok',";
        echo "    allowOutsideClick: false";
        echo "}).then((result) => {";
        echo "    if (result.isConfirmed) {";
        echo "        window.location.href='userPanel.php?t1=".$nickUser."&t2=".$nombreUser."&t3=".$apellidoUser."&t4=".$telefonoUser."&t5=".$mailUser."'".";";
        echo "    }";
        echo "})";
        echo "</script>";
    ?>
</body>
</html>