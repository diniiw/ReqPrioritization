<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestingProsesPrioritasNF extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library("unit_test");
    }

    private function d_hitungPrioritasNF($input_perbandingan_nf, $input_dom, $jumlah_nf){
        return [1.057, 0.902, 1.041];
    }

    private function d_updatePrioritas($id_nf, $prioritas_nf){
        echo "Update nilai prioritas kebutuhan id " . $id_nf .  "dengan nilai prioritas " . $prioritas_nf . "</br>";
    }

    private function d_getAllDesc(){
        echo "Daftar kebutuhan non-fungsional berurutan dari prioritas tertinggi hingga prioritas terendah";
    }

    private function prosesPrioritasiNF()
    {
        $jumlah_nf = 3;
        $id_nf = [1,2,3];  

        $input_perbandingan_nf = [[0,3,4], [0,0,5]];
        $input_dom = [[null, "dom", null], [null, null, "dom"]];

        $prioritas_nf = $this->d_hitungPrioritasNF($input_perbandingan_nf, $input_dom, $jumlah_nf);

        //untuk update nilai prioritas pada database
        for($x=0; $x<$jumlah_nf; $x++){
            $this->daftarNonfungsional->d_updatePrioritas($id_nf[$x], $prioritas_nf[$x]);
        }

        //load view untuk menampilkan hasil prioritas
        $nf['nonfungsionals'] = d_getAllDesc();
        $this->load->view('elements/headerMtr');
        $this->load->view('prioritasi/hasilnfMtr', $nf);
        $this->load->view('elements/footerMtr');
    }

    public function index(){
        prosesPrioritasiNF();

    }