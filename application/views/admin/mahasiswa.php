<div class="page-header">
  <h3>Data mahasiswa</h3>
</div>
<a href="<?php echo base_url() . 'admin/tambah_mahasiswa'; ?>" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-plus"></span> mahasiswa Baru</a>
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
        <th>Pilihan</th>
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
          <td nowrap="nowrap">
            <a class="btn btn-primary btn-xs" href="<?php echo base_url() . 'admin/edit_mahasiswa/' . $a->id_mahasiswa; ?>"><span class="glyphicon glyphicon-zoom-in"></span></a>
            <a class="btn btn-warning btn-xs" href="<?php echo base_url() . 'admin/hapus_mahasiswa/' . $a->id_mahasiswa; ?>"><span class="glyphicon glyphicon-remove"></span></a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>