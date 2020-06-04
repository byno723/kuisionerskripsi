<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        //load the department_model
        $this->load->model('Pernyataan_model');
    }

    public function index()
    {
        if ($this->session->userdata('status') != "login") {
            redirect("auth");
        } else {
            $data['laki-laki'] = $this->db->where('jenkel', 'laki laki')->from("responden")->count_all_results();
            $data['responden'] = $this->db->count_all('responden');
            $data['jenkel'] = $data['laki-laki'] / $data['responden'] * 100;

            $data['perempuan'] = $this->db->where('jenkel', 'perempuan')->from("responden")->count_all_results();
            $data['per'] =  $data['perempuan'] / $data['responden'] * 100;


            $data['pekerjaan'] = $this->db->query("Select pekerjaan, COUNT(*) FROM responden GROUP BY pekerjaan")->result_array();

            $data['umur'] = $this->db->query("Select umur, COUNT(*) FROM responden GROUP BY umur")->result_array();

            $data['title'] = "Kuisioner";
            $this->load->view('templates/head', $data);
            $this->load->view('templates/sidebar');
            $this->load->view("dashboard/Index", $data);
            $this->load->view('templates/footer', $data);
        }
    }

    public function responden()
    {
        if ($this->session->userdata('status') != "login") {
            redirect("auth");
        } else {
            $data['title'] = "Kuisioner";
            $data['responden'] = $this->db->get('responden')->result_array();
            $this->load->view('templates/head', $data);
            $this->load->view('templates/sidebar');
            $this->load->view("dashboard/responden", $data);
            $this->load->view('templates/footer');
        }
    }
    public function pernyataan()
    {
        if ($this->session->userdata('status') != "login") {
            redirect("auth");
        } else {
            $data['title'] = "Kuisioner";
            $this->form_validation->set_rules('isi', 'isi', 'required');
            $this->form_validation->set_rules('kategori', 'kategori', 'required');
            if ($this->form_validation->run() ==  false) {
                $data['pernyataan'] = $this->db->get('pernyataan')->result_array();
                $this->load->view('templates/head', $data);
                $this->load->view('templates/sidebar');
                $this->load->view("dashboard/pernyataan", $data);
                $this->load->view('templates/footer');
            } else {

                $data = [
                    'isi' => htmlspecialchars($this->input->post('isi')),
                    'kategori' => htmlspecialchars($this->input->post('kategori'))
                ];
                $this->db->insert('pernyataan', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pernyataan Telah Berhasil DiTambahkan</div>');
                redirect('home/pernyataan');
            }
        }
    }
    public function hapuspernyataan($id_pernyataan)
    {
        if ($this->session->userdata('status') != "login") {
            redirect("auth");
        } else {
            // $this->db->where('id', $id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pernyataan Telah Berhasil Di Hapus</div>');

            $this->db->delete('pernyataan', ['id_pernyataan' => $id_pernyataan]);
            redirect('home/pernyataan');
        }
    }
    public function detailpernyataan($id_pernyataan = '')
    {
        if ($this->session->userdata('status') != "login") {
            redirect("auth");
        } else {


            $data['pernyataan'] = $this->Pernyataan_model->getPernyataanById($id_pernyataan);

            $data['title'] = "Kuisioner";
            $this->load->view('templates/head', $data);
            $this->load->view('templates/sidebar');
            $this->load->view("dashboard/detailpernyataan", $data);
            $this->load->view('templates/footer');
        }
    }

    public function editpernyataan()
    {
        if ($this->session->userdata('status') != "login") {
            redirect("auth");
        } else {
            $id_pernyataan = $this->input->post('id_pernyataan');
            $isi = $this->input->post('isi');
            $kategori = $this->input->post('kategori');

            $data = array(
                'id_pernyataan' => $id_pernyataan,
                'isi' => $isi,
                'kategori' => $kategori

            );

            $where = array(
                'id_pernyataan' => $id_pernyataan
            );
            $this->Pernyataan_model->ubahdata($where, $data, 'pernyataan');
            $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Pernyataan Telah Berhasil Di Ubah</div>');

            redirect('home/pernyataan');
        }
    }



    public function performance()
    {
        if ($this->session->userdata('status') != "login") {
            redirect("auth");
        } else {

            $data['title'] = "Kuisioner";



            $data['performance'] = $this->db->query("select SUM(hasil) as total, id_responden,group_concat(hasil) as hasil,count(kategori),hasilrespon.id_responden from hasilrespon inner join pernyataan on pernyataan.id_pernyataan=hasilrespon.id_pernyataan where pernyataan.kategori = 'performance' and id_responden=id_responden  group by id_responden ")->result_array();




            $this->load->view('templates/head', $data);
            $this->load->view('templates/sidebar');
            $this->load->view("dashboard/performance", $data);
            $this->load->view('templates/footer');
        }
    }
    public function information()
    {
        if ($this->session->userdata('status') != "login") {
            redirect("auth");
        } else {
            $data['title'] = "Kuisioner";


            $data['information'] = $this->db->query("select SUM(hasil) as total, id_responden,group_concat(hasil) as hasil,count(kategori),hasilrespon.id_responden from hasilrespon inner join pernyataan on pernyataan.id_pernyataan=hasilrespon.id_pernyataan where pernyataan.kategori = 'information' and id_responden=id_responden  group by id_responden ")->result_array();


            $this->load->view('templates/head', $data);
            $this->load->view('templates/sidebar');
            $this->load->view("dashboard/information", $data);
            $this->load->view('templates/footer');
        }
    }
    public function economics()
    {
        if ($this->session->userdata('status') != "login") {
            redirect("auth");
        } else {
            $data['title'] = "Kuisioner";

            $data['economics'] = $this->db->query("select SUM(hasil) as total, id_responden,group_concat(hasil) as hasil,count(kategori),hasilrespon.id_responden from hasilrespon inner join pernyataan on pernyataan.id_pernyataan=hasilrespon.id_pernyataan where pernyataan.kategori = 'economics' and id_responden=id_responden  group by id_responden ")->result_array();



            $this->load->view('templates/head', $data);
            $this->load->view('templates/sidebar');
            $this->load->view("dashboard/economics", $data);
            $this->load->view('templates/footer');
        }
    }

    public function controls()
    {
        if ($this->session->userdata('status') != "login") {
            redirect("auth");
        } else {
            $data['title'] = "Kuisioner";

            $data['controls'] = $this->db->query("select SUM(hasil) as total, id_responden,group_concat(hasil) as hasil,count(kategori),hasilrespon.id_responden from hasilrespon inner join pernyataan on pernyataan.id_pernyataan=hasilrespon.id_pernyataan where pernyataan.kategori = 'controls' and id_responden=id_responden  group by id_responden ")->result_array();




            $this->load->view('templates/head', $data);
            $this->load->view('templates/sidebar');
            $this->load->view("dashboard/controls", $data);
            $this->load->view('templates/footer');
        }
    }


    public function eficiency()
    {
        if ($this->session->userdata('status') != "login") {
            redirect("auth");
        } else {
            $data['title'] = "Kuisioner";

            $data['eficiency'] = $this->db->query("select SUM(hasil) as total, id_responden,group_concat(hasil) as hasil,count(kategori),hasilrespon.id_responden from hasilrespon inner join pernyataan on pernyataan.id_pernyataan=hasilrespon.id_pernyataan where pernyataan.kategori = 'eficiency' and id_responden=id_responden  group by id_responden ")->result_array();


            $this->load->view('templates/head', $data);
            $this->load->view('templates/sidebar');
            $this->load->view("dashboard/eficiency", $data);
            $this->load->view('templates/footer');
        }
    }

    public function service()
    {

        if ($this->session->userdata('status') != "login") {
            redirect("auth");
        } else {
            $data['title'] = "Kuisioner";


            $data['service'] = $this->db->query("select SUM(hasil) as total, id_responden,group_concat(hasil) as hasil,count(kategori),hasilrespon.id_responden from hasilrespon inner join pernyataan on pernyataan.id_pernyataan=hasilrespon.id_pernyataan where pernyataan.kategori = 'service' and id_responden=id_responden  group by id_responden ")->result_array();



            $this->load->view('templates/head', $data);
            $this->load->view('templates/sidebar');
            $this->load->view("dashboard/service", $data);
            $this->load->view('templates/footer');
        }
    }



    public function user()
    {

        if ($this->session->userdata('status') != "login") {
            redirect("auth");
        } else {
            $data['title'] = "Kuisioner";
            $this->form_validation->set_rules('nama_user', 'nama_user', 'required|trim');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
                'is_unique' => 'This email has already registered!'
            ]);
            $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
                'matches' => 'Password dont match!',
                'min_length' => 'Password too short!'
            ]);
            $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

            if ($this->form_validation->run() == false) {
                $data['user'] = $this->db->get('user')->result_array();
                $this->load->view('templates/head', $data);
                $this->load->view('templates/sidebar');
                $this->load->view("dashboard/user", $data);
                $this->load->view('templates/footer');
            } else {
                $email = $this->input->post('email', true);
                $data = [
                    'nama_user' => htmlspecialchars($this->input->post('nama_user', true)),
                    'email' => htmlspecialchars($email),
                    'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                ];

                $this->db->insert('user', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created</div>');
                redirect('home/user');
            }
        }
    }
    public function hapusadmin($id_user)
    {
        if ($this->session->userdata('status') != "login") {
            redirect("auth");
        } else {
            // $this->db->where('id', $id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Admin Telah Berhasil Di Hapus</div>');

            $this->db->delete('user', ['id_user' => $id_user]);
            redirect('home/user');
        }
    }



    public function excel_export()
    {

        $data['performance'] = $this->db->query("select *from hasilrespon,pernyataan,responden where pernyataan.id_pernyataan=hasilrespon.id_pernyataan and hasilrespon.id_responden = responden.id_responden and pernyataan.kategori = 'performance'")->result_array();


        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $objPHPExcel = new PHPExcel();

        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'ID Responden')
            ->setCellValue('C1', 'Indikator');

        $kolom = 2;
        $nomor = 1;
        foreach ($data['performance'] as $q) {

            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $q['id_responden'])
                ->setCellValue('C' . $kolom, $q['hasil']);

            $kolom++;
            $nomor++;
        }
        $filename = "Data" . date("d-m-Y-H-i-s") . '.csv';

        $objPHPExcel->getActiveSheet()->setTitle("Data");
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename=' . $filename);
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $writer->save('php://output');

        exit;
    }


    public function excel_export_information()
    {

        $data['information'] = $this->db->query("select *from hasilrespon,pernyataan,responden where pernyataan.id_pernyataan=hasilrespon.id_pernyataan and hasilrespon.id_responden = responden.id_responden and pernyataan.kategori = 'information'")->result_array();


        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $objPHPExcel = new PHPExcel();

        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'ID Responden')
            ->setCellValue('C1', 'Indikator');

        $kolom = 2;
        $nomor = 1;
        foreach ($data['information'] as $q) {

            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $q['id_responden'])
                ->setCellValue('C' . $kolom, $q['hasil']);

            $kolom++;
            $nomor++;
        }
        $filename = "Data" . date("d-m-Y-H-i-s") . '.csv';

        $objPHPExcel->getActiveSheet()->setTitle("Data");
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename=' . $filename);
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $writer->save('php://output');

        exit;
    }

    public function excel_export_eficiency()
    {

        $data['eficiency'] = $this->db->query("select *from hasilrespon,pernyataan,responden where pernyataan.id_pernyataan=hasilrespon.id_pernyataan and hasilrespon.id_responden = responden.id_responden and pernyataan.kategori = 'eficiency'")->result_array();


        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $objPHPExcel = new PHPExcel();

        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'ID Responden')
            ->setCellValue('C1', 'Indikator');

        $kolom = 2;
        $nomor = 1;
        foreach ($data['eficiency'] as $q) {

            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $q['id_responden'])
                ->setCellValue('C' . $kolom, $q['hasil']);

            $kolom++;
            $nomor++;
        }
        $filename = "Data" . date("d-m-Y-H-i-s") . '.csv';

        $objPHPExcel->getActiveSheet()->setTitle("Data");
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename=' . $filename);
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $writer->save('php://output');

        exit;
    }


    public function excel_export_controls()
    {

        $data['controls'] = $this->db->query("select *from hasilrespon,pernyataan,responden where pernyataan.id_pernyataan=hasilrespon.id_pernyataan and hasilrespon.id_responden = responden.id_responden and pernyataan.kategori = 'controls'")->result_array();


        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $objPHPExcel = new PHPExcel();

        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'ID Responden')
            ->setCellValue('C1', 'Indikator');

        $kolom = 2;
        $nomor = 1;
        foreach ($data['controls'] as $q) {

            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $q['id_responden'])
                ->setCellValue('C' . $kolom, $q['hasil']);

            $kolom++;
            $nomor++;
        }
        $filename = "Data" . date("d-m-Y-H-i-s") . '.csv';

        $objPHPExcel->getActiveSheet()->setTitle("Data");
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename=' . $filename);
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $writer->save('php://output');

        exit;
    }


    public function excel_export_responden()
    {

        $data['responden'] = $this->db->get('responden')->result_array();

        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $objPHPExcel = new PHPExcel();

        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'ID Responden')
            ->setCellValue('C1', 'Nama Responden')
            ->setCellValue('D1', 'Umur')
            ->setCellValue('E1', 'Jenis Kelamin')
            ->setCellValue('F1', 'Pekerjaan');

        $kolom = 2;
        $nomor = 1;
        foreach ($data['responden'] as $q) {

            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $q['id_responden'])
                ->setCellValue('C' . $kolom, $q['nama_responden'])
                ->setCellValue('D' . $kolom, $q['umur'])
                ->setCellValue('E' . $kolom, $q['jenkel'])
                ->setCellValue('F' . $kolom, $q['pekerjaan']);

            $kolom++;
            $nomor++;
        }
        $filename = "Data" . date("d-m-Y-H-i-s") . '.csv';

        $objPHPExcel->getActiveSheet()->setTitle("Data");
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename=' . $filename);
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $writer->save('php://output');

        exit;
    }

    public function excel_export_service()
    {

        $data['service'] = $this->db->query("select *from hasilrespon,pernyataan,responden where pernyataan.id_pernyataan=hasilrespon.id_pernyataan and hasilrespon.id_responden = responden.id_responden and pernyataan.kategori = 'service'")->result_array();


        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $objPHPExcel = new PHPExcel();

        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'ID Responden')
            ->setCellValue('C1', 'Indikator');

        $kolom = 2;
        $nomor = 1;
        foreach ($data['service'] as $q) {

            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $q['id_responden'])
                ->setCellValue('C' . $kolom, $q['hasil']);

            $kolom++;
            $nomor++;
        }
        $filename = "Data" . date("d-m-Y-H-i-s") . '.csv';

        $objPHPExcel->getActiveSheet()->setTitle("Data");
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename=' . $filename);
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $writer->save('php://output');

        exit;
    }

    public function hapusresponden($id_responden)
    {
        if ($this->session->userdata('status') != "login") {
            redirect("auth");
        } else {
            // $this->db->where('id', $id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Responden Telah Berhasil Di Hapus</div>');

            $this->db->delete('responden', ['id_responden' => $id_responden]);
            redirect('home/responden');
        }
    }
}
