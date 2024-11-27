

$('#tabelaEmpreendimentos tbody').on('click', '.btn-excluir-empreendimentos', function () {

    var row = $(this).closest('tr');
    var tabelaEmpreendimentos = $('#tabelaEmpreendimentos').DataTable().row(row).data();

    var id = tabelaEmpreendimentos.id;

    Swal.fire({
        text: 'Deseja excluir esse empreendimento? ',
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
                url: 'empreendimentos/excluir',
                data: {
                    id: id
                },
                beforeSend: function () {

                },
                success: function (data) {

                    if (data.response == true) {
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

                        $('#tabelaEmpreendimentos').DataTable().ajax.reload();
                        Toast.fire({
                            icon: "success",
                            title: data.message
                        });

                        $('#ModalADDEmpreendimentos').modal('hide');

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





