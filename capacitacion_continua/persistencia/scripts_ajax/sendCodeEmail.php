<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
// include '../../../admin/persistencia/Mysql.php';
// include '../dao/ReportePagoDAO.php';
// $_reporte_pago = new ReportePagoDAO();
// if (isset($_POST['submit'])) {




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
  isset($_POST['empresa_telefono']) and
  isset($_POST['curso_nombre']) and
  isset($_POST['codigo'])
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
  $curso_nombre = $_POST['curso_nombre'];
  $codigo = $_POST['codigo'];
  $título = 'CONFIRMACION - INSTITUTO SUPERIOR TECNOLOGICO SUCUA';
  $mensaje = '
    <html>

      <head>
        <title>CONFIRMACION - INSTITUTO SUPERIOR TECNOLOGICO SUCUA</title>
      </head>

      <body>

        <table style="width: 100%; max-width: 500px; background: #21292D; color: #FFFFFF; text-align: center; padding: 10px 20px; border-radius: 5px;">
          <tr>
            <td colspan="2">
              <h2>CONFIRMACION - INSTITUTO SUPERIOR TECNOLOGICO SUCUA</h2>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <img style="width: 150px; height: 150px;" src="http://itssucua.edu.ec/capacitaciones/img_db/logo_pagina.png" />
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <h2 style="font-weight: normal; text-align: left;">
                Saludos <b>' . $nombre . ' ' . $apellido . '</b> en respuesta a su peticion para inscribirse al curso <b>"' . $curso_nombre . '"</b>. Necesitamos que confirme con el codigo a continuacion.
              </h2>
            </td>
          </tr>
          <tr>
            <td style="width: 50%;">
              <h2>SU CODIGO ES:</h2>
            </td>
            <td style="width: 50%;">
              <h1><b>' . $codigo . '</b></h1>
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