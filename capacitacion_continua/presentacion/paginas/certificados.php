<?php
if(isset($index)){
?>
<link rel="stylesheet" href="css/curso.css">
<link rel="stylesheet" href="css/certificados.css">

<div class="content_busqueda">
  <h1>CONSULTA DE CERTIFICADOS</h1>
  <div class="info">
    <span>
      <h2>EDUCACION CONTINUA</h2>
      <h3>IST SUCUA</h3>
    </span>
    <img src="../../img_db/logo_pagina.png">
    <img src="imgs/senecyt.png">
    <span>
      <h2>EDUCACION SUPERIOR</h2>
      <h3>SENESCYT</h3>
    </span>
  </div>
  <input type="search" placeholder="NUMERO DE CEDULA" onkeyup="buscar_certificado(this)">
</div>

<div class="content_resultados" id="content_resultados">
<!--
  <div class="item">
    <div class="encabezado">10 Resultado(s)</div>
  </div>
  <div class="item">
    <div class="encabezado"><span>1</span></div>
    <div class="informacion">
      <div class="fil">
        <span>NOMBRE DEL CURSO: </span>
        <label>BASE DE DATOS</label>
      </div>
      <div class="fil">
        <span>NOMBRE PARTICIPANTE: </span>
        <label>EDWIN VICENTE JARA FRIAS</label>
      </div>
      <div class="fil">
        <span>CEDULA: </span>
        <label>1500653561</label>
      </div>
      <div class="fil">
        <span>ESTADO: </span>
        <label>APROBADO</label>
      </div>
      <div class="fil">
        <span>FECHA DE INICIO Y FIN: </span>
        <label>DEL 2017-11-20 AL 2017-12-28</label>
      </div>
      <div class="fil">
        <span>CODIGO: </span>
        <label>ITS-TENA-02-TENA-EDU-039-007</label>
      </div>
      <div class="fil">
        <span>PDF: </span>
        <button><img src="imgs/icon_pdf.png"></button>
      </div>
    </div>
  </div>
-->
</div>




<div id="contenedor_reporte">
  <div class="sub_ventana">
    <a onclick="closePdf()"><img src="imgs/icon_close.png"></a>
    <iframe src="" id="iframe_pdf"></iframe>
  </div>
</div>


<script src="../logica/js/validacion.js"></script>
<script src="../logica/js/certificados.js"></script>
<script src="../logica/ajax/certificados.js"></script>
<?php 
}else{
  header('location: ../index.php?pagina=3');
} 
?>