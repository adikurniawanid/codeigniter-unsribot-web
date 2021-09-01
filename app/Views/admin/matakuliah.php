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
            <a data-toggle="modal" data-target="#modalAddMataKuliah" class="btn btn-primary btn-icon-split mb-3">
                <span class="icon text-white-50">
                    <i class="fa fa-plus"></i>
                </span>
                <span class="text">Tambah Data</span>
            </a>

            <!-- DataTales -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?= "Tabel Data " . $judul; ?></h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="toDataTable" width="100%" cellspacing="0">
                            <thead class="text-center">
                                <tr>
                                    <th class="col-1">No</th>
                                    <th class="col-1">Kode</th>
                                    <th>Nama Mata Kuliah</th>
                                    <th class="col-1">Semester</th>
                                    <th class="col-1">SKS</th>
                                    <th>Jurusan</thclass=>
                                    <th class="col-2">Aksi</th>
                                </tr>
                            </thead>
                            <tfoot class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Kode MK</th>
                                    <th>Nama MK</th>
                                    <th>Semester</th>
                                    <th>SKS</th>
                                    <th>Jurusan</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($mata_kuliah_list as $key) :
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $no; ?></td>
                                        <td class="text-center"><?= $key['kode']; ?></td>
                                        <td><?= $key['mata_kuliah']; ?></td>
                                        <td class="text-center"><?= $key['semester']; ?></td>
                                        <td class="text-center"><?= $key['sks']; ?></td>
                                        <td class="text-center"><?= $key['jurusan'] ?></td>
                                        <td class="text-center">
                                            <form action="/Admin/Kategori/<? //= $key['id']; 
                                                                            ?>" method="POST" class="d-inline">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="PUT">
                                                <input type="hidden" name="id" value="<? //= $key['id']; 
                                                                                        ?>">
                                                <button type="submit" class="btn btn-success btn-sm" id="btn-edit-kategori" title="Edit"><i class="fas fa-edit "></i></button>
                                            </form>
                                            <form action="/Admin/Matakuliah/<?= $key['kode']; ?>" method="POST" class="d-inline">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Apakah anda yakin ingin menghapus matakuliah <?= $key['kode']; ?> ?')"><i class="fas fa-trash "></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php
                                    $no++;
                                endforeach
                                ?>
                            </tbody>
                        </table>
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

<!-- Modal Add Kategori -->
<?= view('modal/addMataKuliah') ?>

<?= $this->endSection(); ?>