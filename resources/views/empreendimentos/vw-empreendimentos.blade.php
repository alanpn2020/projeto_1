<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Empreendimentos') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <button class="bttn-material-flat bttn-sm bttn-success btn-w-100 mb-5 mt-2" data-bs-toggle="modal" data-bs-target="#ModalADDEmpreendimentos">ADICIONAR</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <table id="tabelaEmpreendimentos" class="display nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <input type="checkbox" class="check-all_database" value="1">
                                                </th>
                                                <th>Código</th>
                                                <th>Nome</th>
                                                <th>Imagem</th>
                                                <th>Categoria</th>
                                                <th>Localização</th>
                                                <th>Link Empreendimento</th>
                                                <th>Título</th>
                                                <th>Dormitório</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->

                </div>
            </div>
        </div>
    </div>
    <!-- end main content-->
    </div>


    @include('empreendimentos.modals.modal-edit-empreendimentos');
    @include('empreendimentos.modals.modal-add-empreendimentos');
</x-app-layout>


@hasSection('page_empreendimentos')
    @yield('page_empreendimentos')
@endif
