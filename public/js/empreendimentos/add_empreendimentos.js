$('.btn_add_empreendimentos').click(function () {

    var formData = new FormData($('.form_add_empreendimentos')[0]);


    // PARA ADICIONAR OUTROS 
    formData.append('titulo', $('#titulo').val()); 
    formData.append('localizacao', $('#localizacao').val()); 
    formData.append('dormitorio', $('#dormitorio').val()); 
    formData.append('id_categoria', $('#id_categoria').val()); 
    formData.append('url_empreendimento', $('#url_empreendimento').val()); 

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


    $.ajax({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        method: 'POST',
        url: '/admin/empreendimentos/add_empreendimentos',
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

                $('#ModalADDEmpreendimentos').modal('hide');

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
