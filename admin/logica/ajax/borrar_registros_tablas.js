let name_id_tabla_temp_borrar;
let id_tabla_temp_borrar;
let tabla_temp_borrar;
function abrirModalEliminarRegistro(name_id, id, tabla){
  name_id_tabla_temp_borrar = name_id;
  id_tabla_temp_borrar = id;
  tabla_temp_borrar = tabla;
  abrirModalEliminar('');
}
function borrarRegistro(){
  $.ajax({
    type: "POST",
    dataType: 'html',
    url: "../persistencia/scripts_ajax/borrar_registros_tablas.php",
    data: "id="+id_tabla_temp_borrar+"&name_id="+name_id_tabla_temp_borrar+"&tabla="+tabla_temp_borrar,
    success: function(resp){
      cerrarModalEliminar();
      cargarFormularioRequisito();
      cargarFormularioObjetivo();
      cargarFormularioContenidoPrimario();
      cargarFormularioContenidoSecundario();
      cargarFormularioContenidoTransversal();
      cargarFormularioEstrategia();
      cargarFormularioEvaluacionDiagnostica();
      cargarFormularioEvaluacionFormativa();
      cargarFormularioEvaluacionFinal();
      cargarFormularioBibliografia();
      cargarFormularioEntornoAprendizaje();
    }
  });
}