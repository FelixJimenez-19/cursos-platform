<!--ESTA SIENDO USADO POR MEDIO DE AJAX-->
<?php
if(isset($_POST['id'])){
  include '../Mysql.php';
  include '../clases/BibliografiaDAO.php';
  $_bibliografia = new BibliografiaDAO();
  $id = $_POST['id'];
  $rs = $_bibliografia -> findByIdModeloCurso($id);
  while($r = mysqli_fetch_assoc($rs)){
    echo "
      <tr>
        <td>".$r['descripcion']."</td>
        <td>
          <button onclick=\"abrirModalEliminarRegistro('id_bibliografia','".$r['id_bibliografia']."','bibliografia')\"><img src='img/icon_menos.png'></button>
        </td>
      </tr>
    ";
  }
}
?>