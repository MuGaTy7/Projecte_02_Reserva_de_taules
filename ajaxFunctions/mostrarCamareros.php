<?php 

$contenido_camareros = [
    "form" => "<div>
        <h3 id='titleRegister' class='text-center'>Registro de camareros</h3>
    </div>
    <div class='card-body'>
    <form action='' method='post' id='frm'>
        <div class='form-group'>
            <label for=''>Nombre</label>
            <input type='hidden' name='idp' id='idp' value=''>
            <input type='text' name='nombre' id='nombre' placeholder='Nombre' class='form-control'>
        </div>
        <div class='form-group'>
            <label for=''>Apellidos</label>
            <input type='text' name='apellidos' id='apellidos' placeholder='Apellidos' class='form-control'>
        </div>
        <div class='form-group'>
            <label for=''>DNI</label>
            <input type='text' name='dni' id='dni' placeholder='DNI' class='form-control'>
        </div>
        <div class='form-group'>
            <label for=''>Username</label>
            <input type='text' name='username' id='username' placeholder='Username' class='form-control'>
        </div>
        <div class='div-form-group'>
            <div class='form-group'>
                <input type='button' value='Registrar' id='registrar' class='btn btn-danger btn-block'>
            </div>
            <div class='form-group'>
                <input type='button' value='Reiniciar' id='reiniciar' class='btn btn-danger btn-block'>
            </div>
        </div>
    </form>
</div>",
    "camareros" => "<div class='buscador-table'>
    <form action='' method='post' id='frmbusqueda'>
        <div class='form-group'>
            <label for='buscra'>FILTROS CAMAREROS:</label>
            <div class='div-filtros'>
                <input type='text' name='buscar_id' id='buscar_id' placeholder='ID Camarero' class='form-control'>
                <input type='text' name='buscar_dni' id='buscar_dni' placeholder='DNI' class='form-control'>
                <input type='text' name='buscar_username' id='buscar_username' placeholder='Username' class='form-control'>
            </div>
        </div>
    </form>
</div>
<div class='scroll-table'>
    <table class='table table-striped table-hover'>
        <thead class='thead-dark'>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>APELLIDOS</th>
                <th>DNI</th>
                <th>USERNAME</th>
                <th>EDITAR</th>
                <th>ELIMINAR</th>
            </tr>
        </thead>
        <tbody id='resultado'>

        </tbody>
    </table>
</div>"
];

echo json_encode($contenido_camareros);

