<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
include '../../../admin/persistencia/Mysql.php';
include '../../../admin/persistencia/clases/CursoDAO.php';
include '../../../admin/persistencia/functions/date.php';
$entity = new CursoDAO();
if (
  isset($_POST['id_participante']) and
  isset($_POST['id_curso']) and
  isset($_POST['estado']) and
  isset($_POST['cedula']) and
  isset($_POST['apellido']) and
  isset($_POST['nombre']) and
  isset($_POST['sexo']) and
  isset($_POST['instruccion']) and
  isset($_POST['direccion']) and
  isset($_POST['email']) and
  isset($_POST['celular']) and
  isset($_POST['telefono']) and
  isset($_POST['descripcion']) and
  isset($_POST['empresa_nombre']) and
  isset($_POST['empresa_actividad']) and
  isset($_POST['empresa_direccion']) and
  isset($_POST['empresa_telefono'])
) {
  $id_participante = $_POST['id_participante'];
  $id_curso = $_POST['id_curso'];
  $estado = $_POST['estado'];
  $cedula = $_POST['cedula'];
  $apellido = $_POST['apellido'];
  $nombre = $_POST['nombre'];
  $sexo = $_POST['sexo'];
  $instruccion = $_POST['instruccion'];
  $direccion = $_POST['direccion'];
  $email = $_POST['email'];
  $celular = $_POST['celular'];
  $telefono = $_POST['telefono'];
  $descripcion = $_POST['descripcion'];
  $empresa_nombre = $_POST['empresa_nombre'];
  $empresa_actividad = $_POST['empresa_actividad'];
  $empresa_direccion = $_POST['empresa_direccion'];
  $empresa_telefono = $_POST['empresa_telefono'];
  $rs = mysqli_fetch_assoc($entity->findById($id_curso));

  $título = 'INSCRIPCION EXITOSA - INSTITUTO SUPERIOR TECNOLOGICO SUCUA';
  $mensaje = '
    <html>
    <head>
      <title>'.$titulo.'</title>
    </head>
    <body>
      <table style="width: 100%; max-width: 500px; background: #FFFFFF; color: #000000; text-align: center; padding: 10px 20px; border-radius: 5px; font-family: sans-serif; box-shadow: 0 2px 10px 1px #b0b0b0;">
        <tr>
          <td colspan="2">
            <h2 style="margin: 10px 0 5px 0; user-select: none;">INSCRIPCION EXITOSA - IST SUCUA</h2>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <img style="width: 100%; height: auto; border-radius: 3px; box-shadow: 0 2px 5px 1px #b0b0b0; margin: 0 0 10px 0;" src="http://itssucua.edu.ec/capacitaciones/admin/presentacion/fotos/curso/'.$rs['curso_foto'].'"/> </td>
        </tr>
        <tr>
          <td colspan="2">
            <h2 style="font-weight: normal; font-size: 1.3em; text-align: left; margin:0px; user-select: none;">
              Gracias <b>'.$nombre.' '.$apellido.'</b> por inscribirse en el curso "<b>'.$rs['curso_nombre'].'</b>", le pedimos estar pendiente de la fecha de inicio que es <b>'.getSpanishDate($rs['curso_fecha_inicio'], 1).'</b> en la plataforma <b>Moodle: </b>
              <br>
              <a style="color:001781;" href="http://itssucua.edu.ec/virtual/login/index.php" target="_blank">
                <img src="http://itssucua.edu.ec/capacitaciones/admin/presentacion/img/moodle.png" style="height: 17px;"><span>http://itssucua.edu.ec/virtual</span>
              </a>
              <br>
              Donde sus credenciales serán:
            </h2>
          </td>
        </tr>
        <tr>
          <td style="width: 130px;">
            <h2 style="margin:0px; text-align: left; font-size: 1.3em; user-select: none;">Usuario:</h2>
            <h2 style="margin:0px; text-align: left; font-size: 1.3em; user-select: none;">Contraseña:</h2>
          </td>
          <td style="width: auto;">
            <h2 style="font-weight: normal; font-size: 1.3em; text-align: left; margin:0px;">'.intval($cedula).'</h2>
            <h2 style="font-weight: normal; font-size: 1.3em; text-align: left; margin:0px;">Sucua_'.intval($cedula).'</h2>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <h2 style="font-weight: normal; font-size: 1.3em; text-align: left; margin:0px; user-select: none;">
              Tambien le invitamos a ser parte del grupo de <b>Whatsapp: </b>
              <br>
              <a style="color:001781;" href="'.$rs['curso_link_whatsapp'].'" target="_blank">
                <img src="http://itssucua.edu.ec/capacitaciones/admin/presentacion/img/whatsapp.png" style="height: 20px;"><span>https://chat.whatsapp.com</span>
              </a>
              <br>
              Creado especificamente para abordar temas de este curso.
            </h2>
          </td>
        </tr>
      </table>
    </body>
    </html>  
  ';
  // Para enviar un correo HTML, debe establecerse la cabecera Content-type
  $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
  $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  // Cabeceras adicionales
  // $cabeceras .= 'To: ' . $nombre . ' <' . $email . '>' . "\r\n";
  // $cabeceras .= 'From: itssucuaedu <itssucua.edu.ec' . "\r\n";
  // $cabeceras .= 'Cc: birthdayarchive@example.com' . "\r\n";
  // $cabeceras .= 'Bcc: birthdaycheck@example.com' . "\r\n";
  // Enviarlo
  mail($email, $título, $mensaje, $cabeceras);

  echo json_encode(['success']);
} else {
  echo json_encode([null]);
}