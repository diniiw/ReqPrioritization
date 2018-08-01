<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestingHitungPrioritasF extends CI_Controller {
    private function hitungPrioritasF1($matriks_perbandingan_f, $prioritas_nf, $jumlah_nf, $jumlah_f)
    {
        $matriks_perbandingan_f = $matriks_perbandingan_f;
        $jumlah_f = $jumlah_f;
        $prioritas_nf = $prioritas_nf;
        $jumlah_nf = $jumlah_nf;

        $prioritas_f = array();
        $pr_f = 0;
        $jmlh_f = 0;
        for($i=0; $i<$jumlah_f; $i++){
            for($j=0; $j<$jumlah_nf; $j++){
                $jmlh_f += $matriks_perbandingan_f[$i][$j] * $prioritas_nf[$j];
                $prioritas_f[$pr_f] = round($jmlh_f,3);
            }
            $jmlh_f = 0;
            $pr_f++;
        }
        return $prioritas_f;
    }

    private function hitungPrioritasF2($matriks_perbandingan_f, $prioritas_nf, $jumlah_nf, $jumlah_f)
    {
        $matriks_perbandingan_f = $matriks_perbandingan_f;
        $jumlah_f = $jumlah_f;
        $prioritas_nf = $prioritas_nf;
        $jumlah_nf = $jumlah_nf;

        $prioritas_f = array();
        $pr_f = 0;
        $jmlh_f = 0;
        for($i=0; $i<$jumlah_f; $i++){
            for($j=0; $j<$jumlah_nf; $j++){
                $jmlh_f += $matriks_perbandingan_f[$i][$j] * $prioritas_nf[$j];
                $prioritas_f[$pr_f] = round($jmlh_f,3);
            }
            $jmlh_f = 0;
            $pr_f++;
        }
        return $prioritas_f;
    }

    private function hitungPrioritasF3($matriks_perbandingan_f, $prioritas_nf, $jumlah_nf, $jumlah_f)
    {
        $matriks_perbandingan_f = $matriks_perbandingan_f;
        $jumlah_f = $jumlah_f;
        $prioritas_nf = $prioritas_nf;
        $jumlah_nf = $jumlah_nf;

        $prioritas_f = array();
        $pr_f = 0;
        $jmlh_f = 0;
        for($i=0; $i<$jumlah_f; $i++){
            for($j=0; $j<$jumlah_nf; $j++){
                $jmlh_f += $matriks_perbandingan_f[$i][$j] * $prioritas_nf[$j];
                $prioritas_f[$pr_f] = round($jmlh_f,3);
            }
            $jmlh_f = 0;
            $pr_f++;
        }
        return $prioritas_f;
    }
    public function test(){
        //Jalur 1
        $matriks_perbandingan_f1 = [];
        $prioritas_nf1 = [0.671, 0.35, 1.978];
        $jumlah_nf1 = 3;
        $jumlah_f1 = 0;

        $expected_result1 = [];
        $result1 = $this->hitungPrioritasF1($matriks_perbandingan_f1, $prioritas_nf1, $jumlah_nf1, $jumlah_f1);

        echo "<b>-- Pengujian Unit Method hitungPrioritasF Jalur 1 -- </b>";
        echo "<br><b>Data Uji : </b>";
        echo "<br>matriks_perbandingan_f = ";
        print_r($matriks_perbandingan_f1);
        echo "<br>prioritas_nf = ";
        print_r($prioritas_nf1);
        echo "<br>jumlah_nf = " . $jumlah_nf1;
        echo "<br>jumlah_f = " . $jumlah_f1;
        echo "<br><b>expected_result : </b>";
        print_r($expected_result1);
        echo "<br><b>Hasil : </b>";
        print_r($result1);

        if($expected_result1 == $result1){
            echo "<br>Status : <b>Valid</b>";
        }

        echo "<br><br>";

        //Jalur 2
        $matriks_perbandingan_f2 = [[3, 1, 2], [5, 3, 1]];
        $prioritas_nf2 = [];
        $jumlah_nf2 = 0;
        $jumlah_f2 = 2;

        $expected_result2 = [];
        $result2 = $this->hitungPrioritasF2($matriks_perbandingan_f2, $prioritas_nf2, $jumlah_nf2, $jumlah_f2);

        echo "<b>-- Pengujian Unit Method hitungPrioritasF Jalur 2 -- </b>";
        echo "<br><b>Data Uji : </b>";
        echo "<br>matriks_perbandingan_f = ";
        print_r($matriks_perbandingan_f2);
        echo "<br>prioritas_nf = ";
        print_r($prioritas_nf2);
        echo "<br>jumlah_nf = " . $jumlah_nf2;
        echo "<br>jumlah_f = " . $jumlah_f2;
        echo "<br><b>expected_result : </b>";
        print_r($expected_result2);
        echo "<br><b>Hasil : </b>";
        print_r($result2);

        if($expected_result2 == $result2){
            echo "<br>Status : <b>Valid</b>";
        }

        echo "<br><br>";

        //Jalur 3
        $matriks_perbandingan_f3 = [[3, 1, 2], [5, 3, 1]];
        $prioritas_nf3 = [0.671, 0.35, 1.978];
        $jumlah_nf3 = 3;
        $jumlah_f3 = 2;

        $expected_result3 = [6.319, 6.383];
        $result3 = $this->hitungPrioritasF3($matriks_perbandingan_f3, $prioritas_nf3, $jumlah_nf3, $jumlah_f3);

        echo "<b>-- Pengujian Unit Method hitungPrioritasF Jalur 3 -- </b>";
        echo "<br><b>Data Uji : </b>";
        echo "<br>matriks_perbandingan_f = ";
        print_r($matriks_perbandingan_f3);
        echo "<br>prioritas_nf = ";
        print_r($prioritas_nf3);
        echo "<br>jumlah_nf = " . $jumlah_nf3;
        echo "<br>jumlah_f = " . $jumlah_f3;
        echo "<br><b>expected_result : </b>";
        print_r($expected_result3);
        echo "<br><b>Hasil : </b>";
        print_r($result3);

        if($expected_result3 == $result3){
            echo "<br>Status : <b>Valid</b>";
        }
    }
}