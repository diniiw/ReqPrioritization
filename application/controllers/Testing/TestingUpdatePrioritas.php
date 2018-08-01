<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestingUpdatePrioritas extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Nonfungsional');
        $this->nonfungsional = new Nonfungsional();
    }

    public function tambahKebutuhan(){
        $data = array(
            'kode' => "SRS-NF-9",
            'deskripsi' => "Availability"
        );
        $query = $this->db->insert('nonfungsionals', $data);
        if($query){
            return true;
        }
    }

    public function test(){
        echo $this->tambahKebutuhan();
    }

}