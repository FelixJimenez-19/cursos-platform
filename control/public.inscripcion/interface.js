const form = document.getElementById("formularioInscribir");

function showProgressBar(bool, mensaje) {
    if (bool) {
        document.querySelector(".content_modal_progress").style.display = "flex";
        document.querySelector(".content_modal_progress .modal_progress span").innerHTML = mensaje;
    } else {
        document.querySelector(".content_modal_progress").style.display = "none";
        document.querySelector(".content_modal_progress .modal_progress span").innerHTML = "";
    }
}

function showConfirm(bool, mensaje) {
    if (bool) {
        document.querySelector(".content_modal_confirm").style.display = "flex";
        document.querySelector(".content_modal_confirm .modal_confirm span").innerHTML = mensaje;
    } else {
        document.querySelector(".content_modal_confirm").style.display = "none";
        document.querySelector(".content_modal_confirm .modal_confirm span").innerHTML = "";
    }
}

function showModalMatriculado(bool) {
    if (bool) {
        document.querySelector("#content_modal_matriculado").style.display = "flex";
    } else {
        document.querySelector("#content_modal_matriculado").style.display = "none";
    }
}

function clearValues() {
    for (let element of campos) {
        element.loadble && element.name !== "cedula" ? form[element.name].value = "" : '';
    }
    form.id.value = 0;
}

function validateForm() {
    for (let element of campos) {
        if (form[element.name].value == "" || !element.validate(form[element.name].value)) {
            if (form[element.name].length > 1) {
                form[element.name][0].parentElement.parentElement.classList.add("error");
                form[element.name][0].focus();
            } else {
                form[element.name].parentElement.classList.add("error");
                form[element.name].focus();
            }
            return false;
        } else {
            if (form[element.name].length > 1) {
                form[element.name][0].parentElement.parentElement.classList.remove("error");
            } else {
                form[element.name].parentElement.classList.remove("error");
            }
        }
    }
    if (!form.terminos.checked) {
        form.terminos.parentElement.parentElement.classList.add("error");
        form.terminos.focus();
        return false;
    } else {
        form.terminos.parentElement.parentElement.classList.remove("error");
    }
    return true;
}

const campos = [{
        name: 'cedula',
        validate: (value) => isCedula(value + ""),
        requiredInsert: true,
        requireUpdate: true,
        loadble: true
    },
    {
        name: 'apellido',
        validate: (value) => true,
        requiredInsert: true,
        requireUpdate: true,
        loadble: true
    },
    {
        name: 'nombre',
        validate: (value) => true,
        requiredInsert: true,
        requireUpdate: true,
        loadble: true
    },
    {
        name: 'partificpante_fecha_nacimiento',
        validate: (value) => true,
        requiredInsert: true,
        requireUpdate: true,
        loadble: true
    },
    {
        name: 'sexo',
        validate: (value) => true,
        requiredInsert: true,
        requireUpdate: true,
        loadble: true
    },
    {
        name: 'participante_etnia',
        validate: (value) => true,
        requiredInsert: true,
        requireUpdate: true,
        loadble: true
    },
    {
        name: 'instruccion',
        validate: (value) => true,
        requiredInsert: true,
        requireUpdate: true,
        loadble: true
    },
    {
        name: 'direccion',
        validate: (value) => true,
        requiredInsert: true,
        requireUpdate: true,
        loadble: true
    },
    {
        name: 'email',
        validate: (value) => true,
        requiredInsert: true,
        requireUpdate: true,
        loadble: true
    },
    {
        name: 'celular',
        validate: (value) => true,
        requiredInsert: true,
        requireUpdate: true,
        loadble: true
    },
    {
        name: 'telefono',
        validate: (value) => true,
        requiredInsert: true,
        requireUpdate: true,
        loadble: true
    },
    {
        name: 'partificpante_foto_cedula',
        validate: (value) => true,
        requiredInsert: true,
        requireUpdate: true,
        loadble: false
    },
    {
        name: 'matricula_foto_deposito',
        validate: (value) => true,
        requiredInsert: true,
        requireUpdate: false,
        loadble: false
    },
    {
        name: 'descripcion',
        validate: (value) => true,
        requiredInsert: true,
        requireUpdate: true,
        loadble: true
    },
    {
        name: 'empresa_nombre',
        validate: (value) => true,
        requiredInsert: true,
        requireUpdate: true,
        loadble: true
    },
    {
        name: 'empresa_actividad',
        validate: (value) => true,
        requiredInsert: true,
        requireUpdate: true,
        loadble: true
    },
    {
        name: 'empresa_direccion',
        validate: (value) => true,
        requiredInsert: true,
        requireUpdate: true,
        loadble: true
    },
    {
        name: 'empresa_telefono',
        validate: (value) => true,
        requiredInsert: true,
        requireUpdate: true,
        loadble: true
    },
];