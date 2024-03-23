
function buscar() {

    var texto = document.getElementById('simple-search').value.toLowerCase();

    var filas = document.querySelectorAll('tbody tr');

    for (var i = 0; i < filas.length; i++) {
        var fila = filas[i];

        var celdas = fila.querySelectorAll('td');

        var encontrado = false;

        for (var j = 0; j < celdas.length; j++) {
            var celda = celdas[j];

            if (celda.textContent.toLowerCase().includes(texto)) {
                encontrado = true;
                break;
            }
        }

        fila.style.display = encontrado ? 'table-row' : 'none';
    }
}


document.getElementById('simple-search').addEventListener('input', buscar);