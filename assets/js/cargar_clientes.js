//assets/js/cargar_cliente.js
$(document).ready(function () {
    $("tbody").addClass("");

    function evitarSubmitEnter(formId, tableId) {
        $(`#${formId}`).on('keypress', function (e) {
            if (e.which === 13) {
                e.preventDefault();
                $(`#${tableId}`).DataTable().ajax.reload();
            }
        });
    }

    var tabla = crearDataTable({
        idTabla: "data-table-cargar_clientes",
        url: "../controller/co_cargar_clientes.php", // Ajustada a ruta relativa desde assets/js
        method: "POST",
        pageLength: 50,
        parametrosAccion: "cargarClientes",
        filtros: [
            { nombre: "filtro_buscar", selector: "#filtro_buscar" }
        ],
        columnas: [
            { data: "Id" },
            { data: "Nombre" },
            { data: "Dni" },
            { data: "Telefono" },
            { data: "N_Mascota" },
            {
                data: null,
                render: function (row) {
                    return `
                        <td>
                            <a href="ver_historial.php?id=${row.id_dueño}" class="btn btn-outline-warning btn-sm me-1">
                                <i class="bi bi-eye"></i> Ver
                            </a>
                            <a href="editar_historial.php?id=${row.id_dueño}" class="btn btn-outline-success btn-sm">
                                <i class="bi bi-pencil-square"></i> Editar
                            </a>
                        </td>
                    `;
                }
            }
        ]
    });

    $('#form-filtro').on('submit', function (e) {
        e.preventDefault();
        console.log('Enviando formulario, recargando tabla...');
        tabla.ajax.reload();
    });

    let timeout;
    $('#filtro_buscar').on('input', function () {
        clearTimeout(timeout);
        timeout = setTimeout(() => {
            tabla.ajax.reload();
        }, 500);
    });
});

function crearDataTable(config) {
    return $('#' + config.idTabla).DataTable({
        ajax: {
            url: config.url,
            type: config.method,
            data: function (d) {
                d[config.parametrosAccion] = true;
                config.filtros.forEach(filtro => {
                    d[filtro.nombre] = $(filtro.selector).val() || '';
                });
            },
            dataSrc: '',
            error: function (xhr, error, thrown) {
                console.error('Error AJAX:', error, 'Status:', xhr.status, 'Response:', xhr.responseText);
            }
        },
        pageLength: config.pageLength,
        columns: config.columnas,
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
        },
        responsive: true
    });
}