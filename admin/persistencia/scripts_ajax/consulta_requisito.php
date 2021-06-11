<!--ESTA SIENDO USADO POR MEDIO DE AJAX-->
<?php
if(isset($_POST['id'])){
  include '../Mysql.php';
  include '../clases/RequisitoDAO.php';
  $_requisito = new RequisitoDAO();
  $id = $_POST['id'];
  $rs = $_requisito -> findByIdModeloCurso($id);
  while($r = mysqli_fetch_assoc($rs)){
    echo "
      <tr>
        <td>".$r['descripcion']."</td>
        <td>
          <button onclick=\"abrirModalEliminarRegistro('id_requisito','".$r['id_requisito']."','requisito')\"><img src='img/icon_menos.png'></button>
        </td>
      </tr>
    ";
  }
}
?>