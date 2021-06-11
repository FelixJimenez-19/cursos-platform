<!--ESTA SIENDO USADO POR MEDIO DE AJAX-->
<?php
if(isset($_POST['id'])){
  include '../Mysql.php';
  include '../clases/EvaluacionFormativaDAO.php';
  $_evaluacion_formativa = new EvaluacionFormativaDAO();
  $id = $_POST['id'];
  $rs = $_evaluacion_formativa -> findByIdModeloCurso($id);
  while($r = mysqli_fetch_assoc($rs)){
    echo "
      <tr>
        <td>".$r['tecnica']."</td>
        <td>".$r['instrumento']."</td>
        <td>".$r['descripcion']."</td>
        <td><button onclick=\"abrirModalEliminarRegistro('id_evaluacion_formativa','".$r['id_evaluacion_formativa']."','evaluacion_formativa')\"><img src='img/icon_menos.png'></button></td>
      </tr>
    ";
  }
}
?>