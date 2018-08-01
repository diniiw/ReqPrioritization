<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestingPrioritasiNF extends CI_Controller {

    // private function stub_getJumlahKebutuhan(){
    //     return 3;
    // }

    private function stub_getJumlahKebutuhan(){
        return 0;
    }

    private function stub_getArrayID(){
        return [1, 2, 3];
    }

    private function stub_hitungPrioritasNF($input_perbandingan_nf, $input_dom, $jumlah_nf){
        return [0.671, 0.35, 1.978];
    }
    
    private function stub_buatMatriksPerbandinganNF(){
        return [[1, 3, 5], [0.333, 1, 4], [0.2, 0.25, 1]];
    }

    private function stub_updatePrioritas($id, $prioritas){
        return "Update prioritas kebutuhan id : " . $id . "dengan nilai prioritas : " . $prioritas . "<br>";
    }

    private function stub_getAllDesc(){
        return "Data kebutuhan non-fungsional berurutan dari prioritas tertinggi ke prioritas terendah";
    }

    public function prosesPrioritasiNF()
    {
        $jumlah_nf = $this->stub_getJumlahKebutuhan();
        $id_nf = $this->stub_getArrayID();  

        $input_perbandingan_nf = [[null, 3, 5], [null, null, 4]];
        $input_dom = [[null, null, "dom"], [null, null, "dom"]];

        $prioritas_nf = $this->stub_hitungPrioritasNF($input_perbandingan_nf, $input_dom, $jumlah_nf);

        //untuk update nilai prioritas pada database
        for($x=0; $x<$jumlah_nf; $x++){
            echo $this->stub_updatePrioritas($id_nf[$x], $prioritas_nf[$x]);
        }

        //load view untuk menampilkan hasil prioritas
        echo $this->stub_getAllDesc();
    }

    public function test(){
        $this->prosesPrioritasiNF();
    }
}