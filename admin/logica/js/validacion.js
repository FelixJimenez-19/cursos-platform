function isCedula(num) {
    if (num.value.length == 10) {
        let sum = 0;
        let cedula = num.value.split("");
        for (let i = 0; i < cedula.length; i++) {
            let temp = parseInt(cedula[i]);
            if (i % 2 == 0) {
                if (temp * 2 > 9) {
                    sum += (temp * 2) - 9;
                } else {
                    sum += temp * 2;
                }
            } else {
                sum += temp;
            }
        }
        if (sum % 10 == 0) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function isExcededLength(campo, limit) {
    if (campo.value.length > limit) {
        return true;
    } else {
        return false;
    }
}

function isFull(campo) {
    if (campo.value != "") {
        return true;
    } else {
        return false;
    }
}

function setError(campo) {
    campo.style.border = "solid 1px red";
}

function setDesError(campo) {
    campo.style.border = "solid 1px #ddd";
}

function mostrarOcultarContraseña() {
    let pass = document.getElementById("campoPassword");
    let img = document.getElementById("imgShowHide");
    if (pass.type == "text") {
        pass.type = "password";
        img.src = "img/showPass.png"
    } else {
        pass.type = "text";
        img.src = "img/hidePass.png"
    }
}

let urlElminar = "";

function abrirModalEliminar(url) {
    urlElminar = url;
    document.querySelector(".contendor_eliminar").style.display = "flex";
}

function cerrarModalEliminar() {
    document.querySelector(".contendor_eliminar").style.display = "none";
}

function eliminarModalEliminar() {
    location.href = urlElminar;
}

let urlModal = "";

function abrirModal(url) {
    urlModal = url;
    document.querySelector(".contendor_modal").style.display = "flex";
}

function cerrarModal() {
    document.querySelector(".contendor_modal").style.display = "none";
}

function eliminarModal() {
    location.href = urlModal;
}

let urlModalAceptar = "";

function abrirModalAceptar(url) {
    urlModalAceptar = url;
    document.querySelector("#contendor_modal_aceptar").style.display = "flex";
}

function cerrarModalAceptar() {
    document.querySelector("#contendor_modal_aceptar").style.display = "none";
}

function irModalAceptar() {
    location.href = urlModalAceptar;
}