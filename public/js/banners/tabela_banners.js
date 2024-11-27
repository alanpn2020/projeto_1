
$(document).ready(function () {

    let tabelaBanners = $('#tabelaBanners').DataTable({
        "sDom": 'rtp',
        "processing": true,
        "serverSide": true,
        "sScrollX": "100%",
        "ajax": {
            'url': "/admin/banners/datatable_banners",
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
            tabelaBanners.rows().select();
        } else {
            tabelaBanners.rows().deselect();
        }
    });

});  
