<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestingKodeBaru extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Nonfungsional');
        $this->nonfungsional = new Nonfungsional();
    }

    private function getKodeBaru()   {
        $kode_max = "SRS-F-09";
        $noUrut = (int) substr($kode_max, 6, 3);
        $noUrut++;
        $char = "SRS-F-";
        $kode_baru = $char . sprintf("%03s", $noUrut); //membuat kode kebutuhan baru
    
        return $kode_baru;
    }

    public function test(){
        echo "Hasil = " . $this->getKodeBaru();
    }
}