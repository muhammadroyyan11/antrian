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
        $data['antrianloket'] = $this->antrianloket_m->getAntrianByLoketId($user->loket_id)->result();
        $data['loket'] = $this->loket_m->get_id('loket', array('loket_id' => $id))->row();
        $data['row'] = $this->tampil_m->getAll();
        $this->template->load('template2', 'tampil_antrian/tampil_petugas', $data);
    }

    public function next(){
		$tanggal = date("Y-m-d");
		$where =array('loket_id <' => 1, 'tgl_antrian_loket' => $tanggal);
		$noAntrian = $this->antianloket_m->get_id('antrian_loket', $where, 'no_antrian_loket DESC');;
		$data=array('no_antrian_loket' => $noAntrian->row('no_antrian_loket'), 'loket_id' => $this->session->userdata('loket'), 'username' => $this->session->userdata('username'), 'tgl_antrian_loket' => $tanggal);

		$w=array('id_antrian_loket' => $noAntrian->row('id_antrian_loket'));
		$this->M_crud->edit('transaksi', $data, $w);
		redirect('penjaga/loket/');
	}
}