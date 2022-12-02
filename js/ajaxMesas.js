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
        interval = setInterval(Mesas, 3000, sala);
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
                if (mesas.capacidad == '2'){
                    if (mesas.disponibilidad == 'Libre'){
                        tabla_mesas += "<button value='"+mesas.id_mesa+"' class='mesa-rest trigger'><img class='ocu-2' src='../img/libre-2.png' alt=''></button>";
                    } else if (mesas.disponibilidad == 'Ocupado'){
                        tabla_mesas += "<button value='"+mesas.id_mesa+"' class='mesa-rest trigger'><img class='ocu-2' src='../img/ocupado-2.png' alt=''></button>";
                    } else if (mesas.disponibilidad == 'Averiado'){
                        tabla_mesas += "<button value='"+mesas.id_mesa+"' class='mesa-rest trigger'><img class='ocu-2' src='../img/averiado-2.png' alt=''></button>";
                    }
                } else if (mesas.capacidad == '4'){
                    if (mesas.disponibilidad == 'Libre'){
                        tabla_mesas += "<button value='"+mesas.id_mesa+"' class='mesa-rest trigger'><img class='ocu-4' src='../img/libre-4.png' alt=''></button>";
                    } else if (mesas.disponibilidad == 'Ocupado'){
                        tabla_mesas += "<button value='"+mesas.id_mesa+"' class='mesa-rest trigger'><img class='ocu-4' src='../img/ocupado-4.png' alt=''></button>";
                    } else if (mesas.disponibilidad == 'Averiado'){
                        tabla_mesas += "<button value='"+mesas.id_mesa+"' class='mesa-rest trigger'><img class='ocu-4' src='../img/averiado-4.png' alt=''></button>";
                    }
                } else if (mesas.capacidad == '6'){
                    if (mesas.disponibilidad == 'Libre'){
                        tabla_mesas += "<button value='"+mesas.id_mesa+"' class='mesa-rest trigger'><img class='ocu-6' src='../img/libre-6.png' alt=''></button>";
                    } else if (mesas.disponibilidad == 'Ocupado'){
                        tabla_mesas += "<button value='"+mesas.id_mesa+"' class='mesa-rest trigger'><img class='ocu-6' src='../img/ocupado-6.png' alt=''></button>";
                    } else if (mesas.disponibilidad == 'Averiado'){
                        tabla_mesas += "<button value='"+mesas.id_mesa+"' class='mesa-rest trigger'><img class='ocu-6' src='../img/averiado-6.png' alt=''></button>";
                    }
                } else if (mesas.capacidad == '10'){
                    if (mesas.disponibilidad == 'Libre'){
                        tabla_mesas += "<button value='"+mesas.id_mesa+"' class='mesa-rest trigger'><img class='ocu-10' src='../img/libre-10.png' alt=''></button>";
                    } else if (mesas.disponibilidad == 'Ocupado'){
                        tabla_mesas += "<button value='"+mesas.id_mesa+"' class='mesa-rest trigger'><img class='ocu-10' src='../img/ocupado-10.png' alt=''></button>";
                    } else if (mesas.disponibilidad == 'Averiado'){
                        tabla_mesas += "<button value='"+mesas.id_mesa+"' class='mesa-rest trigger'><img class='ocu-10' src='../img/averiado-10.png' alt=''></button>";
                    }
                } else if (mesas.capacidad == '12'){
                    if (mesas.disponibilidad == 'Libre'){
                        tabla_mesas += "<button value='"+mesas.id_mesa+"' class='mesa-rest trigger'><img class='ocu-12' src='../img/libre-12.png' alt=''></button>";
                    } else if (mesas.disponibilidad == 'Ocupado'){
                        tabla_mesas += "<button value='"+mesas.id_mesa+"' class='mesa-rest trigger'><img class='ocu-12' src='../img/ocupado-12.png' alt=''></button>";
                    } else if (mesas.disponibilidad == 'Averiado'){
                        tabla_mesas += "<button value='"+mesas.id_mesa+"' class='mesa-rest trigger'><img class='ocu-12' src='../img/averiado-12.png' alt=''></button>";
                    }
                }
            });
            resultado_mesas.innerHTML = tabla_mesas;
        }
    }
    ajax.send(formdata);
}

