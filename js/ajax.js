// Al principio siempre llamará al mostrar mesas.
contenidoMesas();

mesas_crud.addEventListener("click", () => {
    contenidoMesas();
});
camareros_crud.addEventListener("click", () => {
    contenidoCam();
});
mantenimiento_crud.addEventListener("click", () => {
    contenidoMan();
});

function contenidoMesas(){
    var resultado_mesas = document.getElementById('resultado_mesas');
    var resultado_form = document.getElementById('resultado_form');
    var ajax = new XMLHttpRequest();
    ajax.open('GET', '../ajaxFunctions/mostrarMesas.php');
    ajax.onload = function (){
        if (ajax.status == 200) {
            var contenido = JSON.parse(ajax.responseText)
            // console.log(contenido['form']);
            resultado_form.innerHTML = contenido['form'];
            resultado_mesas.innerHTML = contenido['mesas'];
            // LLAMADA A LOS FILTROS: EVENTOS
            var filtroId = document.getElementById('buscar_id');
            filtroId.addEventListener('keyup', idMesas, false);
            var filtroUbi = document.getElementById('buscar_ubi');
            filtroUbi.addEventListener('keyup', ubiMesas, false);
            var filtroCapa = document.getElementById('buscar_capa');
            filtroCapa.addEventListener('keyup', capaMesas, false);
            // LISTAR LOS REGISTROS
            listarMesas('','','')
        } else {
            respuesta_crud.innerHTML = 'ERROR';
        }
    }
    ajax.send();
}



function listarMesas(valor_id, valor_ubi, valor_capa) {
    var resultado_lista = document.getElementById('resultado');
    //var frmbusqueda=document.getElementById('frmbusqueda');
    var formdata = new FormData();
    formdata.append('valor_id', valor_id);
    formdata.append('valor_ubi', valor_ubi);
    formdata.append('valor_capa', valor_capa);

    var ajax = new XMLHttpRequest();
    ajax.open('POST', '../ajaxFunctions/listar.php');
    ajax.onload = function () {
        var str="";
        if (ajax.status == 200) {
            // console.log(ajax.responseText);
            var json=JSON.parse(ajax.responseText);
             var tabla='';
             json.forEach(function(item) {
                 str="<tr><td>" + item.id_mesa + "</td>";
                str=str+"<td>" + item.ubicacion + "</td>";
                str+="<td>" + item.capacidad +  "</td>";
                str+="<td>";
                 str=str+ " <button type='button' class='btn btn-success' onclick="+"Editar(" + item.id_mesa + ")>Editar</button>";  
                str+="</td> "; 
                str+="<td>";
                 str=str+ " <button type='button' class='btn btn-danger' onclick="+"Eliminar(" + item.id_mesa + ")>Eliminar</button>";  
                str+="</td> ";       
            str+="</tr>";
             tabla += str;
         });
        resultado_lista.innerHTML = tabla;
        } else {
            resultado_lista.innerText = 'Error';
        }
    }
    ajax.send(formdata);
}

var intervalList = setInterval(listarMesas, 3000, '', '', '');

registrar.addEventListener("click", () => {
        var form = document.getElementById('frm');
        
        var formdata = new FormData(form);
        
        var ajax = new XMLHttpRequest();
        ajax.open('POST', '../ajaxFunctions/registrar.php');
            ajax.onload=function (){
                if(ajax.status===200){
                    if (ajax.responseText == "registrado") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Registrado',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        form.reset();
                        listarMesas('','','');
                    } else if (ajax.responseText == 'modificado') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Modificado',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        registrar.value = "Registrar";
                        idp.value = "";
                        listarMesas('','','');
                        form.reset();
                    }
                } else {
                    respuesta_ajax.innerText = 'Error';
                }
            }
            ajax.send(formdata);
});

function Eliminar(id) 
{   
    Swal.fire({
        title: 'Esta seguro de eliminar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'NO'
    }).then((result) =>
     {
        if (result.isConfirmed)
         {

            
            var formdata = new FormData();
            formdata.append('id', id);
            var ajax = new XMLHttpRequest();
            ajax.open('POST', '../ajaxFunctions/eliminar.php');
                ajax.onload=function ()
                {
                    if(ajax.status===200)
                    {
                        
                        if (ajax.responseText == "ok")
                            {
                                listarMesas('','','');
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Eliminado',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }
                     } 
                } 
                ajax.send(formdata); 
         }
    })
}

function Editar(id) {

    var formdata = new FormData();
    formdata.append('id', id);
    var ajax = new XMLHttpRequest();
    ajax.open('POST', '../ajaxFunctions/editar.php');
    ajax.onload=function ()
        {
        if(ajax.status==200)
            {
                var json=JSON.parse(ajax.responseText);
                document.getElementById('titleRegister').textContent = "Actualizar mesa";
                document.getElementById('idp').value = json.id_mesa;
                document.getElementById('ubi').value = json.ubicacion;
                document.getElementById('capa').value = json.capacidad;

                document.getElementById('registrar').value = "Actualizar";
            }
        }
        ajax.send(formdata);

}

// FILTROS CRUD DE MESAS:

function idMesas(){
    console.log('a');
    console.log(buscar_id);
    var valor_id = buscar_id.value;
    var valor_ubi = buscar_ubi.value;
    var valor_capa = buscar_capa.value;
    if (buscar_id == '' || buscar_ubi == '' || buscar_capa == '') {
        listarMesas('','','');
    }else{
        listarMesas(valor_id, valor_ubi, valor_capa);
        clearInterval(intervalList);
    }
}

function ubiMesas(){
    console.log('a');
    var valor_id = buscar_id.value;
    var valor_ubi = buscar_ubi.value;
    var valor_capa = buscar_capa.value;
    if (buscar_id == '' || buscar_ubi == '' || buscar_capa == '') {
        listarMesas('','','');
    }else{
        listarMesas(valor_id, valor_ubi, valor_capa);
        clearInterval(intervalList);
    }
}

function capaMesas(){
    console.log('a');
    var valor_id = buscar_id.value;
    var valor_ubi = buscar_ubi.value;
    var valor_capa = buscar_capa.value;
    if (buscar_id == '' || buscar_ubi == '' || buscar_capa == '') {
        listarMesas('','','');
    }else{
        listarMesas(valor_id, valor_ubi, valor_capa);
        clearInterval(intervalList);
    }
}



