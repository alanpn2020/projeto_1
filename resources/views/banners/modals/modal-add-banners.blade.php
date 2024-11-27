<div class="modal fade" id="ModalADDBanners" tabindex="-1" role="dialog" aria-labelledby="ModalADDBannersTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="ModalADDBannersTitle">Adicionar Banners</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="form_add_banners">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label" for="arquivos">Arquivos</label>
                                <input type="file" class="form-control" id="arquivos" name="arquivos[]" multiple>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="bttn-material-flat bttn-sm bttn-danger btn-w-100 mb-5 mt-2" data-bs-dismiss="modal">Fechar</button>
                    <button type="button"
                        class="bttn-material-flat bttn-sm bttn-success btn-w-100 mb-5 mt-2 btn_add_banners">SALVAR</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
