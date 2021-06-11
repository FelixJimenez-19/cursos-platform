<?php
if (isset($index)) {
    $id = 0;
    $cedula = "";
    $apellido = "";
    $nombre = "";
    $indice_dactilar = "";
    $pass = "";
    $btn = "GUARDAR";
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $rs = mysqli_fetch_assoc($_profesor->findById($id));
        $cedula = $rs['cedula'];
        $apellido = $rs['apellido'];
        $nombre = $rs['nombre'];
        $indice_dactilar = $rs['indice_dactilar'];
        $pass = $rs['pass'];
        $btn = "EDITAR";
    }
?>
    <span>PROFESOR</span>
    <form action="../persistencia/scripts/guarda_profesor.php" method="post" enctype="multipart/form-data" onsubmit="return validar_profesor(this)">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <input type="text" name="cedula" placeholder="Cedula" value="<?php echo $cedula ?>">
        <input type="text" name="apellido" placeholder="Apellido" value="<?php echo $apellido ?>">
        <input type="text" name="nombre" placeholder="Nombre" value="<?php echo $nombre ?>">
        <input type="text" name="indice_dactilar" placeholder="Indice dactilar" value="<?php echo $indice_dactilar ?>">
        <input type="password" name="pass" placeholder="Contraseña" value="<?php echo $pass ?>" id="campoPassword">
        <img src="img/showPass.png" id="imgShowHide" onclick="mostrarOcultarContraseña()" style="min-width:30px;">
        <input type="file" name="foto" accept="image/x-png,image/jpg">
        <input type="file" name="firma" accept="image/x-png,image/jpg" class="firma">
        <input type="submit" value="<?php echo $btn ?>">
    </form>
    <table id="datatable">
        <thead>
            <tr>
                <th>CEDULA</th>
                <th>APELLIDO</th>
                <th>NOMBRE</th>
                <th>INDICE</th>
                <th>FOTO</th>
                <th>FIRMA</th>
                <th>ACCION</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $rs = $_profesor->consultar();
            while ($r = mysqli_fetch_assoc($rs)) {
            ?>
                <tr>
                    <td><?php echo $r['cedula'] ?></td>
                    <td><?php echo $r['apellido'] ?></td>
                    <td><?php echo $r['nombre'] ?></td>
                    <td><?php echo $r['indice_dactilar'] ?></td>
                    <td><img src="fotos/profesor/<?php echo $r['foto'] ?>"></td>
                    <td><img src="fotos/profesor/firma/<?php echo $r['firma'] ?>"></td>
                    <td>
                        <a href="admin.php?pagina=3.7&id=<?php echo $r['id_profesor'] ?>">Editar</a>
                        <a onclick="abrirModalEliminar('../persistencia/scripts/elimina_profesor.php?id=<?php echo $r['id_profesor'] ?>')">Eliminar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
        <thead>
            <tr>
                <th>CEDULA</th>
                <th>APELLIDO</th>
                <th>NOMBRE</th>
                <th>INDICE</th>
                <th>FOTO</th>
                <th>FIRMA</th>
                <th>ACCION</th>
            </tr>
        </thead>
    </table>

    <div class="contendor_eliminar">
        <div class="eliminar">
            <span>¿ESTA SEGURO DE ELIMINAR ESTE REGISTRO?</span>
            <input type="button" value="ELIMINAR" onclick="eliminarModalEliminar()">
            <input type="button" value="CANCELAR" onclick="cerrarModalEliminar()">
        </div>
    </div>


    <script src="../logica/js/profesor.js"></script>
<?php
} else {
    header('location: ../admin.php?pagina=3.7');
}
?>