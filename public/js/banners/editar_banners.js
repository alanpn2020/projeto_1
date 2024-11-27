$('#tabelaBanners tbody').on('click', '.btn-editar-banners', function () {

    var row = $(this).closest('tr');
    var tabelaBanners = $('#tabelaBanners').DataTable().row(row).data();

    $("#ModalEditBanners").on("show.bs.modal", function () {
        $('#id_banner').val(tabelaBanners.id);

    });
    new bootstrap.Modal(document.getElementById('ModalEditBanners')).show();


});

$("#ModalEditBanners").on("hidden.bs.modal", function () {
    $('#nome_edit').val('');
    $('#id_banners_edit').val('');
});


$('.btn_edit_banners').click(function () {

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

    var formData = new FormData($('.form_edit_banners')[0]);


    formData.append('id', $('#id_banner').val()); 


    $.ajax({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        method: 'POST',
        url: '/admin/banners/edit_banners',
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

                $('#ModalEditBanners').modal('hide');

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
