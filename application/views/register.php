<div class="page-header">
    <h3>Register</h3>
</div>
<?= validation_errors('<p style="color:red;">', '</p>'); ?>
<form action="<?php echo base_url() . 'welcome/tambah_mahasiswa_act' ?>" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label>Nama mahasiswa</label>
        <input type="text" name="nama_mahasiswa" class="form-control">
        <?php echo form_error('nama_mahasiswa'); ?>
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
        <label>Gender</label>
        <select name="gender" class="form-control">
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
        <?php echo form_error('gender'); ?>
    </div>

    <div class="form-group">
        <label>No.Telpon</label>
        <input type="text" name="no_telp" class="form-control">
    </div>

    <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control">
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" class="form-control">
    </div>

    <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" class="form-control">
    </div>

    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control">
    </div>

    <div class="form-group">
        <input type="submit" value="Register" class="btn btn-success btn-user btn-block">
    </div>
    <div class="form-group">
        <a class="btn btn-danger btn-user btn-block" href="<?php echo base_url() . 'admin'; ?>">Kembali</a>
    </div>
    </div>
</form>