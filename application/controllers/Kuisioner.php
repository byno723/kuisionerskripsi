<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kuisioner extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        //load the department_model
        $this->load->model('Kode_model');
    }


    public function index()
    {
        if ($this->session->userdata('id_responden')) {
            $data['title'] = 'kuisioner';
            $data['tanya'] = $this->db->get('pernyataan')->result_array();
            $this->load->view('templates/nav', $data);
            $this->load->view("kuisioner/Index");
            $this->load->view('templates/footer');
        } else {
            redirect("kuisioner/responden");
        }
    }

    public function simpan()
    {
        $banyak = $this->input->post('banyak');

        for ($i = 1; $i <= $banyak; $i++) {
            $hasil = $this->input->post('hasil' . $i);
            $id_responden = $this->input->post('id_responden' . $i);
            $pernyataan = $this->input->post('id_pernyataan' . $i);


            $this->db->query("insert into hasilrespon(id_pernyataan,id_responden,hasil) values ('$pernyataan','$id_responden','$hasil')");
        }
        $this->session->set_flashdata('message', '<div class="alert alert-danger " role="alert">trimakasih Telah Mengisi Formulir ini </div>');
        redirect('kuisioner/selesai');
    }

    public function responden()
    {
        $data['title'] = 'kuisioner';
        $this->form_validation->set_rules('nama_responden', 'nama_responden', 'required|is_unique[responden.nama_responden]', [
            'is_unique' => 'Nama Anda Sudah dipakai'
        ]);


        $this->form_validation->set_rules('umur', 'umur', 'required|trim');

        $data['kode'] = $this->Kode_model->kode();

        $this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'required');
        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/nav', $data);
            $this->load->view("kuisioner/responden");
            $this->load->view('templates/footer');
        } else {

            $data = [
                'id_responden' => $data['kode'],
                'nama_responden' => htmlspecialchars($this->input->post('nama_responden')),
                'pekerjaan' => htmlspecialchars($this->input->post('pekerjaan')),
                'umur' => htmlspecialchars($this->input->post('umur')),
                'jenkel' => htmlspecialchars($this->input->post('jenkel')),
            ];

            $this->session->set_userdata($data);

            $this->db->insert('responden', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-primary " role="alert">Responden Telah Berhasil DiTambahkan, Mohon Untuk Mengisi Formulir dibawah ini</div>');
            redirect('kuisioner/');
        }
    }

    public function selesai()
    {

        $this->session->unset_userdata('id_responden');
        $this->session->unset_userdata('login');

        $data['title'] = 'kuisioner';
        $this->load->view('templates/nav', $data);
        $this->load->view("kuisioner/selesai");
    }
}
