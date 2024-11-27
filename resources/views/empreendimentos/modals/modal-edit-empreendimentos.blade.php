<div class="modal fade" id="ModalEditEmpreendimentos" tabindex="-1" role="dialog"
    aria-labelledby="ModalEditEmpreendimentosTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="ModalEditEmpreendimentosTitle">Editar Empreendimentos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


                <div class="modal-body">
                    <form class="form_edit_empreendimentos">
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="id_categoria">Categoria</label>
                                <select class="form-select" name="id_categoria" id="id_categoria_edit">
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">
                                            {{ $categoria->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="titulo">Titulo</label>
                                <input type="text" name="titulo" id="titulo_edit" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="url_empreendimento">URL Empreendimento</label>
                                <input type="text" name="url_empreendimento" id="url_empreendimento_edit"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="localizacao">Localização</label>
                                <input type="text" name="localizacao" id="localizacao_edit" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="dormitorio">Dormitório</label>
                                <input type="number" name="dormitorio" id="dormitorio_edit" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label" for="arquivos">Arquivos</label>
                                <input type="hidden" id="id_banner" name="id_banner">
                                <input type="file" class="form-control" id="edit_arquivos" name="arquivos">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="bttn-material-flat bttn-sm bttn-danger btn-w-100 mb-5 mt-2"
                        data-bs-dismiss="modal">Fechar</button>
                    <button type="button"
                        class="bttn-material-flat bttn-sm bttn-success btn-w-100 mb-5 mt-2 btn_edit_empreendimentos">Salvar</button>
                </div>
            </form>



        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
