<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cobaGetArrayIDNF extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // $this->load->library('unit_test');
        $this->load->model('Fungsional');
        $this->load->model('Nonfungsional');
        $this->fungsional = new Fungsional();
        $this->nonfungsional = new Nonfungsional();
    }

    public function getArrayID(){
        $this->db->select('id');
        $query = $this->db->get('nonfungsional');
        $id_raw = $query->result_array();
        print_r ($id_raw);
        // $id_f = array();
        // for($i = 0; $i<$this->getJumlahKebutuhan(); $i++){
        //     $id_f[$i] = $id_raw[$i]["id"];
        // }
        // return $id_f;
    }
}