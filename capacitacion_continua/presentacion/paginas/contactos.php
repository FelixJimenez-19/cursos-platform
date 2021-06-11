<?php
if(isset($index)){
?>
<link rel="stylesheet" href="css/contactos.css">

<div class="contacto">
  <?php
    $rs = $_contacto -> consultar();
    while($r = mysqli_fetch_assoc($rs)){
  ?>
  <div class="contacto1">
    <a href="<?php echo $r['url'] ?>" target="_blank"><img src="../../admin/presentacion/fotos/contacto/<?php echo $r['logo'] ?>">
      <h5><?php echo $r['nombre'] ?></h5>
    </a>
  </div>
  <?php 
    }
    echo $_informacion['ubicacion'] 
  ?>
</div>
<?php 
}else{
  header('location: ../index.php?pagina=2');
} 
?>