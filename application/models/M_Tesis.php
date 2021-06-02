<?php

class M_Tesis extends CI_Model
{
    public function insert_tesis($tesis,$nim,$judul)
    {
        $query = $this->db->query("SELECT * FROM tb_tesis WHERE nim = '$nim' AND judul = '$judul' ");
        $result = $query->result_array();
        $count = count($result);
    
        if (empty($count)){
            $this->db->insert('tb_tesis',$tesis);
        return $this->db->insert_id();
        }
        else{
            
        }   
        
    }

    public function update_tesis($tesis,$id_tesis)
    {
        $this->db->where('id',$id_tesis);
        $this->db->update('tb_tesis', $tesis);
    }

    public function get_tesis(){
        $query = $this->db->select('tb_tesis.*, tb_sempro.tgl as tgl_sempro, tb_ujian.tgl as tgl_ujian')
        ->from('tb_tesis')
        ->join('tb_sempro','tb_tesis.id=tb_sempro.id_tesis','left')
        ->join('tb_ujian','tb_tesis.id=tb_ujian.id_tesis','left')
        ->order_by("id", "desc")
        ->get();
        return $query;
    }

    public function getwhere_tesis(array $data){
        $query = $this->db->select('tb_tesis.*, tb_sempro.tgl, tb_sempro.tempat')
        ->from('tb_tesis')
        ->join('tb_sempro','tb_tesis.id=tb_sempro.id_tesis','inner')
        ->where($data)
        ->get();
        return $query;
    }

    public function getwhere_tesis_ujian(array $data){
        $query = $this->db->select('tb_tesis.*, tb_ujian.tgl, tb_ujian.tempat')
        ->from('tb_tesis')
        ->join('tb_ujian','tb_tesis.id=tb_ujian.id_tesis','inner')
        ->where($data)
        ->get();
        return $query;
    }
    
    public function del_tesis(array $data){
        $query = $this->db->delete('tb_tesis',$data);
        return $query;
    }

}