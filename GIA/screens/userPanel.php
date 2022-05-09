<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Panel</title>
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/main.css">
    </head>
    <body>
        <h3>PRODUCTOS</h3>
        <?php
        $host = "localhost";
        $user = "root";
        $password = "";
        $db = "proyectogia";
        if($connection = mysqli_connect($host, $user, $password, $db)){
            
        }
        

        $sql = mysql_query("SELECT * FROM tarifas");
        echo "<table>";
        while($row = mysql_fetch_assoc($sql))
        {
            
        }
        echo "</table";
        ?>
        <div class="row">
            <div class="col-12 col-md-6 col-xxl-4">
                <div class="m-3 p-3 shadow bg-white">
                    1
                </div>
            </div>
            <div class="col-12 col-md-6 col-xxl-4">
                <div class="m-3 p-3 shadow bg-white">
                    2
                </div>
            </div>
            <div class="col-12 col-md-6 col-xxl-4">
                <div class="m-3 p-3 shadow bg-white">
                    3
                </div>
            </div>
            <div class="col-12 col-md-6 col-xxl-4">
                <div class="m-3 p-3 shadow bg-white">
                    4
                </div>
            </div>
            <div class="col-12 col-md-6 col-xxl-4">
                <div class="m-3 p-3 shadow bg-white">
                    5
                </div>
            </div>
            <div class="col-12 col-md-6 col-xxl-4">
                <div class="m-3 p-3 shadow bg-white">
                    6
                </div>
            </div>
        </div>
        <?php ?>
        <script src="../js/bootstrap.js"></script>
        <script src="../js/userPanel.js"></script>
    </body>
</html>