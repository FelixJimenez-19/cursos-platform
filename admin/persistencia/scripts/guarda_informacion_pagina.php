<?php
if(isset($_POST['btn'])){
  include '../Mysql.php';
  include '../clases/InformacionDAO.php';
  $_informacion = new InformacionDAO();
  $tipo = $_GET['tipo'];
  switch($tipo){
    case "datos": 
      $institucionNombre = $_POST['institucionNombre'];
      $institucionSiglas = $_POST['institucionSiglas'];
      $institucionCiudad = $_POST['institucionCiudad'];
      $_informacion -> editar_institucionNombre($institucionNombre); 
      $_informacion -> editar_institucionSiglas($institucionSiglas); 
      $_informacion -> editar_institucionCiudad($institucionCiudad); 
    break;
    
    case "rector": 
      $institucionRectorNombre = $_POST['institucionRectorNombre'];
      $institucionRectorNivelNombre = $_POST['institucionRectorNivelNombre'];
      $institucionRectorNivelSiglas = $_POST['institucionRectorNivelSiglas'];
      $_informacion -> editar_institucionRectorNombre($institucionRectorNombre); 
      $_informacion -> editar_institucionRectorNivelNombre($institucionRectorNivelNombre); 
      $_informacion -> editar_institucionRectorNivelSiglas($institucionRectorNivelSiglas); 
    break;
    
    case "pagina": 
      $paginaNombre = $_POST['paginaNombre'];
      $ubicacion = $_POST['ubicacion'];
      $copyright = $_POST['copyright'];
      $_informacion -> editar_paginaNombre($paginaNombre); 
      $_informacion -> editar_copyright($copyright); 
      $_informacion -> editar_ubicacion($ubicacion); 
    break;
    
    
  }

}
header('location: ../../presentacion/admin.php?pagina=7.0');
?>