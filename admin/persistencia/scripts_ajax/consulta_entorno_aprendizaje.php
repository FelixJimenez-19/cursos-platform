<!--ESTA SIENDO USADO POR MEDIO DE AJAX-->
<?php
if(isset($_POST['id'])){
  include '../Mysql.php';
  include '../clases/EntornoAprendizajeDAO.php';
  $_entorno_aprendizaje = new EntornoAprendizajeDAO();
  $id = $_POST['id'];
  $rs = $_entorno_aprendizaje -> findByIdModeloCurso($id);
  while($r = mysqli_fetch_assoc($rs)){
    echo "
      <tr>
        <td>".$r['instalaciones']."</td>
        <td>".$r['teorica']."</td>
        <td>".$r['practica']."</td>
        <td><button onclick=\"abrirModalEliminarRegistro('id_entorno_aprendizaje','".$r['id_entorno_aprendizaje']."','entorno_aprendizaje')\"><img src='img/icon_menos.png'></button></td>
      </tr>
    ";
  }
}
?>