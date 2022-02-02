<html lang="en">

<head>
	<title>Dashboard | mahasiswa</title>
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css" />
	<script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.js'; ?>"></script>
	<script type="text/javascript" src="<?php echo base_url() . 'assets/js/bootstrap.js'; ?>"></script>
</head>

<body>
	<div><?php $this->load->view('toplayout') ?></div>
	<?php if ($this->session->flashdata()) {
		echo "<div class='alert alert-danger alert-primary'>";
		echo $this->session->flashdata('alert');
		echo "</div>";
	} ?>
	<div class="jumbotron">
		<div class="container">
			<h1 class="display-4">Halo <a href="#">
					<b><?= $this->session->userdata('nama_agt') ?>!</b>
				</a></h1>
			<p class="lead">Apakah kamu sudah mengajukan proposal PKM ?</p>
			<p>Segera daftarkan dan jadilah enterpreneur</p>
			<a class="btn btn-primary btn-lg" href="<?php echo base_url() . 'member/tambah_pengajuan' ?>" role="button">Daftar Disini</a>
		</div>
	</div>
	<div class="container">
		<h1 class="display-4">Lihat Data PKM</h1>
		<p class="lead">Hasil pengajuan PKM ada disini</p>
		<a class="btn btn-primary btn-lg" href="<?php echo base_url() . 'member/pengajuan' ?>" role="button">Lihat Hasil</a>
	</div>
	<script type="text/javascript">
		$('.alert-message').alert().delay(3000).slideUp('slow');
	</script>
</body>

</html>