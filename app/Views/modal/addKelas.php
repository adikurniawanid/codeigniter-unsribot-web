<div class="modal fade" id="modalAddKelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data <?= $judul ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="<?= base_url('Admin/kelas') ?>">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label>Nama</label>
                        <input maxlength="18" autocomplete="off" class="form-control" required type="text" name="nama_param" placeholder="Masukkan Nama Kelas..." />
                    </div>
                    <div class="form-group">
                        <label>Nama Dosen</label>
                        <select class="custom-select" id="dosen_id_param" name="dosen_id_param" required>
                            <option value="">Pilih Dosen Pengajar</option>
                            <?php
                            foreach ($dosen_list as $row) : ?>
                                <option value="<?= $row['nip'] ?>"><?= $row['nama']  ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Mata Kuliah</label>
                        <select class="custom-select" id="mata_kuliah_id_param" name="mata_kuliah_id_param" required>
                            <option value="">Pilih Mata Kuliah</option>
                            <?php
                            foreach ($mata_kuliah_list as $row) :
                            ?>
                                <option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Hari</label>
                        <select class="custom-select" id="hari_param" name="hari_param" required>
                            <option value="">Pilih Hari</option>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jam</label>
                        <input maxlength="18" autocomplete="off" class="form-control" required type="time" name="jam_param" placeholder="Masukkan Jam..." />
                    </div>
                    <div class="form-group">
                        <label>Ruang</label>
                        <input maxlength="18" autocomplete="off" class="form-control" required type="text" name="ruang_param" placeholder="Masukkan Ruang Kelas..." />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" name="buttonModalAddKelas" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>