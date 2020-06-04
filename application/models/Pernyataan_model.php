<?php
class Pernyataan_model extends CI_Model
{


    public function getpernyataanById($id_pernyataan)
    {
        return $this->db->get_where('pernyataan', ['id_pernyataan' => $id_pernyataan])->row_array();
    }
    public function ubahdata($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
