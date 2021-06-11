<?php
include '../../../admin/persistencia/Mysql.php';
include '../../../admin/persistencia/clases/InformacionDAO.php';
$_informacion = new InformacionDAO();
$_informacion = mysqli_fetch_assoc($_informacion -> consultar());
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title><?php echo $_informacion['institucion_siglas'] ?> - Copyright</title>
  <link rel="icon" href="../../../img_db/logo_pagina.png">
  <link rel="stylesheet" href="../css/Copyright.css">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=no, user-scalable=0"/> 
</head>
<body>
  
  <div class="fondo"></div>
  
  <div class="content">    
    <?php echo $_informacion['copyright'] ?>
    <br><br><br>
    <p class="creditos">
      <b>Creditros: </b>Programarte
    </p>
  </div>

</body>
</html>