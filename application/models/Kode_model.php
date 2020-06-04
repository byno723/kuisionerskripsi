
<?php
class Kode_model extends CI_Model
{
    public function kode()
    {
        $this->db->select('RIGHT(responden.id_responden,2) as id_responden', FALSE);
        $this->db->order_by('id_responden', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('responden');  //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //cek kode jika telah tersedia    
            $data = $query->row();
            $kode = intval($data->id_responden) + 1;
        } else {
            $kode = 1;  //cek jika kode belum terdapat pada table
        }
        $tgl = date('dmY');
        $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodetampil = "RSP" . "5" . $tgl . $batas;  //format kode
        return $kodetampil;
    }
}
