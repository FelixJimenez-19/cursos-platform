<?php
if(isset($_POST['btn'])){
  $tipo = $_GET['tipo'];
  switch($tipo){
    case "logos": 
      $logo_institucion = $_FILES['logo_institucion'];
      $logo_pagina = $_FILES['logo_pagina'];
      if($logo_institucion['tmp_name'] != "" or $logo_institucion['tmp_name'] != null){
        $desde = $logo_institucion['tmp_name'];
        $hasta = '../../../img_db/logo_institucion.png';
        copy($desde,$hasta);
      }
      if($logo_pagina['tmp_name'] != "" or $logo_pagina['tmp_name'] != null){
        $desde = $logo_pagina['tmp_name'];
        $hasta = '../../../img_db/logo_pagina.png';
        copy($desde,$hasta);
      }
    break;
    
    case "sellos": 
      $firma_rectora = $_FILES['firma_rectora'];
      $sello_institucion = $_FILES['sello_institucion'];
      $sello_educacion = $_FILES['sello_educacion'];
      if($firma_rectora['tmp_name'] != "" or $firma_rectora['tmp_name'] != null){
        $desde = $firma_rectora['tmp_name'];
        $hasta = '../../../img_db/sellos/firma_rectora.png';
        copy($desde,$hasta);
      }
      if($sello_educacion['tmp_name'] != "" or $sello_educacion['tmp_name'] != null){
        $desde = $sello_educacion['tmp_name'];
        $hasta = '../../../img_db/sellos/sello_educacion.png';
        copy($desde,$hasta);
      }
      if($sello_institucion['tmp_name'] != "" or $sello_institucion['tmp_name'] != null){
        $desde = $sello_institucion['tmp_name'];
        $hasta = '../../../img_db/sellos/sello_institucion.png';
        copy($desde,$hasta);
      }
    break;
    
    case "slider": 
    $img1 = $_FILES['img1'];
    $img2 = $_FILES['img2'];
    $img3 = $_FILES['img3'];
    $img4 = $_FILES['img4'];
    if($img1['tmp_name'] != "" or $img1['tmp_name'] != null){
      $desde = $img1['tmp_name'];
      $hasta = '../../../capacitacion_continua/presentacion/imgs/slider/1.png';
      copy($desde,$hasta);
    }
    if($img2['tmp_name'] != "" or $img2['tmp_name'] != null){
      $desde = $img2['tmp_name'];
      $hasta = '../../../capacitacion_continua/presentacion/imgs/slider/2.png';
      copy($desde,$hasta);
    }
    if($img3['tmp_name'] != "" or $img3['tmp_name'] != null){
      $desde = $img3['tmp_name'];
      $hasta = '../../../capacitacion_continua/presentacion/imgs/slider/3.png';
      copy($desde,$hasta);
    }
    if($img4['tmp_name'] != "" or $img4['tmp_name'] != null){
      $desde = $img4['tmp_name'];
      $hasta = '../../../capacitacion_continua/presentacion/imgs/slider/4.png';
      copy($desde,$hasta);
    }
    break;
    
  }

}
header('location: ../../presentacion/admin.php?pagina=7.3');
?>