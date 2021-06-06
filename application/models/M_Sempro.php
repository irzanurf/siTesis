<?php

class M_Sempro extends CI_Model
{
    public function insert_sempro($sempro,$id_tesis)
    {
        $query = $this->db->query("SELECT * FROM tb_sempro WHERE id_tesis = '$id_tesis'");
        $result = $query->result_array();
        $count = count($result);
    
        if (empty($count)){
            $this->db->insert('tb_sempro',$sempro);
        }
        else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-block" align="center"><strong>Data telah dimasukkan sebelumnya</strong></div>');
            redirect("admin/seminar_proposal");
        }   
        
    }

    public function get_sempro(){
        $query = $this->db->select('tb_sempro.*,tb_tesis.nama,tb_tesis.nim,tb_tesis.judul,tb_tesis.status')
        ->from('tb_sempro')
        ->join('tb_tesis','tb_sempro.id_tesis=tb_tesis.id','inner')
        ->order_by("id", "desc")
        ->get();
        return $query;
    }

    public function getwhere_sempro($data){
        $query = $this->db->select('tb_sempro.*,tb_tesis.nama,tb_tesis.nim,tb_tesis.judul,tb_tesis.status as stat')
        ->from('tb_sempro')
        ->join('tb_tesis','tb_sempro.id_tesis=tb_tesis.id','inner')
        ->where($data)
        ->order_by("id", "desc")
        ->get();
        return $query;
    }

    public function getwhere_sempropenguji($data){
        $query = $this->db->select('tb_sempro.*,tb_tesis.nama,tb_tesis.nim,tb_tesis.judul,tb_tesis.status as stat,tb_penguji_sempro.catatan as cek')
        ->from('tb_sempro')
        ->join('tb_tesis','tb_sempro.id_tesis=tb_tesis.id','inner')
        ->join('tb_penguji_sempro','tb_sempro.id_tesis=tb_penguji_sempro.id_tesis','inner')
        ->where($data)
        ->order_by("id", "desc")
        ->get();
        return $query;
    }

    public function get_appsempro(){
        $query = $this->db->select('tb_sempro.*,tb_tesis.nama,tb_tesis.nim,tb_tesis.judul,tb_tesis.status as stat')
        ->from('tb_sempro')
        ->join('tb_tesis','tb_sempro.id_tesis=tb_tesis.id','inner')
        ->where("tb_sempro.status is NOT NULL")
        ->order_by("id", "desc")
        ->get();
        return $query;
    }

    public function update_status($status, $id_tesis){
        $this->db->where('id_tesis',"$id_tesis");
        $this->db->update('tb_sempro', $status);
    }

    public function update_sempro($sempro, $id_tesis){
        $this->db->where('id_tesis',"$id_tesis");
        $this->db->update('tb_sempro', $sempro);
    }

    public function del_sempro(array $data){
        $query = $this->db->delete('tb_sempro',$data);
        return $query;
    }

}