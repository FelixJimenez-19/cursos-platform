<?php
include 'admin/persistencia/Mysql.php';
include 'admin/persistencia/clases/ParticipanteDAO.php';
$conn = new Mysql();
$rs = $conn->query("SELECT * FROM participante");
$sql = "INSERT INTO usuario VALUES<br>";
while ($r = mysqli_fetch_assoc($rs)) {
    // echo $r[''];
    $sql .= '(0, "' . $r['nombre'] . ' ' . $r['apellido'] . '", "' . $r['cedula'] . '", 0, "", "' . $r['celular'] . '", "' . $r['telefono'] . '", "' . $r['email'] . '", "' . $r['cedula'] . '", null, null, null, "' . $r['sexo'] . '", "' . $r['nivel_instruccion'] . '", 0, "' . $r['direccion'] . '", "' . $r['descripcion'] . '", "' . $r['empresa_nombre'] . '", "' . $r['empresa_actividad'] . '", "' . $r['empresa_direccion'] . '", "' . $r['empresa_telefono'] . '", "", 0, 3, 1),<br>';
}

echo $sql;
