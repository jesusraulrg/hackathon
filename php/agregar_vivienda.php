<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo_admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Agregar viviendas</title>
</head>
<?php
session_start();

if (isset($_SESSION['nombredelusuario'])) {
    $usuarioingresado = $_SESSION['nombredelusuario'];
    // echo "<h1>Bienvenido: $usuarioingresado </h1>";
} else {
    header('location: ../Login.html');
}
?>

<body>
    <div class="container">
        <div class="d-flex flex-column cont-agregar">
            <h1 class="text-title">Agregar</h1>
            <h1 class="text-title" id="vivienda1">vivienda</h1>
            <div class="d-flex flex-column">
                <div class="d-flex flex-row">
                    <div class="input-group p-3">
                        <label class="input-group-text" for="vivienda">Vivienda</label>
                        <select class="form-select" id="vivienda" onchange="showVivienda()">
                            <option selected>Seleccionar...</option>
                            <option value="1">Casa</option>
                            <option value="2">Departamento</option>
                            <option value="3">Terreno</option>
                        </select>
                    </div>
                    <div class="input-group p-3">
                        <label class="input-group-text" for="operacion">Operación</label>
                        <select class="form-select" id="operacion" onchange="showVivienda()">
                            <option selected>Seleccionar...</option>
                            <option value="1">Renta</option>
                            <option value="2">Venta</option>
                        </select>
                    </div>
                </div>
                <div class="d-flex flex-row">
                    <div class="input-group p-3">
                        <label class="input-group-text" for="estados">Estado</label>
                        <select class="form-select" id="estados">
                            <option selected>Seleccionar...</option>
                            <option value="1">Nuevo</option>
                            <option value="2">Remodelado</option>
                            <option value="3">Bueno</option>
                            <option value="4">Regular</option>
                        </select>
                    </div>
                    <div class="input-group p-3">
                        <label class="input-group-text" for="zonas">Zona</label>
                        <select class="form-select" id="zonas">
                            <option selected>Seleccionar...</option>
                            <option value="1">Urbana</option>
                            <option value="2">Suburbana</option>
                            <option value="3">Rural</option>
                            <option value="4">Turistica</option>
                            <option value="5">Comercial</option>
                            <option value="6">Zona Universitaria</option>
                            <option value="7">Zona Parques</option>
                            <option value="8">Industrial</option>
                            <option value="9">Centro</option>
                        </select>
                    </div>
                </div>
                <div class="d-flex flex-row">
                    <div class="d-flex flex-row justify-content-between" style="width: 100%;">
                        <div class="input-group p-3">
                            <input accept="image/png,image/jpeg" type="file" multiple class="form-control"
                                id="fotos" style="display: none;">
                            <label class="input-group-text" style="border-radius:10px;" for="inputFotos">Subir
                                fotos de la
                                vivienda</label>
                        </div>
                        <div class="input-group p-3">
                            <input type="file" multiple class="form-control" id="planos"
                                style="display: none;">
                            <label class="input-group-text" style="border-radius:10px;" for="inputPlanos">Subir
                                planos de la
                                vivienda</label>
                        </div>
                        <div class="forms terreno" style="display: none;">
                            <div class="input-group p-3">
                                <input type="file" multiple class="form-control" id="topografia"
                                    style="display: none;">
                                <label class="input-group-text" style="border-radius:10px;" for="inputTopo">Subir
                                    topografia</label>
                            </div>
                        </div>
                        <div class="input-group p-3">
                            <span class="input-group-text" id="precio">Precio</span>
                            <input type="text" class="form-control" oninput="validarNumero(this)"
                                aria-label="Nombre de usuario" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group p-3">
                            <span class="input-group-text" id="metros">m<sup>2</sup></span>
                            <input type="text" class="form-control" oninput="validarNumero(this)"
                                aria-label="Nombre de usuario" aria-describedby="basic-addon1">
                        </div>
                    </div>
                </div>
                <!-- -+-+-+-+-+-+-+--+-+-+-+-+-+-+-+-+-+-+--+
                Los campos si es una casa
                -+-+-+-+-+-+-+--+-+-+-+-+-+-+-+-+-+-+--+ -->

                <div class="forms casa depa" style="display: none;">
                    <form action="">
                        <div class="d-flex flex-row">
                            <div class="input-group p-3">
                                <span class="input-group-text" id="habitacion">Numero de habitaciones</span>
                                <input type="text" class="form-control" oninput="validarNumero(this)"
                                    aria-label="Nombre de usuario" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group p-3">
                                <span class="input-group-text" id="banio">Numero de baños</span>
                                <input type="text" class="form-control" oninput="validarNumero(this)"
                                    aria-label="Nombre de usuario" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="d-flex flex-row container">
                    <div style="width: 60%;">
                        <h5 class="ms-5 text-sub">Tiene</h5>
                        <div class="d-flex flex-row">
                            <div class="form-check">
                                <input class="form-check-input ms-1" type="checkbox" value="" id="luz">
                                <label class="form-check-label ms-2 me-4" for="checkLuz">
                                    Luz
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="agua">
                                <label class="form-check-label me-4" for="checkAgua">
                                    Agua
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="alcanterillado">
                                <label class="form-check-label me-4" for="checkAlcanterillado">
                                    Alcanterillado
                                </label>
                            </div>
                            <div class="form-check forms casa depa" style="display: none;">
                                <input class="form-check-input" type="checkbox" value="" id="estacionamiento">
                                <label class="form-check-label me-4" for="checkEstacionamiento">
                                    Estacionamiento
                                </label>
                            </div>
                            <div class="form-check forms depa" style="display: none;">
                                <input class="form-check-input" type="checkbox" value="" id="cocina">
                                <label class="form-check-label me-4" for="checkCocina">
                                    Cocina
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- -+-+-+-+-+-+-+--+-+-+-+-+-+-+-+-+-+-+--+
                Los campos si es una casa
                -+-+-+-+-+-+-+--+-+-+-+-+-+-+-+-+-+-+--+ -->
                    <div class="forms casa depa" style="display: none; width: 40%;">
                        <h5 class="ms-5 text-sub">Aceptan</h5>
                        <div class="d-flex flex-row">
                            <div class="form-check">
                                <input class="form-check-input ms-1" type="checkbox" value="" id="kids">
                                <label class="form-check-label ms-2 me-4" for="checkKids">
                                    Niños
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="mascotas">
                                <label class="form-check-label me-4" for="checkMascotas">
                                    Mascotas
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="forms casa depa pb-5 ps-2" style="display: none;">
                    <table borde="3">
                        <thead>
                            <tr>
                                <th>
                                    <h5 class="text-title mt-2">Amenidades</h5>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input ms-1" type="checkbox" value=""
                                            id="p_carretera">
                                        <label class="form-check-label ms-2 me-4" for="checkCarretera">
                                            Pie de carretera
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="pisina">
                                        <label class="form-check-label me-4" for="checkPisina">
                                            Piscina
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="jardin">
                                        <label class="form-check-label me-4" for="checkJardin">
                                            Jardín
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="terraza">
                                        <label class="form-check-label me-4" for="checkTerraza">
                                            Terraza
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="balcon">
                                        <label class="form-check-label me-4" for="checkBalcon">
                                            Balcón
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input ms-1" type="checkbox" value=""
                                            id="patio">
                                        <label class="form-check-label ms-2 me-4" for="checkPatio">
                                            Patio
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="seguridad">
                                        <label class="form-check-label me-4" for="checkSeguridad">
                                            Sistema de Seguridad
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="muebles">
                                        <label class="form-check-label me-4" for="checkMuebles">
                                            Muebles
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="gimnasio">
                                        <label class="form-check-label me-4" for="checkGimnasio">
                                            Gimnasio
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="internet">
                                        <label class="form-check-label me-4" for="checkInternet">
                                            Internet
                                        </label>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div>
                    <h3 class="text-title">Dirección</h3>
                    <div class="d-flex flex-row">
                        <div style="width: 50%;">
                            <div class="input-group p-3">
                                <span class="input-group-text" id="numero">Numero</span>
                                <input type="text" class="form-control" oninput="validarNumero(this)"
                                    aria-label="Nombre de usuario" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group p-3">
                                <span class="input-group-text" id="ciudad">Ciudad</span>
                                <input type="text" class="form-control" aria-label="Nombre de usuario"
                                    aria-describedby="basic-addon1">
                            </div>

                            <div class="input-group p-3">
                                <span class="input-group-text" id="cp">Codigo Postal</span>
                                <input type="text" class="form-control" maxlength="5" oninput="validarNumero(this)"
                                    aria-label="Nombre de usuario" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div style="width: 50%;">
                            <div class="input-group p-3">
                                <span class="input-group-text" id="calle">Calle</span>
                                <input type="text" class="form-control" aria-label="Nombre de usuario"
                                    aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group p-3">
                                <span class="input-group-text" id="colonia">Colonia</span>
                                <input type="text" class="form-control" aria-label="Nombre de usuario"
                                    aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group p-3">
                                <span class="input-group-text" id="estado">Estado</span>
                                <input type="text" class="form-control" aria-label="Nombre de usuario"
                                    aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="input-group p-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="disponible">
                            <h4 class="text-sub">Esta disponible la vivienda</h4>
                        </div>
                    </div>
                </div>

                <div class=" d-flex justify-content-center align-items-center">
                    <div class="d-grid gap-2 d-md-block">
                        <input type="submit" class="btn btn-success btn-lg shadow-box mx-auto" value="Guardar"></input>
                    </div>
                </div>
            </div>
        </div>
</body>
<script src="../js/validar.js?v=1.1"></script>

</html>