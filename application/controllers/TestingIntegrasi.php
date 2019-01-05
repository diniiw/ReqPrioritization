<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestingIntegrasi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DaftarKebutuhanFungsional');
        $this->daftarFungsional = new DaftarKebutuhanFungsional();
        $this->load->model('DaftarKebutuhanNonfungsional');
        $this->daftarNonfungsional = new DaftarKebutuhanNonfungsional();
    }

    private function hitungPrioritasNF($input_perbandingan_nf, $input_dom, $jumlah_nf){
        return [1.057, 0.902, 1.041];
    }

    public function prosesPrioritasiNF()
    {
        $jumlah_nf = $this->daftarNonfungsional->getJumlahKebutuhan();
        $id_nf = $this->daftarNonfungsional->getArrayID();  

        $input_perbandingan_nf = [[null, 3, 4], [null, null, 2]];
        $input_dom = [[null, "dom", null], [null, null, "dom"]];

        $prioritas_nf = $this->hitungPrioritasNF($input_perbandingan_nf, $input_dom, $jumlah_nf);

        //untuk update nilai prioritas pada database
        for($x=0; $x<$jumlah_nf; $x++){
            $this->daftarNonfungsional->getNonfungsional()->updatePrioritas($id_nf[$x], $prioritas_nf[$x]);
        }

        // load view untuk menampilkan hasil prioritas
        $nf['nonfungsionals'] = $this->daftarNonfungsional->getAllDesc();
        $this->load->view('prioritasi/hasilnfMtr', $nf);
    }
}