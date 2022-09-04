<div class="modal fade" id="modalAddDosen" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data <?= $judul ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="<?= base_url('admin/dosen') ?>">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label>NIP</label>
                        <input maxlength="18" autocomplete="off" class="form-control" required type="text" name="nip_param" placeholder="Masukkan NIP..." />
                    </div>
                    <div class="form-group">
                        <label>Nama Dosen</label>
                        <input maxlength="100" autocomplete="off" class="form-control" required type="text" name="nama_param" placeholder="Masukkan Nama Dosen..." />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" name="buttonAddDosen" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>