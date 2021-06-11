<!--ESTA SIENDO USADO POR MEDIO DE AJAX-->
<?php
if(isset($_POST['id'])){
  include '../Mysql.php';
  include '../clases/ContenidoSecundarioDAO.php';
  $_contenido_secundario = new ContenidoSecundarioDAO();
  $id = $_POST['id'];
  $rs = $_contenido_secundario -> findByIdModeloCurso($id);
  while($r = mysqli_fetch_assoc($rs)){
    echo "
      <tr>
        <td>".$r['descripcion']."</td>
        <td>
          <button onclick=\"abrirModalEliminarRegistro('id_contenido_secundario','".$r['id_contenido_secundario']."','contenido_secundario')\"><img src='img/icon_menos.png'></button>
        </td>
      </tr>
    ";
  }
}
?>