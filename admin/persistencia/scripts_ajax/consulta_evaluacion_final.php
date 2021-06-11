<!--ESTA SIENDO USADO POR MEDIO DE AJAX-->
<?php
if(isset($_POST['id'])){
  include '../Mysql.php';
  include '../clases/EvaluacionFinalDAO.php';
  $_evaluacion_final = new EvaluacionFinalDAO();
  $id = $_POST['id'];
  $rs = $_evaluacion_final -> findByIdModeloCurso($id);
  while($r = mysqli_fetch_assoc($rs)){
    echo "
      <tr>
        <td>".$r['tecnica']."</td>
        <td>".$r['instrumento']."</td>
        <td>".$r['descripcion']."</td>
        <td><button onclick=\"abrirModalEliminarRegistro('id_evaluacion_final','".$r['id_evaluacion_final']."','evaluacion_final')\"><img src='img/icon_menos.png'></button></td>
      </tr>
    ";
  }
}
?>