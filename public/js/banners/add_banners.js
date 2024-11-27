$('.btn_add_banners').click(function () {

    var formData = new FormData($('.form_add_banners')[0]);


    // PARA ADICIONAR OUTROS 
    // formData.append('nome', 'valor'); 

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
        url: '/admin/banners/add_banners',
        data: formData,
        contentType: false,  
        processData: false, 
        dataType: 'json',
        beforeSend: function () {
        },
        success: function (data) {
            if (data.response == true) {

                $('#tabelaBanners').DataTable().ajax.reload();

                Toast.fire({
                    icon: "success",
                    title: data.message
                });

                $('#ModalADDBanners').modal('hide');

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
