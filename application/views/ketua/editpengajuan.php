<div class="page-header">
  <h3>Detail Pengajuan</h3>
</div>
<?php foreach ($pengajuan as $p) { ?>
  <form action="<?php echo base_url() . 'ketua/update_pengajuan' ?>" method="post" enctype="multipart/form-data">

    <div class="form-group">
      <label>Nama Usaha</label>
      <input type="hidden" name="id" value="<?php echo $p->id_pengajuan; ?>">
      <input type="text" name="nama_usaha" class="form-control" value="<?php echo $p->nama_usaha; ?>">
      <?php echo form_error('nama_usaha'); ?>
    </div>

    <div class="form-group">
      <label>Nama Pemilik</label>
      <input type="text" name="nama_pemilik" class="form-control" value="<?php echo $p->nama_pemilik; ?>">
      <?php echo form_error('nama_pemilik'); ?>
    </div>

    <div class="form-group">
      <label>Kategori</label>
      <input type="text" name="kategori" class="form-control" value="<?php echo $p->kategori; ?>">
      <?php echo form_error('kategori'); ?>
    </div>

    <div class="form-group">
      <label>Tanggal Input</label>
      <input type="date" name="tgl_input" class="form-control" style="padding:0px 10px;" value="<?php echo $p->tgl_input; ?>">
      <?php echo form_error('thn_terbit'); ?>
    </div>

    <a class="btn btn-default btn-md" href="<?php echo base_url('assets/') . 'upload/' . $p->proposal ?>">
      <span class="glyphicon glyphicon-print"></span>
      Print</a>


    <div class="form-group">
      <input type="button" value="Kembali" class="btn btn-danger" onclick="window.history.go(-1)">
    </div>
  </form>
<?php } ?>