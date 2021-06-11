<?php
if (true) {
  // if(isset($_GET['id'])){
  include '../../../admin/persistencia/Mysql.php';
  include '../../../admin/persistencia/clases/CursoDAO.php';
  include '../../../admin/persistencia/clases/MatriculaDAO.php';
  include '../../persistencia/scripts/funciones_curso.php';
  $r = mysqli_fetch_assoc((new CursoDAO())->findById($_GET['id']));
?>

  <!DOCTYPE html>
  <html lang="es">

  <head>
    <!-- BORRADO DE CACHE | INICIO -->
    <!-- <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache"> -->
    <!-- BORRADO DE CACHE | FIN -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=no, user-scalable=0" />
    <title>FORMULARIO</title>
    <link rel="stylesheet" href="../css/inscribir.css?xd=0">
    <script src="../../logica/js/jquery-3.4.1.min.js"></script>
    <script src="../../logica/js/validacion.js"></script>
    <script src="../../logica/js/inscribir.js"></script>
    <script src="../../logica/ajax/inscribir.js"></script>

  </head>

  <body>

    <div class="contenedor-formulario">
      <div class="col">
        <div class="fil">
          <img src="../../../admin/presentacion/fotos/curso/<?php echo $r['curso_foto'] ?>">
        </div>
        <div class="fil">
          <h2 id="lbl_nombre_curso"><?php echo $r['curso_nombre'] ?></h2>
        </div>
        <div class="fil">
          <span><b>Fecha inicio: </b> <?php echo $r['curso_fecha_inicio'] ?></span>
        </div>
        <div class="fil">
          <span><b>Fecha fin: </b> <?php echo $r['curso_fecha_fin'] ?></span>
        </div>
        <div class="fil">
          <span><b>Cupos: </b> <?php echo getCuposDisponibles($r['curso_id']) ?></span>
        </div>
        <div class="fil">
          <span><b>Horas: </b> <?php echo ($r['modelo_curso_hora_teorica'] + $r['modelo_curso_hora_practica']) ?></span>
        </div>
      </div>
      <div class="col">
        <form method="post" id="formularioInscribir" onsubmit="return validar_inscribir(this)" autocomplete="off">
          <input type="hidden" name="id" value="0">
          <input type="hidden" name="id_curso" value="<?php echo $r['curso_id'] ?>">


          <h3>DATOS PERSONALES</h3>

          <div class="fil">
            <input type="text" name="cedula" onkeyup="existeParticipante(this)">
            <label>Cedula:</label>
          </div>

          <div class="fil">
            <input type="text" name="apellido">
            <label>Apellidos:</label>
          </div>

          <div class="fil">
            <input type="text" name="nombre">
            <label>Nombres:</label>
          </div>
          <div class="fil radio">
            <label>Sexo:</label>
            <div class="opciones">
              <input type="radio" name="sexo" id="sexoMasculino" value="Masculino">
              <label for="sexoMasculino" class="label">Masculino</label>
              <input type="radio" name="sexo" id="sexoFemenino" value="Femenino">
              <label for="sexoFemenino" class="label">Femenino</label>
            </div>
          </div>

          <div class="fil radio">
            <label>Instruccion:</label>
            <div class="opciones">
              <input type="radio" name="instruccion" id="instruccionPrimario" value="Primario">
              <label for="instruccionPrimario" class="label">Primario</label>
              <input type="radio" name="instruccion" id="instruccionSecundario" value="Secundario">
              <label for="instruccionSecundario" class="label">Secundario</label>
              <input type="radio" name="instruccion" id="instruccionSupeior" value="Superior">
              <label for="instruccionSupeior" class="label">Superior</label>
            </div>
          </div>


          <div class="fil">
            <input type="text" name="direccion">
            <label>Direccion:</label>
          </div>

          <div class="fil">
            <input type="email" name="email">
            <label>Correo:</label>
          </div>

          <div class="fil">
            <input type="text" name="celular">
            <label>Celular:</label>
          </div>

          <div class="fil">
            <input type="text" name="telefono">
            <label>Telefono:</label>
          </div>

          <div class="fil">
            <textarea name="descripcion"></textarea>
            <label style="width: 200px;">¿Que curso te gustaría?</label>
          </div>

          <h3>EMPRESA EN LA QUE LABORA</h3>

          <div class="fil">
            <input type="text" name="empresa_nombre">
            <label>Nombre:</label>
          </div>

          <div class="fil">
            <input type="text" name="empresa_actividad">
            <label>Cargo:</label>
          </div>

          <div class="fil">
            <input type="text" name="empresa_direccion">
            <label>Direccion:</label>
          </div>

          <div class="fil">
            <input type="text" name="empresa_telefono">
            <label>Telefono:</label>
          </div>

          <div class="fil radio">
            <div class="opciones">
              <input type="checkbox" name="terminos" id="terminos" value="terminos">
              <label for="terminos" class="label check">Acepto los terminos y condiciones</label>
            </div>
          </div>

          <div class="fil">
            <input type="submit" value="INSCRIBIRSE" name="formulario">
          </div>

        </form>
      </div>
    </div>

    <div class="content_modal_progress">
      <div class="modal_progress">
        <span></span>
        <div class="progress_bar"></div>
      </div>
    </div>

    <div class="content_modal_confirm">
      <div class="modal_confirm">
        <span></span>
        <div class="botones">
          <button onclick="guardarParticipanteSinValidar()">SI</button>
          <button onclick="closeConfirm()">NO</button>
        </div>
      </div>
    </div>

    <div id="content_modal_matriculado">
      <div class="modal_matriculado">
        <span>Se ha inscrito correctamente!<br>La informacion del curso se ha enviado a su email</span>
        <div class="botones">
          <button style="background: #0082CF;" onclick="closeModalMatriculado()">ACEPTAR</button>
        </div>
      </div>
    </div>

    <div id="content_modal_msg">
      <div class="modal_msg">
        <span id="modal_msg_msg">MSG</span>
        <div class="botones">
          <button style="background: #0082CF;" onclick="document.getElementById('content_modal_msg').style.display='none'">ACEPTAR</button>
        </div>
      </div>
    </div>

    <div id="content_modal_confirm_email">
      <div class="modal_confirm_email">
        <span>INGRESE EL CODIGO QUE SE LE HA ENVIADO A SU EMAIL</span>
        <input type="number" placeholder="Codigo.." id="txt_modal_form_confirm_email">
        <div class="botones">
          <button onclick="validateCodeEmail()">CONFIRMAR</button>
          <button onclick="
        (() => {
          hideModalConfirmEmail();
          txt_modal_form_confirm_email.value = '';
        })()
        ">CANCELAR</button>
        </div>
      </div>
    </div>


  </body>
  <script src="../../logica/js/inscribir.js?ss=dd"></script>
  <script src="../../logica/js/validacionEmail.js"></script>

  </html>
<?php
} else {
  header('location: ../index.php?pagina=10');
}
?>