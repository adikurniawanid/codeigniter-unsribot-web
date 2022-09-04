<div class="modal fade" id="modalAddMataKuliah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data <?= $judul ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="<?= base_url('Admin/Matakuliah') ?>">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label>Kode Mata Kuliah</label>
                        <input maxlength="9" autocomplete="off" class="form-control" required type="text" name="kode_mk_param" placeholder="Masukkan Kode..." />
                    </div>
                    <div class="form-group">
                        <label>Nama Mata Kuliah</label>
                        <input maxlength="100" autocomplete="off" class="form-control" required type="text" name="nama_mk_param" placeholder="Masukkan Nama Mata Kuliah..." />
                    </div>
                    <div class="form-group">
                        <label>Semester</label>
                        <input min="0" max="10" autocomplete="off" class="form-control" required type="number" name="semester_param" placeholder="Masukkan Semester..." />
                    </div>
                    <div class="form-group">
                        <label>Jurusan</label>
                        <select class="custom-select" id="jurusan_kode_param" name="jurusan_kode_param" required>
                            <option value="">Pilih Jurusan</option>
                            <?php
                            foreach ($jurusan_list as $row) : ?>
                                <option value="<?= $row['kode'] ?>"><?= $row['nama'] . " - " . $row['fakultas'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>SKS</label>
                        <input min="0" max="40" autocomplete="off" class="form-control" required type="number" name="sks_param" placeholder="Masukkan SKS..." />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" name="buttonAddMataKuliah" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>