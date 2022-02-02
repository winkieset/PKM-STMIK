<div class="page-header">
  <h3>Cetak Data Pengajuan</h3>
</div>
<a class="btn btn-default btn-md" target="_blank" href="<?php echo base_url() . 'admin/laporan_print_pengajuan' ?>">
  <span class="glyphicon glyphicon-print"></span>
  Print</a>
<br><br>
<div class="table-responsive">
  <table class="table table-bordered table-striped table-hover">
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
      foreach ($pengajuan as $p) {
      ?>
        <tr>
          <td><?php echo $no++; ?></td>

          <td><?php echo $p->nama_usaha ?></td>
          <td><?php echo $p->nama_pemilik ?></td>
          <td><?php echo $p->kategori ?></td>
          <td><?php echo $p->tgl_input ?></td>
          <td><?php
              if ($p->status == "1") {
                echo "Terverifikasi";
              } else if ($p->status == "0") {
                echo "Belum Terverifikasi";
              } else if ($p->status == "2") {
                echo "Ditolak";
              }
              ?>

          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>