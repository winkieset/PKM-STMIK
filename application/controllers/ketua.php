<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ketua extends CI_Controller
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

        $this->load->view('ketua/header');
        $this->load->view('ketua/index', $data);
        $this->load->view('ketua/footer');
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url() . 'welcome?pesan=logout');
    }

    function pengajuan()
    {
        $data['pengajuan'] = $this->M_perpus->get_data('pengajuan')->result();
        $this->load->view('ketua/header');
        $this->load->view('ketua/pengajuan', $data);
        $this->load->view('ketua/footer');
    }

    function edit_pengajuan($id)
    {
        $where = array('id_pengajuan' => $id);
        $data['pengajuan'] = $this->M_perpus->edit_data($where, 'pengajuan')->result();

        $this->load->view('ketua/header');
        $this->load->view('ketua/editpengajuan', $data);
        $this->load->view('ketua/footer');
    }

    function pengajuan_belum_verif()
    {
        $w = array('status' => '0');
        $data['pengajuan'] = $this->M_perpus->edit_data($w, 'pengajuan')->result();
        $this->load->view('ketua/header');
        $this->load->view('ketua/pengajuan', $data);
        $this->load->view('ketua/footer');
    }

    function pengajuan_sudah_verif()
    {
        $w = array('status' => 1);
        $data['pengajuan'] = $this->M_perpus->edit_data($w, 'pengajuan')->result();
        $this->load->view('ketua/header');
        $this->load->view('ketua/pengajuan', $data);
        $this->load->view('ketua/footer');
    }

    function update_pengajuan()
    {
        $id = $this->input->post('id_pengajuan');
        $nama_usaha = $this->input->post('nama_usaha');
        $nama_pemilik = $this->input->post('nama_pemilik');
        $kategori = $this->input->post('kategori');
        $status = $this->input->post('status');


        $this->form_validation->set_rules('nama_usaha', 'Nama Usaha', 'required|min_length[1]');
        $this->form_validation->set_rules('nama_pemilik', 'Nama Pemilik', 'required|min_length[4]');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required|min_length[4]');
        $this->form_validation->set_rules('status', 'Status', 'required');

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
                'Kategori' => $kategori,
                'status' => $status
            );

            if ($this->upload->do_upload('foto')) {
                //proses upload Gambar
                $prop = $this->upload->data();
                $data["proposal"] = $prop["file_name"];
                unlink('assets/upload/' . $this->input->post('old_pict', TRUE));
                $data['proposal'] = $prop['file_name'];

                $this->M_perpus->update_data('pengajuan', $data, $where);
            } else {
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
        $this->load->view('ketua/header');
        $this->load->view('ketua/mahasiswa', $data);
        $this->load->view('ketua/footer');
    }

    function cetak_laporan_pengajuan()
    {
        $data['pengajuan'] = $this->M_perpus->get_data('pengajuan')->result();
        $this->load->view('ketua/header');
        $this->load->view('ketua/laporan_pengajuan', $data);
        $this->load->view('ketua/footer');
    }

    function laporan_pengajuan_belum_verif()
    {
        $w = array('status' => '0');
        $data['pengajuan'] = $this->M_perpus->edit_data($w, 'pengajuan')->result();
        $this->load->view('ketua/header');
        $this->load->view('ketua/laporan_pengajuan', $data);
        $this->load->view('ketua/footer');
    }

    function laporan_print_pengajuan()
    {
        $data['pengajuan'] = $this->M_perpus->get_data('pengajuan')->result();
        $this->load->view('ketua/laporan_print_pengajuan', $data);
    }

    function laporan_pdf_pengajuan()
    {
        $this->load->library('dompdf_gen');

        $data['pengajuan'] = $this->M_perpus->get_data('pengajuan')->result();

        $this->load->view('ketua/laporan_pdf_pengajuan', $data);

        $paper_size  = 'A4'; // ukuran kertas
        $orientation = 'landscape'; //tipe format kertas potrait atau landscape
        $html = $this->output->get_output();

        $this->dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_data_pengajuan.pdf", array('Attachment' => 0));
        // nama file pdf yang di hasilkan
    }

    function cetak_laporan_mahasiswa()
    {
        $data['mahasiswa'] = $this->M_perpus->get_data('mahasiswa')->result();
        $this->load->view('ketua/header');
        $this->load->view('ketua/laporan_mahasiswa', $data);
        $this->load->view('ketua/footer');
    }

    function laporan_print_mahasiswa()
    {
        $data['mahasiswa'] = $this->M_perpus->get_data('mahasiswa')->result();
        $this->load->view('ketua/laporan_print_mahasiswa', $data);
    }

    function laporan_pdf_mahasiswa()
    {
        $this->load->library('dompdf_gen');

        $data['mahasiswa'] = $this->M_perpus->get_data('mahasiswa')->result();

        $this->load->view('ketua/laporan_pdf_mahasiswa', $data);

        $paper_size  = 'A4'; // ukuran kertas
        $orientation = 'landscape'; //tipe format kertas potrait atau landscape
        $html = $this->output->get_output();

        $this->dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_data_mahasiswa.pdf", array('Attachment' => 0));
        // nama file pdf yang di hasilkan
    }

    function ganti_password()
    {
        $this->load->view('ketua/header');
        $this->load->view('ketua/ganti_password');
        $this->load->view('ketua/footer');
    }

    function ganti_password_act()
    {
        $pass_baru = $this->input->post('pass_baru');
        $ulang_pass = $this->input->post('ulang_pass');

        $this->form_validation->set_rules('pass_baru', 'Password Baru', 'required|matches[ulang_pass]');
        $this->form_validation->set_rules('ulang_pass', 'Ulangi Password Baru', 'required');
        if ($this->form_validation->run() != false) {
            $data = array('password' => md5($pass_baru));
            $w = array('id_ketua' => $this->session->userdata('id'));
            $this->M_perpus->update_data($w, $data, 'admin');
            redirect(base_url() . 'ketua/ganti_password?pesan=berhasil');
        } else {
            $this->load->view('ketua/header');
            $this->load->view('ketua/ganti_password');
            $this->load->view('ketua/footer');
        }
    }
}
