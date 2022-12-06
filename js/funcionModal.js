// FUNCIÓN VALIDAR CAMPOS RESERVAS
function validarReserva() {
    var validacion = true;
    // RECOGER CAMPOS Y VALORES DE LOS CAMPOS
    var value_nombre = document.getElementById('nombre').value;
    var value_apellidos = document.getElementById('apellidos').value;
    var value_telefono = document.getElementById('telefono').value;
    // COMPROBACIONES:
    if (value_nombre == '' || value_apellidos == '' || value_telefono == '') {
        alert("Falta algún dato para hacer tu reserva, revisa el formulario y envialo de nuevo!");
        validacion = false;
    } else if (value_telefono.length != 9) {
        alert("El teléfono que has introducido no es válido!");
        validacion = false;
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