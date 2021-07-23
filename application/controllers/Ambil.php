<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ambil extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // check_not_login();     
        // check_admin();  
        $this->load->model(['loket_m', 'antrian_m', 'antrianloket_m']);
        $this->db->order_by('name', 'ASC');
        // $this->load->model('antrian_m');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $loket = $this->loket_m->get()->result();
        $antrianl = $this->antrianloket_m->get()->result();
        $antrian = $this->antrian_m->get()->result();
        $data = array(
            'loket' => $loket,
            'antrian' => $antrian,
            'antrianloket' => $antrianl
            //           'antrian' => $antrian,
        );
        $this->template->load('tempcard', 'card', $data);
    }

    // public function getNoAntrian(){
    // 	$loket_id = $this->input->post('loket_id');
    // 	$tanggal = date("Y-m-d");

    // 	$this->db->where('id_antrian_loket.loket_id',$loket_id);
    // 	$this->db->where('id_antrian_loket.tgl_antrian_loket',$tanggal);
    // 	$sql = $this->db->get('id_antrian_loket');
    //     $getLoket = $sql->num_rows();//cek jumlah row




    //     if($getLoket==0){//kondisi jika belum ada yg daftar perhari
    //     	$this->db->where('loket_id',$loket_id);
    //     	$sql2 = $this->db->get('loket');
    //     	$rowLoket = $sql2->row();
    //     	$no = 1;
    //     	$ket=$rowLoket->keterangan;
    //     	$noAntrian = $ket.$no;
    //     	$maks = $rowLoket->jumlah_maksimal;

    //     }else{
    //         //kondisi jika sudah ada data per hari
    //     	$this->db->limit(1);
    //     	$this->db->order_by('no_antrian_loket',"DESC");
    //     	$this->db->where('id_antrian_loket.loket_id',$loket_id);
    //     	$this->db->where('id_antrian_loket.tgl_antrian_loket',$tanggal);
    //     	$sql = $this->db->get('id_antrian_loket');
    //     	$rowNo = $sql->row();


    //     	$this->db->where('loket_id',$loket_id);
    //     	$sql2 = $this->db->get('loket');
    //     	$rowLoket = $sql2->row();
    //     	$kode = $rowLoket->keterangan;
    //     	$no = $rowNo->no_antrian_loket + 1;
    //     	// $maks = $rowLoket->jumlah_maksimal;

    //         // var_dump($rowNo); exit();
    //     	$noAntrian = $kode.$no;
    //     }

    //     $hasil = array("no_hasil"=>$noAntrian, "no"=>$no);
    //     echo json_encode($hasil);
    // }

    public function saveAntrian($loket_id, $antri)
    {
        // echo $loket_id;
        // echo '/';
        // echo $antri;
        // $query = $this->antrianloket_m->getAntrian();
        // $no_antrian_loket = substr($this->input->post('no_antrian_loket'), 4);
        $tanggal = date("Y-m-d");
        // $no_antrian_loket = $this->input->post('no_antrian_loket');
        $tambah = $antri + 1;
        // $this->db->set('id_antrian_loket',$id+1);

        // $id_loket = $this->input->post('loket_id');
        $this->db->set('loket_id', $loket_id);
        $this->db->set('no_antrian_loket', $tambah);
        $this->db->set('tgl_antrian_loket', $tanggal);
        $this->db->insert('antrian_loket');

        // $no_antrian = $this->input->post('no_antrian');
        // $no_antrian = $this->input->post('no_antrian');
        $this->db->set('no_antrian', $tambah);
        $this->db->set('tgl_antrian', $tanggal);
        $this->db->insert('antrian');
        //
        redirect('ambil/print/');
    }

    public function print()
    {
        // $tanggal = date("Y-m-d");
        // $where =array('tgl_antrian_loket' => date('Y-m-d'));

        $loket = $this->loket_m->get()->result();
        $antrianl = $this->antrianloket_m->get()->result();
        $antrian = $this->antrian_m->get()->result();

        $data = array(
            'loket' => $loket,
            'antrian' => $antrian,
            'antrianloket' => $antrianl
            //           'antrian' => $antrian,
        );
        $this->load->view('print/print', $data);
    }
}
