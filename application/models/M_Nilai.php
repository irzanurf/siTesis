<?php

class M_Nilai extends CI_Model
{
    public function getwhere_dosen(array $data)
    {
        return $this->db->get_where('tb_nilai', $data);
    }
    
    public function get_nilai()
    {
        return $this->db->get('tb_nilai');
        
    }

    public function get_app_sempro()
    {
        return $this->db->get('tb_app_sempro');
        
    }

    public function get_app_ujian()
    {
        return $this->db->get('tb_app_ujian');
        
    }

    public function get_nilai_sempro($id_tesis,$username){
        $query = $this->db->select('*')
        ->from('tb_detail_nilai_sempro')
        ->where('id_tesis',"$id_tesis")
        ->where('id_penguji',"$username")
        ->order_by("id_komponen", "asc")
        ->get();
        return $query;
    }

    public function get_nilai_ujian($id_tesis,$username){
        $query = $this->db->select('*')
        ->from('tb_detail_nilai_ujian')
        ->where('id_tesis',"$id_tesis")
        ->where('id_penguji',"$username")
        ->order_by("id_komponen", "asc")
        ->get();
        return $query;
    }
}