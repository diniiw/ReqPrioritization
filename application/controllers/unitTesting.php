<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class unitTesting extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Fungsional');
        $this->fungsional = new Fungsional();
        $this->load->model('Nonfungsional');
        $this->nonfungsional = new Nonfungsional();
        $this->load->model('DaftarKebutuhanNonfungsional');
        $this->daftarNonfungsional = new DaftarKebutuhanNonfungsional();
        $this->load->library("unit_test");
    }

    public function test(){
        $testFungsional = $this->fungsional->tambahKebutuhan();
        $expected_result = true;
        $test_name = "Pengujian unit method tambahKebutuhan klas Fungsional";
        echo $this->unit->run($testFungsional, $expected_result, $test_name);

        $testNonfungsional = $this->nonfungsional->updatePrioritas(1, 4);
        $expected_result = true;
        $test_name = "Pengujian unit method updatePrioritas klas Nonfungsional";
        echo $this->unit->run($testNonfungsional, $expected_result, $test_name);

        $testDaftarNonfungsional = $this->daftarNonfungsional->getAllDesc();
        $expected_result = true;
        $test_name = "Pengujian unit method getAllDesc klas DaftarKebutuhanNonfungsional";
        echo $this->unit->run($testDaftarNonfungsional, $expected_result, $test_name);
    }
}



