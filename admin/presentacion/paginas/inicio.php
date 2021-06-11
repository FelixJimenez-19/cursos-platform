<link rel="stylesheet" href="css/inicio.css">
<?php
if(isset($index)){
if($_cuenta == "administrador"){
?>
<h2>USTED A INICIADO SESION COMO ADMINISTRADOR</h2>
<div class="contenedor">
  <img src="../../img_db/logo_pagina.png">
</div>
<?php }else{ ?>
<h2>USTED A INICIADO SESION COMO DOCENTE</h2>
<div class="contenedor">
  <img src="../../img_db/logo_pagina.png">
</div>
<?php
}
}else{
  header('location: ../admin.php');
}
?>