<?php

class M_Pengujian extends CI_Model
{
    public function insert_penguji_sempro($data,$id_tesis,$id_penguji)
    {
        $query = $this->db->query("SELECT * FROM tb_penguji_sempro WHERE id_tesis = '$id_tesis' AND id_penguji = '$id_penguji'");
        $result = $query->result_array();
        $count = count($result);
    
        if (empty($count)){
            $this->db->insert('tb_penguji_sempro',$data);
        }
        else{

        }   
        
    }

    public function insert_penguji_ujian($data,$id_tesis,$id_penguji)
    {
        $query = $this->db->query("SELECT * FROM tb_penguji_ujian WHERE id_tesis = '$id_tesis' AND id_penguji = '$id_penguji'");
        $result = $query->result_array();
        $count = count($result);
    
        if (empty($count)){
            $this->db->insert('tb_penguji_ujian',$data);
        }
        else{

        }   
        
    }

    public function getwhere_penguji(array $data)
    {
        $query = $this->db->select('tb_penguji_sempro.*,tb_dosen.*')
        ->from('tb_penguji_sempro')
        ->join('tb_dosen','tb_penguji_sempro.id_penguji=tb_dosen.username','inner')
        ->where($data)
        ->get();
        return $query;
    }

    public function getwhere_penguji_ujian(array $data)
    {
        $query = $this->db->select('tb_penguji_ujian.*,tb_dosen.nama, tb_dosen.username')
        ->from('tb_penguji_ujian')
        ->join('tb_dosen','tb_penguji_ujian.id_penguji=tb_dosen.username','inner')
        ->where($data)
        ->get();
        return $query;
    }

    public function update_nilaiTotal($id_tesis,$username,$nilai)
    {
        $this->db->where('id_tesis',$id_tesis);
        $this->db->where('id_penguji',"$username");
        $this->db->update('tb_penguji_sempro', $nilai);
        
    }

    public function insert_nilaiSempro($data)
    {
        $this->db->insert('tb_detail_nilai_sempro',$data);
    }

    public function update_nilaiSempro($id_tesis,$username,$komp,$detail)
    {
        $this->db->where('id_tesis',$id_tesis);
        $this->db->where('id_penguji',"$username");
        $this->db->where('id_komponen',$komp);
        $this->db->update('tb_detail_nilai_sempro',$detail);
    }

    public function update_nilaiUjian($id_tesis,$username,$komp,$detail)
    {
        $this->db->where('id_tesis',$id_tesis);
        $this->db->where('id_penguji',"$username");
        $this->db->where('id_komponen',$komp);
        $this->db->update('tb_detail_nilai_ujian',$detail);
    }

    public function update_nilaiTotalUjian($id_tesis,$username,$nilai)
    {
        $this->db->where('id_tesis',$id_tesis);
        $this->db->where('id_penguji',"$username");
        $this->db->update('tb_penguji_ujian', $nilai); 
    }

    public function update_penguji($data,$id_tesis,$ket)
    {
        $query = $this->db->query("SELECT * FROM tb_penguji_sempro WHERE id_tesis = '$id_tesis' AND ket = '$ket' ");
        $result = $query->result_array();
        $count = count($result);
    
        if (empty($count)){
            $this->db->insert('tb_penguji_sempro', $data);
        }
        else{
            $this->db->where('id_tesis',$id_tesis);
            $this->db->where('ket',$ket);
            $this->db->update('tb_penguji_sempro', $data);
        }       
        
    }

    public function update_penguji_ujian($data,$id_tesis,$ket)
    {
        $query = $this->db->query("SELECT * FROM tb_penguji_ujian WHERE id_tesis = '$id_tesis' AND ket = '$ket' ");
        $result = $query->result_array();
        $count = count($result);

        if (empty($count)){
            $this->db->insert('tb_penguji_ujian', $data);
        }

        else{
            $this->db->where('id_tesis',$id_tesis);
            $this->db->where('ket',$ket);
            $this->db->update('tb_penguji_ujian', $data);
        }
    }

    public function insert_nilaiUjian($data)
    {
        $this->db->insert('tb_detail_nilai_ujian',$data);
    }


}