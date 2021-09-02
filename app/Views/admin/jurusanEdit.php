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
            <a href="<?= base_url('Admin/Jurusan'); ?>" class="btn btn-primary btn-icon-split mb-3">
                <span class="icon text-white-50">
                    <i class=" fa fa-arrow-left"></i>
                </span>
                <span class="text">Kembali</span>
            </a>

            <!-- DataTales -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?= "Kode Jurusan " . $jurusan['kode']; ?></h6>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="<?php base_url('Admin/Jurusan/' . $jurusan['kode']) ?>">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="PUT">
                        <input value="<?= $jurusan['kode']; ?>" maxlength="4" autocomplete="off" class="form-control" required type="hidden" name="kode_jurusan_param" placeholder="Masukkan Kode Jurusan..." />
                        <div class="form-group">
                            <label>Nama Jurusan</label>
                            <input value="<?= $jurusan['nama']; ?>" maxlength="100" autocomplete="off" class="form-control" required type="text" name="nama_jurusan_param" placeholder="Masukkan Nama Jurusan..." />
                        </div>
                        <div class="form-group">
                            <label>Fakultas</label>
                            <select class="custom-select" id="fakultas_kode_param" name="fakultas_kode_param" required>
                                <option value="">Pilih Fakultas</option>
                                <?php $selectedFakultas = $jurusan['fakultas_kode']; ?>
                                <?php
                                foreach ($fakultas_list as $row) : ?>
                                    <option <?= $row['kode'] == $selectedFakultas ? "selected='selected'" : ""; ?> value="<?= $row['kode'] ?>"><?= $row['nama'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" name="buttonEditJurusan" class="btn btn-primary">Simpan</button>
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

<!-- Modal Add Kategori -->
<?= $this->endSection(); ?>