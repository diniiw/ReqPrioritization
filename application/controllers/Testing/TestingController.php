<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestingController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // $this->load->library('unit_test');
        $this->load->model('Fungsional');
        $this->load->model('Nonfungsional');
        $this->fungsional = new Fungsional();
        $this->nonfungsional = new Nonfungsional();
    }

    // PENGUJIAN PRIORITASIF //
    
    //jalur 1
    public function prioritasiFungsional1(){
        // $prioritas_nf = $prioritas_nf;
        // $jumlah_nf = count($prioritas_nf);

        // $jumlah_f = 3;
        // $id_f = [1,2];
        // $matriks_perbandingan_f = array(array());

        // $matriks_perbandingan_f = $values;
        
        // $prioritas_f = array();
        // $pr_f = 0;
        // $jmlh_f = 0;
        // for($i=0; $i<$jumlah_f; $i++){
        //     for($j=0; $j<$jumlah_nf; $j++){
        //         $jmlh_f += $matriks_perbandingan_f[$i][$j] * $prioritas_nf[$j];
        //         $prioritas_f[$pr_f] = round($jmlh_f,3);
        //     }
        //     $jmlh_f = 0;
        //     $pr_f++;
        // }
        // return $prioritas_f;
        
        $prioritas_nf = [0.671, 0.35, 1.979];
        $jumlah_nf = 3;
        $jumlah_f = -1;
        $id_f = [0,1];

        $matriks_perbandingan_f = array(array());
        $matriks_perbandingan_f = array (array(3, 1, 2), array(5, 3, 1));
        
        //menghitung nilai prioritas kebutuhan fungsional
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

        //untuk update nilai prioritas ke database
        for($x=0; $x<$jumlah_f; $x++){
            echo "Update prioritas kebutuhan fungsional id [" . $id_f[$x] . "] dengan nilai prioritas " . $prioritas_f[$x] . "<br>";
        }

        echo "Load view hasil penentuan prioritas kebutuhan fungsional";
    }

    //jalur 2
    public function prioritasiFungsional2(){      
        $prioritas_nf = [];
        $jumlah_nf = 0;
        $id_f = [0,1];
        $jumlah_f = count($id_f);

        $matriks_perbandingan_f = array (array(3, 1, 2), array(5, 3, 1));
        
        //menghitung nilai prioritas kebutuhan fungsional
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

        //untuk update nilai prioritas ke database
        for($x=0; $x<$jumlah_f; $x++){
            echo "Update prioritas kebutuhan fungsional id [" . $id_f[$x] . "] dengan nilai prioritas " . $prioritas_f[$x] . "<br>";
        }

        echo "Load view hasil penentuan prioritas kebutuhan fungsional";
    }

    //jalur 3
    public function prioritasiFungsional3(){      
        $prioritas_nf = [0.671, 0.35, 1.979];
        $jumlah_nf = count($prioritas_nf);
        $id_f = [0,1];
        $jumlah_f = count($id_f);

        $matriks_perbandingan_f = array (array(3, 1, 2), array(5, 3, 1));
        
        //menghitung nilai prioritas kebutuhan fungsional
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

        //untuk update nilai prioritas ke database
        for($x=$jumlah_f+1; $x<$jumlah_f; $x++){
            echo "Update prioritas kebutuhan fungsional id [" . $id_f[$x] . "] dengan nilai prioritas " . $prioritas_f[$x] . "<br>";
        }

        echo "Load view hasil penentuan prioritas kebutuhan fungsional";
    }

    //jalur 4
    public function prioritasiFungsional4(){      
        $prioritas_nf = [0.671, 0.35, 1.979];
        $jumlah_nf = count($prioritas_nf);
        $id_f = [0,1];
        $jumlah_f = count($id_f);

        $matriks_perbandingan_f = array (array(3, 1, 2), array(5, 3, 1));
        
        //menghitung nilai prioritas kebutuhan fungsional
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

        //untuk update nilai prioritas ke database
        for($x=0; $x<$jumlah_f; $x++){
            echo "Update prioritas kebutuhan fungsional id [" . $id_f[$x] . "] dengan nilai prioritas " . $prioritas_f[$x] . "<br>";
        }

        echo "Load view hasil penentuan prioritas kebutuhan fungsional";
    }

    public function testPrioritasFungsional(){
        $prioritas_nf = [0.671, 0.35, 1.979];
        $values = array (array(3, 1, 2), array(5, 3, 1));
        $expected_result = [6.321, 6.384];
        echo "<b>Pengujian method prioritasiF <br>";
        echo "<br> Data uji : </b>";
        echo "<br> Variabel prioritas_nf = [0.671, 0.35, 1.979]";
        echo "<br> Variabel jumlah_nf = 3";
        echo "<br> Variabel jumlah_f = 2";
        echo "<br> Variabel id_f = [0, 1]";
        echo "<br> Variabel matriks_perbandingan_f = [3, 1, 2] [5, 3, 1]";
        echo "<br>";
        echo "<br> <b> Hasil </b> <br>";
        $this->prioritasiFungsional3();
        // $this->unit->run($this->prioritasiFungsional($prioritas_nf, $values), $expected_result, "Testing Penentuan Prioritas Fungsional");
        // $this->load->view('testPrioritasFResult');
    }

    // PENGUJIAN PRIORITASINF //
    
    private function prioritasiNonfungsional1 (){
        $jumlah_nf = 0;
        $id_nf = [];   

        $matriks_perbandingan = array(array());
        $dom = array(array());
        
        $matriks_perbandingan = 0;
        $dom = 0;

        //melengkapi nilai pada $matriks_perbandingan
        for ($i = 0; $i < $jumlah_nf; $i++){
            for ($j = 0; $j < $jumlah_nf; $j++){
                if($i == $j){
                    $matriks_perbandingan[$i][$j] = 1;
                }
                else{
                    if(isset($dom[$i][$j]) && $dom[$i][$j] == "dom"){                            
                            $matriks_perbandingan[$j][$i]= round(1/$matriks_perbandingan[$i][$j], 3) ;
                        }

                    else{              
                            $matriks_perbandingan[$j][$i] = $matriks_perbandingan[$i][$j] ;
                            $matriks_perbandingan[$i][$j] = round(1/$matriks_perbandingan[$j][$i], 3) ;
                        }
                }
            }
        }

        //Menghitung total per-kolom pada $matriks_perbandingan
        $total_kolom = array();
        $index = 0; //variabel bantuan untuk mengarahkan index di array $total_kolom
        $jumlah = 0; //variable bantuan untuk menyimpan nilai jumlah sementara
        
        for ($m=0 ; $m<$jumlah_nf; $m++){
            for ($n=0; $n<$jumlah_nf; $n++){
                $jumlah += $matriks_perbandingan[$n][$m];
                $total_kolom[$index] = $jumlah;
            }
            $jumlah = 0;
            $index++;
        }

        //menghitung nilai prioritas kebutuhan non-fungsional
        $prioritas_nf = array();
        $pr_nf = 0;
        $jmlh_bagi = 0;
        for ($o=0 ; $o<$jumlah_nf; $o++){
            for ($p=0; $p<$jumlah_nf; $p++){
                $pembagian = $matriks_perbandingan[$o] [$p]  / $total_kolom[$p];
                $jmlh_bagi += $pembagian;
                $prioritas_nf[$pr_nf] = round($jmlh_bagi, 3);   
            }
            $jmlh_bagi = 0;
            $pr_nf++;
        }    

        //untuk update nilai prioritas pada database
        for($x=0; $x<$jumlah_nf; $x++){
            echo "Update prioritas kebutuhan non-fungsional id [". $id_nf[$x] . "] dengan nilai prioritas " . $prioritas_nf[$x];
        }

        //load view untuk menampilkan hasil prioritas
        echo "Load view hasil penentuan prioritas non-fungsional";
    }

    
}