<?php
echo $this->extend('/layout/template');
echo $this->section('content');
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
    <!-- Content Row -->
    <div class="row">
        <div class="col-6 text-justify">
            Natural Language to Structured Query Language (NL2SQL) merupakan
            suatu sistem yang mengubah pernyataan dalam bahasa alami menjadi query dalam
            bentuk Structured Query Language (SQL) untuk mengakses informasi yang
            tersimpan pada sistem manajemen basis data (Huang et al., 2021).
            <br>
            NL2SQL atau dahulu dikenal sebagai Text to SQL dapat dideskripsikan
            sebagai suatu sistem yang menerima masukan berupa Natural Language Query
            (NLQ) terhadap suatu Relational Database (RDB), dan menghasilkan suatu
            Structured Query Language (SQL) yang setara secara makna terhadap NLQ, dan
            valid untuk RDB tersebut (Katsogiannis-meimarakis & Koutrika, 2021).
        </div>
        <div class="col-6">
            <div class="row">
                <div class="col-xl-6 col-md-6 mb-4">
                    <a href="<?= base_url('data/mahasiswa'); ?>" class="text-decoration-none">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Jumlah Mahasiswa</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?= $data_list['jumlah_mahasiswa']; ?> Mahasiswa</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user-circle  fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-6 col-md-6 mb-4">
                    <a href="<?= base_url('data/dosen'); ?>" class="text-decoration-none">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Jumlah Dosen</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?= $data_list['jumlah_dosen']; ?> Dosen</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user-circle fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-md-6 mb-4">
                    <a href="<?= base_url('data/mata-kuliah'); ?>" class="text-decoration-none">

                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Jumlah Mata Kuliah</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data_list['jumlah_matakuliah'];
                                                                                            ?> Mata Kuliah</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-6 col-md-6 mb-4">
                    <a href="<?= base_url('data/jurusan'); ?>" class="text-decoration-none">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Jumlah Jurusan</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data_list['jumlah_jurusan'];
                                                                                            ?> Jurusan</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-layer-group fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Row -->

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<?= $this->endSection(); ?>