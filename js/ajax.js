// Al principio siempre llamará al mostrar mesas.
var intervalList2 = '';
var intervalList3 = '';
var intervalList = '';

contenidoMesas();
intervalList = setInterval(listarMesas, 3000, '', '', '');

mesas_crud.addEventListener("click", () => {
    clearInterval(intervalList);
    clearInterval(intervalList2);
    clearInterval(intervalList3);
    contenidoMesas();
    intervalList = setInterval(listarMesas, 3000, '', '', '');
});
camareros_crud.addEventListener("click", () => {
    clearInterval(intervalList);
    clearInterval(intervalList2);
    clearInterval(intervalList3);
    contenidoCam();
    intervalList2 = setInterval(listarCam, 3000, '', '', '');
});
mantenimiento_crud.addEventListener("click", () => {
    clearInterval(intervalList);
    clearInterval(intervalList2);
    clearInterval(intervalList3);
    contenidoMan();
    intervalList3 = setInterval(listarMan, 3000, '', '', '');
});

function contenidoMesas(){
    var resultado_mesas = document.getElementById('resultado_mesas');
    var resultado_form = document.getElementById('resultado_form');
    var ajax = new XMLHttpRequest();
    ajax.open('GET', '../ajaxFunctions/mostrarMesas.php');
    ajax.onload = function (){
        if (ajax.status == 200) {
            var contenido = JSON.parse(ajax.responseText);
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
            var btn_reset = document.getElementById('reiniciar');
            btn_reset.addEventListener('click', resetForm, false);
            registrar.addEventListener('click', RegistrarMesas, false);
            // LISTAR LOS REGISTROS
            listarMesas('','','');
        } else {
            resultado_mesas.innerHTML = 'ERROR';
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
    formdata.append('tipo', 'mesas');

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
                str+="<td>" + item.disponibilidad +  "</td>";
                str+="<td>" + item.foto_mesa +  "</td>";
                str+="<td>";
                 str=str+ " <button type='button' class='btn btn-success' onclick="+"Editar(" + item.id_mesa + "," + '"' + 'mesas' + '"' + ")>Editar</button>";  
                str+="</td> "; 
                str+="<td>";
                 str=str+ " <button type='button' class='btn btn-danger' onclick="+"Eliminar(" + item.id_mesa + "," + '"' + 'mesas' + '"' + ")>Eliminar</button>";  
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

function contenidoCam(){
    var resultado_camareros = document.getElementById('resultado_mesas');
    var resultado_form = document.getElementById('resultado_form');
    var ajax = new XMLHttpRequest();
    ajax.open('GET', '../ajaxFunctions/mostrarCamareros.php');
    ajax.onload = function (){
        if (ajax.status == 200) {
            var contenido = JSON.parse(ajax.responseText);
            // console.log(contenido['camareros']);
            resultado_form.innerHTML = contenido['form'];
            resultado_camareros.innerHTML = contenido['camareros'];
            // LLAMADA A LOS FILTROS: EVENTOS
            var filtroId = document.getElementById('buscar_id');
            filtroId.addEventListener('keyup', idCam, false);
            var filtroDni = document.getElementById('buscar_dni');
            filtroDni.addEventListener('keyup', dniCam, false);
            var filtroUsername = document.getElementById('buscar_username');
            filtroUsername.addEventListener('keyup', usernameCam, false);
            var btn_reset = document.getElementById('reiniciar');
            btn_reset.addEventListener('click', resetForm, false);
            registrar.addEventListener('click', RegistrarCam, false);
            // LISTAR LOS REGISTROS
            listarCam('','','');
        } else {
            resultado_camareros.innerHTML = 'ERROR';
        }
    }
    ajax.send();
}

function listarCam(valor_id, valor_dni, valor_username) {
    var resultado_lista = document.getElementById('resultado');
    //var frmbusqueda=document.getElementById('frmbusqueda');
    var formdata = new FormData();
    formdata.append('valor_id', valor_id);
    formdata.append('valor_dni', valor_dni);
    formdata.append('valor_username', valor_username);
    formdata.append('tipo', 'camareros');

    var ajax = new XMLHttpRequest();
    ajax.open('POST', '../ajaxFunctions/listar.php');
    ajax.onload = function () {
        var str="";
        if (ajax.status == 200) {
            // console.log(ajax.responseText);
            var json=JSON.parse(ajax.responseText);
             var tabla='';
             json.forEach(function(item) {
                 str="<tr><td>" + item.id_user + "</td>";
                str=str+"<td>" + item.nombre_user + "</td>";
                str+="<td>" + item.apellido_user +  "</td>";
                str+="<td>" + item.dni +  "</td>";
                str+="<td>" + item.username +  "</td>";
                str+="<td>";
                 str=str+ " <button type='button' class='btn btn-success' onclick="+"Editar(" + item.id_user + "," + '"' + 'camareros' + '"' + ")>Editar</button>";  
                str+="</td> "; 
                str+="<td>";
                 str=str+ " <button type='button' class='btn btn-danger' onclick="+"Eliminar(" + item.id_user + "," + '"' + 'camareros' + '"' + ")>Eliminar</button>";  
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

// 

function contenidoMan(){
    var resultado_mantenimiento = document.getElementById('resultado_mesas');
    var resultado_form = document.getElementById('resultado_form');
    var ajax = new XMLHttpRequest();
    ajax.open('GET', '../ajaxFunctions/mostrarMantenimiento.php');
    ajax.onload = function (){
        if (ajax.status == 200) {
            var contenido = JSON.parse(ajax.responseText);
            // console.log(contenido['camareros']);
            resultado_form.innerHTML = contenido['form'];
            resultado_mantenimiento.innerHTML = contenido['mantenimiento'];
            // LLAMADA A LOS FILTROS: EVENTOS
            var filtroId = document.getElementById('buscar_id');
            filtroId.addEventListener('keyup', idMan, false);
            var filtroDni = document.getElementById('buscar_dni');
            filtroDni.addEventListener('keyup', dniMan, false);
            var filtroUsername = document.getElementById('buscar_username');
            filtroUsername.addEventListener('keyup', usernameMan, false);
            var btn_reset = document.getElementById('reiniciar');
            btn_reset.addEventListener('click', resetForm, false);
            registrar.addEventListener('click', RegistrarMan, false);
            // LISTAR LOS REGISTROS
            listarMan('','','');
        } else {
            resultado_mantenimiento.innerHTML = 'ERROR';
        }
    }
    ajax.send();
}

function listarMan(valor_id, valor_dni, valor_username) {
    var resultado_lista = document.getElementById('resultado');
    //var frmbusqueda=document.getElementById('frmbusqueda');
    var formdata = new FormData();
    formdata.append('valor_id', valor_id);
    formdata.append('valor_dni', valor_dni);
    formdata.append('valor_username', valor_username);
    formdata.append('tipo', 'mantenimiento');

    var ajax = new XMLHttpRequest();
    ajax.open('POST', '../ajaxFunctions/listar.php');
    ajax.onload = function () {
        var str="";
        if (ajax.status == 200) {
            // console.log(ajax.responseText);
            var json=JSON.parse(ajax.responseText);
             var tabla='';
             json.forEach(function(item) {
                 str="<tr><td>" + item.id_man + "</td>";
                str=str+"<td>" + item.nombre_man + "</td>";
                str+="<td>" + item.dni +  "</td>";
                str+="<td>" + item.username +  "</td>";
                str+="<td>";
                 str=str+ " <button type='button' class='btn btn-success' onclick="+"Editar(" + item.id_man + "," + '"' + 'mantenimiento' + '"' + ")>Editar</button>";  
                str+="</td> "; 
                str+="<td>";
                 str=str+ " <button type='button' class='btn btn-danger' onclick="+"Eliminar(" + item.id_man + "," + '"' + 'mantenimiento' + '"' + ")>Eliminar</button>";  
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

// FUNCIONES DE REGISTRAR:
function RegistrarMesas(){
    var form = document.getElementById('frm');
    var formdata = new FormData(form);
    formdata.append('tipo', 'mesas');

    var ajax = new XMLHttpRequest();
    ajax.open('POST', '../ajaxFunctions/registrar.php');
        ajax.onload=function (){
            if(ajax.status===200){
                console.log(ajax.responseText);
                if (ajax.responseText == "registrado") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Mesa registrada!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    form.reset();
                    listarMesas('','','');
                } else if (ajax.responseText == 'modificado') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Mesa modificada!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    registrar.value = "Registrar";
                    idp.value = "";
                    form.reset();
                    listarMesas('','','');
                }
            } else {
                respuesta_ajax.innerText = 'Error';
            }
        }
        ajax.send(formdata);
}
function RegistrarCam(){
    var form = document.getElementById('frm');
    var formdata = new FormData(form);
    formdata.append('tipo', 'camareros');

    var ajax = new XMLHttpRequest();
    ajax.open('POST', '../ajaxFunctions/registrar.php');
        ajax.onload=function (){
            if(ajax.status===200){
                console.log(ajax.responseText);
                if (ajax.responseText == "registrado") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Camarero registrado!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    form.reset();
                    listarCam('','','');
                } else if (ajax.responseText == 'modificado') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Camarero modificado!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    registrar.value = "Registrar";
                    idp.value = "";
                    form.reset();
                    listarCam('','','');
                }
            } else {
                respuesta_ajax.innerText = 'Error';
            }
        }
        ajax.send(formdata);
}
function RegistrarMan(){
    var form = document.getElementById('frm');
    var formdata = new FormData(form);
    formdata.append('tipo', 'mantenimiento');

    var ajax = new XMLHttpRequest();
    ajax.open('POST', '../ajaxFunctions/registrar.php');
        ajax.onload=function (){
            if(ajax.status===200){
                console.log(ajax.responseText);
                if (ajax.responseText == "registrado") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Mantenimiento registrado!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    form.reset();
                    listarMan('','','');
                } else if (ajax.responseText == 'modificado') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Mantenimiento modificado!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    registrar.value = "Registrar";
                    idp.value = "";
                    form.reset();
                    listarMan('','','');
                }
            } else {
                respuesta_ajax.innerText = 'Error';
            }
        }
        ajax.send(formdata);
}

function Eliminar(id, tipo) {   
    Swal.fire({
        title: 'Esta seguro de eliminar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'NO'
    }).then((result) => {
        if (result.isConfirmed){
            var formdata = new FormData();
            formdata.append('id', id);
            formdata.append('tipo', tipo);

            var ajax = new XMLHttpRequest();
            ajax.open('POST', '../ajaxFunctions/eliminar.php');
                ajax.onload=function () {
                    if(ajax.status===200){
                        if (ajax.responseText == "mesas"){
                            listarMesas('','','');
                            Swal.fire({
                                icon: 'success',
                                title: 'Mesa eliminada!',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        } else if (ajax.responseText == "camareros"){
                            listarCam('','','');
                            Swal.fire({
                                icon: 'success',
                                title: 'Camarero eliminado!',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        } else if (ajax.responseText == "mantenimiento"){
                            listarMan('','','');
                            Swal.fire({
                                icon: 'success',
                                title: 'Mantenimiento eliminado!',
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

function Editar(id, tipo) {
    var formdata = new FormData();
    formdata.append('id', id);
    formdata.append('tipo', tipo);

    var ajax = new XMLHttpRequest();
    ajax.open('POST', '../ajaxFunctions/editar.php');
    ajax.onload=function (){
        if(ajax.status==200){
            var json=JSON.parse(ajax.responseText);
            if (tipo == 'mesas'){
                document.getElementById('titleRegister').textContent = "Actualizar mesa";
                document.getElementById('idp').value = json.id_mesa;
                document.getElementById('ubi').value = json.ubicacion;
                document.getElementById('capa').value = json.capacidad;
            } else if (tipo == 'camareros') {
                document.getElementById('titleRegister').textContent = "Actualizar camarero";
                document.getElementById('idp').value = json.id_user;
                document.getElementById('nombre').value = json.nombre_user;
                document.getElementById('apellidos').value = json.apellido_user;
                document.getElementById('dni').value = json.dni;
                document.getElementById('username').value = json.username;
            } else if (tipo == 'mantenimiento') {
                document.getElementById('titleRegister').textContent = "Actualizar mantenimiento";
                document.getElementById('idp').value = json.id_man;
                document.getElementById('nombre').value = json.nombre_man;
                document.getElementById('dni').value = json.dni;
                document.getElementById('username').value = json.username;
            }
            document.getElementById('registrar').value = "Actualizar";
        }
    }
    ajax.send(formdata);

}

// FILTROS CRUD DE MESAS:

function idMesas(){
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

// FILTROS CRUD DE CAMAREROS:

function idCam(){
    var valor_id = buscar_id.value;
    var valor_dni = buscar_dni.value;
    var valor_username = buscar_username.value;
    if (buscar_id == '' || buscar_dni == '' || buscar_username == '') {
        listarCam('','','');
    }else{
        listarCam(valor_id, valor_dni, valor_username);
        clearInterval(intervalList2);
    }
}

function dniCam(){
    var valor_id = buscar_id.value;
    var valor_dni = buscar_dni.value;
    var valor_username = buscar_username.value;
    if (buscar_id == '' || buscar_dni == '' || buscar_username == '') {
        listarCam('','','');
    }else{
        listarCam(valor_id, valor_dni, valor_username);
        clearInterval(intervalList2);
    }
}

function usernameCam(){
    var valor_id = buscar_id.value;
    var valor_dni = buscar_dni.value;
    var valor_username = buscar_username.value;
    if (buscar_id == '' || buscar_dni == '' || buscar_username == '') {
        listarCam('','','');
    }else{
        listarCam(valor_id, valor_dni, valor_username);
        clearInterval(intervalList2);
    }
}


// FILTROS CRUD DE MANTENIMIENTO:

function idMan(){
    var valor_id = buscar_id.value;
    var valor_dni = buscar_dni.value;
    var valor_username = buscar_username.value;
    if (buscar_id == '' || buscar_dni == '' || buscar_username == '') {
        listarMan('','','');
    }else{
        listarMan(valor_id, valor_dni, valor_username);
        clearInterval(intervalList3);
    }
}

function dniMan(){
    var valor_id = buscar_id.value;
    var valor_dni = buscar_dni.value;
    var valor_username = buscar_username.value;
    if (buscar_id == '' || buscar_dni == '' || buscar_username == '') {
        listarMan('','','');
    }else{
        listarMan(valor_id, valor_dni, valor_username);
        clearInterval(intervalList3);
    }
}

function usernameMan(){
    var valor_id = buscar_id.value;
    var valor_dni = buscar_dni.value;
    var valor_username = buscar_username.value;
    if (buscar_id == '' || buscar_dni == '' || buscar_username == '') {
        listarMan('','','');
    }else{
        listarMan(valor_id, valor_dni, valor_username);
        clearInterval(intervalList3);
    }
}


// FUNCIÓN DE RESETEAR VALORES DEL FORM:
function resetForm(){
    var formulario = document.getElementById('frm');
    formulario.reset();
    document.getElementById('registrar').value = "Registrar";
    document.getElementById('titleRegister').textContent = "Registro de mesas";
}
