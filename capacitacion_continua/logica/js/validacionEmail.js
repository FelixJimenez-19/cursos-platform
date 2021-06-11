let _datos = '';
let _codigo = '';

let sendEmailConfirm = (datos) => {
    _datos = datos;
    _codigo = Math.floor(Math.random() * 10)+''+Math.floor(Math.random() * 10)+''+Math.floor(Math.random() * 10)+''+Math.floor(Math.random() * 10)+''+Math.floor(Math.random() * 10);
    openProgressBar("ENVIANDO EMAIL..");
    let formData = new FormData();
    formData.append('id_participante', datos.id_participante);
    formData.append('id_curso', datos.id_curso);
    formData.append('estado', datos.estado);
    formData.append('cedula', datos.cedula);
    formData.append('apellido', datos.apellido);
    formData.append('nombre', datos.nombre);
    formData.append('sexo', datos.sexo);
    formData.append('instruccion', datos.instruccion);
    formData.append('direccion', datos.direccion);
    formData.append('email', datos.email);
    formData.append('celular', datos.celular);
    formData.append('telefono', datos.telefono);
    formData.append('descripcion', datos.descripcion);
    formData.append('empresa_nombre', datos.empresa_nombre);
    formData.append('empresa_actividad', datos.empresa_actividad);
    formData.append('empresa_direccion', datos.empresa_direccion);
    formData.append('empresa_telefono', datos.empresa_telefono);
    formData.append('curso_nombre', document.getElementById("lbl_nombre_curso").innerHTML);
    formData.append('codigo', _codigo);
    fetch("../../persistencia/scripts_ajax/sendCodeEmail.php", {
        method: "POST",
        headers: new Headers().append('Accept', 'application/json'),
        body: formData
    }).then(res => res.json()).then(res => {
        setTimeout('closeProgressBar()', 100);
        if(res[0] !== null) {
            showModalConfirmEmail();
        } else {
            showModalMgs('PROBLEMAS AL ENVIAR EL CODIGO A SU EMAIL.<br>REVISE QUE SU EMAIL SEA VALIDO.');
        }
    }).catch(res => {
        setTimeout('closeProgressBar()', 100);
        showModalMgs('PROBLEMAS AL ENVIAR EL CODIGO A SU EMAIL.<br>REVISE QUE SU EMAIL SEA VALIDO.');
    });
}

let sendEmail = (datos) => {
    _datos = datos;
    openProgressBar("ENVIANDO EMAIL..");
    let formData = new FormData();
    formData.append('id_participante', datos.id_participante);
    formData.append('id_curso', datos.id_curso);
    formData.append('estado', datos.estado);
    formData.append('cedula', datos.cedula);
    formData.append('apellido', datos.apellido);
    formData.append('nombre', datos.nombre);
    formData.append('sexo', datos.sexo);
    formData.append('instruccion', datos.instruccion);
    formData.append('direccion', datos.direccion);
    formData.append('email', datos.email);
    formData.append('celular', datos.celular);
    formData.append('telefono', datos.telefono);
    formData.append('descripcion', datos.descripcion);
    formData.append('empresa_nombre', datos.empresa_nombre);
    formData.append('empresa_actividad', datos.empresa_actividad);
    formData.append('empresa_direccion', datos.empresa_direccion);
    formData.append('empresa_telefono', datos.empresa_telefono);
    fetch("../../persistencia/scripts_ajax/sendEmail.php", {
        method: "POST",
        headers: new Headers().append('Accept', 'application/json'),
        body: formData
    }).then(res => res.json()).then(res => {
        closeProgressBar();
    }).catch(res => {
        closeProgressBar();
    });
}


let txt_modal_form_confirm_email = document.getElementById("txt_modal_form_confirm_email");
validateCodeEmail = () => {
    if(txt_modal_form_confirm_email.value === _codigo && _codigo !== '') {
        sendEmail(_datos);
        processMatrucula(_datos);
        hideModalConfirmEmail();
        txt_modal_form_confirm_email.value = '';
    } else {
        showModalMgs('EL CODIGO INGRESADO ES INCORRECTO.');
    }
}






let showModalMgs = (msg) => {
    document.getElementById("modal_msg_msg").innerHTML = msg;
    document.getElementById("content_modal_msg").style.display = "flex";
}

let showModalConfirmEmail = () => {
    document.getElementById("content_modal_confirm_email").style.display = "flex";
}
let hideModalConfirmEmail = () => {
    document.getElementById("content_modal_confirm_email").style.display = "none";
}