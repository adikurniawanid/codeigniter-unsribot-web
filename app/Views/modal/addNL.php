<div class="modal fade" id="modalAddNL" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data NL</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="<?= base_url('Guest') ?>">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label>Kalimat Perintah atau Tanya</label>
                        <textarea autocomplete="off" class="form-control" type="text" name="nl_param" id="input_param" placeholder="Masukkan Kalimat Perintah atau Tanya dalam Bahasa Indonesia..." rows="5" autofocus><?= old('input_param'); ?></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" name="buttonAddNL" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>