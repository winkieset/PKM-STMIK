<!DOCTYPE html>
<html>

<head>
  <title></title>
</head>

<body>
  <style type="text/css">
    .table-data {
      width: 100%;
      border-collapse: collapse;
    }

    .table-data tr th,
    .table-data tr td {
      border: 1px solid black;
      font-size: 10pt;
    }
  </style>

  <h3>Laporan Data Pengajuan PKM STMIK</h3>
  <br />
  <table class="table-data">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Usaha</th>
        <th>Nama Pemilik</th>
        <th>Kategori</th>
        <th>Tanggal Input</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      foreach ($pengajuan as $b) {
      ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $b->nama_usaha; ?></td>
          <td><?php echo $b->nama_pemilik; ?></td>
          <td><?php echo $b->kategori; ?></td>
          <td><?php echo $b->tgl_input; ?></td>
          <td><?php
              if ($b->status == "1") {
                echo "Terverifikasi";
              } else if ($b->status == "0") {
                echo "Belum Terverifikasi";
              }
              ?></td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>

  <script type="text/javascript">
    window.print();
  </script>

</body>

</html>