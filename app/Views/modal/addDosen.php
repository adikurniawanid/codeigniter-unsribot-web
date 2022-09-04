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
                <form method="POST" enctype="multipart/form-data" action="<?= base_url('Admin/dosen') ?>">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label>NIP</label>
                        <input maxlength="18" autocomplete="off" class="form-control" required type="text" name="nip_param" placeholder="Masukkan NIP..." />
                    </div>
                    <div class="form-group">
                        <label>Nama Dosen</label>
                        <input maxlength="100" autocomplete="off" class="form-control" required type="text" name="nama_param" placeholder="Masukkan Nama Dosen..." />
                    </div>
                    <div class="form-group">
                        <label>Jurusan</label>
                        <select class="custom-select" id="jurusan_id_param" name="jurusan_id_param" required>
                            <option value="">Pilih Jurusan</option>
                            <?php
                            foreach ($jurusan_list as $row) :
                            ?>
                                <option value="<?= $row['id'] ?>"><?= $row['nama'] . " - " . $row['fakultas'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <label>Jenis Kelamin</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <div class="row">
                            <div class="col">
                                <input class="form-check-input" type="radio" name="jenis_kelamin_id_param" id="kunci_a" value="1" required>
                                <label class="form-check-label mr-4" for="kunci_a">
                                    Pria
                                </label>
                                <input class="form-check-input" type="radio" name="jenis_kelamin_id_param" id="kunci_b" value="2">
                                <label class="form-check-label mr-4" for="kunci_b">
                                    Wanita
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" name="buttonModalAddDosen" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>