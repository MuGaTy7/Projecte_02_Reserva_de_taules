$(document).ready(function() {
    $('.trigger').on('click', function() {
        $('.modal-wrapper').toggleClass('open');
        $('.page-wrapper').toggleClass('blur-it');
        return false;
    });
    $('.mesa-rest').on('click', function() {
        const form = document.querySelector('#form1');
        var mesa = $(this).val();
        const input = document.createElement("input")
        input.type = "hidden";
        input.name = "mesa";
        input.id = "deleteme";
        input.value = mesa;
        form.insertAdjacentElement("afterbegin", input);
        
        document.getElementById('title-modal').innerHTML = "Mesa " + mesa; 
    });
    $('#asd').on('click', function() {
        input = document.querySelector('#deleteme');
        input.remove();
    });
});

// FUNCIÓN VALIDAR CAMPOS RESERVAS
function validarReserva() {
    var validacion = true;
    // RECOGER CAMPOS Y VALORES DE LOS CAMPOS
    var value_nombre = document.getElementById('nombre').value;
    var value_apellidos = document.getElementById('apellidos').value;
    var value_telefono = document.getElementById('telefono').value;
    // COMPROBACIONES:
    if (value_nombre == null || value_apellidos == null || value_telefono == null) {
        alert("Falta algún dato para hacer tu reserva, revisa el formulario y envialo de nuevo!");
        validacion = false;
    } else if (value_telefono.length != 9) {
        alert("El teléfono que has introducido no es válido!");
        validacion = false
    }

    if (!validacion) {
        return false;
    } else {

    }
}

// BOTONES DEL MODAL
var btn_reservar = document.getElementById('btn_reservar');
var btn_liberar = document.getElementById('btn_liberar');
var btn_averiado = document.getElementById('btn_averiado');

// DIV'S DEL MODAL
var reservar = document.getElementById('reservar');
var liberar = document.getElementById('liberar');
var averiado = document.getElementById('averiado');

reservar.style.display = 'none';
liberar.style.display = 'none';
averiado.style.display = 'none';

btn_reservar.addEventListener('click', () => {
    reservar.style.display = 'block';
    liberar.style.display = 'none';
    averiado.style.display = 'none';
});

btn_liberar.addEventListener('click', () => {
    reservar.style.display = 'none';
    liberar.style.display = 'block';
    averiado.style.display = 'none';
});

btn_averiado.addEventListener('click', () => {
    reservar.style.display = 'none';
    liberar.style.display = 'none';
    averiado.style.display = 'block';
});