<div class="modal fade" id="modalAddKhs" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data <?= $judul ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="<?= base_url('Admin/khs') ?>">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label>Mahasiswa</label>
                        <select class="custom-select" id="mahasiswa_param" name="mahasiswa_param" required>
                            <option value="">Pilih Mahasiswa</option>
                            <?php
                            foreach ($mahasiswa_list as $row) : ?>
                                <option value="<?= $row['nim'] ?>"><?= $row['nama']  ?></option>
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
                        <label>Rata Tugas</label>
                        <input min="0" max="100" autocomplete="off" class="form-control" required type="number" step="1" name="rata_tugas_param" placeholder="Masukkan Rata Tugas..." />
                    </div>
                    <div class="form-group">
                        <label>Nilai UTS</label>
                        <input min="0" max="100" autocomplete="off" class="form-control" required type="number" step="1" name="uts_param" placeholder="Masukkan Nilai UTS..." />
                    </div>
                    <div class="form-group">
                        <label>Nilai UAS</label>
                        <input min="0" max="100" autocomplete="off" class="form-control" required type="number" step="1" name="uas_param" placeholder="Masukkan Nilai UAS..." />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" name="buttonModalAddKhs" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>