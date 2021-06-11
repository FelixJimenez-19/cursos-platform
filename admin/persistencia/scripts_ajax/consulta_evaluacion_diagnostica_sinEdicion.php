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
      </tr>
    ";
  }
}
?>