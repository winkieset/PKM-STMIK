<div class="page-header">
  <h3>Data Pengajuan</h3>
</div>
<a href="<?php echo base_url() . 'admin/tambah_pengajuan'; ?>" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-plus"></span> Pengajuan Baru</a>
<br><br>
<div class="table-responsive">
  <table class="table table-bordered table-striped table-hover" id="table-datatable">
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
        <th>Status Ketua</th>
        <th>Aksi</th>
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
          <td><?php echo $p->angkatan ?></td>
          <td><?php echo $p->nama_prodi ?></td>
          <td><?php echo $p->jenis_kelas ?></td>
          <td><?php echo $p->kategori ?></td>
          <td><?php echo $p->tgl_input ?></td>
          <td>
            <?php
            if ($p->status == "2") {
              echo "Ditolak";
            } else if ($p->status == "1") {
              echo "Terverifikasi";
            } else if ($p->status == "0") {
              echo "Belum Terfverifikasi";
            }
            ?>
          </td>
          <td>
            <?php
            if ($p->status == "2") {
              echo "Ditolak";
            } else if ($p->status == "1") {
              echo "Terverifikasi";
            } else if ($p->status == "0") {
              echo "Belum Terfverifikasi";
            }
            ?>
          </td>
          <td nowrap="nowrap">
            <a class="btn btn-primary btn-xs" href="<?php echo base_url() . 'admin/edit_pengajuan/' . $p->id_pengajuan; ?>"><span class="glyphicon glyphicon-zoom-in"></span></a>
            <a class="btn btn-warning btn-xs" href="<?php echo base_url() . 'admin/hapus_pengajuan/' . $p->id_pengajuan; ?>"><span class="glyphicon glyphicon-remove"></span></a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>