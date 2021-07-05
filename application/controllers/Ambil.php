<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ambil extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        check_not_login();     
        check_admin();  
        $this->load->model(['loket_m', 'antrian_m']);
        // $this->load->model('antrian_m');
        $this->load->library('form_validation');
    }

	public function index()
	{
        // $data['row'] = $this->loket_m->get();
        // $data = $this->loket_m->get()->result();
        $loket = $this->loket_m->get()->result();
        $where =array('datestamp' => date('dmY'));
        // $data['antrian'] = $this->antrian_m->get_max_id('antrian', 'nomer', $where);
        $antrian = $this->antrian_m->get_max_id('antrian', 'nomer', $where);
        // $item = $this->item_m->get()->result();
        $data = array(
            'loket' => $loket,
            'antrian' => $antrian,
        );
		$this->template->load('template', 'ambil/ambil', $data);
	}

    public function prosses($id){
		$no_antrian = $id+1;
        $loket = $this->loket_m->get()->result();

        $data = array(
            'loket' => $loket,
        );
		$tgl = date('dmY');
		$cek = $this->antrian_m->get('antrian', array('nomer' => $no_antrian, 'loket_id' => $data,'datestamp' => $tgl))->num_rows();
		if($cek > 0){	
			redirect('ambil');
		}
		else{
			$this->antrian_m->add('antrian', array('nomer' => $no_antrian, 'loket_id' => $loket, 'datestamp' => $tgl));
		}
		redirect('print');
	}

    public function print(){
		// $data['instansi'] = $this->M_crud->show('instansi', 'id_instansi DESC')->row();
		// $data['menu'] = 'menu';
		// $data['content'] = 'print';
		$where =array('datestamp' => date('dmY'));
		$data['antrian'] = $this->antian_m->get_max_id('antrian', 'nomer', $where);
		// $this->load->view('layout', $data);
        $this->template->load('template', 'print/print', $data);
	}
}
