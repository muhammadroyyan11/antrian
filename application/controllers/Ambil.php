<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ambil extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        check_not_login();     
        check_admin();  
        $this->load->model('loket_m');
        $this->load->library('form_validation');
    }

	public function index()
	{
        // $data['row'] = $this->loket_m->get();
        // $data = $this->loket_m->get()->result();
        $loket = $this->loket_m->get()->result();
        // $item = $this->item_m->get()->result();
        $data = array(
            'loket' => $loket,
        );
		$this->template->load('template', 'ambil/ambil', $data);
	}
}
