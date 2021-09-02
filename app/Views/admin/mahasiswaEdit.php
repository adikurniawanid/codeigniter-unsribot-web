<?php
echo $this->extend('/layout/template');
echo $this->section('content');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

    <!-- Validation -->
    <?= view('validation/flashData') ?>

    <div class="card border-left-primary">
        <div class="card-body">
            <a href="<?= base_url('Admin/Mahasiswa'); ?>" class="btn btn-primary btn-icon-split mb-3">
                <span class="icon text-white-50">
                    <i class=" fa fa-arrow-left"></i>
                </span>
                <span class="text">Kembali</span>
            </a>

            <!-- DataTales -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?= "NIM : " . $mahasiswa['nim']; ?></h6>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="<?php base_url('Admin/Mahasiswa/' . $mahasiswa['nim']) ?>">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="PUT">
                        <!-- <div class="form-group"> -->
                        <!-- <label>NIM</label> -->
                        <input value="<?= $mahasiswa['nim']; ?>" maxlength="14" autocomplete="off" class="form-control" required type="hidden" name="nim_param" placeholder="Masukkan NIM..." />
                        <!-- </div> -->
                        <div class="form-group">
                            <label>Nama Mahasiswa</label>
                            <input autofocus value="<?= $mahasiswa['nama']; ?>" maxlength="100" autocomplete="off" class="form-control" required type="text" name="nama_param" placeholder="Masukkan Nama Mahasiswa..." />
                        </div>
                        <div class="form-group">
                            <label>Jurusan</label>
                            <?php $selectedJurusan = $mahasiswa['jurusan_kode']; ?>
                            <select class="custom-select" id="jurusan_id_param" name="jurusan_id_param" required>
                                <option value="">Pilih Jurusan</option>
                                <?php
                                foreach ($jurusan_list as $row) : ?>
                                    <option <?= $row['kode'] == $selectedJurusan ? "selected='selected'" : ""; ?> value="<?= $row['kode'] ?>"><?= $row['jurusan'] . " - " . $row['fakultas'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tahun Angkatan</label>
                            <input value="<?= $mahasiswa['angkatan']; ?>" maxlength="4" autocomplete="off" class="form-control" required type="year" name="tahun_angkatan_param" placeholder="Masukkan Tahun Angkatan..." />
                        </div>
                        <label>Jenis Kelamin</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <div class="row">
                                <?php $checkedJenisKelamin = $mahasiswa['jenis_kelamin_id']; ?>
                                <div class="col" checked="<?= $checkedJenisKelamin ?>">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin_id_param" id="kunci_a" value="1" required <?= ($checkedJenisKelamin == '1') ?  "checked" : "";  ?>>
                                    <label class="form-check-label mr-4" for="kunci_a">
                                        Pria
                                    </label>
                                    <input class="form-check-input" type="radio" name="jenis_kelamin_id_param" id="kunci_b" value="2" <?= ($checkedJenisKelamin == '2') ?  "checked" : "";  ?>>
                                    <label class="form-check-label mr-4" for="kunci_b">
                                        Wanita
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" name="buttonEditMahasiswa" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End of Data Table -->
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?= $this->endSection(); ?>