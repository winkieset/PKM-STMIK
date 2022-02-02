<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('navbar');
		$this->load->view('home');
	}

	public function loginpage()
	{
		$this->load->view('navbar');
		$this->load->view('login');
	}

	function tambah_mahasiswa()
	{
		$this->load->view('navbar');
		$this->load->view('register');
	}

	function tambah_mahasiswa_act()
	{
		$nama_mahasiswa = $this->input->post('nama_mahasiswa');
		$angkatan = $this->input->post('angkatan');
		$nama_prodi = $this->input->post('nama_prodi');
		$jenis_kelas = $this->input->post('jenis_kelas');
		$gender = $this->input->post('gender');
		$no_telp = $this->input->post('no_telp');
		$alamat = $this->input->post('alamat');
		$email = $this->input->post('email');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$password = md5($password);
		$this->form_validation->set_rules('nama_mahasiswa', 'Nama mahasiswa', 'required');
		$this->form_validation->set_rules('angkatan', 'Angkatan', 'required');
		$this->form_validation->set_rules('nama_prodi', 'Nama Prodi', 'required');
		$this->form_validation->set_rules('jenis_kelas', 'Jenis Kelas', 'required');
		$this->form_validation->set_rules('no_telp', 'No.Telpon', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() != false) {
			$data = array(
				'nama_mahasiswa' => $nama_mahasiswa,
				'angkatan' => $angkatan,
				'nama_prodi' => $nama_prodi,
				'jenis_kelas' => $jenis_kelas,
				'gender' => $gender,
				'no_telp' => $no_telp,
				'alamat' => $alamat,
				'email' => $email,
				'username' => $username,
				'password' => $password,
			);
			$this->M_perpus->insert_data($data, 'mahasiswa');
			redirect(base_url() . 'welcome/index');
		} else {

			$this->load->view('welcome/tambahmahasiswa');
		}
	}

	public function login()
	{
		$username = $this->input->post('admin_username');
		$password = $this->input->post('admin_password');
		$this->form_validation->set_rules('admin_username', 'Username', 'required');
		$this->form_validation->set_rules('admin_password', 'Password', 'required');

		if ($this->form_validation->run() != false) {
			$where = array('username' => $username, 'password' => md5($password));

			$data = $this->M_perpus->edit_data($where, 'admin');
			$d = $this->M_perpus->edit_data($where, 'admin')->row();
			$cek = $data->num_rows();

			if ($cek > 0) {
				$session = array('id' => $d->id_admin, 'nama' => $d->nama_admin, 'status' => 'login');
				$this->session->set_userdata($session);
				redirect(base_url() . 'admin');
			} else {
				$dt = $this->M_perpus->edit_data($where, 'mahasiswa');
				$hasil = $this->M_perpus->edit_data($where, 'mahasiswa')->row();
				$proses = $dt->num_rows();

				if ($proses > 0) {
					$session = array('id_agt' => $hasil->id_mahasiswa, 'nama_agt' => $hasil->nama_mahasiswa, 'status' => 'login');
					$this->session->set_userdata($session);
					redirect(base_url() . 'member');
				} else {
					$datak = $this->M_perpus->edit_data($where, 'ketua');
					$resultk = $this->M_perpus->edit_data($where, 'ketua')->row();
					$cekkep = $datak->num_rows();

					if ($cekkep > 0) {
						$session = array('id_ket' => $resultk->id_ketua, 'nama_ket' => $resultk->nama_ketua, 'status' => 'login');
						$this->session->set_userdata($session);
						redirect(base_url() . 'ketua');
					} else {
						$this->session->set_flashdata('alert', 'Login Gagal! Username atau Password Salah');
						redirect(base_url());
					}
				}
			}
		} else {
			$this->session->set_flashdata('alert', 'Anda Belum mengisi username atau password');
			$this->load->view('login');
		}
	}
}
