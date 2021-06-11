<?php
header("Content-type: application/vnd.ms-excel; charset=latin1");
if(isset($_GET['id']) and isset($_GET['type'])){  
  require_once '../../persistencia/Mysql.php';
  require_once '../../persistencia/clases/CursoDAO.php';
  require_once '../../persistencia/clases/MatriculaDAO.php';
  require_once '../../persistencia/clases/ParticipanteDAO.php';
  $type = $_GET['type'];
  $id = $_GET['id'];
  $_participante = new ParticipanteDAO();
  $_matricula = new MatriculaDAO();
  $_curso = mysqli_fetch_assoc((new CursoDAO()) -> findById($id));
  if($type=="moodle"){
    header("Content-Disposition: attachment; filename=MOODLE_CursoCsv_".$_curso['curso_nombre'].".xls");
?>
  <!DOCTYPE html>
  <html lang="es">
    <head>
       <meta charset="UTF-8">
       <title>Reporte_Modelo_Curso</title>
  </head>
  <body>  
    <style>
      table{
        border-collapse: collapse;
      }
    </style>
    
    <table border="1">
     
      <tr>
        <td>username</td>
        <td>password</td>
        <td>firstname</td>
        <td>lastname</td>
        <td>email</td>
        <td>city</td>
        <td>course1</td>
        <td>type1</td>
      </tr>
      
      <tr>
        <td><?php echo intval($_curso['profesor_cedula']) ?></td>
        <td>Sucua_<?php echo intval($_curso['profesor_cedula']) ?></td>
        <td><?php echo $_curso['profesor_nombre'] ?></td>
        <td><?php echo $_curso['profesor_apellido'] ?></td>
        <td></td>
        <td>Sucua</td>
        <td><?php echo $_curso['curso_nombre'] ?></td>
        <td>2</td>
      </tr>
      
<?php
  $rs = $_matricula  -> findByIdCurso($id);
  while($r = mysqli_fetch_assoc($rs)){
      $r_participante = mysqli_fetch_assoc($_participante -> findById($r['id_participante']));
?>
      <tr>
        <td><?php echo intval($r_participante['cedula']) ?></td>
        <td>Sucua_<?php echo intval($r_participante['cedula']) ?></td>
        <td><?php echo $r_participante['nombre'] ?></td>
        <td><?php echo $r_participante['apellido'] ?></td>
        <td><?php echo $r_participante['email'] ?></td>
        <td><?php echo $r_participante['direccion'] ?></td>
        <td><?php echo $_curso['curso_nombre'] ?></td>
        <td>1</td>
      </tr>
<?php } ?>
    </table>
    
    
  </body>
</html>
<?php
  }else{
    header("Content-Disposition: attachment; filename=TODOS_CursoCsv_".$_curso['curso_nombre'].".xls");
?>
  <!DOCTYPE html>
  <html lang="es">
    <head>
       <meta charset="UTF-8">
       <title>Reporte_Modelo_Curso</title>
  </head>
  <body>  
    <style>
      table{
        border-collapse: collapse;
      }
    </style>
    
    <table border="1">
      <tr><td colspan="14"><center><b><h3><?php echo strtoupper($_curso['curso_nombre']) ?></h3></b></center></td></tr>
      <tr>
        <td>CEDULA</td>
        <td>APELLIDO</td>
        <td>NOMBRE</td>
        <td>SEXO</td>
        <td>NIVEL_INSTRUCCION</td>
        <td>DIRECCION</td>
        <td>EMAIL</td>
        <td>CELULAR</td>
        <td>TELEFONO</td>
        <td>DESCRIPCION</td>
        <td>EMPRESA_NOMBRE</td>
        <td>EMPRESA_ACTIVIDAD</td>
        <td>EMPRESA_DIRECCION</td>
        <td>EMPRESA_TELEFONO</td>
      </tr>
<?php
  $rs = $_matricula  -> findByIdCurso($id);
  while($r = mysqli_fetch_assoc($rs)){
      $r_participante = mysqli_fetch_assoc($_participante -> findById($r['id_participante']));
?>
      <tr>
        <td><?php echo $r_participante['cedula'] ?></td>
        <td><?php echo $r_participante['apellido'] ?></td>
        <td><?php echo $r_participante['nombre'] ?></td>
        <td><?php echo $r_participante['sexo'] ?></td>
        <td><?php echo $r_participante['nivel_instruccion'] ?></td>
        <td><?php echo $r_participante['direccion'] ?></td>
        <td><?php echo $r_participante['email'] ?></td>
        <td><?php echo $r_participante['celular'] ?></td>
        <td><?php echo $r_participante['telefono'] ?></td>
        <td><?php echo $r_participante['descripcion'] ?></td>
        <td><?php echo $r_participante['empresa_nombre'] ?></td>
        <td><?php echo $r_participante['empresa_actividad'] ?></td>
        <td><?php echo $r_participante['empresa_direccion'] ?></td>
        <td><?php echo $r_participante['empresa_telefono'] ?></td>
      </tr>
<?php } ?>
    </table>
    
    
  </body>
</html>
<?php
  }
}
?>