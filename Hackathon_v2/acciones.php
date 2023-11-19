<?php include 'conexion.php'; 
if (isset($_POST['accion'])) { 
    switch ($_POST['accion']) { 
        case 'agregar': 
        agregar_medicamento($_POST['descripcion']); 
        break; 
        case 'editar': 
        editar_medicamento($_POST['id'], $_POST['nueva_descripcion']); 
        break; 
        case 'borrar': 
        borrar_medicamento($_POST['id']); 
        break; 
         } 
         
        } 
        $medicamentos = obtener_medicamentos(); 
        echo '<tr><th>ID</th><th>Descripción</th><th>Acciones</th></tr>'; 
        foreach ($medicamentos as $id => $descripcion) { 
            echo "<tr>"; 
            echo "<td>$id</td>"; 
            echo "<td>$descripcion</td>"; 
            echo "<td> <button onclick='editarMedicamento($id, prompt(\"Nueva descripción:\"))'>Editar</button> 
            <button onclick='borrarMedicamento($id)'>Borrar</button>
             </td>"; 
             echo "</tr>"; 
             }  
            ?>