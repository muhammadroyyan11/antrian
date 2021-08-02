<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tampil extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['loket_m', 'antrian_m', 'antrianloket_m', 'tampil_m']);
        $this->load->library('form_validation');
    }

    public function index()
    {
        $loket = $this->tampil_m->get()->result();
        $data = array(
            'loket' => $loket,
        );
        $data['row'] = $this->tampil_m->get();
        $this->template->load('template', 'tampil_antrian/tampil_data', $data);
    }

    public function priview()
    {
        $data['row'] = $this->tampil_m->getAll();
        $this->template->load('template2', 'tampil_antrian/tampil_preview', $data);
    }

    public function petugas()
    {
        $id = $this->session->userdata('userid');
        $user = $this->user_m->get($id)->row();
        $data['antrian'] = $this->antrianloket_m->getAntrianByLoketId($user->loket_id)->result();

        $data['antrianloket'] = $this->next(-1, $this->antrianloket_m->getPanggil($user->loket_id));
        // $data['antrianloket'] = $this->antrianloket_m->getAntrianByLoketId($user->loket_id)->result();
        $data['loket'] = $this->loket_m->get_id('loket', array('loket_id' => $id))->row();
        $data['row'] = $this->tampil_m->getAll();
        $this->template->load('template2', 'tampil_antrian/tampil_petugas', $data);
    }

    public function next($current, $data) {
        $temporary = null;

        if ($current != -1) {
            foreach ($data->result() as $value) {
                if ($temporary != null) {
                    return $value;
                }
                if ($current == $value->no_antrian_loket) {
                    $temporary = $current;
                }
            }

            return null;
        } else {
            return $data->row();
        }
    }

    public function getNext($noAntrian){
        $id = $this->session->userdata('userid');
        $user = $this->user_m->get($id)->row();
        $data['antrian'] = $this->antrianloket_m->getAntrianByLoketId($user->loket_id)->result();

        $data['antrianloket'] = $this->next($noAntrian, $this->antrianloket_m->getPanggil($user->loket_id));
        $data['loket'] = $this->loket_m->get_id('loket', array('loket_id' => $id))->row();
        $data['row'] = $this->tampil_m->getAll();

        $this->template->load('template2', 'tampil_antrian/tampil_petugas', $data);
    }

    // public function next(){
	// 	$tanggal = date("Y-m-d");
    //     $id = $this->session->userdata('userid');
    //     $user = $this->user_m->get($id)->row();
	// 	$data['antrianloket'] = $this->antrianloket_m->getPanggil($user->loket_id)->result();

	// 	redirect('tampil/petugas/', $data);
	// }

    public function sudah()
    {
        $this->db->set('status', 'Selesai');
        $this->db->insert('antrian_loket');
        
        redirect('tampil/petugas/');
    }
}