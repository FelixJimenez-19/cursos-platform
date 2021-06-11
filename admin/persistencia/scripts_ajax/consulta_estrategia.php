<!--ESTA SIENDO USADO POR MEDIO DE AJAX-->
<?php
if(isset($_POST['id'])){
  include '../Mysql.php';
  include '../clases/EstrategiaDAO.php';
  $_estrategia = new EstrategiaDAO();
  $id = $_POST['id'];
  $rs = $_estrategia -> findByIdModeloCurso($id);
  while($r = mysqli_fetch_assoc($rs)){
    echo "
      <tr>
        <td>".$r['descripcion']."</td>
        <td>
          <button onclick=\"abrirModalEliminarRegistro('id_estrategia','".$r['id_estrategia']."','estrategia')\"><img src='img/icon_menos.png'></button>
        </td>
      </tr>
    ";
  }
}
?>