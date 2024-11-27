<div class="modal fade" id="ModalEditBanners" tabindex="-1" role="dialog" aria-labelledby="ModalEditBannersTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="ModalEditBannersTitle">Editar Banners</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="form_edit_banners">

                <div class="modal-body">
                    <div class="row">
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
                    <button type="button" class="bttn-material-flat bttn-sm bttn-danger btn-w-100 mb-5 mt-2" data-bs-dismiss="modal">Fechar</button>
                    <button type="button"
                        class="bttn-material-flat bttn-sm bttn-success btn-w-100 mb-5 mt-2 btn_edit_banners">Salvar</button>
                </div>
            </form>



        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
