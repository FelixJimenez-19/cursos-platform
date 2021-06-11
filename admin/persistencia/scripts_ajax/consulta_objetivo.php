<!--ESTA SIENDO USADO POR MEDIO DE AJAX-->
<?php
if(isset($_POST['id'])){
  include '../Mysql.php';
  include '../clases/ObjetivoDAO.php';
  $_objetivo = new ObjetivoDAO();
  $id = $_POST['id'];
  $rs = $_objetivo -> findByIdModeloCurso($id);
  while($r = mysqli_fetch_assoc($rs)){
    echo "
      <tr>
        <td>".$r['descripcion']."</td>
        <td>
          <button onclick=\"abrirModalEliminarRegistro('id_objetivo','".$r['id_objetivo']."','objetivo')\"><img src='img/icon_menos.png'></button>
        </td>
      </tr>
    ";
  }
}
?>