document.addEventListener("DOMContentLoaded", function () {
    var listaMedicamentos = document.getElementById("lista-medicamentos");
    var detallesMedicamento = document.getElementById("gestor");

    // Realizar una solicitud AJAX para obtener la lista de medicamentos
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "get_medicamentos.php", true);

    xhr.onload = function () {
        if (xhr.status == 200) {
            var medicamentos = JSON.parse(xhr.responseText);

            // Agregar botones a la lista
            medicamentos.forEach(function (medicamento) {
                var boton = document.createElement("button");
                boton.textContent = medicamento.detalle;

                boton.addEventListener("click", function () {
                    // Al hacer clic en el botón, mostrar los detalles del medicamento
                    detallesMedicamento.textContent = medicamento.detalle;
                });

                var listItem = document.createElement("li");
                listItem.appendChild(boton);
                listaMedicamentos.appendChild(listItem);
            });
        }
    };

    xhr.send();
});
