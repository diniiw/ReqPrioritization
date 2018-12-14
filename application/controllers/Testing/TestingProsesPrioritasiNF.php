<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestingProsesPrioritasiNF extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library("unit_test");
    }

    private function stub_getJumlahKebutuhan(){
        return 0;
    }

    private function stub_getArrayID(){
        return [];
    }

    private function stub_hitungPrioritas($input_perbandingan_nf, $input_dom, $jumlah_nf){
        return true;
    }

    private function stub_updatePrioritas($id_nf, $prioritas_nf){
        return true;
    }

    public function prosesPrioritasiNF(){
        $jumlah_nf = $this->stub_getJumlahKebutuhan();
        $id_nf = $this->stub_getArrayID();  

        $input_perbandingan_nf = [];
        $input_dom = [];

        $prioritas_nf = $this->stub_hitungPrioritasNF($input_perbandingan_nf, $input_dom, $jumlah_nf);

        //untuk update nilai prioritas pada database
        for($x=0; $x<$jumlah_nf; $x++){
            $this->stub_updatePrioritas($id_nf[$x], $prioritas_nf[$x]);
        }

        // load view untuk menampilkan hasil prioritas
        $nf['nonfungsional'] = $this->stub_getAllDesc();
    }
    public function test(){
        $test_name = "Pengujian unit update prioritas kebutuhan";
        $test = $this->prosesPrioritasiNF();
        $expected_result = true;
        echo $this->unit->run($test, $expected_result, $test_name);
    }

}