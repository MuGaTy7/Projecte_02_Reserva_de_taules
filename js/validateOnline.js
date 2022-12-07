function validarOnline(){
    var validacion = true;
    
    if (nombre.value == ""){
        nombre.style.borderColor = "#dc3545";
        validacion = false;
    } else {
        nombre.style.borderColor = "#17180f";
    }

    if (!validacion) {
        return false;
    }
}