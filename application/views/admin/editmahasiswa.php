<div class="page-header">
  <h3>Edit mahasiswa</h3>
</div>
<?php foreach ($mahasiswa as $a) { ?>
  <form action="<?php echo base_url() . 'admin/update_mahasiswa' ?>" method="post" enctype="multipart/form-data">

    <div class="form-group">
      <label>Nama mahasiswa</label>
      <input type="hidden" name="id" value="<?php echo $a->id_mahasiswa; ?>">
      <input type="text" name="nama_mahasiswa" class="form-control" value="<?php echo $a->nama_mahasiswa; ?>">
      <?php echo form_error('nama_mahasiswa'); ?>
    </div>

    <div class="form-group">
      <label>Angkatan</label>
      <?php echo form_error('angkatan'); ?>
      <select name="angkatan" class="form-control" value="<?php echo $a->angkatan; ?>">
        <option <?php if ($a->angkatan == "2018/2019") {
                  echo "selected='selected'";
                }
                echo $a->angkatan; ?> value="2018/2019">2018/2019</option>
        <option <?php if ($a->angkatan == "2019/2020") {
                  echo "selected='selected'";
                }
                echo $a->angkatan; ?> value="2019/2020">2019/2020</option>
        <option <?php if ($a->angkatan == "2020/2021") {
                  echo "selected='selected'";
                }
                echo $a->angkatan; ?> value="2020/2021">2020/2021</option>
        <option <?php if ($a->angkatan == "2021/2022") {
                  echo "selected='selected'";
                }
                echo $a->angkatan; ?> value="2021/2022">2021/2022</option>
      </select>
      <?php echo form_error('angkatan'); ?>
    </div>

    <div class="form-group">
      <label>Program Studi</label>
      <?php echo form_error('nama_prodi'); ?>
      <select name="nama_prodi" class="form-control" value="<?php echo $a->nama_prodi; ?>">
        <option <?php if ($a->nama_prodi == "D3 Manajemen Informatika Bisnis") {
                  echo "selected='selected'";
                }
                echo $a->nama_prodi; ?> value="D3 Manajemen Informatika Bisnis">D3 Manajemen Informatika Bisnis</option>
        <option <?php if ($a->nama_prodi == "D3 Komputerisasi Akuntansi") {
                  echo "selected='selected'";
                }
                echo $a->nama_prodi; ?> value="D3 Komputerisasi Akuntansi">D3 Komputerisasi Akuntansi</option>
        <option <?php if ($a->nama_prodi == "D3 Teknik Informatika") {
                  echo "selected='selected'";
                }
                echo $a->nama_prodi; ?> value="D3 Teknik Informatika">D3 Teknik Informatika</option>
        <option <?php if ($a->nama_prodi == "S1 Teknik Informatika") {
                  echo "selected='selected'";
                }
                echo $a->nama_prodi; ?> value="S1 Teknik Informatika">S1 Teknik Informatika</option>
      </select>
      <?php echo form_error('nama_prodi'); ?>
    </div>

    <div class="form-group">
      <label>Kelas</label>
      <?php echo form_error('jenis_kelas'); ?>
      <select name="jenis_kelas" class="form-control" value="<?php echo $a->jenis_kelas; ?>">
        <option <?php if ($a->jenis_kelas == "Karyawan") {
                  echo "selected='selected'";
                }
                echo $a->jenis_kelas; ?> value="Karyawan">Karyawan</option>
        <option <?php if ($a->jenis_kelas == "Reguler") {
                  echo "selected='selected'";
                }
                echo $a->jenis_kelas; ?> value="Reguler">Reguler</option>
        <option <?php if ($a->jenis_kelas == "Weekend") {
                  echo "selected='selected'";
                }
                echo $a->jenis_kelas; ?> value="Weekend">Weekend</option>
      </select>
      <?php echo form_error('jenis_kelas'); ?>
    </div>

    <div class="form-group">
      <label>Gender</label>
      <select name="gender" class="form-control">
        <option <?php if ($a->gender == "Laki-Laki") {
                  echo "selected='selected'";
                }
                echo $a->gender; ?> value="Laki-Laki">Laki-Laki</option>
        <option <?php if ($a->gender == "Perempuan") {
                  echo "selected='selected'";
                }
                echo $a->gender; ?> value="Perempuan">Perempuan</option>
      </select>
      <?php echo form_error('gender'); ?>
    </div>

    <div class="form-group">
      <label>No.Telpon</label>
      <input type="text" name="no_telp" class="form-control" value="<?php echo $a->no_telp; ?>">
      <?php echo form_error('no_telp'); ?>
    </div>

    <div class="form-group">
      <label>Alamat</label>
      <input type="text" name="alamat" class="form-control" value="<?php echo $a->alamat; ?>">
      <?php echo form_error('alamat'); ?>
    </div>

    <div class="form-group">
      <label>Email</label>
      <input type="text" name="email" class="form-control" value="<?php echo $a->email; ?>">
      <?php echo form_error('email'); ?>
    </div>

    <div class="form-group">
      <label>Password</label>
      <input type="password" name="password" class="form-control" value="<?php echo $a->password; ?>">
      <?php echo form_error('password'); ?>
    </div>

    <div class="form-group">
      <input type="submit" value="Update" class="btn btn-default">
      <input type="button" value="Kembali" class="btn btn-primary" onclick="window.history.go(-1)">
    </div>
  </form>
<?php } ?>