<div class="modal fade" id="modalAddJurusan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                        <label>Kode Jurusan</label>
                        <input maxlength="4" autocomplete="off" class="form-control" required type="text" name="kode_param" placeholder="Masukkan Kode Jurusan..." />
                    </div>
                    <div class="form-group">
                        <label>Nama Jurusan</label>
                        <input maxlength="100" autocomplete="off" class="form-control" required type="text" name="nama_jurusan_param" placeholder="Masukkan Nama Jurusan..." />
                    </div>
                    <div class="form-group">
                        <label>Fakultas</label>
                        <select class="custom-select" id="jurusan_param" name="jurusan_param" required>
                            <option value="">Pilih Fakultas</option>
                            <?php
                            foreach ($fakultas_list as $row) : ?>
                                <option value="<?= $row['kode'] ?>"><?= $row['nama'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>SKS</label>
                        <input min="0" max="40" autocomplete="off" class="form-control" required type="number" name="sks_param" placeholder="Masukkan SKS..." />
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