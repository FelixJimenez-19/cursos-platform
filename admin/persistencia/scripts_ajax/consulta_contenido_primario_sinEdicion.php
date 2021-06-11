<!--ESTA SIENDO USADO POR MEDIO DE AJAX-->
<?php
if(isset($_POST['id'])){
  include '../Mysql.php';
  include '../clases/ContenidoPrimarioDAO.php';
  $_contenido_primario = new ContenidoPrimarioDAO();
  $id = $_POST['id'];
  $rs = $_contenido_primario -> findByIdModeloCurso($id);
  while($r = mysqli_fetch_assoc($rs)){
    echo "
      <tr>
        <td>".$r['descripcion']."</td>
      </tr>
    ";
  }
}
?>