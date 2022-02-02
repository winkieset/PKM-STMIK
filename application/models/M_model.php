<?php
defined('BASEPATH') or exit('No direct Script access allowed');

class M_model extends CI_Model
{
    private $utas = 'pengajuan';

    public function rules()
    {
        return [
            [
                'field' => 'nama_usaha',  //samakan dengan atribute name pada tags input
                'label' => 'nama usaha',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ]

        ];
    }

    public function getById($id_pengajuan)
    {
        return $this->db->get_where($this->utas, ['id_pengajuan' => $id_pengajuan])->row();
        //query diatas seperti halnya query pada mysql 
        //select * from where id='$id'
    }

    public function update()
    {
        $data = array(
            'nama_usaha' => $this->input->post('nama_usaha'),
            'nama_pemilik' => $this->input->post('nama_pemilik'),
            'status' => $this->input->post('status')
        );

        return $this->db->update($this->utas, $data, array('id_pengajuan' => $this->input->post('id_pengajuan')));
    }
}
