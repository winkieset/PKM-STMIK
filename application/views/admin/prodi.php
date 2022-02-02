<div class="page-header">
    <h3>Data Program Studi</h3>
</div>
<br><br>
<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover" id="table-datatable">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama mahasiswa</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($prodi as $a) {
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $a->nama_prodi ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>