<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet">
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Project GIA</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"
      crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
  </head>
  <body class="bg-lightgrey">
    <div class="offcanvas offcanvas-start" id="demo">
      <div class="offcanvas-header">
        <h1 class="offcanvas-title">Heading</h1>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
      </div>
      <div class="offcanvas-body">
        <?php
        $nickUser = $_GET["t1"];
        $nombreUser = $_GET["t2"];
        $apellidoUser = $_GET["t3"];
        $telefonoUser = $_GET["t4"];
        $mailUser = $_GET["t5"];
        ?>
        <a class="no-underline" <?php $url = "href='screens/userPanel.php?t1=" . $nickUser . "&t2=" . $nombreUser . "&t3=" . $apellidoUser  . "&t4=" . $telefonoUser  ."&t5=" . $mailUser . "'";  echo $url; ?>>Panel de Usuario</a>
        <br>
        <button class="btn btn-secondary mt-3" onclick="location.href = 'default.html';">Logout</button>
      </div>
    </div>
    <br>
    <button class="btn btn-primary rounded-30 fa fa-bars" id="menu"
      type="menu"
      data-bs-toggle="offcanvas"
      data-bs-target="#demo">
    </button>
    <div id="hiddenDiv" hidden>
      <form id="hiddenForm" method="get" hidden>
        <input type="hidden" name="nickUser" id="nickUser">
      </form>
    </div>
    <div class="child text-center" id="pagina">
      <h1>Bienvenido, </h1>
      <h1>
        <?php 
          echo $nickUser;
        ?>
      </h1>
      <button class="btn btn-primary rounded-30" onclick="myFunction()">Ver
        datos personales</button>
    </div>
    <div class="child bg-white shadow padding-60" id="personalData">
      <table class="table table-borderless">
        <tr>
          <td><b>Nombre de usuario</b></td>
          <td>
            <?php
              echo $nickUser;
            ?>
          </td>
        </tr>
        <tr>
          <td><b>Nombre</b></td>
          <td>
            <?php
              echo $nombreUser;
            ?>
          </td>
        </tr>
        <tr>
          <td><b>Apellido</b></td>
          <td>            
            <?php
              echo $apellidoUser;
            ?>
            </td>
        </tr>
        <tr>
          <td><b>Email</b></td>
          <td>
            <?php
              echo $mailUser;
            ?>
          </td>
        </tr>
        <tr>
          <td><b>Teléfono</b></td>
          <td>            
            <?php
              echo $telefonoUser;
            ?>
          </td>
        </tr>
      </table>
    </div>
    <script src="js/sweetalert2.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/index.js"></script>
  </body>
</html>