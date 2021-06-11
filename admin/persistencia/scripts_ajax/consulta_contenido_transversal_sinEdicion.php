<!--ESTA SIENDO USADO POR MEDIO DE AJAX-->
<?php
if(isset($_POST['id'])){
  include '../Mysql.php';
  include '../clases/ContenidoTransversalDAO.php';
  $_contenido_transversal = new ContenidoTransversalDAO();
  $id = $_POST['id'];
  $rs = $_contenido_transversal -> findByIdModeloCurso($id);
  while($r = mysqli_fetch_assoc($rs)){
    echo "
      <tr>
        <td>".$r['descripcion']."</td>
      </tr>
    ";
  }
}
?>