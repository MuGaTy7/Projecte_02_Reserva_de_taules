window.onload = function() {
    texto_nombre.style.display = 'none';
    texto_apellidos.style.display = 'none';
    texto_telefono.style.display = 'none';
}

function validarOnline(){
    var validacion = true;
    
    if (nombre.value == ""){
        texto_nombre.style.display = 'block';
        nombre.style.borderColor = "#dc3545";
        validacion = false;
    } else {
        nombre.style.borderColor = "#17180f";
        texto_nombre.style.display = 'none';
    }

    if (apellidos.value == ""){
        texto_apellidos.style.display = 'block';
        apellidos.style.borderColor = "#dc3545";
        validacion = false;
    } else {
        apellidos.style.borderColor = "#17180f";
        texto_apellidos.style.display = 'none';
    }
    
    if (telefono.value == "" || !(/^\d{9}$/.test(telefono.value))){
        texto_telefono.style.display = 'block';
        telefono.style.borderColor = "#dc3545";
        validacion = false;
    } else {
        telefono.style.borderColor = "#17180f";
        texto_telefono.style.display = 'none';
    }

    if (!validacion) {
        return false;
    }
}