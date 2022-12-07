<?php 

$contenido_reservas = [
    "form" => "<div style='display: none;'></div>",
    "reservas" => "<div class='buscador-table'>
    <form action='' method='post' id='frmbusqueda'>
        <div class='form-group'>
            <label for='buscra'>FILTROS:</label>
            <div class='div-filtros'>
                <input type='text' name='buscar_mesa' id='buscar_mesa' placeholder='ID Mesa' class='form-control'>
                <input type='text' name='buscar_nombre' id='buscar_nombre' placeholder='Nombre' class='form-control'>
                <input type='date' name='buscar_dia' id='buscar_dia' placeholder='Username' class='form-control'>
            </div>
        </div>
    </form>
</div>
<div class='scroll-table'>
    <table class='table table-striped table-hover'>
        <thead class='thead-dark'>
            <tr>
                <th>ID</th>
                <th>MESA</th>
                <th>NOMBRE</th>
                <th>APELLIDOS</th>
                <th>TELÉFONO</th>
                <th>HORA INICIO</th>
                <th>DURACIÓN</th>
            </tr>
        </thead>
        <tbody id='resultado'>

        </tbody>
    </table>
</div>"
];

echo json_encode($contenido_reservas);

