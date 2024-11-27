<div class="modal fade" id="ModalADDEmpreendimentos" tabindex="-1" role="dialog"
    aria-labelledby="ModalADDEmpreendimentosTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="ModalADDEmpreendimentosTitle">Adicionar Empreendimentos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


                <div class="modal-body">
                    <form class="form_add_empreendimentos">
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="id_categoria">Categoria</label>
                                <select class="form-select" name="id_categoria" id="id_categoria">
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
                                <input type="text" name="titulo" id="titulo" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="url_empreendimento">URL Empreendimento</label>
                                <input type="text" name="url_empreendimento" id="url_empreendimento" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="localizacao">Localização</label>
                                <input type="text" name="localizacao" id="localizacao" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="dormitorio">Dormitório</label>
                                <input type="number" name="dormitorio" id="dormitorio" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="arquivos">Arquivos</label>
                                <input type="file" class="form-control" id="arquivos" name="arquivos[]" multiple>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="bttn-material-flat bttn-sm bttn-danger btn-w-100 mb-5 mt-2"
                        data-bs-dismiss="modal">Fechar</button>
                    <button type="button"
                        class="bttn-material-flat bttn-sm bttn-success btn-w-100 mb-5 mt-2 btn_add_empreendimentos">SALVAR</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
