<?php
defined('BASEPATH') or exit('NO Direct Script Access Allowed');

class Member extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		// cek login
		if ($this->session->userdata('status') != "login") {
			$alert = $this->session->set_flashdata('alert', 'Anda belum Login');
			redirect(base_url());
		}
	}

	function index()
	{
		$data['mahasiswa'] = $this->M_perpus->get_data('mahasiswa')->result();
		$data['pengajuan'] = $this->M_perpus->get_data('pengajuan')->result();
		$data['header'] = 'Pengajuan';
		$this->load->view('daftarpengajuan', $data);
	}

	function tambah_pengajuan()
	{
		$data['pengajuan'] = $this->M_perpus->get_data('pengajuan')->result();
		$this->load->view('desain');
		$this->load->view('toplayout');
		$this->load->view('tambahpengajuan', $data);
	}

	function pengajuan()
	{
		$data['pengajuan'] = $this->M_perpus->get_data('pengajuan')->result();
		$this->load->view('desain');
		$this->load->view('toplayout');
		$this->load->view('pengajuan', $data);
	}

	function tambah_pengajuan_act()
	{
		$tgl_input = date('Y-m-d');
		$nama_usaha = $this->input->post('nama_usaha');
		$nama_pemilik = $this->input->post('nama_pemilik');
		$angkatan = $this->input->post('angkatan');
		$nama_prodi = $this->input->post('nama_prodi');
		$jenis_kelas = $this->input->post('jenis_kelas');
		$kategori = $this->input->post('kategori');
		$status = $this->input->post('status');
		$this->form_validation->set_rules('nama_usaha', 'Nama Usaha', 'required');
		$this->form_validation->set_rules('angkatan', 'Angkatan', 'required');
		$this->form_validation->set_rules('nama_prodi', 'Nama Prodi', 'required');
		$this->form_validation->set_rules('jenis_kelas', 'Jenis Kelas', 'required');
		$this->form_validation->set_rules('status', 'Status pengajuan', 'required');
		if ($this->form_validation->run() != false) {
			//configurasi upload Gambar
			$config['upload_path'] = './assets/upload/';
			$config['allowed_types'] = 'pdf';
			$config['max_size'] = '20000';
			$config['file_name'] = 'proposal' . time();

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('foto')) {
				$proposal = $this->upload->data();

				$data = array(
					'nama_usaha' => $nama_usaha,
					'nama_pemilik' => $nama_pemilik,
					'angkatan' => $angkatan,
					'nama_prodi' => $nama_prodi,
					'jenis_kelas' => $jenis_kelas,
					'kategori' => $kategori,
					'proposal' => $proposal['file_name'],
					'tgl_input' => $tgl_input,
					'status' => $status
				);
				$this->M_perpus->insert_data($data, 'pengajuan');
				redirect(base_url() . 'member/index');
			} else {
				$this->load->view('desain');
				$this->load->view('toplayout');
				$this->load->view('tambahpengajuan');
			}
		}
	}
}
