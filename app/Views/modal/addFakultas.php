<div class="modal fade" id="modalAddFakultas" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data <?= $judul ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="<?= base_url('Admin/Kategori') ?>">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label>Kode Fakultas</label>
                        <input maxlength="2" autocomplete="off" class="form-control" required type="text" name="kode_param" placeholder="Masukkan Kode Fakultas..." />
                    </div>
                    <div class="form-group">
                        <label>Nama Fakultas</label>
                        <input maxlength="100" autocomplete="off" class="form-control" required type="text" name="nama_fakultas_param" placeholder="Masukkan Nama Fakultas..." />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" name="buttonAddKategori" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>