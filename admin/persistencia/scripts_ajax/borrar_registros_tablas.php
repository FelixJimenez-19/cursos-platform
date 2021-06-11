<!--ESTA SIENDO USADO POR MEDIO DE AJAX-->
<?php
if(isset($_POST['id'])){
  include '../Mysql.php';
  $conn = new Mysql();
  $id = $_POST['id'];
  $name_id = $_POST['name_id'];
  $tabla = $_POST['tabla'];
  $conn -> query("DELETE FROM ".$tabla." WHERE ".$name_id."=$id;");
}
?>