function aprobar_reprobar(){
  let form_informacion = document.getElementById("form_informacion");
  let id_matricula = form_informacion.id_matricula;
  let estado = form_informacion.estado;
  let certificado_nombre_participante = form_informacion.certificado_nombre_participante;
  let certificado_cedula_participante = form_informacion.certificado_cedula_participante;
  let certificado_nombre_curso = form_informacion.certificado_nombre_curso;
  let certificado_nombre_institucion = form_informacion.certificado_nombre_institucion;
  let certificado_ciudad_institucion = form_informacion.certificado_ciudad_institucion;
  let certificado_rector_institucion = form_informacion.certificado_rector_institucion;
  let certificado_cordinador_institucion = form_informacion.certificado_cordinador_institucion;
  let certificado_fecha_curso = form_informacion.certificado_fecha_curso;
  let certificado_horas_curso = form_informacion.certificado_horas_curso;
  let certificado_lugar_fecha_emision = form_informacion.certificado_lugar_fecha_emision;
  let certificado_codigo = form_informacion.certificado_codigo;
  let datos = {
    "id_matricula": id_matricula.value,
    "estado": estado.value,
    "certificado_nombre_participante": certificado_nombre_participante.value,
    "certificado_cedula_participante": certificado_cedula_participante.value,
    "certificado_nombre_curso": certificado_nombre_curso.value,
    "certificado_nombre_institucion": certificado_nombre_institucion.value,
    "certificado_ciudad_institucion": certificado_ciudad_institucion.value,
    "certificado_rector_institucion": certificado_rector_institucion.value,
    "certificado_cordinador_institucion": certificado_cordinador_institucion.value,
    "certificado_fecha_curso": certificado_fecha_curso.value,
    "certificado_horas_curso": certificado_horas_curso.value,
    "certificado_lugar_fecha_emision": certificado_lugar_fecha_emision.value,
    "certificado_codigo": certificado_codigo.value
  }
  $.ajax({
    dataType: 'html',
    type: "POST",
    url: '../../persistencia/scripts_ajax/aprobar_reprobar_participantes.php',
    data: datos,
    success: function(data){
      cerrarModalEliminar();
    }
  });
}

function cargar_informacion(id_matricula, estado){
  let form_informacion = document.getElementById("form_informacion");
  $.ajax({
    dataType: 'html',
    type: "POST",
    url: '../../persistencia/scripts_ajax/consulta_informacion_certificado.php',
    data: {'id_matricula': id_matricula},
    success: function(data){
      data = JSON.parse(data);
      if(data.status === "si"){
        form_informacion.id_matricula.value = data.result.matricula_id;
        form_informacion.estado.value = estado;
        form_informacion.certificado_nombre_participante.value = data.result.participante_nombre+" "+data.result.participante_apellido;
        form_informacion.certificado_cedula_participante.value = data.result.participante_cedula;
        form_informacion.certificado_nombre_curso.value = data.result.curso_nombre;
        // form_informacion.certificado_nombre_institucion.value = "";
        // form_informacion.certificado_ciudad_institucion.value = "";
        // form_informacion.certificado_rector_institucion.value = "";
        form_informacion.certificado_cordinador_institucion.value = data.result.profesor_nombre+" "+data.result.profesor_apellido;
        form_informacion.certificado_fecha_curso.value = data.result.curso_fecha_inicio+" "+data.result.curso_fecha_fin;
        form_informacion.certificado_horas_curso.value = (parseInt(data.result.modelo_curso_hora_teorica)+parseInt(data.result.modelo_curso_hora_practica)); // HORAS
        form_informacion.certificado_lugar_fecha_emision.value = ((new Date()).getFullYear())+"-"+("0" + ((new Date()).getMonth()+1) ).slice(-2)+"-"+((new Date()).getDate()); // FECHA
        form_informacion.certificado_codigo.value = "";
      }
    }
  });
}