<div class="page-header">
  <h3>Cetak Data Pengajuan</h3>
</div>
<a class="btn btn-default btn-md" target="_blank" href="<?php echo base_url() . 'ketua/laporan_print_pengajuan' ?>">
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
        <th>Angkatan</th>
        <th>Prodi</th>
        <th>Kelas</th>
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

          <td><?php echo $b->nama_usaha ?></td>
          <td><?php echo $b->nama_pemilik ?></td>
          <td><?php echo $b->angkatan ?></td>
          <td><?php echo $b->nama_prodi ?></td>
          <td><?php echo $b->jenis_kelas ?></td>
          <td><?php echo $b->kategori ?></td>
          <td><?php echo $b->tgl_input ?></td>
          <td><?php
              if ($b->status == "1") {
                echo "Terverifikasi";
              } else if ($b->status == "0") {
                echo "Belum Terverifikasi";
              } else if ($b->status == "2") {
                echo "Ditolak";
              }
              ?>

          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>