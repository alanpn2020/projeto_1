

$('#tabelaBanners tbody').on('click', '.btn-excluir-banners', function () {

    var row = $(this).closest('tr');
    var tabelaBanners = $('#tabelaBanners').DataTable().row(row).data();

    var id = tabelaBanners.id;

    Swal.fire({
        text: 'Deseja excluir esse banner? ',
        showCancelButton: true,
        confirmButtonText: 'Sim',
        cancelButtonText: 'Não',
        confirmButtonColor: '#1cbb8c',
        cancelButtonColor: '#ff3d60'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $.ajax({
                method: 'DELETE',
                url: 'banners/excluir',
                data: {
                    id: id
                },
                beforeSend: function () {

                },
                success: function (data) {

                    if (data.banners == true) {
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

                        $('#tabelaBanners').DataTable().ajax.reload();
                        Toast.fire({
                            icon: "success",
                            title: data.message
                        });

                        $('#ModalADDBanners').modal('hide');

                    }

                },
                error: function () {
                },
                complete: function () {
                }
            });
        }

    });



});





