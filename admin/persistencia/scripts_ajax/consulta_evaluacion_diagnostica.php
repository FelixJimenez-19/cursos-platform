<!--ESTA SIENDO USADO POR MEDIO DE AJAX-->
<?php
if(isset($_POST['id'])){
  include '../Mysql.php';
  include '../clases/EvaluacionDiagnosticaDAO.php';
  $_evaluacion_diagnostica = new EvaluacionDiagnosticaDAO();
  $id = $_POST['id'];
  $rs = $_evaluacion_diagnostica -> findByIdModeloCurso($id);
  while($r = mysqli_fetch_assoc($rs)){
    echo "
      <tr>
        <td>".$r['tecnica']."</td>
        <td>".$r['instrumento']."</td>
        <td>".$r['descripcion']."</td>
        <td><button onclick=\"abrirModalEliminarRegistro('id_evaluacion_diagnostica','".$r['id_evaluacion_diagnostica']."','evaluacion_diagnostica')\"><img src='img/icon_menos.png'></button></td>
      </tr>
    ";
  }
}
?>