<div class="page-header">
  <h3>Pengajuan Baru</h3>
</div>
<?= validation_errors('<p style="color:red;">', '</p>'); ?>
<?php
if ($this->session->flashdata()) {
  echo "<div class='alert alert-danger alert-message'>";
  echo $this->session->flashdata('alert');
  echo "</div>";
} ?>
<form action="<?php echo base_url() . 'admin/tambah_pengajuan_act' ?>" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label>Nama Usaha</label>
    <input type="text" name="nama_usaha" class="form-control">
    <?php echo form_error('nama_usaha'); ?>
  </div>

  <div class="form-group">
    <label>Nama Pemilik</label>
    <input type="text" name="nama_pemilik" class="form-control">
  </div>

  <div class="form-group">
    <label>Angkatan</label>
    <select name="angkatan" class="form-control">
      <option value="2018/2019">2018/2019</option>
      <option value="2019/2020">2019/2020</option>
      <option value="2020/2021">2020/2021</option>
      <option value="2021/2022">2021/2022</option>
    </select>
    <?php echo form_error('angkatan'); ?>
  </div>

  <div class="form-group">
    <label>Program Studi</label>
    <select name="nama_prodi" class="form-control">
      <option value="D3 Manajemen Informatika Bisnis">D3 Manajemen Informatika Bisnis</option>
      <option value="D3 Komputerisasi Akuntansi">D3 Komputerisasi Akuntansi</option>
      <option value="D3 Teknik Informatika">D3 Teknik Informatika</option>
      <option value="S1 Teknik Informatika">S1 Teknik Informatika</option>
    </select>
    <?php echo form_error('nama_prodi'); ?>
  </div>

  <div class="form-group">
    <label>Kelas</label>
    <select name="jenis_kelas" class="form-control">
      <option value="Karyawan">Karyawan</option>
      <option value="Reguler">Reguler</option>
      <option value="Weekend">Weekend</option>
    </select>
    <?php echo form_error('jenis_kelas'); ?>
  </div>

  <div class="form-group">
    <label>Kategori</label>
    <select name="kategori" class="form-control">
      <option value="Makanan">Makanan</option>
      <option value="Pakaian">Pakaian</option>
      <option value="Jasa">Jasa</option>
    </select>
    <?php echo form_error('kategori'); ?>
  </div>

  <div class="form-group">
    <label>Status Pengajuan</label>
    <select name="status" class="form-control">
      <option value="2">Ditolak</option>
      <option value="1">Terverifikasi</option>
      <option value="0">Belum Terverifikasi</option>
    </select>
    <?php echo form_error('status'); ?>
  </div>

  <div class="form-group">
    <label>Status Ketua</label>
    <select name="status" class="form-control">
      <option value="2">Ditolak</option>
      <option value="1">Terverifikasi</option>
      <option value="0">Belum Terverifikasi</option>
    </select>
    <?php echo form_error('status'); ?>
  </div>

  <div class="form-group">
    <label>Proposal</label>
    <input type="file" name="foto" class="form-control">
  </div>

  <div class="form-group">
    <input type="submit" value="Simpan" class="btn btn-primary">
  </div>
  </div>
</form>