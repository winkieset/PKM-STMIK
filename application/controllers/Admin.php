<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('status') != "login") {
      redirect(base_url() . 'welcome?pesan=belumlogin');
    }
  }

  function index()
  {
    $data['mahasiswa'] = $this->db->query("select * from mahasiswa order by id_mahasiswa desc limit 10")->result();
    $data['pengajuan'] = $this->db->query("select * from pengajuan order by id_pengajuan desc limit 10")->result();

    $this->load->view('admin/header');
    $this->load->view('admin/index', $data);
    $this->load->view('admin/footer');
  }

  function logout()
  {
    $this->session->sess_destroy();
    redirect(base_url() . 'welcome?pesan=logout');
  }

  function ganti_password()
  {
    $this->load->view('admin/header');
    $this->load->view('admin/ganti_password');
    $this->load->view('admin/footer');
  }

  function ganti_password_act()
  {
    $pass_baru = $this->input->post('pass_baru');
    $ulang_pass = $this->input->post('ulang_pass');

    $this->form_validation->set_rules('pass_baru', 'Password Baru', 'required|matches[ulang_pass]');
    $this->form_validation->set_rules('ulang_pass', 'Ulangi Password Baru', 'required');
    if ($this->form_validation->run() != false) {
      $data = array('password' => md5($pass_baru));
      $w = array('id_admin' => $this->session->userdata('id'));
      $this->M_perpus->update_data($w, $data, 'admin');
      redirect(base_url() . 'admin/ganti_password?pesan=berhasil');
    } else {
      $this->load->view('admin/header');
      $this->load->view('admin/ganti_password');
      $this->load->view('admin/footer');
    }
  }

  function pengajuan()
  {
    $data['pengajuan'] = $this->M_perpus->get_data('pengajuan')->result();
    // $data['utas'] = $this->M_perpus->join3table()->result();
    $this->load->view('admin/header');
    $this->load->view('admin/pengajuan', $data);
    $this->load->view('admin/footer');
  }

  function pengajuan_belum_verif()
  {
    $w = array('status' => '0');
    $data['pengajuan'] = $this->M_perpus->edit_data($w, 'pengajuan')->result();
    $this->load->view('admin/header');
    $this->load->view('admin/pengajuan', $data);
    $this->load->view('admin/footer');
  }

  function pengajuan_sudah_verif()
  {
    $w = array('status' => '1');
    $data['pengajuan'] = $this->M_perpus->edit_data($w, 'pengajuan')->result();
    $this->load->view('admin/header');
    $this->load->view('admin/pengajuan', $data);
    $this->load->view('admin/footer');
  }

  function tambah_pengajuan()
  {
    $this->load->view('admin/header');
    $this->load->view('admin/tambahpengajuan');
    $this->load->view('admin/footer');
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
    $status_ketua = $this->input->post('status_ketua');
    $this->form_validation->set_rules('nama_usaha', 'Nama Usaha', 'required');
    $this->form_validation->set_rules('nama_pemilik', 'Nama Pemilik', 'required');
    $this->form_validation->set_rules('angkatan', 'Angkatan', 'required');
    $this->form_validation->set_rules('nama_prodi', 'Nama Prodi', 'required');
    $this->form_validation->set_rules('jenis_kelas', 'Jenis Kelas', 'required');
    $this->form_validation->set_rules('status', 'Status', 'required');
    $this->form_validation->set_rules('status_ketua', 'Status Ketua', 'required');
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
          'status' => $status,
          'status_ketua' => $status_ketua
        );
        $this->M_perpus->insert_data($data, 'pengajuan');
        redirect(base_url() . 'admin/pengajuan');
      } else {
        $this->load->view('admin/header');
        $this->load->view('admin/tambahpengajuan');
        $this->load->view('admin/footer');
      }
    }
  }

  function hapus_pengajuan($id)
  {
    $where = array('id_pengajuan' => $id);
    $this->M_perpus->delete_data($where, 'pengajuan');
    redirect(base_url() . 'admin/pengajuan');
  }

  function hapus_mahasiswa($id)
  {
    $where = array('mahasiswa' => $id);
    $this->M_perpus->delete_data($where, 'mahasiswa');
    redirect(base_url() . 'admin/mahasiswa');
  }

  function edit_pengajuan($id)
  {
    $where = array('id_pengajuan' => $id);
    $data['pengajuan'] = $this->db->query("select * from pengajuan where id_pengajuan='$id'")->result();

    $this->load->view('admin/header');
    $this->load->view('admin/editpengajuan', $data);
    $this->load->view('admin/footer');
  }

  function update_pengajuan()
  {
    $id = $this->input->post('id_pengajuan');
    $nama_usaha = $this->input->post('nama_usaha');
    $nama_pemilik = $this->input->post('nama_pemilik');
    $angkatan = $this->input->post('angkatan');
    $nama_prodi = $this->input->post('nama_prodi');
    $jenis_kelas = $this->input->post('jenis_kelas');
    $kategori = $this->input->post('kategori');
    $status = $this->input->post('status');
    $status_ketua = $this->input->post('status_ketua');


    $this->form_validation->set_rules('nama_usaha', 'Nama Usaha', 'required|min_length[1]');
    $this->form_validation->set_rules('nama_pemilik', 'Nama Pemilik', 'required|min_length[4]');
    $this->form_validation->set_rules('angkatan', 'Angkatan', 'required');
    $this->form_validation->set_rules('nama_prodi', 'Nama Prodi', 'required');
    $this->form_validation->set_rules('jenis_kelas', 'Jenis Kelas', 'required');
    $this->form_validation->set_rules('kategori', 'Kategori', 'required|min_length[4]');
    $this->form_validation->set_rules('status', 'Status', 'required');
    $this->form_validation->set_rules('status_ketua', 'Status Ketua', 'required');

    if ($this->form_validation->run() != false) {
      $config['upload_path'] = './assets/upload/';
      $config['allowed_types'] = 'pdf';
      $config['max_size'] = '20000';
      $config['file_name'] = 'proposal' . time();

      $this->load->library('upload', $config);

      $where = array('id_pengajuan' => $id);
      $data = array(
        'nama_usaha' => $nama_usaha,
        'nama_pemilik' => $nama_pemilik,
        'angkatan' => $angkatan,
        'nama_prodi' => $nama_prodi,
        'jenis_kelas' => $jenis_kelas,
        'kategori' => $kategori,
        'status' => $status,
        'status_ketua' => $status_ketua
      );

      if ($this->upload->do_upload('proposal')) {
        //proses upload Gambar
        $proposal = $this->upload->data();
        $data["proposal"] = $proposal["file_name"];
        unlink('assets/upload/' . $this->input->post('old_pict', TRUE));
        $data['proposal'] = $proposal['file_name'];

        $this->M_perpus->update_data('pengajuan', $data, $where);
      } else {

        $where = array('id_pengajuan' => $id);
        $data = array(
          'nama_usaha' => $nama_usaha,
          'nama_pemilik' => $nama_pemilik,
          'angkatan' => $angkatan,
          'nama_prodi' => $nama_prodi,
          'jenis_kelas' => $jenis_kelas,
          'kategori' => $kategori,
          'status' => $status,
          'status_ketua' => $status_ketua
        );
        $this->M_perpus->update_data('pengajuan', $data, $where);
      }

      $this->M_perpus->update_data('pengajuan', $data, $where);
      redirect(base_url() . 'admin/pengajuan');
    } else {
      $where = array('id_pengajuan' => $id);
      $data['pengajuan'] = $this->db->query("select * from pengajuan  where id_pengajuan='$id'")->result();

      $this->load->view('admin/header');
      $this->load->view('admin/editpengajuan', $data);
      $this->load->view('admin/footer');
    }
  }

  function mahasiswa()
  {
    $data['mahasiswa'] = $this->M_perpus->get_data('mahasiswa')->result();
    $this->load->view('admin/header');
    $this->load->view('admin/mahasiswa', $data);
    $this->load->view('admin/footer');
  }

  function prodi()
  {
    $data['prodi'] = $this->M_perpus->get_data('prodi')->result();
    $this->load->view('admin/header');
    $this->load->view('admin/prodi', $data);
    $this->load->view('admin/footer');
  }

  function tambah_mahasiswa()
  {
    $this->load->view('admin/header');
    $this->load->view('admin/tambahmahasiswa');
    $this->load->view('admin/footer');
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
    $password = $this->input->post('password');
    $this->form_validation->set_rules('nama_mahasiswa', 'Nama Mahasiswa', 'required');
    $this->form_validation->set_rules('angkatan', 'Angkatan', 'required');
    $this->form_validation->set_rules('nama_prodi', 'Nama Prodi', 'required');
    $this->form_validation->set_rules('jenis_kelas', 'Jenis Kelas', 'required');
    $this->form_validation->set_rules('no_telp', 'No.Telpon', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required');
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
        'password' => $password,
      );
      $this->M_perpus->insert_data($data, 'mahasiswa');
      redirect(base_url() . 'admin/mahasiswa');
    } else {
      $this->load->view('admin/header');
      $this->load->view('admin/tambahmahasiswa');
      $this->load->view('admin/footer');
    }
  }

  function edit_mahasiswa($id)
  {
    $where = array('id_mahasiswa' => $id);
    $data['mahasiswa'] = $this->db->query("select * from mahasiswa where id_mahasiswa='$id'")->result();

    $this->load->view('admin/header');
    $this->load->view('admin/editmahasiswa', $data);
    $this->load->view('admin/footer');
  }

  function update_mahasiswa()
  {
    $id = $this->input->post('id');
    $nama_mahasiswa = $this->input->post('nama_mahasiswa');
    $angkatan = $this->input->post('angkatan');
    $nama_prodi = $this->input->post('nama_prodi');
    $jenis_kelas = $this->input->post('jenis_kelas');
    $gender = $this->input->post('gender');
    $no_telp = $this->input->post('no_telp');
    $alamat = $this->input->post('alamat');
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $this->form_validation->set_rules('nama_mahasiswa', 'Nama Mahasiswa', 'required');
    $this->form_validation->set_rules('angkatan', 'Angkatan', 'required');
    $this->form_validation->set_rules('nama_prodi', 'Nama Prodi', 'required');
    $this->form_validation->set_rules('jenis_kelas', 'Jenis Kelas', 'required');
    $this->form_validation->set_rules('no_telp', 'No.Telpon', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if ($this->form_validation->run() != false) {
      $where = array('id_mahasiswa' => $id);
      $data = array(
        'nama_mahasiswa' => $nama_mahasiswa,
        'angkatan' => $angkatan,
        'nama_prodi' => $nama_prodi,
        'jenis_kelas' => $jenis_kelas,
        'gender' => $gender,
        'no_telp' => $no_telp,
        'alamat' => $alamat,
        'email' => $email,
        'password' => $password,
      );

      $this->M_perpus->update_data('mahasiswa', $data, $where);
      redirect(base_url() . 'admin/mahasiswa');
    } else {
      $where = array('id_mahasiswa' => $id);
      $data['mahasiswa'] = $this->db->query("select * from mahasiswa where id_mahasiswa='$id'")->result();
      $this->load->view('admin/header');
      $this->load->view('admin/editmahasiswa', $data);
      $this->load->view('admin/footer');
    }
  }

  function cetak_laporan_pengajuan()
  {
    $data['pengajuan'] = $this->M_perpus->get_data('pengajuan')->result();
    $this->load->view('admin/header');
    $this->load->view('admin/laporan_pengajuan', $data);
    $this->load->view('admin/footer');
  }

  function laporan_print_pengajuan()
  {
    $data['pengajuan'] = $this->M_perpus->get_data('pengajuan')->result();
    $this->load->view('admin/laporan_print_pengajuan', $data);
  }

  function laporan_pengajuan_belum_verif()
  {
    $w = array('status' => '0');
    $data['pengajuan'] = $this->M_perpus->edit_data($w, 'pengajuan')->result();
    $this->load->view('admin/header');
    $this->load->view('admin/laporan_pengajuan', $data);
    $this->load->view('admin/footer');
  }

  function laporan_pengajuan_verif()
  {
    $w = array('status' => '1');
    $data['pengajuan'] = $this->M_perpus->edit_data($w, 'pengajuan')->result();
    $this->load->view('admin/header');
    $this->load->view('admin/laporan_pengajuan', $data);
    $this->load->view('admin/footer');
  }

  function cetak_laporan_mahasiswa()
  {
    $data['mahasiswa'] = $this->M_perpus->get_data('mahasiswa')->result();
    $this->load->view('admin/header');
    $this->load->view('admin/laporan_mahasiswa', $data);
    $this->load->view('admin/footer');
  }

  function laporan_print_mahasiswa()
  {
    $data['mahasiswa'] = $this->M_perpus->get_data('mahasiswa')->result();
    $this->load->view('admin/laporan_print_mahasiswa', $data);
  }
}
