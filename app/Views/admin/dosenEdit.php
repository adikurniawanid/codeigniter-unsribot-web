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
            <a href="<?= base_url('admin/dosen'); ?>" class="btn btn-primary btn-icon-split mb-3">
                <span class="icon text-white-50">
                    <i class=" fa fa-arrow-left"></i>
                </span>
                <span class="text">Kembali</span>
            </a>

            <!-- DataTales -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">NIP : <?= $dosen['nip']; ?></h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <?= view('validation/flashData') ?>
                        <form method="POST" enctype="multipart/form-data" action="<?php base_url('Admin/Dosen/' . $dosen['nip']) ?>">
                            <div class="col-12 row">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="PUT">
                                <!-- <div class="form-group">
                                    <label>NIP Dosen</label>
                                    <input autofocus maxlength="18" required autocomplete="off" class="form-control" type="hidden" name="nip_param" id="nip_param" value="<?= $dosen['nip'] ?>" />
                                </div> -->
                                <div class="form-group col-12">
                                    <label>Nama Dosen</label>
                                    <input autofocus required autocomplete="off" class="form-control" type="text" id="nama_param" name="nama_param" value="<?= $dosen['nama'] ?>" />
                                </div>
                                <div class="form-group">
                                    <input type="hidden" id="nip_param" name="nip_param" value="<?= $dosen['nip'] ?>" />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" onclick="return confirm('Apakah anda yakin menyimpan perubahan pada Dosen : <?= $dosen['nip']; ?> ?')" name="buttonEditDosen" class="btn btn-primary btn-icon-split"><span class="icon text-white-50">
                                        <i class=" fa fa-save"></i>
                                    </span>
                                    <span class="text">Simpan</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End of Data Table -->
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Edit Pertanyaan -->
<?= $this->endSection(); ?>