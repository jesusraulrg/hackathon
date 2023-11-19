<?php
// Funciones para manejar el catálogo
function agregar_medicamento($descripcion) {
    include 'conexion.php';
    $stmt = $conn->prepare("INSERT INTO medicamentos (descripcion) VALUES (?)");
    $stmt->bind_param("s", $descripcion);
    $stmt->execute();
    $stmt->close();
}

function editar_medicamento($id, $nueva_descripcion) {
    include 'conexion.php';
    $stmt = $conn->prepare("UPDATE medicamentos SET descripcion = ? WHERE id = ?");
    $stmt->bind_param("si", $nueva_descripcion, $id);
    $stmt->execute();
    $stmt->close();
}

function borrar_medicamento($id) {
    include 'conexion.php';
    $stmt = $conn->prepare("DELETE FROM medicamentos WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

function obtener_medicamentos() {
    include 'conexion.php';
    $result = $conn->query("SELECT id, descripcion FROM medicamentos");
    $medicamentos = [];
    while ($row = $result->fetch_assoc()) {
        $medicamentos[$row['id']] = $row['descripcion'];
    }
    return $medicamentos;
}

// Manejar las solicitudes del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['agregar'])) {
        $descripcion = $_POST['descripcion'];
        agregar_medicamento($descripcion);
    } elseif (isset($_POST['editar'])) {
        $id = $_POST['id'];
        $nueva_descripcion = $_POST['nueva_descripcion'];
        editar_medicamento($id, $nueva_descripcion);
    } elseif (isset($_POST['borrar'])) {
        $id = $_POST['id'];
        borrar_medicamento($id);
    }
}

// Mostrar medicamentos
$medicamentos = obtener_medicamentos();
foreach ($medicamentos as $id => $descripcion) {
    echo "<tr>";
    echo "<td>$id</td>";
    echo "<td>$descripcion</td>";
    echo "<td>
            <form method='post' action='index.php'>
                <input type='hidden' name='id' value='$id'>
                <input type='text' name='nueva_descripcion' placeholder='Nueva descripción' required>
                <button type='submit' name='editar'>Editar</button>
            </form>
            <form method='post' action='index.php'>
                <input type='hidden' name='id' value='$id'>
                <button type='submit' name='borrar'>Borrar</button>
            </form>
          </td>";
    echo "</tr>";
}
?>
