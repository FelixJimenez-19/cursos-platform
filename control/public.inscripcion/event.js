form.onsubmit = (evt) => {
    evt.preventDefault();
    if (validateForm()) {
        console.log("PROCESO DE MATRICULA..");
    }
}

form.cedula.onkeyup = async () => {
    if (!isCedula(form.cedula.value)) {
        form.cedula.parentElement.classList.add("error");
        clearValues();
        return;
    }
    form.cedula.parentElement.classList.remove("error");
    showProgressBar(true, "Cargando informacion..");
    await fetch_query(new FormData(form), "../../../model/script/participante/selectByParticipante_cedula.php").then(res => {
        showProgressBar(false, "");
        if (res) {
            for (let element of campos) {
                element.loadble ? form[element.name].value = res[element.name] : '';
            }
            form.id.value = res.id_participante;
        } else {
            clearValues();
        }
    }).catch(res => console.log(res));
}