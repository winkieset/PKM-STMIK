<body class="bg-info">


  <div class="page-header">
    <h3>Data mahasiswa</h3>
  </div>
  <br><br>
  <div class="table-responsive">
    <table class="table table-bordered table-striped table-hover" id="table-datatable">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama mahasiswa</th>
          <th>Angkatan</th>
          <th>Prodi</th>
          <th>Kelas</th>
          <th>Gender</th>
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
            <td><?php echo $a->angkatan ?></td>
            <td><?php echo $a->nama_prodi ?></td>
            <td><?php echo $a->jenis_kelas ?></td>
            <td><?php echo $a->gender ?></td>
            <td><?php echo $a->no_telp ?></td>
            <td><?php echo $a->alamat ?></td>
            <td><?php echo $a->email ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</body>