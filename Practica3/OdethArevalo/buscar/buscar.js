document.getElementById('search-form').addEventListener('submit', function(e) {
    e.preventDefault();

    const placa = document.getElementById('placa').value;
    fetch('buscar_vehiculo.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({ 'placa': placa })
    })
    .then(response => {
        // Comprueba si la respuesta es ok
        if (!response.ok) {
            throw new Error('Error en la respuesta del servidor: ' + response.status);
        }
        return response.text(); // Cambia a text para ver la respuesta cruda
    })
    .then(data => {
        console.log(data); // Imprime la respuesta para verificar su contenido
        try {
            const jsonData = JSON.parse(data); // Intenta convertirlo a JSON

            const resultContainer = document.getElementById('result-container');
            const resultTableBody = document.getElementById('result-table').getElementsByTagName('tbody')[0];

            let tableHTML = '';

            if (jsonData.length > 0) {
                jsonData.forEach(vehiculo => {
                    tableHTML += `
                        <tr>
                            <td>${vehiculo.marca}</td>
                            <td>${vehiculo.modelo}</td>
                            <td>${vehiculo.anio}</td>
                            <td>${vehiculo.color}</td>
                            <td>${vehiculo.num_motor}</td>
                            <td>${vehiculo.chasis}</td>
                            <td>${vehiculo.vehiculo}</td>
                            <td>${vehiculo.propietario}</td>
                        </tr>
                    `;
                });
            } else {
                tableHTML = '<tr><td colspan="7">No se encontraron resultados.</td></tr>';
            }

            resultTableBody.innerHTML = tableHTML;
            resultContainer.style.display = 'block';

        } catch (error) {
            console.error("Error al analizar JSON:", error);
        }
    })
    .catch(error => console.error('Error:', error.message));
});
