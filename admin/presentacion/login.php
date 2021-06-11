<?php
session_start();
if(empty($_SESSION['cuenta'])){
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> 
  <title>Login | Certificacion ISTS</title>
  <link rel="icon" href="../../img_db/logo_pagina.png">
  <link rel="stylesheet" href="css/login.css">
</head>
<body id="particles-js">
  <div class="contenedor">
    <div class="botones_login">
      <input type="button" value="PROFESOR" id="btnProfesor">
      <input type="button" value="ADMINISTRADOR" id="btnAdministrador">
    </div>
    <div class="logins">
      <form action="../persistencia/scripts/login.php" method="post" autocomplete="off">
        <img src="../../img_db/logo_pagina.png">
        <h3>PROFESOR</h3>
        <span><img src="img/user.png">CEDULA:</span>
        <input type="text" name="cedula" placeholder="CEDULA" required>
        <span><img src="img/pass.png">CONTRASEÑA:</span>
        <input type="password" name="pass" placeholder="CONTRASEÑA" required>
        <input type="hidden" name="cuenta" value="profesor">
        <input type="submit" value="INICIAR SESION">
      </form>
      <form action="../persistencia/scripts/login.php" method="post" autocomplete="off">
        <img src="../../img_db/logo_pagina.png">
        <h3>ADMINISTRADOR</h3>
        <span><img src="img/user.png">CEDULA:</span>
        <input type="text" name="cedula" placeholder="CEDULA" required>
        <span><img src="img/pass.png">CONTRASEÑA:</span>
        <input type="password" name="pass" placeholder="CONTRASEÑA" required>
        <input type="hidden" name="cuenta" value="administrador">
        <input type="submit" value="INICIAR SESION">
      </form>
    </div>
    <a href="../../index.php"><img src="img/back.png">REGRESAR</a>
  </div>
</body>
<script src="../logica/plugins/particles/particles.js"></script>
<script src="../logica/plugins/particles/particles_config.js"></script>
<script src="../logica/js/btnLogin.js"></script>
</html>
<?php
}else{
  header("location: admin.php");
}
?>