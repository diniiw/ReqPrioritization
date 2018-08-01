<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestingHitungPrioritas extends CI_Controller {

    private function stub_buatMatriksPerbandinganNF($input_perbandingan_nf, $input_dom, $jumlah_nf){
        return [[1, 3, 0.2], [0.333, 1, 0.25], [5, 4, 1]];
    }

    //jalur 1
    private function hitungPrioritasNF1($input_perbandingan_nf, $input_dom, $jumlah_nf)
    {
        $matriks_perbandingan_nf = $this->stub_buatMatriksPerbandinganNF($input_perbandingan_nf, $input_dom, $jumlah_nf);
        $jumlah_nf = $jumlah_nf;
        $total_kolom = array();
        $index = 0;
        $jumlah = 0;

        //hitung nilai total dari setiap kolom
        for ($m=0 ; $m<$jumlah_nf; $m++){
            for ($n=0; $n<$jumlah_nf; $n++){
                $jumlah += $matriks_perbandingan_nf[$n][$m];
                $total_kolom[$index] = $jumlah;
            }
            $jumlah = 0;
            $index++;
        }

        //hitung prioritas
        $prioritas_nf = array();
        $pr_nf = 0;
        $jmlh_bagi = 0;
        for ($o=0 ; $o<$jumlah_nf; $o++){
            for ($p=0; $p<$jumlah_nf; $p++){
                $jmlh_bagi += $matriks_perbandingan_nf[$o] [$p]  / $total_kolom[$p];
                $prioritas_nf[$pr_nf] = round($jmlh_bagi, 3);   
            }
            $jmlh_bagi = 0;
            $pr_nf++;
        }
        return $prioritas_nf;
    }

    //jalur 2
    private function hitungPrioritasNF2($input_perbandingan_nf, $input_dom, $jumlah_nf)
    {
        $matriks_perbandingan_nf = $this->stub_buatMatriksPerbandinganNF($input_perbandingan_nf, $input_dom, $jumlah_nf);
        $jumlah_nf = $jumlah_nf;
        $total_kolom = array();
        $index = 0;
        $jumlah = 0;

        //hitung nilai total dari setiap kolom
        for ($m=0 ; $m<$jumlah_nf; $m++){
            for ($n=($jumlah_nf+1); $n<$jumlah_nf; $n++){
                $jumlah += $matriks_perbandingan_nf[$n][$m];
                $total_kolom[$index] = $jumlah;
            }
            $jumlah = 0;
            $index++;
        }

        //hitung prioritas
        $prioritas_nf = array();
        $pr_nf = 0;
        $jmlh_bagi = 0;
        for ($o=0 ; $o<$jumlah_nf; $o++){
            for ($p=0; $p<$jumlah_nf; $p++){
                $jmlh_bagi += $matriks_perbandingan_nf[$o] [$p]  / $total_kolom[$p];
                $prioritas_nf[$pr_nf] = round($jmlh_bagi, 3);   
            }
            $jmlh_bagi = 0;
            $pr_nf++;
        }
        return $prioritas_nf;
    }

    //jalur 3
    private function hitungPrioritasNF3($input_perbandingan_nf, $input_dom, $jumlah_nf)
    {
        $matriks_perbandingan_nf = $this->stub_buatMatriksPerbandinganNF($input_perbandingan_nf, $input_dom, $jumlah_nf);
        $jumlah_nf = $jumlah_nf;
        $total_kolom = array();
        $index = 0;
        $jumlah = 0;

        //hitung nilai total dari setiap kolom
        for ($m=0 ; $m<$jumlah_nf; $m++){
            for ($n=0; $n<$jumlah_nf; $n++){
                $jumlah += $matriks_perbandingan_nf[$n][$m];
                $total_kolom[$index] = $jumlah;
            }
            $jumlah = 0;
            $index++;
        }

        //hitung prioritas
        $prioritas_nf = array();
        $pr_nf = 0;
        $jmlh_bagi = 0;
        for ($o=($jumlah_nf+1) ; $o<$jumlah_nf; $o++){
            for ($p=0; $p<$jumlah_nf; $p++){
                $jmlh_bagi += $matriks_perbandingan_nf[$o] [$p]  / $total_kolom[$p];
                $prioritas_nf[$pr_nf] = round($jmlh_bagi, 3);   
            }
            $jmlh_bagi = 0;
            $pr_nf++;
        }
        return $prioritas_nf;
    }

    //jalur 4
    private function hitungPrioritasNF4($input_perbandingan_nf, $input_dom, $jumlah_nf)
    {
        $matriks_perbandingan_nf = $this->stub_buatMatriksPerbandinganNF($input_perbandingan_nf, $input_dom, $jumlah_nf);
        $jumlah_nf = $jumlah_nf;
        $total_kolom = array();
        $index = 0;
        $jumlah = 0;

        //hitung nilai total dari setiap kolom
        for ($m=0 ; $m<$jumlah_nf; $m++){
            for ($n=0; $n<$jumlah_nf; $n++){
                $jumlah += $matriks_perbandingan_nf[$n][$m];
                $total_kolom[$index] = $jumlah;
            }
            $jumlah = 0;
            $index++;
        }

        //hitung prioritas
        $prioritas_nf = array();
        $pr_nf = 0;
        $jmlh_bagi = 0;
        for ($o=0 ; $o<$jumlah_nf; $o++){
            for ($p=($jumlah_nf+1); $p<$jumlah_nf; $p++){
                $jmlh_bagi += $matriks_perbandingan_nf[$o] [$p]  / $total_kolom[$p];
                $prioritas_nf[$pr_nf] = round($jmlh_bagi, 3);   
            }
            $jmlh_bagi = 0;
            $pr_nf++;
        }
        return $prioritas_nf;
    }

    //jalur 5
    private function hitungPrioritasNF5($input_perbandingan_nf, $input_dom, $jumlah_nf)
    {
        $matriks_perbandingan_nf = $this->stub_buatMatriksPerbandinganNF($input_perbandingan_nf, $input_dom, $jumlah_nf);
        $jumlah_nf = $jumlah_nf;
        $total_kolom = array();
        $index = 0;
        $jumlah = 0;

        //hitung nilai total dari setiap kolom
        for ($m=0 ; $m<$jumlah_nf; $m++){
            for ($n=0; $n<$jumlah_nf; $n++){
                $jumlah += $matriks_perbandingan_nf[$n][$m];
                $total_kolom[$index] = $jumlah;
            }
            $jumlah = 0;
            $index++;
        }

        //hitung prioritas
        $prioritas_nf = array();
        $pr_nf = 0;
        $jmlh_bagi = 0;
        for ($o=0 ; $o<$jumlah_nf; $o++){
            for ($p=0; $p<$jumlah_nf; $p++){
                $jmlh_bagi += $matriks_perbandingan_nf[$o] [$p]  / $total_kolom[$p];
                $prioritas_nf[$pr_nf] = round($jmlh_bagi, 3);   
            }
            $jmlh_bagi = 0;
            $pr_nf++;
        }
        return $prioritas_nf;
    }


    public function test(){
        //jalur 1
        echo "<br> <b> Jalur 1 </b>";
        print_r($this->hitungPrioritasNF1([], [], 0));
        //jalur 2
        echo "<br> <b> Jalur 2 </b>";
        print_r($this->hitungPrioritasNF2([], [], 3));
        //jalur 3
        echo "<br> <b> Jalur 3 </b>";
        print_r($this->hitungPrioritasNF3([], [], 3));
        //jalur 4
        echo "<br> <b> Jalur 4 </b>";
        print_r($this->hitungPrioritasNF4([], [], 3));
        //jalur 5
        echo "<br> <b> Jalur 5 </b>";
        print_r($this->hitungPrioritasNF5([], [], 3));
    }

}