<?php
if (isset($index)) {
    $id = 0;
    $nombre = "";
    $fecha_inicio = ""; // formato: 0000-00-00
    $fecha_fin = ""; // formato: 0000-00-00
    $numero_cupos = "";
    $link_whatsapp = "";
    $modelo_curso_id = "";
    $modelo_curso_nombre = " Modelo Curso";
    $btn = "GUARDAR";
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $rs = mysqli_fetch_assoc($_curso->findById($id));
        $nombre = $rs['curso_nombre'];
        $fecha_inicio = $rs['curso_fecha_inicio'];
        $fecha_fin = $rs['curso_fecha_fin'];
        $numero_cupos = $rs['curso_numero_cupos'];
        $link_whatsapp = $rs['curso_link_whatsapp'];
        $modelo_curso_id = $rs['modelo_curso_id'];
        $modelo_curso_nombre = $rs['modelo_curso_nombre'];
        $btn = "EDITAR";
    }
?>
    <span>CURSO</span>
    <form action="../persistencia/scripts/guarda_curso.php" method="post" enctype="multipart/form-data" onsubmit="return validar_curso(this)">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <input type="text" name="nombre" placeholder="Nombre" value="<?php echo $nombre ?>">
        <input type="date" name="fecha_inicio" placeholder="Fecha Inicio" value="<?php echo $fecha_inicio ?>">
        <input type="date" name="fecha_fin" placeholder="Fecha Fin" value="<?php echo $fecha_fin ?>">
        <input type="number" name="numero_cupos" placeholder="Cupos" value="<?php echo $numero_cupos ?>">
        <input type="text" name="link_whatsapp" placeholder="Link Grupo Whatsapp" value="<?php echo $link_whatsapp ?>">
        <input type="file" name="foto" accept="image/x-png,image/jpg">
        <select name="certificado_plantilla">
            <option value="">Plantilla Certificado</option>
            <?php
            $print = array();
            $path = 'certificados/';
            $dir = opendir($path);
            while ($elemento = readdir($dir)) {
                $tmp[] = $path . $elemento;
                if (!is_dir($path . $elemento) and $elemento != "." and $elemento != "..") {
                    $value = explode("_", explode(".", $elemento)[0])[0];
                    $exist = false;
                    foreach ($print as $print_key => $print_value) {
                        ($print_value == $value) ? $exist = true : '';
                    }
                    if ($exist == false) {
                        $print[] = $value;
            ?>
                        <option value="<?= $value ?>">Plantilla <?= $value ?></option>
            <?php
                    }
                }
            }
            ?>
        </select>
        <select name="id_modelo_curso">
            <option value="<?php echo $modelo_curso_id ?>"><?php echo $modelo_curso_nombre ?></option>
            <?php
            if ($_cuenta == "administrador") {
                $rs = $_modelo_curso->consultar();
            } else {
                $rs = $_modelo_curso->consultarByProfesor($_id_cuenta);
            }
            while ($r = mysqli_fetch_assoc($rs)) {
            ?>
                <option value="<?php echo $r['modelo_curso_id'] ?>"><?php echo $r['modelo_curso_nombre'] ?></option>
            <?php } ?>
        </select>
        <input type="submit" value="<?php echo $btn ?>">
    </form>
    <table id="datatable">
        <thead>
            <tr>
                <th>NOMBRE</th>
                <th>INICIO</th>
                <th>FIN</th>
                <th>CUPOS</th>
                <th>GRUPO</th>
                <th>FOTO</th>
                <th>NOMBRE MODELO</th>
                <th>NOMBRE PROFESOR</th>
                <th>FOTO PROFESOR</th>
                <th>ACCION</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($_cuenta == "administrador") {
                $rs = $_curso->consultar();
            } else {
                $rs = $_curso->consultarByProfesor($_id_cuenta);
            }
            while ($r = mysqli_fetch_assoc($rs)) {
            ?>
                <tr>
                    <td><?php echo $r['curso_nombre'] ?></td>
                    <td><?php echo getSpanishDate($r['curso_fecha_inicio'], 2) ?></td>
                    <td><?php echo getSpanishDate($r['curso_fecha_fin'], 2) ?></td>
                    <td><?php echo $r['curso_numero_cupos'] ?></td>
                    <td>
                        <?php
                        if ($r['curso_link_whatsapp'] != '') {
                        ?>
                            <a href="<?php echo $r['curso_link_whatsapp'] ?>" target="_blank" style="background: rgba(0,0,0,0);">
                                <img src="../presentacion/img/whatsapp.png">
                            </a>
                        <?php } else { ?>
                            <a style="background: rgba(0,0,0,0);">
                                <img style="filter: brightness(0.5);" src="../presentacion/img/whatsapp.png">
                            </a>
                        <?php } ?>
                    </td>
                    <td><img src="fotos/curso/<?php echo $r['curso_foto'] ?>"></td>
                    <td><?php echo $r['modelo_curso_nombre'] ?></td>
                    <td><?php echo $r['profesor_nombre'] . " " . $r['profesor_apellido'] ?></td>
                    <td><img src="fotos/profesor/<?php echo $r['profesor_foto'] ?>"></td>
                    <td>
                        <a href="admin.php?pagina=5.0&id=<?php echo $r['curso_id'] ?>">Editar</a>
                        <a onclick="abrirModalEliminar('../persistencia/scripts/elimina_curso.php?id=<?php echo $r['curso_id'] ?>')">Eliminar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
        <thead>
            <tr>
                <th>NOMBRE</th>
                <th>INICIO</th>
                <th>FIN</th>
                <th>CUPOS</th>
                <th>GRUPO</th>
                <th>FOTO</th>
                <th>NOMBRE MODELO</th>
                <th>FOTO PROFESOR</th>
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


    <script src="../logica/js/curso.js"></script>



<?php
} else {
    header('location: ../admin.php?pagina=5.0');
}
?>