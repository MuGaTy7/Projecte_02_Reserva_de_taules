// LISTAR MESAS:
var interval = '';
var cont = 0;
Mesas('salon'); // Es el que saldrá predeterminado, cuando no se haya clickado ningún botón.
// setInterval(Mesas, 3000);

btn_salon.addEventListener("click", () => {
    cont = 0;
    clearInterval(interval);
    Mesas('salon');
});
btn_terraza.addEventListener("click", () => {
    cont = 0;
    clearInterval(interval);
    Mesas('terraza');
});
btn_privada_1.addEventListener("click", () => {
    cont = 0;
    clearInterval(interval);
    Mesas('sala_privada1');
});
btn_privada_2.addEventListener("click", () => {
    cont = 0;
    clearInterval(interval);
    Mesas('sala_privada2');
});

function Mesas(sala){
    cont += 1;
    if (cont == 1){
        interval = setInterval(Mesas, 1000, sala);
    }
    var resultado_mesas = document.getElementById('widget_resultado');
    var formdata = new FormData();
    formdata.append('sala', sala);
    var ajax = new XMLHttpRequest();
    ajax.open('POST', '../ajaxFunctions/mesas.php');
    ajax.onload = function () {
        if(ajax.status==200) {
            // console.log(ajax.responseText);
            var tabla_mesas = '';
            var array_mesas = JSON.parse(ajax.responseText)
            array_mesas.forEach(mesas => {
                // Ahora ya no importa la capacidad para la foto, tan solo la que este subida en la BD
                if (mesas.disponibilidad == 'Libre'){
                    tabla_mesas += "<button value='"+mesas.id_mesa+"' class='mesa-rest trigger libre'><img class='mesas-n' src='../img/uploads/"+mesas.foto_mesa+"' alt=''></button>";
                } else if (mesas.disponibilidad == 'Ocupado'){
                    tabla_mesas += "<button value='"+mesas.id_mesa+"' class='mesa-rest trigger ocupado'><img class='mesas-n' src='../img/uploads/"+mesas.foto_mesa+"' alt=''></button>";
                } else if (mesas.disponibilidad == 'Averiado'){
                    tabla_mesas += "<button value='"+mesas.id_mesa+"' disabled class='mesa-rest trigger averiado'><img class='mesas-n' src='../img/uploads/"+mesas.foto_mesa+"' alt=''></button>";
                }
            });
            resultado_mesas.innerHTML = tabla_mesas;
            abrirModal();
        }
    }
    ajax.send(formdata);
}

function abrirModal(){
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
}
