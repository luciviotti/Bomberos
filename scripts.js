document.addEventListener("DOMContentLoaded", function() {
    fetch('fetch_incidents.php')
        .then(response => response.json())
        .then(data => {
            const tbody = document.getElementById('incidentTableBody');
            tbody.innerHTML = '';

            data.forEach(incident => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${incident.id}</td>
                    <td>${incident.fecha}</td>
                    <td>${incident.tipo}</td>
                    <td>${incident.descripcion}</td>
                    <td>
                        <button class="action-btn" onclick="editIncident(${incident.id}, '${incident.fecha}', '${incident.tipo}', '${incident.descripcion}')">Editar</button>
                        <form action="process.php" method="post" style="display:inline;">
                            <input type="hidden" name="id" value="${incident.id}">
                            <button type="submit" name="action" value="delete" class="action-btn">Eliminar</button>
                        </form>
                    </td>
                `;
                tbody.appendChild(row);
            });
        });
});

function editIncident(id, fecha, tipo, descripcion) {
    document.getElementById('incidentId').value = id;
    document.getElementById('fecha').value = fecha;
    document.getElementById('tipo').value = tipo;
    document.getElementById('descripcion').value = descripcion;
}