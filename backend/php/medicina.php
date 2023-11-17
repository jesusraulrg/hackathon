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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Viviendas</title>
</head>

<body>
    <div style="padding: 15px; width: 90%;">

        <div class="d-flex flex-row">

            <h1>Medicina</h1>
            <div style="position: relative; top: 10px; left: 72%;">
                <form method="POST">
                    <input type="submit" value="Cerrar sesión" class="btn btn-danger" name="btncerrar" />
            </div>

        </div>
        <div class="d-flex flex-column">
            <table class="table table-hover table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">IDM</th>
                        <th scope="col">Detalle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Casa</td>
                    </tr>
                </tbody>
            </table>
            <div>
                <a style="float: right; position: relative; left: 10%" href="agregar_medicamento.php"><i
                        class="bi bi-plus-square icon-table"></i></a>
            </div>
            <div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link">Anterior</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Siguiente</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</body>
    <?php
        
    ?>
<script>
    document.getElementById('ShowDelete').addEventListener('click', function () {
        Swal.fire({
            title: '¿Deseas eliminar?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Si',
            denyButtonText: `No`,
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire('¡Se elimino con exito!', '', 'success');
            } else if (result.isDenied) {
                Swal.fire('No se elimino', '', 'info');
            }
        });
    });
</script>

</html>