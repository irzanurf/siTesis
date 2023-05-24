<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penguji extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('M_Login');
        $current_user=$this->M_Login->is_role();
        //cek session dan level user
        if($this->M_Login->is_role() != "2"){
            redirect("welcome/");
        }
        $this->load->model('M_Pengumuman');
        $this->load->model('M_Dosen');
        $this->load->model('M_Tesis');
        $this->load->model('M_Sempro');
        $this->load->model('M_Ujian');
        $this->load->model('M_Pengujian');
        $this->load->model('M_Nilai');
        
    }

    public function index()
    {
        $username = $this->session->userdata('username');
        $data['berita'] = $this->M_Pengumuman->get_berita(array('id'=>1))->row();
        $nama['nama'] = $this->M_Pengumuman->get_nama(array('username'=>$username))->row();
        $this->load->view('layout/header_penguji', $nama);
        $this->load->view('penguji/dashboard', $data);
        $this->load->view("layout/footer");
    }

    public function seminar_proposal()
    {
        $username = $this->session->userdata('username');
        $data['view'] = $this->M_Sempro->getwhere_sempropenguji(array('id_penguji'=>$username))->result();
        $nama['nama'] = $this->M_Pengumuman->get_nama(array('username'=>$username))->row();
        $this->load->view('layout/header_penguji', $nama);
        $this->load->view('penguji/seminar_proposal', $data);
        // $this->load->view("layout/footer");
    }

    public function ujian_tesis()
    {
        $username = $this->session->userdata('username');
        $data['view'] = $this->M_Ujian->getwhere_ujianpenguji(array('id_penguji'=>$username))->result();
        $nama['nama'] = $this->M_Pengumuman->get_nama(array('username'=>$username))->row();
        $this->load->view('layout/header_penguji', $nama);
        $this->load->view('penguji/ujian_tesis', $data);
        // $this->load->view("layout/footer");
    }

    public function sempro()
    {
        $username = $this->session->userdata('username');
        $id_tesis = $this->input->get('id');
        if($id_tesis==NULL){
            redirect("Penguji/seminar_proposal");
        }
        $data['v'] = $this->M_Sempro->getwhere_sempropenguji(array('tb_sempro.id_tesis'=>$id_tesis, 'id_penguji'=>$username))->row();
        $data['tesis'] = $this->M_Tesis->getwhere_tesis(array('tb_tesis.id'=>$id_tesis))->row();
        $data['penguji1'] = $this->M_Pengujian->getwhere_penguji(array('id_tesis'=>$id_tesis,'ket'=>"penguji1"))->row();
        $data['penguji2'] = $this->M_Pengujian->getwhere_penguji(array('id_tesis'=>$id_tesis,'ket'=>"penguji2"))->row();
        $data['penguji3'] = $this->M_Pengujian->getwhere_penguji(array('id_tesis'=>$id_tesis,'ket'=>"penguji3"))->row();
        $data['penguji4'] = $this->M_Pengujian->getwhere_penguji(array('id_tesis'=>$id_tesis,'ket'=>"penguji4"))->row();
        $nama['nama'] = $this->M_Pengumuman->get_nama(array('username'=>$username))->row();
        $this->load->view('layout/header_penguji', $nama);
        $this->load->view('penguji/sempro', $data);
        $this->load->view("layout/footer");
    }

    public function ut()
    {
        $username = $this->session->userdata('username');
        $id_tesis = $this->input->get('id');
        if($id_tesis==NULL){
            redirect("Penguji/ujian_tesis");
        }
        $data['v'] = $this->M_Ujian->getwhere_ujianpenguji(array('tb_ujian.id_tesis'=>$id_tesis, 'id_penguji'=>$username))->row();
        $data['tesis'] = $this->M_Tesis->getwhere_tesis_ujian(array('tb_tesis.id'=>$id_tesis))->row();
        $data['penguji1'] = $this->M_Pengujian->getwhere_penguji_ujian(array('id_tesis'=>$id_tesis,'ket'=>"penguji1"))->row();
        $data['penguji2'] = $this->M_Pengujian->getwhere_penguji_ujian(array('id_tesis'=>$id_tesis,'ket'=>"penguji2"))->row();
        $data['penguji3'] = $this->M_Pengujian->getwhere_penguji_ujian(array('id_tesis'=>$id_tesis,'ket'=>"penguji3"))->row();
        $data['penguji4'] = $this->M_Pengujian->getwhere_penguji_ujian(array('id_tesis'=>$id_tesis,'ket'=>"penguji4"))->row();
        $data['penguji5'] = $this->M_Pengujian->getwhere_penguji_ujian(array('id_tesis'=>$id_tesis,'ket'=>"penguji5"))->row();
        $nama['nama'] = $this->M_Pengumuman->get_nama(array('username'=>$username))->row();
        $this->load->view('layout/header_penguji', $nama);
        $this->load->view('penguji/ut', $data);
        $this->load->view("layout/footer");
    }

    public function penilaian_sempro()
    {
        $username = $this->session->userdata('username');
        $id_tesis = $this->input->post('id');
        if($id_tesis==NULL){
            redirect("Penguji/seminar_proposal");
        }
        $data['tesis'] = $this->M_Tesis->getwhere_tesis(array('tb_tesis.id'=>$id_tesis))->row();
        $data['nilai'] = $this->M_Nilai->get_nilai()->result();
        $nama['nama'] = $this->M_Pengumuman->get_nama(array('username'=>$username))->row();
        $this->load->view('layout/header_penguji', $nama);
        $this->load->view('penguji/penilaian_sempro', $data);
        $this->load->view("layout/footer");
    }

    public function edit_penilaian_sempro()
    {
        $username = $this->session->userdata('username');
        $id_tesis = $this->input->post('id');
        if($id_tesis==NULL){
            redirect("Penguji/seminar_proposal");
        }
        $data['tesis'] = $this->M_Tesis->getwhere_tesis(array('tb_tesis.id'=>$id_tesis))->row();
        $data['nilai'] = $this->M_Nilai->get_nilai()->result();
        $data['detail'] = $this->M_Nilai->get_nilai_sempro($id_tesis, $username)->result();
        $data['total'] = $this->M_Pengujian->getwhere_penguji(array('id_tesis'=>$id_tesis,'id_penguji'=>$username))->row();
        $nama['nama'] = $this->M_Pengumuman->get_nama(array('username'=>$username))->row();
        $this->load->view('layout/header_penguji', $nama);
        $this->load->view('penguji/edit_penilaian_sempro', $data);
        $this->load->view("layout/footer");
    }

    public function penilaian_ujian()
    {
        $username = $this->session->userdata('username');
        $id_tesis = $this->input->post('id');
        if($id_tesis==NULL){
            redirect("Penguji/ujian_tesis");
        }
        $data['tesis'] = $this->M_Tesis->getwhere_tesis_ujian(array('tb_tesis.id'=>$id_tesis))->row();
        $data['nilai'] = $this->M_Nilai->get_nilai()->result();
        $data['penguji1'] = $this->M_Pengujian->getwhere_penguji_ujian(array('id_tesis'=>$id_tesis,'ket'=>"penguji1"))->row();
        $data['penguji2'] = $this->M_Pengujian->getwhere_penguji_ujian(array('id_tesis'=>$id_tesis,'ket'=>"penguji2"))->row();
        $data['penguji3'] = $this->M_Pengujian->getwhere_penguji_ujian(array('id_tesis'=>$id_tesis,'ket'=>"penguji3"))->row();
        $data['penguji4'] = $this->M_Pengujian->getwhere_penguji_ujian(array('id_tesis'=>$id_tesis,'ket'=>"penguji4"))->row();
        $data['penguji5'] = $this->M_Pengujian->getwhere_penguji_ujian(array('id_tesis'=>$id_tesis,'ket'=>"penguji5"))->row();
        $nama['nama'] = $this->M_Pengumuman->get_nama(array('username'=>$username))->row();
        $this->load->view('layout/header_penguji', $nama);
        $this->load->view('penguji/penilaian_ujian', $data);
        $this->load->view("layout/footer");
    }

    public function edit_penilaian_ujian()
    {
        $username = $this->session->userdata('username');
        $id_tesis = $this->input->post('id');
        if($id_tesis==NULL){
            redirect("Penguji/ujian_tesis");
        }
        $data['tesis'] = $this->M_Tesis->getwhere_tesis_ujian(array('tb_tesis.id'=>$id_tesis))->row();
        $data['nilai'] = $this->M_Nilai->get_nilai()->result();
        $data['detail'] = $this->M_Nilai->get_nilai_ujian($id_tesis, $username)->result();
        $data['total'] = $this->M_Pengujian->getwhere_penguji_ujian(array('id_tesis'=>$id_tesis,'id_penguji'=>$username))->row();
        $data['penguji1'] = $this->M_Pengujian->getwhere_penguji_ujian(array('id_tesis'=>$id_tesis,'ket'=>"penguji1"))->row();
        $data['penguji2'] = $this->M_Pengujian->getwhere_penguji_ujian(array('id_tesis'=>$id_tesis,'ket'=>"penguji2"))->row();
        $data['penguji3'] = $this->M_Pengujian->getwhere_penguji_ujian(array('id_tesis'=>$id_tesis,'ket'=>"penguji3"))->row();
        $data['penguji4'] = $this->M_Pengujian->getwhere_penguji_ujian(array('id_tesis'=>$id_tesis,'ket'=>"penguji4"))->row();
        $data['penguji5'] = $this->M_Pengujian->getwhere_penguji_ujian(array('id_tesis'=>$id_tesis,'ket'=>"penguji5"))->row();
        $nama['nama'] = $this->M_Pengumuman->get_nama(array('username'=>$username))->row();
        $this->load->view('layout/header_penguji', $nama);
        $this->load->view('penguji/edit_penilaian_ujian', $data);
        $this->load->view("layout/footer");
    }

    public function addPenilaianSempro()
    {
        $username = $this->session->userdata('username');
        $date = date('Y-m-d');
        $id_tesis = $this->input->post('id',true);
        $nilai1=$this->input->post('nilai1',true);
        $nilai2=$this->input->post('nilai2',true);
        $nilai3=$this->input->post('nilai3',true);
        $nilai4=$this->input->post('nilai4',true);
        $nilai5=$this->input->post('nilai5',true);
        $skor1=$this->input->post('skor1',true);
        $skor2=$this->input->post('skor2',true);
        $skor3=$this->input->post('skor3',true);
        $skor4=$this->input->post('skor4',true);
        $skor5=$this->input->post('skor5',true);
        $totalnilai=$this->input->post('totalnilai',true);
        $komentar=$this->input->post('komentar',true);
        $nilai = [
            "nilai"=>$totalnilai,
            "catatan"=>$komentar,
            "tgl"=>$date,
        ];
        $this->M_Pengujian->update_nilaiTotal($id_tesis,$username,$nilai);

        for ($i=1; $i<6; $i++){
        $detail = [
            "id_penguji"=>$username,
            "id_tesis"=>$id_tesis,
            "id_komponen"=>$i,
            "skor"=>${"skor".$i},
            "nilai"=>${"nilai".$i},
        ];
        $this->M_Pengujian->insert_nilaiSempro($detail);
        $status = [
            "status"=>"Graded",
        ];
        $this->M_Sempro->update_status($status, $id_tesis);

        };
        $file = $_FILES['file'];
        if(empty($file['name'])){}
            else{
            $config['upload_path'] = './assets/saran_sempro';
            $config['encrypt_name'] = TRUE;
            $config['allowed_types'] = 'pdf';

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('file')){
                echo "Upload Gagal"; die();
            } else {
                $file=$this->upload->data('file_name');
            }
            $datafile = [
            "file"=>$file,];
            $this->M_Pengujian->update_nilaiTotal($id_tesis,$username,$datafile);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-block" align="center"><strong>Penilaian berhasil direkam</strong></div>');
        redirect("Penguji/seminar_proposal"); 
    }

    public function updatePenilaianSempro()
    {
        $username = $this->session->userdata('username');
        $date = date('Y-m-d');
        $id_tesis = $this->input->post('id',true);
        $nilai1=$this->input->post('nilai1',true);
        $nilai2=$this->input->post('nilai2',true);
        $nilai3=$this->input->post('nilai3',true);
        $nilai4=$this->input->post('nilai4',true);
        $nilai5=$this->input->post('nilai5',true);
        $skor1=$this->input->post('skor1',true);
        $skor2=$this->input->post('skor2',true);
        $skor3=$this->input->post('skor3',true);
        $skor4=$this->input->post('skor4',true);
        $skor5=$this->input->post('skor5',true);
        $totalnilai=$this->input->post('totalnilai',true);
        $komentar=$this->input->post('komentar',true);
        $nilai = [
            "nilai"=>$totalnilai,
            "catatan"=>$komentar,
            "tgl"=>$date,
        ];
        $this->M_Pengujian->update_nilaiTotal($id_tesis,$username,$nilai);

        for ($i=1; $i<6; $i++){
        $komp = $i;
        $detail = [
            "id_penguji"=>$username,
            "id_tesis"=>$id_tesis,
            "id_komponen"=>$i,
            "skor"=>${"skor".$i},
            "nilai"=>${"nilai".$i},
        ];
        $this->M_Pengujian->update_nilaiSempro($id_tesis,$username,$komp,$detail);
        
        };
        $file = $_FILES['file'];
        if(empty($file['name'])){}
            else{
            $config['upload_path'] = './assets/saran_sempro';
            $config['encrypt_name'] = TRUE;
            $config['allowed_types'] = 'pdf';

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('file')){
                echo "Upload Gagal"; die();
            } else {
                $file=$this->upload->data('file_name');
            }
            $datafile = [
            "file"=>$file,];
            $this->M_Pengujian->update_nilaiTotal($id_tesis,$username,$datafile);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-block" align="center"><strong>Penilaian berhasil direkam</strong></div>');
        redirect("Penguji/seminar_proposal"); 
    }

    public function addPenilaianUjian()
    {
        $username = $this->session->userdata('username');
        $date = date('Y-m-d');
        $id_tesis = $this->input->post('id',true);
        $nilai1=$this->input->post('nilai1',true);
        $nilai2=$this->input->post('nilai2',true);
        $nilai3=$this->input->post('nilai3',true);
        $nilai4=$this->input->post('nilai4',true);
        $skor1=$this->input->post('skor1',true);
        $skor2=$this->input->post('skor2',true);
        $skor3=$this->input->post('skor3',true);
        $skor4=$this->input->post('skor4',true);
        $totalnilai=$this->input->post('totalnilai',true);
        $komentar=$this->input->post('komentar',true);
        $nilai = [
            "nilai"=>$totalnilai,
            "catatan"=>$komentar,
            "tgl"=>$date,
        ];
        $this->M_Pengujian->update_nilaiTotalUjian($id_tesis,$username,$nilai);

        for ($i=1; $i<5; $i++){
        $detail = [
            "id_penguji"=>$username,
            "id_tesis"=>$id_tesis,
            "id_komponen"=>$i,
            "skor"=>${"skor".$i},
            "nilai"=>${"nilai".$i},
        ];
        $this->M_Pengujian->insert_nilaiUjian($detail);
        $status = [
            "status"=>"Graded",
        ];
        $this->M_Ujian->update_status($status, $id_tesis);

        };
        $file = $_FILES['file'];
        if(empty($file['name'])){}
            else{
            $config['upload_path'] = './assets/saran_ujian';
            $config['encrypt_name'] = TRUE;
            $config['allowed_types'] = 'pdf';

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('file')){
                echo "Upload Gagal"; die();
            } else {
                $file=$this->upload->data('file_name');
            }
            $datafile = [
            "file"=>$file,];
            $this->M_Pengujian->update_nilaiTotalUjian($id_tesis,$username,$datafile);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-block" align="center"><strong>Penilaian berhasil direkam</strong></div>');
        redirect("Penguji/ujian_tesis"); 
    }

    public function updatePenilaianUjian()
    {
        $username = $this->session->userdata('username');
        $date = date('Y-m-d');
        $id_tesis = $this->input->post('id',true);
        $nilai1=$this->input->post('nilai1',true);
        $nilai2=$this->input->post('nilai2',true);
        $nilai3=$this->input->post('nilai3',true);
        $nilai4=$this->input->post('nilai4',true);
        $skor1=$this->input->post('skor1',true);
        $skor2=$this->input->post('skor2',true);
        $skor3=$this->input->post('skor3',true);
        $skor4=$this->input->post('skor4',true);
        $totalnilai=$this->input->post('totalnilai',true);
        $komentar=$this->input->post('komentar',true);
        $nilai = [
            "nilai"=>$totalnilai,
            "catatan"=>$komentar,
            "tgl"=>$date,
        ];
        $this->M_Pengujian->update_nilaiTotalUjian($id_tesis,$username,$nilai);

        for ($i=1; $i<5; $i++){
        $komp = $i;
        $detail = [
            "id_penguji"=>$username,
            "id_tesis"=>$id_tesis,
            "id_komponen"=>$i,
            "skor"=>${"skor".$i},
            "nilai"=>${"nilai".$i},
        ];
        $this->M_Pengujian->update_nilaiUjian($id_tesis,$username,$komp,$detail);

        };
        $file = $_FILES['file'];
        if(empty($file['name'])){}
            else{
            $config['upload_path'] = './assets/saran_ujian';
            $config['encrypt_name'] = TRUE;
            $config['allowed_types'] = 'pdf';

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('file')){
                echo "Upload Gagal"; die();
            } else {
                $file=$this->upload->data('file_name');
            }
            $datafile = [
            "file"=>$file,];
            $this->M_Pengujian->update_nilaiTotalUjian($id_tesis,$username,$datafile);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-block" align="center"><strong>Penilaian berhasil direkam</strong></div>');
        redirect("Penguji/ujian_tesis"); 
    }


}