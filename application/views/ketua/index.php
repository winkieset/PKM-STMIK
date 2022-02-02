<div class="page-header">
  <h3>Dashboard</h3>
</div>
<div class="row">
  <div class="col-lg-3 col-md-6">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-3">
            <i class="glyphicon glyphiconfolder-open"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div class="huge">
              <font size="18"><b><?php echo $this->M_perpus->get_data('pengajuan')->num_rows(); ?></b></font>
            </div>
            <div><b>Jumlah Pengajuan</b></div>
          </div>
        </div>
      </div>
      <a href="<?php echo base_url() . 'ketua/pengajuan' ?>">
        <div class="panel-footer">
          <span class="pull-left">View Details</span>
          <span class="pull-right"><i class="glyphicon glyphicon-arrow-right"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
    </div>
  </div>

  <div class="col-lg-3 col-md-6">
    <div class="panel panel-success">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-3">
            <i class="glyphicon glyphiconuser"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div class="huge">
              <font size="18"><b><?php echo $this->M_perpus->get_data('mahasiswa')->num_rows(); ?></b></font>
            </div>
            <div><b>Jumlah mahasiswa yang terdaftar</b></div>
          </div>
        </div>
      </div>
      <a href="<?php echo base_url() . 'ketua/mahasiswa' ?>">
        <div class="panel-footer">
          <span class="pull-left">View Details</span>
          <span class="pull-right"><i class="glyphicon glyphicon-arrow-right"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
    </div>
  </div>

  <div class="col-lg-3 col-md-6">
    <div class="panel panel-warning">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-3">
            <i class="glyphicon glyphiconsort"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div class="huge">
              <font size="18"><b><?php echo $this->M_perpus->edit_data(array('status' => 1), 'pengajuan')->num_rows(); ?></b></font>
            </div>
            <div><b>Pengajuan Sudah Verfikasi</b></div>
          </div>
        </div>
      </div>
      <a href="<?php echo base_url() . 'ketua/pengajuan_sudah_verif' ?>">
        <div class="panel-footer">
          <span class="pull-left">View Details</span>
          <span class="pull-right"><i class="glyphicon glyphicon-arrow-right"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
    </div>
  </div>

  <div class="col-lg-3 col-md-6">
    <div class="panel panel-danger">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-3">
            <i class="glyphicon glyphiconok"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div class="huge">
              <font size="18"><b><?php echo $this->M_perpus->edit_data(array('status' => '0'), 'pengajuan')->num_rows(); ?></b></font>
            </div>
            <div><b>Pengajuan Belum Verifikasi</b></div>
          </div>
        </div>
      </div>
      <a href="<?php echo base_url() . 'ketua/pengajuan_belum_verif' ?>">
        <div class="panel-footer">
          <span class="pull-left">View Details</span>
          <span class="pull-right"><i class="glyphicon glyphicon-arrow-right"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
    </div>
  </div>
</div>

<hr>

<div class="row">
  <div class="col-lg-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title" style="font-size:18px;font-weight:bold;"><i class="glyphicon glyphicon-random arrow-right"></i> Pengajuan</h3>
      </div>
      <div class="panel-body">
        <div class="list-group">
          <?php foreach ($pengajuan as $p) { ?>
            <a href="#" class="list-group-item">
              <span class="badge"><?php if ($p->status == 1) {
                                    echo "Terverifikasi";
                                  } else {
                                    echo "Belum Terverifikasi";
                                  } ?></span>
              <i class="glyphicon glyphiconuser"></i><?php echo $p->nama_usaha; ?>
            </a>
          <?php } ?>
        </div>
        <div class="text-right">
          <a href="<?php echo base_url() . 'ketua/pengajuan' ?>">Lihat Semua Pengajuan <i class="glyphicon glyphicon-arrow-right"></i></a>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-3">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title" style="font-size:18px;font-weight:bold;"><i class="glyphicon glyphicon-user o"></i>mahasiswa Terbaru</h3>
      </div>
      <div class="panel-body">
        <div class="list-group">
          <?php foreach ($mahasiswa as $a) { ?>
            <a href="#" class="list-group-item">
              <span class="badge"><?php echo $a->gender; ?></span>
              <i class="glyphicon glyphiconuser"></i><?php echo $a->nama_mahasiswa; ?>
            </a>
          <?php } ?>
        </div>
        <div class="text-right">
          <a href="<?php echo base_url() . 'ketua/mahasiswa' ?>"> Lihat Semua mahasiswa <i class="glyphicon glyphicon-arrow-right"></i></a>
        </div>
      </div>
    </div>
  </div>

  <!-- /.row -->
</div>