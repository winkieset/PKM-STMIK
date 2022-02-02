<div class="page-header">
  <h3>Detail Pengajuan</h3>
</div>
<?php foreach ($pengajuan as $p) { ?>
  <form action="<?php echo base_url() . 'admin/update_pengajuan' ?>" method="post" enctype="multipart/form-data">

    <div class="form-group">
      <label>Nama Usaha</label>
      <input type="hidden" name="id_pengajuan" value="<?php echo $p->id_pengajuan; ?>">
      <input type="text" name="nama_usaha" class="form-control" value="<?php echo $p->nama_usaha; ?>">
      <?php echo form_error('nama_usaha'); ?>
    </div>

    <div class="form-group">
      <label>Nama Pemilik</label>
      <input type="text" name="nama_pemilik" class="form-control" value="<?php echo $p->nama_pemilik; ?>">
      <?php echo form_error('nama_pemilik'); ?>
    </div>

    <div class="form-group">
      <label>Angkatan</label>
      <?php echo form_error('angkatan'); ?>
      <select name="angkatan" class="form-control" value="<?php echo $p->angkatan; ?>">
        <option <?php if ($p->angkatan == "2018/2019") {
                  echo "selected='selected'";
                }
                echo $p->angkatan; ?> value="2018/2019">2018/2019</option>
        <option <?php if ($p->angkatan == "2019/2020") {
                  echo "selected='selected'";
                }
                echo $p->angkatan; ?> value="2019/2020">2019/2020</option>
        <option <?php if ($p->angkatan == "2020/2021") {
                  echo "selected='selected'";
                }
                echo $p->angkatan; ?> value="2020/2021">2020/2021</option>
        <option <?php if ($p->angkatan == "2021/2022") {
                  echo "selected='selected'";
                }
                echo $p->angkatan; ?> value="2021/2022">2021/2022</option>
      </select>
      <?php echo form_error('angkatan'); ?>
    </div>

    <div class="form-group">
      <label>Program Studi</label>
      <?php echo form_error('nama_prodi'); ?>
      <select name="nama_prodi" class="form-control" value="<?php echo $p->nama_prodi; ?>">
        <option <?php if ($p->nama_prodi == "D3 Manajemen Informatika Bisnis") {
                  echo "selected='selected'";
                }
                echo $p->nama_prodi; ?> value="D3 Manajemen Informatika Bisnis">D3 Manajemen Informatika Bisnis</option>
        <option <?php if ($p->nama_prodi == "D3 Komputerisasi Akuntansi") {
                  echo "selected='selected'";
                }
                echo $p->nama_prodi; ?> value="D3 Komputerisasi Akuntansi">D3 Komputerisasi Akuntansi</option>
        <option <?php if ($p->nama_prodi == "D3 Teknik Informatika") {
                  echo "selected='selected'";
                }
                echo $p->nama_prodi; ?> value="D3 Teknik Informatika">D3 Teknik Informatika</option>
        <option <?php if ($p->nama_prodi == "S1 Teknik Informatika") {
                  echo "selected='selected'";
                }
                echo $p->nama_prodi; ?> value="S1 Teknik Informatika">S1 Teknik Informatika</option>
      </select>
      <?php echo form_error('nama_prodi'); ?>
    </div>

    <div class="form-group">
      <label>Kelas</label>
      <?php echo form_error('jenis_kelas'); ?>
      <select name="jenis_kelas" class="form-control" value="<?php echo $p->jenis_kelas; ?>">
        <option <?php if ($p->jenis_kelas == "Karyawan") {
                  echo "selected='selected'";
                }
                echo $p->jenis_kelas; ?> value="Karyawan">Karyawan</option>
        <option <?php if ($p->jenis_kelas == "Reguler") {
                  echo "selected='selected'";
                }
                echo $p->jenis_kelas; ?> value="Reguler">Reguler</option>
        <option <?php if ($p->jenis_kelas == "Weekend") {
                  echo "selected='selected'";
                }
                echo $p->jenis_kelas; ?> value="Weekend">Weekend</option>
      </select>
      <?php echo form_error('jenis_kelas'); ?>
    </div>


    <div class="form-group">
      <label>Kategori</label>
      <?php echo form_error('kategori'); ?>
      <select name="kategori" class="form-control" value="<?php echo $p->kategori; ?>">
        <option <?php if ($p->kategori == "Makanan") {
                  echo "selected='selected'";
                }
                echo $p->kategori; ?> value="Makanan">Makanan</option>
        <option <?php if ($p->kategori == "Pakaian") {
                  echo "selected='selected'";
                }
                echo $p->kategori; ?> value="Pakaian">Pakaian</option>
        <option <?php if ($p->kategori == "Jasa") {
                  echo "selected='selected'";
                }
                echo $p->kategori; ?> value="Jasa">Jasa</option>
      </select>
      <?php echo form_error('kategori'); ?>
    </div>

    <div class="form-group">
      <label>Tanggal Input</label>
      <input type="date" name="tgl_input" class="form-control" style="padding:0px 10px;" value="<?php echo $p->tgl_input; ?>">
      <?php echo form_error('tgl_input'); ?>
    </div>

    <div class="form-group">
      <label>Status</label>
      <select name="status" class="form-control">
        <option <?php if ($p->status == "2") {
                  echo "selected='selected'";
                }
                echo $p->status; ?> value="2">Ditolak</option>
        <option <?php if ($p->status == "1") {
                  echo "selected='selected'";
                }
                echo $p->status; ?> value="1">Terverifikasi</option>
        <option <?php if ($p->status == "0") {
                  echo "selected='selected'";
                }
                echo $p->status; ?> value="0">Belum Terverifikasi</option>
      </select>
      <?php echo form_error('status'); ?>
    </div>

    <div class="form-group">
      <label>Status Ketua</label>
      <select name="status_ketua" class="form-control">
        <option <?php if ($p->status_ketua == "2") {
                  echo "selected='selected'";
                }
                echo $p->status_ketua; ?> value="2">Ditolak</option>
        <option <?php if ($p->status_ketua == "1") {
                  echo "selected='selected'";
                }
                echo $p->status_ketua; ?> value="1">Terverifikasi</option>
        <option <?php if ($p->status_ketua == "0") {
                  echo "selected='selected'";
                }
                echo $p->status_ketua; ?> value="0">Belum Terverifikasi</option>
      </select>
      <?php echo form_error('status_ketua'); ?>
    </div>

    <a class="btn btn-default btn-md" target="_blank" href="<?php echo base_url('assets/') . 'upload/' . $p->proposal ?>">
      <span class="glyphicon glyphicon-print"></span>
      Print Proposal</a>

    <div class="form-group">
      <input type="submit" value="Update" class="btn btn-primary">
      <input type="button" value="Kembali" class="btn btn-danger" onclick="window.history.go(-1)">
    </div>
  </form>
<?php } ?>