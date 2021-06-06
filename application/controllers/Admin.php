<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';

function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('M_Login');
        $current_user=$this->M_Login->is_role();
        //cek session dan level user
        if($this->M_Login->is_role() != "1"){
            redirect("welcome/");
        }
        $this->load->model('M_Admin');
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
        $this->load->view('layout/header_admin', $username);
        $this->load->view('admin/dashboard', $data);
        $this->load->view("layout/footer");
    }

    public function detail_sempro()
    {
        $username = $this->session->userdata('username');
        $id_tesis = $this->input->post('id');
        if($id_tesis==NULL){
            redirect("Admin/seminar_proposal");
        }
        $data['tesis'] = $this->M_Tesis->getwhere_tesis(array('tb_tesis.id'=>$id_tesis))->row();
        $data['view'] = $this->M_Sempro->getwhere_sempro(array('id_tesis'=>$id_tesis))->row();
        $data['app'] = $this->M_Nilai->get_app_sempro()->result();
        $data['penguji1'] = $this->M_Pengujian->getwhere_penguji(array('id_tesis'=>$id_tesis,'ket'=>"penguji1"))->row();
        $data['penguji2'] = $this->M_Pengujian->getwhere_penguji(array('id_tesis'=>$id_tesis,'ket'=>"penguji2"))->row();
        $data['penguji3'] = $this->M_Pengujian->getwhere_penguji(array('id_tesis'=>$id_tesis,'ket'=>"penguji3"))->row();
        $data['penguji4'] = $this->M_Pengujian->getwhere_penguji(array('id_tesis'=>$id_tesis,'ket'=>"penguji4"))->row();
        $data['penguji5'] = $this->M_Pengujian->getwhere_penguji(array('id_tesis'=>$id_tesis,'ket'=>"penguji5"))->row();
        $this->load->view('layout/header_admin', $username);
        $this->load->view('admin/detail_sempro', $data);
        $this->load->view("layout/footer"); 
    }

    public function detail_ujian ()
    {
        $username = $this->session->userdata('username');
        $id_tesis = $this->input->post('id');
        if($id_tesis==NULL){
            redirect("Admin/ujian_tesis");
        }
        $data['tesis'] = $this->M_Tesis->getwhere_tesis_ujian(array('tb_tesis.id'=>$id_tesis))->row();
        $data['view'] = $this->M_Ujian->getwhere_ujian(array('id_tesis'=>$id_tesis))->row();
        $data['app'] = $this->M_Nilai->get_app_sempro()->result();
        $data['penguji1'] = $this->M_Pengujian->getwhere_penguji_ujian(array('id_tesis'=>$id_tesis,'ket'=>"penguji1"))->row();
        $data['penguji2'] = $this->M_Pengujian->getwhere_penguji_ujian(array('id_tesis'=>$id_tesis,'ket'=>"penguji2"))->row();
        $data['penguji3'] = $this->M_Pengujian->getwhere_penguji_ujian(array('id_tesis'=>$id_tesis,'ket'=>"penguji3"))->row();
        $data['penguji4'] = $this->M_Pengujian->getwhere_penguji_ujian(array('id_tesis'=>$id_tesis,'ket'=>"penguji4"))->row();
        $data['penguji5'] = $this->M_Pengujian->getwhere_penguji_ujian(array('id_tesis'=>$id_tesis,'ket'=>"penguji5"))->row();
        $this->load->view('layout/header_admin', $username);
        $this->load->view('admin/detail_ujian', $data);
        $this->load->view("layout/footer");
    }

    public function ba_sempro()
    {
        $username = $this->session->userdata('username');
        $id_tesis = $this->input->post('id');
        if($id_tesis==NULL){
            redirect("Admin/ApprovalSempro");
        }
        $data['tesis'] = $this->M_Tesis->getwhere_tesis(array('tb_tesis.id'=>$id_tesis))->row();
        $data['view'] = $this->M_Sempro->getwhere_sempro(array('id_tesis'=>$id_tesis))->row();
        $data['app'] = $this->M_Nilai->get_app_sempro()->result();
        $data['penguji1'] = $this->M_Pengujian->getwhere_penguji(array('id_tesis'=>$id_tesis,'ket'=>"penguji1"))->row();
        $data['penguji2'] = $this->M_Pengujian->getwhere_penguji(array('id_tesis'=>$id_tesis,'ket'=>"penguji2"))->row();
        $data['penguji3'] = $this->M_Pengujian->getwhere_penguji(array('id_tesis'=>$id_tesis,'ket'=>"penguji3"))->row();
        $data['penguji4'] = $this->M_Pengujian->getwhere_penguji(array('id_tesis'=>$id_tesis,'ket'=>"penguji4"))->row();
        $data['penguji5'] = $this->M_Pengujian->getwhere_penguji(array('id_tesis'=>$id_tesis,'ket'=>"penguji5"))->row();
        $this->load->view('layout/header_admin', $username);
        $this->load->view('admin/ba_sempro', $data);
        $this->load->view("layout/footer");
    }

    public function ba_ujian()
    {
        $username = $this->session->userdata('username');
        $id_tesis = $this->input->post('id');
        if($id_tesis==NULL){
            redirect("Admin/ApprovalUjian");
        }
        $data['tesis'] = $this->M_Tesis->getwhere_tesis_ujian(array('tb_tesis.id'=>$id_tesis))->row();
        $data['view'] = $this->M_Ujian->getwhere_ujian(array('id_tesis'=>$id_tesis))->row();
        $data['app'] = $this->M_Nilai->get_app_sempro()->result();
        $data['penguji1'] = $this->M_Pengujian->getwhere_penguji_ujian(array('id_tesis'=>$id_tesis,'ket'=>"penguji1"))->row();
        $data['penguji2'] = $this->M_Pengujian->getwhere_penguji_ujian(array('id_tesis'=>$id_tesis,'ket'=>"penguji2"))->row();
        $data['penguji3'] = $this->M_Pengujian->getwhere_penguji_ujian(array('id_tesis'=>$id_tesis,'ket'=>"penguji3"))->row();
        $data['penguji4'] = $this->M_Pengujian->getwhere_penguji_ujian(array('id_tesis'=>$id_tesis,'ket'=>"penguji4"))->row();
        $data['penguji5'] = $this->M_Pengujian->getwhere_penguji_ujian(array('id_tesis'=>$id_tesis,'ket'=>"penguji5"))->row();
        $this->load->view('layout/header_admin', $username);
        $this->load->view('admin/ba_ujian', $data);
        $this->load->view("layout/footer");
    }

    public function print_sempro()
    {
        $id_tesis = $this->input->post('id',true);
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('assets/template/template1.docx');
        $judul = $this->input->post('judul',true);
        $tgl = $this->input->post('tgl',true);
        $tgl_new = date('Y-m-d', strtotime($tgl));
        $tgl_indo = tgl_indo($tgl_new);
        $tempat = $this->input->post('tempat',true);
        $status = $this->input->post('app',true);
        $nama = $this->input->post('nama',true);
        $nim = $this->input->post('nim',true);
        $now = tgl_indo(date('Y-m-d'));
        $penguji1=$this->input->post('penguji1',true);
        $penguji2=$this->input->post('penguji2',true);
        $penguji3=$this->input->post('penguji3',true);
        $penguji4=$this->input->post('penguji4',true);
        $penguji5=$this->input->post('penguji5',true);
        $nilai1=$this->input->post('nilai1',true);
        $nilai2=$this->input->post('nilai2',true);
        $nilai3=$this->input->post('nilai3',true);
        $nilai4=$this->input->post('nilai4',true);
        $nilai5=$this->input->post('nilai5',true);
        $cat1=$this->input->post('cat1',true);
        $cat2=$this->input->post('cat2',true);
        $cat3=$this->input->post('cat3',true);
        $cat4=$this->input->post('cat4',true);
        $cat5=$this->input->post('cat5',true);
        $total=$this->input->post('total',true);
        if($total>=80 && $total<=100){
            $grade = "A";
        }
        elseif($total>=70 && $total<=79){
            $grade = "B";
        }
        elseif($total>=55 && $total<=69){
            $grade = "C";
        }
        elseif($total>=45 && $total<=54){
            $grade = "D";
        }
        elseif($total<=44){
            $grade = "E";
        }
        $templateProcessor->setValues([
        'tgl' => "$tgl_indo",
        'now' => "$now",
        'tempat' => "$tempat",
        'nama' => "$nama",
        'nim' => "$nim",
        'judul' => "$judul",
        'penguji1' => "$penguji1",
        'penguji2' => "$penguji2",
        'penguji3' => "$penguji3",
        'penguji4' => "$penguji4",
        'penguji5' => "$penguji5",
        'nilai1' => "$nilai1",
        'nilai2' => "$nilai2",
        'nilai3' => "$nilai3",
        'nilai4' => "$nilai4",
        'nilai5' => "$nilai5",
        'komentar1' => "$cat1".",",
        'komentar2' => "$cat2".",",
        'komentar3' => "$cat3".",",
        'komentar4' => "$cat4".",",
        'komentar5' => "$cat5".",",
        'app' => "$status",
        'rata' => "$total",
        'grade' => "$grade",
        ]);

        header("Content-Disposition: attachment; filename=Berita Acara Sempro.docx");

        $templateProcessor->saveAs('php://output');
    }

    public function print_ujian()
    {
        $id_tesis = $this->input->post('id',true);
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('assets/template/template2.docx');
        $judul = $this->input->post('judul',true);
        $tgl = $this->input->post('tgl',true);
        $tgl_new = date('Y-m-d', strtotime($tgl));
        $tgl_indo = tgl_indo($tgl_new);
        $now = tgl_indo(date('Y-m-d'));
        $tempat = $this->input->post('tempat',true);
        $status = $this->input->post('app',true);
        $nama = $this->input->post('nama',true);
        $nim = $this->input->post('nim',true);
        $lama = $this->input->post('lama',true);
        $penguji1=$this->input->post('penguji1',true);
        $penguji2=$this->input->post('penguji2',true);
        $penguji3=$this->input->post('penguji3',true);
        $penguji4=$this->input->post('penguji4',true);
        $penguji5=$this->input->post('penguji5',true);
        $nilai1=$this->input->post('nilai1',true);
        $nilai2=$this->input->post('nilai2',true);
        $nilai3=$this->input->post('nilai3',true);
        $nilai4=$this->input->post('nilai4',true);
        $nilai5=$this->input->post('nilai5',true);
        $total=$this->input->post('total',true);
        if($total>=80 && $total<=100){
            $grade = "A";
        }
        elseif($total>=70 && $total<=79){
            $grade = "B";
        }
        elseif($total>=55 && $total<=69){
            $grade = "C";
        }
        elseif($total>=45 && $total<=54){
            $grade = "D";
        }
        elseif($total<=44){
            $grade = "E";
        }
        $templateProcessor->setValues([
        'tgl' => "$tgl_indo",
        'now' => "$now",
        'tempat' => "$tempat",
        'nama' => "$nama",
        'nim' => "$nim",
        'judul' => "$judul",
        'penguji1' => "$penguji1",
        'penguji2' => "$penguji2",
        'penguji3' => "$penguji3",
        'penguji4' => "$penguji4",
        'penguji5' => "$penguji5",
        'nilai1' => "$nilai1",
        'nilai2' => "$nilai2",
        'nilai3' => "$nilai3",
        'nilai4' => "$nilai4",
        'nilai5' => "$nilai5",
        'revisi' => "$lama"." minggu",
        'app' => "$status",
        'rata' => "$total",
        'grade' => "$grade",
        ]);

        header("Content-Disposition: attachment; filename=Berita Acara Ujian Tesis.docx");

        $templateProcessor->saveAs('php://output');
    }

    public function berita()
    {
        $username = $this->session->userdata('username');
        $data['berita'] = $this->M_Pengumuman->get_berita(array('id'=>1))->row();
        $this->load->view('layout/header_admin', $username);
        $this->load->view('admin/berita', $data);
        $this->load->view("layout/footer");
    }

    public function updateBerita()
    {
        $username = $this->session->userdata('username');
        $content=$this->input->post('content',true);
        $berita = [
            'pengumuman'=>$content,
        ];
        $this->M_Pengumuman->update_berita(array('id'=>1),$berita);
        redirect("admin"); 
    }


    public function seminar_proposal()
    {
        $username = $this->session->userdata('username');
        $data['view'] = $this->M_Sempro->get_sempro()->result();
        $this->load->view('layout/header_admin', $username);
        $this->load->view('admin/seminar_proposal', $data);
        // $this->load->view("layout/footer");
    }

    public function tambah_sempro()
    {
        $username = $this->session->userdata('username');
        $data['dosen']= $this->M_Dosen->get_dosen()->result();
        $this->load->view('layout/header_admin', $username);
        $this->load->view('admin/tambah_seminar_proposal', $data);
        $this->load->view("layout/footer");
    }

    public function add_sempro()
    {
        $username = $this->session->userdata('username');
        $date = date('Y-m-d');
        $nim = $this->input->post('nim',true);
        $judul = $this->input->post('judul',true);
        $penguji1=$this->input->post('dosen1',true);
        $penguji2=$this->input->post('dosen2',true);
        $penguji3=$this->input->post('dosen3',true);
        $penguji4=$this->input->post('dosen4',true);
        $penguji5=$this->input->post('dosen5',true);
        $tesis = [
            "nim"=>$nim,
            "nama"=>$this->input->post('nama',true),
            "judul"=>$judul,
            "id_pembimbing1"=>$penguji1,
            "id_pembimbing2"=>$penguji2,
            "status"=>"Waiting Sempro",
        ];
        $id_tesis = $this->M_Tesis->insert_tesis($tesis,$nim,$judul);
        $sempro = [
            "id_tesis"=>$id_tesis,
            "tgl"=>$this->input->post('tgl',true),
            "tempat"=>$this->input->post('tempat',true),
        ];
        $this->M_Sempro->insert_sempro($sempro,$id_tesis);

        $dosen1 = ["ket"=>"penguji1",
                    "id_tesis"=>$id_tesis,
                    "id_penguji"=>$penguji1];
        $this->M_Pengujian->insert_penguji_sempro($dosen1,$id_tesis,$penguji1);

        $dosen2 = ["ket"=>"penguji2",
                    "id_tesis"=>$id_tesis,
                    "id_penguji"=>$penguji2];
        $this->M_Pengujian->insert_penguji_sempro($dosen2,$id_tesis,$penguji2);

        if(empty($penguji3)){}
        else{
            $dosen3 = ["ket"=>"penguji3",
                        "id_tesis"=>$id_tesis,
                        "id_penguji"=>$penguji3];
            $this->M_Pengujian->insert_penguji_sempro($dosen3,$id_tesis,$penguji3);
        }

        if(empty($penguji4)){}
        else{
            $dosen4 = ["ket"=>"penguji4",
                        "id_tesis"=>$id_tesis,
                        "id_penguji"=>$penguji4];
            $this->M_Pengujian->insert_penguji_sempro($dosen4,$id_tesis,$penguji4);
        }

        if(empty($penguji5)){}
        else{
            $dosen5 = ["ket"=>"penguji5",
                        "id_tesis"=>$id_tesis,
                        "id_penguji"=>$penguji5];
            $this->M_Pengujian->insert_penguji_sempro($dosen5,$id_tesis,$penguji5);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-block" align="center"><strong>Data berhasil direkam</strong></div>');
        redirect("admin/seminar_proposal"); 
    }

    public function ujian_tesis()
    {
        $username = $this->session->userdata('username');
        $data['view'] = $this->M_Ujian->get_ujian()->result();
        $this->load->view('layout/header_admin', $username);
        $this->load->view('admin/ujian_tesis', $data);
        // $this->load->view("layout/footer");
    }

    public function tambah_ujian()
    {
        $username = $this->session->userdata('username');
        $data['dosen']= $this->M_Dosen->get_dosen()->result();
        $this->load->view('layout/header_admin', $username);
        $this->load->view('admin/tambah_ujian_akhir', $data);
        $this->load->view("layout/footer");
    }

    public function add_ujian()
    {
        $username = $this->session->userdata('username');
        $date = date('Y-m-d');
        $nim = $this->input->post('nim',true);
        $judul = $this->input->post('judul',true);
        $penguji1=$this->input->post('dosen1',true);
        $penguji2=$this->input->post('dosen2',true);
        $penguji3=$this->input->post('dosen3',true);
        $penguji4=$this->input->post('dosen4',true);
        $penguji5=$this->input->post('dosen5',true);
        $tesis = [
            "nim"=>$nim,
            "nama"=>$this->input->post('nama',true),
            "judul"=>$judul,
            "id_pembimbing1"=>$penguji1,
            "id_pembimbing2"=>$penguji2,
            "status"=>"Waiting Sempro",
        ];
        $id_tesis = $this->M_Tesis->insert_tesis($tesis,$nim,$judul);
        $ujian = [
            "id_tesis"=>$id_tesis,
            "tgl"=>$this->input->post('tgl',true),
            "tempat"=>$this->input->post('tempat',true),
        ];
        $this->M_Ujian->insert_ujian($ujian,$id_tesis);

        $dosen1 = ["ket"=>"penguji1",
                    "id_tesis"=>$id_tesis,
                    "id_penguji"=>$penguji1];
        $this->M_Pengujian->insert_penguji_ujian($dosen1,$id_tesis,$penguji1);

        $dosen2 = ["ket"=>"penguji2",
                    "id_tesis"=>$id_tesis,
                    "id_penguji"=>$penguji2];
        $this->M_Pengujian->insert_penguji_ujian($dosen2,$id_tesis,$penguji2);

        if(empty($penguji3)){}
        else{
            $dosen3 = ["ket"=>"penguji3",
                        "id_tesis"=>$id_tesis,
                        "id_penguji"=>$penguji3];
            $this->M_Pengujian->insert_penguji_ujian($dosen3,$id_tesis,$penguji3);
        }

        if(empty($penguji4)){}
        else{
            $dosen4 = ["ket"=>"penguji4",
                        "id_tesis"=>$id_tesis,
                        "id_penguji"=>$penguji4];
            $this->M_Pengujian->insert_penguji_ujian($dosen4,$id_tesis,$penguji4);
        }

        if(empty($penguji5)){}
        else{
            $dosen5 = ["ket"=>"penguji5",
                        "id_tesis"=>$id_tesis,
                        "id_penguji"=>$penguji5];
            $this->M_Pengujian->insert_penguji_ujian($dosen5,$id_tesis,$penguji5);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-block" align="center"><strong>Data berhasil direkam</strong></div>');
        redirect("admin/ujian_tesis"); 
    }

    public function daftar_tesis()
    {
        $username = $this->session->userdata('username');
        $data['view'] = $this->M_Tesis->get_tesis()->result();
        $this->load->view('layout/header_admin', $username);
        $this->load->view('admin/daftar_tesis', $data);
        // $this->load->view("layout/footer");
    }

    public function ApprovalSempro ()
    {
        $username = $this->session->userdata('username');
        $data['view'] = $this->M_Sempro->get_appsempro()->result();
        $this->load->view('layout/header_admin', $username);
        $this->load->view('admin/approval_sempro', $data);
        // $this->load->view("layout/footer");
    }

    public function SetApprovalSempro ()
    {
        $username = $this->session->userdata('username');
        $id_tesis = $this->input->post('id');
        if($id_tesis==NULL){
            redirect("Admin/ApprovalSempro");
        }
        $data['tesis'] = $this->M_Tesis->getwhere_tesis(array('tb_tesis.id'=>$id_tesis))->row();
        $data['view'] = $this->M_Sempro->getwhere_sempro(array('id_tesis'=>$id_tesis))->row();
        $data['app'] = $this->M_Nilai->get_app_sempro()->result();
        $data['penguji1'] = $this->M_Pengujian->getwhere_penguji(array('id_tesis'=>$id_tesis,'ket'=>"penguji1"))->row();
        $data['penguji2'] = $this->M_Pengujian->getwhere_penguji(array('id_tesis'=>$id_tesis,'ket'=>"penguji2"))->row();
        $data['penguji3'] = $this->M_Pengujian->getwhere_penguji(array('id_tesis'=>$id_tesis,'ket'=>"penguji3"))->row();
        $data['penguji4'] = $this->M_Pengujian->getwhere_penguji(array('id_tesis'=>$id_tesis,'ket'=>"penguji4"))->row();
        $data['penguji5'] = $this->M_Pengujian->getwhere_penguji(array('id_tesis'=>$id_tesis,'ket'=>"penguji5"))->row();
        $this->load->view('layout/header_admin', $username);
        $this->load->view('admin/set_approval_sempro', $data);
        $this->load->view("layout/footer");
    }

    public function ApprovalUJian ()
    {
        $username = $this->session->userdata('username');
        $data['view'] = $this->M_Ujian->get_appujian()->result();
        $this->load->view('layout/header_admin', $username);
        $this->load->view('admin/approval_ujian', $data);
        // $this->load->view("layout/footer");
    }

    public function SetApprovalUJian ()
    {
        $username = $this->session->userdata('username');
        $id_tesis = $this->input->post('id');
        if($id_tesis==NULL){
            redirect("Admin/ApprovalUjian");
        }
        $data['tesis'] = $this->M_Tesis->getwhere_tesis_ujian(array('tb_tesis.id'=>$id_tesis))->row();
        $data['view'] = $this->M_Ujian->getwhere_ujian(array('id_tesis'=>$id_tesis))->row();
        $data['app'] = $this->M_Nilai->get_app_ujian()->result();
        $data['penguji1'] = $this->M_Pengujian->getwhere_penguji_ujian(array('id_tesis'=>$id_tesis,'ket'=>"penguji1"))->row();
        $data['penguji2'] = $this->M_Pengujian->getwhere_penguji_ujian(array('id_tesis'=>$id_tesis,'ket'=>"penguji2"))->row();
        $data['penguji3'] = $this->M_Pengujian->getwhere_penguji_ujian(array('id_tesis'=>$id_tesis,'ket'=>"penguji3"))->row();
        $data['penguji4'] = $this->M_Pengujian->getwhere_penguji_ujian(array('id_tesis'=>$id_tesis,'ket'=>"penguji4"))->row();
        $data['penguji5'] = $this->M_Pengujian->getwhere_penguji_ujian(array('id_tesis'=>$id_tesis,'ket'=>"penguji5"))->row();
        $this->load->view('layout/header_admin', $username);
        $this->load->view('admin/set_approval_ujian', $data);
        $this->load->view("layout/footer");
    }

    public function add_app_sempro()
    {
        $username = $this->session->userdata('username');
        $id_tesis = $this->input->post('id',true);
        $total = $this->input->post('total',true);
        $app=$this->input->post('app',true);
        $status = [
            "status"=>$app,
            "nilai"=>$total,
        ];
        $this->M_Sempro->update_status($status,$id_tesis);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-block" align="center"><strong>Data berhasil direkam</strong></div>');
        redirect("admin/ApprovalSempro"); 
    }

    public function add_app_ujian()
    {
        $username = $this->session->userdata('username');
        $id_tesis = $this->input->post('id',true);
        $total = $this->input->post('total',true);
        $app = $this->input->post('app',true);
        $lama = $this->input->post('lama',true);
        $status = [
            "status"=>$app,
            "nilai"=>$total,
            "lama"=>$lama,
        ];
        $this->M_Ujian->update_status($status,$id_tesis);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-block" align="center"><strong>Data berhasil direkam</strong></div>');
        redirect("admin/ApprovalUjian"); 
    }

    public function delete_sempro()
    {
        $username = $this->session->userdata('username'); 
        $id_tesis = $this->input->post('id');
        $this->M_Sempro->del_sempro(array('id_tesis'=>"$id_tesis"));
        $this->M_Tesis->del_tesis(array('id'=>"$id_tesis"));
        redirect("admin/seminar_proposal"); 
    }

    public function delete_ujian()
    {
        $username = $this->session->userdata('username'); 
        $id_tesis = $this->input->post('id');
        $this->M_Ujian->del_ujian(array('id_tesis'=>"$id_tesis"));
        $this->M_Tesis->del_tesis(array('id'=>"$id_tesis"));
        redirect("admin/ujian_tesis"); 
    }

    public function edit_sempro()
    {
        $username = $this->session->userdata('username');
        $id_tesis = $this->input->post('id');
        if($id_tesis==NULL){
            redirect("Admin/seminar_proposal");
        }
        $data['tesis'] = $this->M_Tesis->getwhere_tesis(array('tb_tesis.id'=>$id_tesis))->row();
        $data['view'] = $this->M_Sempro->getwhere_sempro(array('id_tesis'=>$id_tesis))->row();
        $data['dosen']= $this->M_Dosen->get_dosen()->result();
        $data['penguji1'] = $this->M_Pengujian->getwhere_penguji(array('id_tesis'=>$id_tesis,'ket'=>"penguji1"))->row();
        $data['penguji2'] = $this->M_Pengujian->getwhere_penguji(array('id_tesis'=>$id_tesis,'ket'=>"penguji2"))->row();
        $data['penguji3'] = $this->M_Pengujian->getwhere_penguji(array('id_tesis'=>$id_tesis,'ket'=>"penguji3"))->row();
        $data['penguji4'] = $this->M_Pengujian->getwhere_penguji(array('id_tesis'=>$id_tesis,'ket'=>"penguji4"))->row();
        $data['penguji5'] = $this->M_Pengujian->getwhere_penguji(array('id_tesis'=>$id_tesis,'ket'=>"penguji5"))->row();
        $this->load->view('layout/header_admin', $username);
        $this->load->view('admin/edit_sempro', $data);
        $this->load->view("layout/footer");
    }

    public function edit_ujian()
    {
        $username = $this->session->userdata('username');
        $id_tesis = $this->input->post('id');
        if($id_tesis==NULL){
            redirect("Admin/ujian_tesis");
        }
        $data['tesis'] = $this->M_Tesis->getwhere_tesis_ujian(array('tb_tesis.id'=>$id_tesis))->row();
        $data['view'] = $this->M_Ujian->getwhere_ujian(array('id_tesis'=>$id_tesis))->row();
        $data['dosen']= $this->M_Dosen->get_dosen()->result();
        $data['penguji1'] = $this->M_Pengujian->getwhere_penguji_ujian(array('id_tesis'=>$id_tesis,'ket'=>"penguji1"))->row();
        $data['penguji2'] = $this->M_Pengujian->getwhere_penguji_ujian(array('id_tesis'=>$id_tesis,'ket'=>"penguji2"))->row();
        $data['penguji3'] = $this->M_Pengujian->getwhere_penguji_ujian(array('id_tesis'=>$id_tesis,'ket'=>"penguji3"))->row();
        $data['penguji4'] = $this->M_Pengujian->getwhere_penguji_ujian(array('id_tesis'=>$id_tesis,'ket'=>"penguji4"))->row();
        $data['penguji5'] = $this->M_Pengujian->getwhere_penguji_ujian(array('id_tesis'=>$id_tesis,'ket'=>"penguji5"))->row();
        $this->load->view('layout/header_admin', $username);
        $this->load->view('admin/edit_ujian', $data);
        $this->load->view("layout/footer");
    }

    public function dosen()
    {
        $username = $this->session->userdata('username');
        $data['dosen']= $this->M_Dosen->get_dosen()->result();
        $this->load->view('layout/header_admin', $username);
        $this->load->view('admin/dosen', $data);
        // $this->load->view("layout/footer");
    }

    public function tambah_dosen()
    {
        $username = $this->session->userdata('username');
        $data['dosen']= $this->M_Dosen->get_dosen()->result();
        $this->load->view('layout/header_admin', $username);
        $this->load->view('admin/tambah_dosen', $data);
        $this->load->view("layout/footer");
    }

    public function edit_dosen()
    {
        $username = $this->input->post('username');
        if($username==NULL){
            redirect("Admin/dosen");
        }
        $data['dosen']= $this->M_Dosen->getwhere_dosen(array('username'=>"$username"))->row();
        $this->load->view('layout/header_admin', $username);
        $this->load->view('admin/edit_dosen', $data);
        $this->load->view("layout/footer");
    }

    public function addDosen()
    {
        $username = $this->input->post('nip',true);
        $nama = $this->input->post('nama',true);
        $jabatan=$this->input->post('jabatan',true);
        $status=$this->input->post('status',true);
        $prodi=$this->input->post('prodi',true);
        $dosen = [
            "username"=>$username,
            "nama"=>$nama,
            "jabatan"=>$jabatan,
            "prodi"=>$prodi,
            "status_pegawai"=>$status,
        ];
        $akun = [
            "username"=>$username,
            "password"=>MD5($username),
            "role"=>2,
        ];
        $this->M_Dosen->insert_dosen($dosen,$username);
        $this->M_Dosen->insert_akun($akun,$username);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-block" align="center"><strong>Data berhasil direkam</strong></div>');
        redirect("admin/dosen"); 
    }

    public function updateDosen()
    {
        $username = $this->input->post('nip',true);
        $nama = $this->input->post('nama',true);
        $jabatan=$this->input->post('jabatan',true);
        $status=$this->input->post('status',true);
        $prodi=$this->input->post('prodi',true);
        $dosen = [
            "nama"=>$nama,
            "jabatan"=>$jabatan,
            "prodi"=>$prodi,
            "status_pegawai"=>$status,
        ];
        $this->M_Dosen->update_dosen($dosen,$username);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-block" align="center"><strong>Data berhasil direkam</strong></div>');
        redirect("admin/dosen"); 
    }

    public function delete_dosen()
    {
        $username = $this->input->post('username');
        $this->M_Dosen->del_dosen(array('username'=>"$username"));
        $this->M_Dosen->del_akun(array('username'=>"$username"));
        redirect("admin/dosen"); 
    }

    public function akun()
    {
        $username = $this->input->post('username');
        if($username==NULL){
            redirect("Admin/dosen");
        }
        $data['dosen']= $this->M_Dosen->getwhere_dosen(array('username'=>"$username"))->row();
        $this->load->view('layout/header_admin', $username);
        $this->load->view('admin/akun_dosen', $data);
        $this->load->view("layout/footer");
    }

    public function changePass()
    {
        $username = $this->input->post('username',true);
        $pass = $this->input->post('pass',true);
        $password = [
            'password'=>MD5($pass),
        ];
        echo "$pass";
        echo "$username";
        $this->M_Dosen->changePass($username, $password);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-block" align="center"><strong>Data berhasil direkam</strong></div>');
        redirect("admin/dosen"); 
    }

    public function update_sempro()
    {
        $username = $this->session->userdata('username');
        $date = date('Y-m-d');
        $id_tesis = $this->input->post('id',true);
        $nim = $this->input->post('nim',true);
        $judul = $this->input->post('judul',true);
        $penguji1=$this->input->post('dosen1',true);
        $penguji2=$this->input->post('dosen2',true);
        $penguji3=$this->input->post('dosen3',true);
        $penguji4=$this->input->post('dosen4',true);
        $penguji5=$this->input->post('dosen5',true);
        $tesis = [
            "nim"=>$nim,
            "nama"=>$this->input->post('nama',true),
            "judul"=>$judul,
            "id_pembimbing1"=>$penguji1,
            "id_pembimbing2"=>$penguji2,
        ];
        $this->M_Tesis->update_tesis($tesis,$id_tesis);
        $sempro = [
            "tgl"=>$this->input->post('tgl',true),
            "tempat"=>$this->input->post('tempat',true),
        ];
        $this->M_Sempro->update_sempro($sempro,$id_tesis);
        $ket1 = "penguji1";
        $dosen1 = [ "ket"=>"penguji1",
                    "id_tesis"=>$id_tesis,
                    "id_penguji"=>$penguji1];
        $this->M_Pengujian->update_penguji($dosen1,$id_tesis,$ket1);
        $ket2 = "penguji2";
        $dosen2 = [ "ket"=>"penguji2",
                    "id_tesis"=>$id_tesis,
                    "id_penguji"=>$penguji2];
        $this->M_Pengujian->update_penguji($dosen2,$id_tesis,$ket2);

        if(empty($penguji3)){}
        else{
            $ket3 = "penguji3";
            $dosen3 = [ "ket"=>"penguji3",
                        "id_tesis"=>$id_tesis,
                        "id_penguji"=>$penguji3];
        $this->M_Pengujian->update_penguji($dosen3,$id_tesis,$ket3);
        }

        if(empty($penguji4)){}
        else{
            $ket4 = "penguji4";
            $dosen4 = [ "ket"=>"penguji4",
                        "id_tesis"=>$id_tesis,  
                        "id_penguji"=>$penguji4];
        $this->M_Pengujian->update_penguji($dosen4,$id_tesis,$ket4);
        }

        if(empty($penguji5)){}
        else{
            $ket5 = "penguji5";
            $dosen5 = [ "ket"=>"penguji5",
                        "id_tesis"=>$id_tesis,  
                        "id_penguji"=>$penguji5];
        $this->M_Pengujian->update_penguji($dosen5,$id_tesis,$ket5);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-block" align="center"><strong>Data berhasil direkam</strong></div>');
        redirect("admin/seminar_proposal"); 
    }

    public function update_ujian()
    {
        $username = $this->session->userdata('username');
        $date = date('Y-m-d');
        $id_tesis = $this->input->post('id',true);
        $nim = $this->input->post('nim',true);
        $judul = $this->input->post('judul',true);
        $penguji1=$this->input->post('dosen1',true);
        $penguji2=$this->input->post('dosen2',true);
        $penguji3=$this->input->post('dosen3',true);
        $penguji4=$this->input->post('dosen4',true);
        $penguji5=$this->input->post('dosen5',true);
        $tesis = [
            "nim"=>$nim,
            "nama"=>$this->input->post('nama',true),
            "judul"=>$judul,
            "id_pembimbing1"=>$penguji1,
            "id_pembimbing2"=>$penguji2,
        ];
        $this->M_Tesis->update_tesis($tesis,$id_tesis);
        $ujian = [
            "tgl"=>$this->input->post('tgl',true),
            "tempat"=>$this->input->post('tempat',true),
        ];
        $this->M_Ujian->update_ujian($ujian,$id_tesis);
        $ket1 = "penguji1";
        $dosen1 = [ "ket"=>"penguji1",
                    "id_tesis"=>$id_tesis,
                    "id_penguji"=>$penguji1];
        $this->M_Pengujian->update_penguji_ujian($dosen1,$id_tesis,$ket1);
        $ket2 = "penguji2";
        $dosen2 = [ "ket"=>"penguji2",
                    "id_tesis"=>$id_tesis,
                    "id_penguji"=>$penguji2];
        $this->M_Pengujian->update_penguji_ujian($dosen2,$id_tesis,$ket2);

        if(empty($penguji3)){}
        else{
            $ket3 = "penguji3";
            $dosen3 = [ "ket"=>"penguji3",
                        "id_tesis"=>$id_tesis,
                        "id_penguji"=>$penguji3];
        $this->M_Pengujian->update_penguji_ujian($dosen3,$id_tesis,$ket3);
        }

        if(empty($penguji4)){}
        else{
            $ket4 = "penguji4";
            $dosen4 = [ "ket"=>"penguji4",
                        "id_tesis"=>$id_tesis,
                        "id_penguji"=>$penguji4];
        $this->M_Pengujian->update_penguji_ujian($dosen4,$id_tesis,$ket4);
        }

        if(empty($penguji5)){}
        else{
            $ket5 = "penguji5";
            $dosen5 = [ "ket"=>"penguji5",
                        "id_tesis"=>$id_tesis,
                        "id_penguji"=>$penguji5];
        $this->M_Pengujian->update_penguji_ujian($dosen5,$id_tesis,$ket5);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-block" align="center"><strong>Data berhasil direkam</strong></div>');
        redirect("admin/ujian_tesis"); 
    }

    public function cancelApprovalSempro()
    {
        $id_tesis = $this->input->post('id',true);
        $status = [
            "status"=>"Graded",
        ];
        $this->M_Sempro->update_status($status,$id_tesis);
        redirect("admin/ApprovalSempro"); 
    }

    public function cancelApprovalUjian()
    {
        $id_tesis = $this->input->post('id',true);
        $status = [
            "status"=>"Graded",
        ];
        $this->M_Ujian->update_status($status,$id_tesis);
        redirect("admin/ApprovalUjian"); 
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}