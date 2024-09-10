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
    .then(response => response.json())
    .then(data => {
        const resultContainer = document.getElementById('result-container');
        const resultTableBody = document.getElementById('result-table').getElementsByTagName('tbody')[0];

        let tableHTML = '';

        if (data.length > 0) {
            data.forEach(vehiculo => {
            tableHTML += `
                <tr>
                    <td>${vehiculo.marca}</td>
                    <td>${vehiculo.modelo}</td>
                    <td>${vehiculo.anio}</td>
                    <td>${vehiculo.color}</td>
                    <td>${vehiculo.num_motor}</td>
                    <td>${vehiculo.chasis}</td>
                    <td>${vehiculo.vehiculo}</td>
                </tr>
            `;
        });

        } else {
            tableHTML = '<tr><td colspan="7">No se encontraron resultados.</td></tr>';
        }

        resultTableBody.innerHTML = tableHTML;
        resultContainer.style.display = 'block';
    })
    .catch(error => console.error('Error:', error));
});
document.getElementById('regresar_btn').addEventListener('click', function() {
    window.location.href= '/Lab2/OdethArevalo/index.php'
});