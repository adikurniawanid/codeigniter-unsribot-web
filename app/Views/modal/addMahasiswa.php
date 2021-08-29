<div class="modal fade" id="modalAddMahasiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                        <label>NIM</label>
                        <input maxlength="14" autocomplete="off" class="form-control" required type="text" name="nim_param" placeholder="Masukkan NIM Mahasiswa..." />
                    </div>
                    <div class="form-group">
                        <label>Nama Mahasiswa</label>
                        <input maxlength="100" autocomplete="off" class="form-control" required type="text" name="nama_param" placeholder="Masukkan Nama Mahasiswa..." />
                    </div>
                    <div class="form-group">
                        <label>Jurusan</label>
                        <select class="custom-select" id="jurusan_param" name="jurusan_param" required>
                            <option value="">Pilih Jurusan</option>
                            <?php
                            foreach ($jurusan_list as $row) : ?>
                                <option value="<?= $row['kode'] ?>"><?= $row['jurusan'] . " - " . $row['fakultas'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tahun Angkatan</label>
                        <input maxlength="4" autocomplete="off" class="form-control" required type="year" name="tahun_angkatan_param" placeholder="Masukkan Tahun Angkatan..." />
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