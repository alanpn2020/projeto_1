$('#tabelaEmpreendimentos tbody').on('click', '.btn-editar-empreendimentos', function () {

    var row = $(this).closest('tr');
    var tabelaEmpreendimentos = $('#tabelaEmpreendimentos').DataTable().row(row).data();

    $("#ModalEditEmpreendimentos").on("show.bs.modal", function () {
        $('#id_banner').val(tabelaEmpreendimentos.id);
        $('#titulo_edit').val(tabelaEmpreendimentos.titulo);
        $('#url_empreendimento_edit').val(tabelaEmpreendimentos.url_empreendimento);
        $('#localizacao_edit').val(tabelaEmpreendimentos.localizacao);
        $('#dormitorio_edit').val(tabelaEmpreendimentos.dormitorio);

    });
    new bootstrap.Modal(document.getElementById('ModalEditEmpreendimentos')).show();


});

$("#ModalEditEmpreendimentos").on("hidden.bs.modal", function () {
    $('#nome_edit').val('');
    $('#id_empreendimentos_edit').val('');
});


$('.btn_edit_empreendimentos').click(function () {

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 8000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });

    var formData = new FormData($('.form_edit_empreendimentos')[0]);


    formData.append('id', $('#id_banner').val()); 

    formData.append('titulo', $('#titulo_edit').val()); 
    formData.append('localizacao', $('#localizacao_edit').val()); 
    formData.append('dormitorio', $('#dormitorio_edit').val()); 
    formData.append('id_categoria', $('#id_categoria_edit').val()); 
    formData.append('url_empreendimento', $('#url_empreendimento_edit').val()); 


    $.ajax({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        method: 'POST',
        url: '/admin/empreendimentos/edit_empreendimentos',
        data: formData,
        contentType: false,  
        processData: false, 
        dataType: 'json',
        beforeSend: function () {
        },
        success: function (data) {
            if (data.response == true) {

                $('#tabelaEmpreendimentos').DataTable().ajax.reload();

                Toast.fire({
                    icon: "success",
                    title: data.message
                });

                $('#ModalEditEmpreendimentos').modal('hide');

            } else {

                Toast.fire({
                    icon: "error",
                    title: data.message
                });

            }
        },
        error: function (xhr, tags, error) {

            Toast.fire({
                icon: "error",
                title: "Erro para editar"
            });
        },
        complete: function () {

        }
    });
});
