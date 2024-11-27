
$(document).ready(function () {

    let tabelaEmpreendimentos = $('#tabelaEmpreendimentos').DataTable({
        "sDom": 'rtp',
        "processing": true,
        "serverSide": true,
        "sScrollX": "100%",
        "ajax": {
            'url': "/admin/empreendimentos/datatable_empreendimentos",
            'type': 'GET',
            'data': {

            }
        },
        columns: [
            {
                data: null,
                orderable: false,
                className: 'select-checkbox',
                defaultContent: ""
            },
            {
                data: 'id',
                className: "text-center"
            },
            {
                data: 'nome_img',
                className: "text-center"
            },
            {
                data: 'img',
                className: "text-center"
            },
            {
                data: 'categoria',
                className: "text-center"
            },
            {
                data: 'localizacao',
                className: "text-center"
            },
            {
                data: 'url_empreendimento',
                className: "text-center"
            },
            {
                data: 'titulo',
                className: "text-center"
            },
            {
                data: 'dormitorio',
                className: "text-center"
            },
            {
                data: 'action',
                className: "text-center"
            },
        ],
        columnDefs: [{
            targets: 0,
            orderable: false,
            className: 'select-checkbox'
        }],
        select: {
            style: 'multi',
            selector: 'td:first-child',
        },
        order: [
            [1, 'desc']
        ]
    }
    );

    $('.check-all_database').click(function () {
        if ($(this).is(':checked')) {
            tabelaEmpreendimentos.rows().select();
        } else {
            tabelaEmpreendimentos.rows().deselect();
        }
    });

});  
