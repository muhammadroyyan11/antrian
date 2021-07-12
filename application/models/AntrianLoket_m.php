<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AntrianLoket_m extends CI_Model {
    
    public function get($id = null)
    {
        $nowDate = date('Y-m-d');
        $this->db->limit('1');
        $this->db->select('*');
        $this->db->from('antrian_loket');
        $this->db->where('tgl_antrian_loket',$nowDate);
        $this->db->order_by('no_antrian_loket','DESC');
        if($id != null){
            $this->db->where('id_antrian_loket', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params['id_antrian'] = $post['id_antrian'];
        $params['loket_id'] = $post['loket_id'];
        $params['no_antrian_loket'] = $post['no_antrian_loket'];
        $this->db->insert('antrian_loket', $params);
    }

}