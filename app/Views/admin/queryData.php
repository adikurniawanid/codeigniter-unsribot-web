<?php
echo $this->extend('/layout/template');
echo $this->section('content');

function arrayToTable($table)
{
    echo "<div class='table-responsive text-center'>";

    echo "<table class='table table-bordered table-hover' 
    id='toDataTable' width='100%' cellspacing='0'>";

    // Table header
    foreach ($table[0] as $key => $value) {
        echo "<th>" . $key . "</th>";
    }

    // Table body
    foreach ($table as $value) {
        echo "<tr>";
        foreach ($value as $element) {
            echo "<td>" . $element . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

    <!-- Validation -->
    <?= view('validation/flashData') ?>

    <!-- Content Row -->
    <form method="POST" enctype="multipart/form-data" action="<?= base_url('Admin/QueryData') ?>">
        <?= csrf_field(); ?>
        <div class="form-group">
            <textarea autocomplete="off" class="form-control" type="text" name="sql_param" id="sql_param" placeholder="Masukkan SQL Query..." rows="3" autofocus><?= old('sql_param'); ?></textarea>
        </div>
        <div>
            <button type="submit" name="buttonProsesQuery" class="btn btn-primary">Proses Query</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
    </form>
    <!-- Content Row -->
    <?php
    if (!empty($resultQuery)) {
        arrayToTable($resultQuery);
    }
    ?>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<?= $this->endSection(); ?>