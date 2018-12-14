<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestingUnit extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library("unit_test");
    }

    private function d_update($objek, $data){
        return true;
    }

    private function d_where($id_find, $id){
        return true;
    }

    public function updatePrioritas($id, $prioritas){
        $data = array('prioritas'=> $prioritas);
        $this->d_where('id', $id);
        $this->d_update('nonfungsional', $data);
        return true;
    }

    public function prosesPrioritasiNF(){
        $jumlah_nf = $this->daftarNonfungsional->getJumlahKebutuhan();
        $id_nf = $this->daftarNonfungsional->getArrayID();  

        $input_perbandingan_nf = $this->input->post('kepentingan');
        $input_dom = $this->input->post('dom');

        $prioritas_nf = $this->hitungPrioritasNF($input_perbandingan_nf, $input_dom, $jumlah_nf);

        //untuk update nilai prioritas pada database
        for($x=0; $x<$jumlah_nf; $x++){
            $this->daftarNonfungsional->getNonfungsional()->updatePrioritas($id_nf[$x], $prioritas_nf[$x]);
        }

        // load view untuk menampilkan hasil prioritas
        $nf['nonfungsionals'] = $this->daftarNonfungsional->getAllDesc();
    }
    public function test(){
        $test_name = "Pengujian unit update prioritas kebutuhan";
        $test = $this->updatePrioritas(2, 3);
        $expected_result = true;
        echo $this->unit->run($test, $expected_result, $test_name);
    }

}