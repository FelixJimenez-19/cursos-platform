<?php
if(isset($index)){
  $r = mysqli_fetch_assoc($_informacion -> consultar());
?>

<link rel="stylesheet" href="css/datos.css">
<link rel="stylesheet" href="css/multimedia.css">

<span>LOGOS - IMAGENES</span>
<span>Una vez realizado cualquier cambio presione CTRL + F5 para apreciar dichos cambios</span>

<div class="content">
  
  
  <div class="seccion">
    <h3>LOGOS</h3>
    <div class="col">
      <h4>INSTITUCION</h4>
      <img src="../../img_db/logo_institucion.png">
    </div>
    <div class="col">
      <h4>PAGINA</h4>
      <img src="../../img_db/logo_pagina.png">
    </div>
    <button onclick="abrir_form_institucion()"><img src="img/icon_edit.png"></button>
  </div>
  
  <div class="seccion">
    <h3>FIRMAS - SELLOS</h3>
    <div class="col">
      <h4>RECTOR(A)</h4>
      <img src="../../img_db/sellos/firma_rectora.png">
    </div>
    <div class="col">
      <h4>INSTITUCION</h4>
      <img src="../../img_db/sellos/sello_institucion.png">
    </div>
    <div class="col">
      <h4>EDUCACION</h4>
      <img src="../../img_db/sellos/sello_educacion.png">
    </div>
    <button onclick="abrir_form_sellos()"><img src="img/icon_edit.png"></button>
  </div>
   
  <div class="seccion">
    <h3>SLIDER</h3>
    <div class="col">
      <h4>IMAGEN 1</h4>
      <img src="../../capacitacion_continua/presentacion/imgs/slider/1.png">
    </div>
    <div class="col">
      <h4>IMAGEN 2</h4>
      <img src="../../capacitacion_continua/presentacion/imgs/slider/2.png">
    </div>
    <div class="col">
      <h4>IMAGEN 3</h4>
      <img src="../../capacitacion_continua/presentacion/imgs/slider/3.png">
    </div>
    <div class="col">
      <h4>IMAGEN 4</h4>
      <img src="../../capacitacion_continua/presentacion/imgs/slider/4.png">
    </div>
    <button onclick="abrir_form_rector()"><img src="img/icon_edit.png"></button>
  </div>
  
</div>



<div class="modal" id="contenedor_institucion">
  <form action="../persistencia/scripts/guarda_multimedia?tipo=logos" method="post" id="form_institucion" enctype="multipart/form-data">
    <h3>LOGOS</h3>
    <div class="cols">
      <div class="col">
        <span>INSTITUCION</span>
        <input type="file" name="logo_institucion" accept="image/x-png,image/jpg">
      </div>
      <div class="col">
        <span>PAGINA</span>
        <input type="file" name="logo_pagina" accept="image/x-png,image/jpg">
      </div>
    </div>
    
    <input type="submit" style="background: #26A7DF;" value="ACTUALIZAR" name="btn">
    <input type="button" style="background: #DD4F43;" value="CANCELAR" onclick="cerrar_form_institucion()">
    <label>LA PAGINA SE RECARGARÁ AL ACTUALIZAR</label>
  </form>
</div>

<div class="modal" id="contenedor_sellos">
  <form action="../persistencia/scripts/guarda_multimedia?tipo=sellos" method="post" id="form_institucion" enctype="multipart/form-data">
    <h3>FIRMAS - SELLOS</h3>
    <div class="cols">
      <div class="col">
        <span>RECTOR(A)</span>
        <input type="file" name="firma_rectora" accept="image/x-png,image/jpg">
      </div>
      <div class="col">
        <span>INSTITUCION</span>
        <input type="file" name="sello_institucion" accept="image/x-png,image/jpg">
      </div>
      <div class="col">
        <span>EDUCACION</span>
        <input type="file" name="sello_educacion" accept="image/x-png,image/jpg">
      </div>
    </div>
    
    <input type="submit" style="background: #26A7DF;" value="ACTUALIZAR" name="btn">
    <input type="button" style="background: #DD4F43;" value="CANCELAR" onclick="cerrar_form_sellos()">
    <label>LA PAGINA SE RECARGARÁ AL ACTUALIZAR</label>
  </form>
</div>

<div class="modal" id="contenedor_rector">
  <form action="../persistencia/scripts/guarda_multimedia?tipo=slider" method="post" id="form_institucion" enctype="multipart/form-data">
    <h3>SLIDER</h3>
    <div class="cols">
      <div class="col">
        <span>IMAGEN 1</span>
        <input type="file" name="img1" accept="image/x-png,image/jpg">
      </div>
      <div class="col">
        <span>IMAGEN 2</span>
        <input type="file" name="img2" accept="image/x-png,image/jpg">
      </div>
      <div class="col">
        <span>IMAGEN 3</span>
        <input type="file" name="img3" accept="image/x-png,image/jpg">
      </div>
      <div class="col">
        <span>IMAGEN 4</span>
        <input type="file" name="img4" accept="image/x-png,image/jpg">
      </div>
    </div>
    <input type="submit" style="background: #26A7DF;" value="ACTUALIZAR" name="btn">
    <input type="button" style="background: #DD4F43;" value="CANCELAR" onclick="cerrar_form_rector()">
    <label>LA PAGINA SE RECARGARÁ AL ACTUALIZAR</label>
  </form>
</div>

<script src="../logica/js/datos.js"></script>


<?php
}else{
  header('location: ../admin.php?pagina=7.3');
}
?>