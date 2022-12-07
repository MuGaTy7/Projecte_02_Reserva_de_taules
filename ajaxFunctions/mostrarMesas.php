<?php

$contenido_mesas = [
    "form" => "<div>
    <h3 id='titleRegister' class='text-center'>Registro de mesas</h3>
</div>
<div class='card-body'>
    <form action='' method='post' id='frm' enctype='multipart/form-data'>
        <div class='form-group'>
            <label for=''>Ubicación</label>
            <input type='hidden' name='idp' id='idp' value=''>
            <select name='ubi' id='ubi' class='form-control' placeholder='¿Donde quieren comer?'>
                    <option value='salon'>Salón</option>
                    <option value='terraza'>Terraza</option>
                    <option value='sala_privada1'>Sala privada 1</option>
                    <option value='sala_privada2'>Sala privada 2</option>
                </select>
        </div>
        <div class='form-group'>
            <label for=''>Capacidad</label>
            <select name='capa' id='capa' class='form-control' placeholder='Número de comensales'>
                    <option value='2'>2</option>
                    <option value='4'>4</option>
                    <option value='6'>6</option>
                    <option value='10'>10</option>
                    <option value='12'>12</option>
                </select>
        </div>
        <div class='form-group'>
            <label for=''>Fotografía</label>
            <input type='file' name='foto' id='foto' placeholder='Fotografías' class='form-control form-foto'>
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
    "mesas" => "<div class='buscador-table'>
    <form action='' method='post' id='frmbusqueda'>
        <div class='form-group'>
            <label for='buscra'>FILTROS:</label>
            <div class='div-filtros'>
                <input type='text' name='buscar_id' id='buscar_id' placeholder='ID Mesa' class='form-control'>
                <input type='text' name='buscar_ubi' id='buscar_ubi' placeholder='Ubicación' class='form-control'>
                <input type='text' name='buscar_capa' id='buscar_capa' placeholder='Capacidad' class='form-control'>
            </div>
        </div>
    </form>
</div>
<div class='scroll-table'>
    <table class='table table-striped table-hover'>
        <thead class='thead-dark'>
            <tr>
                <th>MESA</th>
                <th>UBICACIÓN</th>
                <th>CAPACIDAD</th>
                <th>DISPONIBILIDAD</th>
                <th>FOTO</th>
                <th>EDITAR</th>
                <th>ELIMINAR</th>
            </tr>
        </thead>
        <tbody id='resultado'>

        </tbody>
    </table>
</div>"
];

echo json_encode($contenido_mesas);

