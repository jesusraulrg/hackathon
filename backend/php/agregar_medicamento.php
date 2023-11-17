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
    <title>Agregar medicamento</title>
</head>

<body>
    <div class="container">
        <div class="d-flex flex-column cont-agregar">
            <h1 class="text-title">Agregar</h1>
            <h1 class="text-title" id="medicamento">medicamento</h1>
            <div class="d-flex flex-column" >
                <div class="d-flex flex-row">
                <div class="input-group p-3">
                        <label class="input-group-text" for="idm">IDM</label>
                        <input class="form-control" type="text" id="idm">
                    </div>
                    <div class="input-group p-3">
                        <label class="input-group-text" for="medicamento">medicamento</label>
                        <input class="form-control" type="text" id="medicamento">
                    </div>
                    
                </div>
                
                        <input type="submit" class="btn btn-success btn-lg shadow-box mx-auto" value="Guardar"></input>
                    </div>
                </div>
            </div>
        </div>
        <?php
        
        ?>
</body>
<script src="../js/validar.js?v=1.1"></script>

</html>