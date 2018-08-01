<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PrioritasiController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('FungsionalModel');
        $this->load->model('NonfungsionalModel');
        $this->fungsional = new FungsionalModel();
        $this->nonfungsional = new NonfungsionalModel();
        
    }
    
	public function index()
	{        
        $this->load->view('elements/headerMtr');
        $this->load->view('prioritasi/prioritasinfMtr');
        $this->load->view('elements/footerMtr');
    }

    public function showHasilNF(){
        $data['nonfungsional'] = $this->nonfungsional->getAllDesc();
        $this->load->view('elements/headerMtr');
        $this->load->view('prioritasi/hasilnfMtr', $data);
        $this->load->view('elements/footerMtr');
    }

    public function showHasilF(){
        $data['fungsional'] = $this->fungsional->getAllDesc();
        $this->load->view('elements/headerMtr');
        $this->load->view('prioritasi/hasilnfMtr', $data);
        $this->load->view('elements/footerMtr');
    }

    public function prNF()
    {
        $data['nonfungsionals'] = $this->nonfungsional->getAll();
        $this->load->view('elements/headerMtr');
        $this->load->view('prioritasi/prioritasinfMtr', $data);
        $this->load->view('elements/footerMtr');

    }

    public function prF()
    {
        $data['nonfungsionals'] = $this->nonfungsional->getAll();
        $data['fungsionals'] = $this->fungsional->getAll();
        $this->load->view('elements/headerMtr');
        $this->load->view('prioritasi/prioritasifMtr', $data);
        $this->load->view('elements/footerMtr');
    }
    
    public function prioritasiNF()
    {
        $jumlah_nf = $this->nonfungsional->getJumlahKebutuhan();
        $id_nf = $this->nonfungsional->getArrayID();   

        $values_nf = array(array());
        $dom = array(array());
        
        $values_nf = $this->input->post('kepentingan');
        $dom = $this->input->post('dom');


            // echo "array values : ";
            // print_r($values_nf);
            // echo "<br>";
            // echo "array dom : ";
            // print_r($dom);
            // echo "<br>";
        

        for ($i = 0; $i < $jumlah_nf; $i++){
            for ($j = 0; $j < $jumlah_nf; $j++){
                if($i == $j){
                    $values_nf[$i][$j] = 1;
                }
                else{
                    if(isset($dom[$i][$j]) && $dom[$i][$j] == "dom"){                            
                            $values_nf[$j][$i]=1/$values_nf[$i][$j] ;
                        }

                    else{              
                            $values_nf[$j][$i] = $values_nf[$i][$j] ;
                            $values_nf[$i][$j] = 1/$values_nf[$j][$i] ;
                        }
                }
            }
        }
        // echo "=== === <br>";
        //         for ($i = 0; $i < $jumlah_nf; $i++){
        //     // echo $xyz."</br>";
        //     for ($j = 0; $j < $jumlah_nf; $j++){
                
        // echo $values_nf[$i][$j];
        // echo " || ";
        //     }
        //     echo "</br>";
        // }
        
        
        // echo "</br>";
        // echo "array values : ";
        // print_r($values_nf);
        // echo "<br>";
        // echo "array dom : ";
        // print_r($dom);
        // echo "<br>";

        // //aray untuk hitung total per kolom
        $total_kolom = array();
        $index = 0; //variabel bantuan untuk ngarahin index di array $total_kolom
        $jumlah = 0; //variable bantuan untuk nyimpen nilai jumlah sementara
        
        for ($m=0 ; $m<$jumlah_nf; $m++){
            for ($n=0; $n<$jumlah_nf; $n++){
                $jumlah += $values_nf[$n][$m];
                $total_kolom[$index] = $jumlah;
            }
            $jumlah = 0;
            $index++;
        }

        // //array hasil perhitungan nilai prioritas
        $prioritas_nf = array();
        $pr_f = 0;
        $jmlh_bagi = 0;
        for ($o=0 ; $o<$jumlah_nf; $o++){
            for ($p=0; $p<$jumlah_nf; $p++){
                $pembagian = $values_nf[$o] [$p]  / $total_kolom[$o];
                $jmlh_bagi += $pembagian;
                $prioritas_nf[$pr_f] = $jmlh_bagi;   
            }
            $jmlh_bagi = 0;
            $pr_f++;
        }     
        // echo "<br>";
        // print_r($prioritas_nf);

        // //untuk store nilai prioritas
        for($x=0; $x<$jumlah_nf; $x++){
            $this->nonfungsional->updatePrioritas($id_nf[$x], $prioritas_nf[$x]);
        }

        $nf['nonfungsionals'] = $this->nonfungsional->getAllDesc();
        $this->load->view('elements/headerMtr');
        $this->load->view('prioritasi/hasilnfMtr', $nf);
        $this->load->view('elements/footerMtr');
    }

    public function prioritasiF()
    {
        $prioritas_nf = $this->nonfungsional->getArrayProritasNF();
        $jumlah_nf = $this->nonfungsional->getJumlahKebutuhan();
        $jumlah_f = $this->fungsional->getJumlahKebutuhan();
        $id_f = $this->fungsional->getArrayID();
        $values_f = array(array());

        $values_f = $this->input->post('kepentingan');
        
        $prioritas_f = array();
        $pr_f = 0;
        $jmlh_f = 0;
        for($i=0; $i<$jumlah_f; $i++){
            for($j=0; $j<$jumlah_nf; $j++){
                $jmlh_f += $values_f[$i][$j] * $prioritas_nf[$j];
                $prioritas_f[$pr_f] = $jmlh_f;
            }
            $jmlh_f = 0;
            $pr_f++;
        }

        //untuk store nilai prioritas ke database
        for($x=0; $x<$jumlah_f; $x++){
            $this->fungsional->updatePrioritas($id_f[$x], $prioritas_f[$x]);
        }
        
        $f['fungsionals'] = $this->fungsional->getAll();
        $this->load->view('elements/headerMtr');
        $this->load->view('prioritasi/hasilfMtr', $f);
        $this->load->view('elements/footerMtr');
    }
}
