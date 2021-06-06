<?php

class M_Ujian extends CI_Model
{
    public function insert_ujian($ujian,$id_tesis)
    {
        $query = $this->db->query("SELECT * FROM tb_ujian WHERE id_tesis = '$id_tesis' ");
        $result = $query->result_array();
        $count = count($result);
    
        if (empty($count)){
            $this->db->insert('tb_ujian',$ujian);
        }
        else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-block" align="center"><strong>Data telah dimasukkan sebelumnya ujian</strong></div>');
            redirect("admin/ujian_tesis");
        }   
        
    }

    public function get_ujian(){
        $query = $this->db->select('tb_ujian.*,tb_tesis.nama,tb_tesis.nim,tb_tesis.judul,tb_tesis.status')
        ->from('tb_ujian')
        ->join('tb_tesis','tb_ujian.id_tesis=tb_tesis.id','inner')
        ->order_by("id", "desc")
        ->get();
        return $query;
    }

    public function getwhere_ujian($data){
        $query = $this->db->select('tb_ujian.*,tb_tesis.nama,tb_tesis.nim,tb_tesis.judul,tb_tesis.status as stat')
        ->from('tb_ujian')
        ->join('tb_tesis','tb_ujian.id_tesis=tb_tesis.id','inner')
        ->where($data)
        ->order_by("id", "desc")
        ->get();
        return $query;
    }

    public function getwhere_ujianpenguji($data){
        $query = $this->db->select('tb_ujian.*,tb_tesis.nama,tb_tesis.nim,tb_tesis.judul,tb_tesis.status as stat, tb_penguji_ujian.catatan as cek')
        ->from('tb_ujian')
        ->join('tb_tesis','tb_ujian.id_tesis=tb_tesis.id','inner')
        ->join('tb_penguji_ujian','tb_ujian.id_tesis=tb_penguji_ujian.id_tesis','inner')
        ->where($data)
        ->order_by("id", "desc")
        ->get();
        return $query;
    }

    public function get_appujian(){
        $query = $this->db->select('tb_ujian.*,tb_tesis.nama,tb_tesis.nim,tb_tesis.judul,tb_tesis.status as stat')
        ->from('tb_ujian')
        ->join('tb_tesis','tb_ujian.id_tesis=tb_tesis.id','inner')
        ->where("tb_ujian.status is NOT NULL")
        ->order_by("id", "desc")
        ->get();
        return $query;
    }

    public function update_status($status, $id_tesis){
        $this->db->where('id_tesis',"$id_tesis");
        $this->db->update('tb_ujian', $status);
    }

    public function update_ujian($ujian,$id_tesis)
    {
        $this->db->where('id_tesis',"$id_tesis");
        $this->db->update('tb_ujian', $ujian);
    }

    public function del_ujian(array $data){
        $query = $this->db->delete('tb_ujian',$data);
        return $query;
    }

}