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
            <a href="<?= base_url('Admin/Matakuliah'); ?>" class="btn btn-primary btn-icon-split mb-3">
                <span class="icon text-white-50">
                    <i class=" fa fa-arrow-left"></i>
                </span>
                <span class="text">Kembali</span>
            </a>

            <!-- DataTales -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?= "Kode Mata Kuliah : " . $mata_kuliah['kode']; ?></h6>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="<?php base_url('Admin/Matakuliah/' . $mata_kuliah['kode']) ?>">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="PUT">
                        <!-- <div class="form-group"> -->
                        <!-- <label>Kode Mata Kuliah</label> -->
                        <input maxlength="9" autocomplete="off" class="form-control" required value="<?= $mata_kuliah['kode'] ?>" type="hidden" name="kode_mk_param" placeholder="Masukkan Kode..." />
                        <!-- </div> -->
                        <div class="form-group">
                            <label>Nama Mata Kuliah</label>
                            <input autofocus value="<?= $mata_kuliah['nama'] ?>" maxlength="100" autocomplete="off" class="form-control" required type="text" name="nama_mk_param" placeholder="Masukkan Nama Mata Kuliah..." />
                        </div>
                        <div class="form-group">
                            <label>Semester</label>
                            <input value="<?= $mata_kuliah['semester'] ?>" min="0" max="10" autocomplete="off" class="form-control" required type="number" name="semester_param" placeholder="Masukkan Semester..." />
                        </div>
                        <div class="form-group">
                            <label>Jurusan</label>
                            <?php $selectedJurusan = $mata_kuliah['jurusan']; ?>
                            <select class="custom-select" id="jurusan_id_param" name="jurusan_id_param" required>
                                <option value="">Pilih Jurusan</option>
                                <?php
                                foreach ($jurusan_list as $row) : ?>
                                    <option <?= $row['nama'] == $selectedJurusan ? "selected='selected'" : ""; ?> value="<?= $row['kode'] ?>"><?= $row['nama'] . " - " . $row['fakultas'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>SKS</label>
                            <input value="<?= $mata_kuliah['sks'] ?>" min="0" max="40" autocomplete="off" class="form-control" required type="number" name="sks_param" placeholder="Masukkan SKS..." />
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" name="buttonEditMataKuliah" class="btn btn-primary">Simpan</button>
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