function procesoMatricula(datos) {
  isMatriculado(datos);
}

function isMatriculado(datos) {
  $.ajax({
    dataType: 'html',
    type: "POST",
    url: '../../persistencia/scripts_ajax/consulta_matricula.php',
    data: datos,
    success: function (data) {
      if (data == 0) {
        //NO ESTA MATRICULADO
        isCupos(datos);
      } else {
        //YA ESTA MATRICULADO
        openConfirm("USTED YA ESTA MATRICULADO EN ESTE CURSO<br>¿DESEA QUE LE ENVIEMOS NUEVAMENTE LA INFORMACION DEL CURSO A SU EMAIL?");
      }
    }
  });
}

function isCupos(datos) {
  $.ajax({
    dataType: 'html',
    type: "POST",
    url: '../../persistencia/scripts_ajax/consulta_cupos.php',
    data: datos,
    success: function (data) {
      if (data > 0) {
        //AUN HAY CUPOS

        // VALIDAR EMAIL
        sendEmailConfirm(datos);
        // processMatrucula(datos);
      } else {
        //YA NO HAY CUPOS
        openConfirm("YA NO HAY CUPOS DISPOBIBLES<br><br>¿PODEMOS GUARDAR TU INFORMACION?");
      }
    }
  });
}

let processMatrucula = (datos) => {
  guardaParticipante(datos);
  matriculaParticipante(datos);
  vaciar_Campos();
  document.getElementById("formularioInscribir").cedula.value = "";
  document.getElementById("formularioInscribir").cedula.focus();
}

function guardaParticipante(datos) {
  openProgressBar("PROCESANDO INFORMACION..");
  $.ajax({
    dataType: 'html',
    type: "POST",
    url: '../../persistencia/scripts_ajax/guarda_participante.php',
    data: datos,
    success: function (data) {
      closeConfirm();
      setTimeout('closeProgressBar()', 500);
    }
  });
}

function matriculaParticipante(datos) {
  openProgressBar("PROCESANDO MATRICULA..");
  //alert(datos);
  $.ajax({
    dataType: 'html',
    type: "POST",
    url: '../../persistencia/scripts_ajax/matricula_participante.php',
    data: datos,
    success: function (data) {
      setTimeout('closeModalsMatriculado()', 500);
    }
  });
}

// NEW / INICIO
function closeModalsMatriculado() {
  closeProgressBar()
  openModalMatriculado();
}
// NEW / FIN


function existeParticipante(cedula) {
  let form = document.getElementById("formularioInscribir");
  if (isCedula(cedula) && isFull(cedula)) {
    setDesErrorInscribir(cedula);
  } else {
    setErrorInscribir(cedula);
  }
  if (isCedula(cedula) && isFull(cedula)) {
    //CARGAR DATOS / INICIO
    cedula = cedula.value;
    openProgressBar("PROCESANDO");
    $.ajax({
      dataType: "html",
      type: 'POST',
      url: '../../persistencia/scripts_ajax/consulta_participante.php',
      data: {
        "cedula": cedula
      },
      success: function (data) {
        data = JSON.parse(data);
        if (data.status === "si") {
          form.id.value = data.result.id_participante;
          form.cedula.value = data.result.cedula;
          form.apellido.value = data.result.apellido;
          form.nombre.value = data.result.nombre;
          form.sexo.value = data.result.sexo;
          form.instruccion.value = data.result.nivel_instruccion;
          form.direccion.value = data.result.direccion;
          form.email.value = data.result.email;
          form.celular.value = data.result.celular;
          form.telefono.value = data.result.telefono;
          form.descripcion.value = data.result.descripcion;
          form.empresa_nombre.value = data.result.empresa_nombre;
          form.empresa_actividad.value = data.result.empresa_actividad;
          form.empresa_direccion.value = data.result.empresa_direccion;
          form.empresa_telefono.value = data.result.empresa_telefono;
          form.terminos.value = data.result.terminos;
        } else {
          vaciar_Campos();
        }
        closeProgressBar();
      }
    });
    //CARGAR DATOS / FIN
  } else {
    vaciar_Campos();
  }
}










function vaciar_Campos() {
  let form = document.getElementById("formularioInscribir");
  form.id.value = "0";
  form.apellido.value = "";
  form.nombre.value = "";
  form.sexo.value = "";
  form.instruccion.value = "";
  form.direccion.value = "";
  form.email.value = "";
  form.celular.value = "";
  form.telefono.value = "";
  form.descripcion.value = "";
  form.empresa_nombre.value = "";
  form.empresa_actividad.value = "";
  form.empresa_direccion.value = "";
  form.empresa_telefono.value = "";
  form.terminos.checked = false;
}