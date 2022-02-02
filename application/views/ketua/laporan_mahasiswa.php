<body class="bg-info">
  <div class="page-header">
    <h3>Data mahasiswa</h3>
  </div>
  <a class="btn btn-default btn-md" target="_blank" href="<?php echo base_url() . 'admin/laporan_print_mahasiswa' ?>">
    <span class="glyphicon glyphicon-print"></span>
    Print</a>
  <br><br>
  <div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama mahasiswa</th>
          <th>No.Telpon</th>
          <th>Alamat</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach ($mahasiswa as $a) {
        ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $a->nama_mahasiswa ?></td>
            <td><?php echo $a->no_telp ?></td>
            <td><?php echo $a->alamat ?></td>
            <td><?php echo $a->email ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</body>