<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestingMatriksController extends CI_Controller {

    //Jalur1
    private function buatMatriksPerbandinganNF1($input_perbandingan_nf, $input_dom, $jumlah_nf)
    {
        $matriks_perbandingan_nf = $input_perbandingan_nf;
        $dom = $input_dom;
        $jumlah_nf = $jumlah_nf;
        
        for ($i = 0; $i < $jumlah_nf; $i++){
            for ($j = 0; $j < $jumlah_nf; $j++){
                if($i == $j){
                    $matriks_perbandingan_nf[$i][$j] = 1;
                } else{
                    if(isset($dom[$i][$j]) && $dom[$i][$j] == "dom"){                            
                            $matriks_perbandingan_nf[$j][$i]= round(1/$matriks_perbandingan_nf[$i][$j], 3) ;
                    } else{              
                            $matriks_perbandingan_nf[$j][$i] = $matriks_perbandingan_nf[$i][$j] ;
                            $matriks_perbandingan_nf[$i][$j] = round(1/$matriks_perbandingan_nf[$j][$i], 3) ;
                    }
                }
            }
        }
        return $matriks_perbandingan_nf;
    }

        //Jalur2
        private function buatMatriksPerbandinganNF2($input_perbandingan_nf, $input_dom, $jumlah_nf)
        {
            $matriks_perbandingan_nf = $input_perbandingan_nf;
            $dom = $input_dom;
            $jumlah_nf = $jumlah_nf;
            
            for ($i = 0; $i < $jumlah_nf; $i++){
                for ($j = ($jumlah_nf+1); $j < $jumlah_nf; $j++){
                    if($i == $j){
                        $matriks_perbandingan_nf[$i][$j] = 1;
                    } else{
                        if(isset($dom[$i][$j]) && $dom[$i][$j] == "dom"){                            
                                $matriks_perbandingan_nf[$j][$i]= round(1/$matriks_perbandingan_nf[$i][$j], 3) ;
                        } else{              
                                $matriks_perbandingan_nf[$j][$i] = $matriks_perbandingan_nf[$i][$j] ;
                                $matriks_perbandingan_nf[$i][$j] = round(1/$matriks_perbandingan_nf[$j][$i], 3) ;
                        }
                    }
                }
            }
            return $matriks_perbandingan_nf;
        }

    //Jalur3
    private function buatMatriksPerbandinganNF3($input_perbandingan_nf, $input_dom, $jumlah_nf)
    {
        $matriks_perbandingan_nf = $input_perbandingan_nf;
        $dom = $input_dom;
        $jumlah_nf = $jumlah_nf;
        
        for ($i = 0; $i < $jumlah_nf; $i++){
            for ($j = 0; $j < $jumlah_nf; $j++){
                if($i == $j){
                    $matriks_perbandingan_nf[$i][$j] = 1;
                } else{
                    if(isset($dom[$i][$j]) && $dom[$i][$j] == "dom"){                            
                            $matriks_perbandingan_nf[$j][$i]= round(1/$matriks_perbandingan_nf[$i][$j], 3) ;
                    } else{              
                            $matriks_perbandingan_nf[$j][$i] = $matriks_perbandingan_nf[$i][$j] ;
                            $matriks_perbandingan_nf[$i][$j] = round(1/$matriks_perbandingan_nf[$j][$i], 3) ;
                    }
                }
            }
        }
        return $matriks_perbandingan_nf;
    }

    //Jalur4
    private function buatMatriksPerbandinganNF4($input_perbandingan_nf, $input_dom, $jumlah_nf)
    {
        $matriks_perbandingan_nf = $input_perbandingan_nf;
        $dom = $input_dom;
        $jumlah_nf = $jumlah_nf;
        
        for ($i = 0; $i < $jumlah_nf; $i++){
            for ($j = 0; $j < $jumlah_nf; $j++){
                if($i == $j){
                    $matriks_perbandingan_nf[$i][$j] = 1;
                } else{
                    if(isset($dom[$i][$j]) && $dom[$i][$j] == "dom"){                            
                            $matriks_perbandingan_nf[$j][$i]= round(1/$matriks_perbandingan_nf[$i][$j], 3) ;
                    } else{              
                            $matriks_perbandingan_nf[$j][$i] = $matriks_perbandingan_nf[$i][$j] ;
                            $matriks_perbandingan_nf[$i][$j] = round(1/$matriks_perbandingan_nf[$j][$i], 3) ;
                    }
                }
            }
        }
        return $matriks_perbandingan_nf;
    }

    //Jalur5
    private function buatMatriksPerbandinganNF5($input_perbandingan_nf, $input_dom, $jumlah_nf)
    {
        $matriks_perbandingan_nf = $input_perbandingan_nf;
        $dom = $input_dom;
        $jumlah_nf = $jumlah_nf;
        
        for ($i = 0; $i < $jumlah_nf; $i++){
            for ($j = 0; $j < $jumlah_nf; $j++){
                if($i == $j){
                    $matriks_perbandingan_nf[$i][$j] = 1;
                } else{
                    if(isset($dom[$i][$j]) && $dom[$i][$j] == "dom"){                            
                            $matriks_perbandingan_nf[$j][$i]= round(1/$matriks_perbandingan_nf[$i][$j], 3) ;
                    } else{              
                            $matriks_perbandingan_nf[$j][$i] = $matriks_perbandingan_nf[$i][$j] ;
                            $matriks_perbandingan_nf[$i][$j] = round(1/$matriks_perbandingan_nf[$j][$i], 3) ;
                    }
                }
            }
        }
        return $matriks_perbandingan_nf;
    }

    //Jalur6
    private function buatMatriksPerbandinganNF6($input_perbandingan_nf, $input_dom, $jumlah_nf)
    {
        $matriks_perbandingan_nf = $input_perbandingan_nf;
        $dom = $input_dom;
        $jumlah_nf = $jumlah_nf;
        
        for ($i = 0; $i < $jumlah_nf; $i++){
            for ($j = 0; $j < $jumlah_nf; $j++){
                if($i == $j){
                    $matriks_perbandingan_nf[$i][$j] = 1;
                } else{
                    if(isset($dom[$i][$j]) && $dom[$i][$j] == "dom"){                            
                            $matriks_perbandingan_nf[$j][$i]= round(1/$matriks_perbandingan_nf[$i][$j], 3) ;
                    } else{              
                            $matriks_perbandingan_nf[$j][$i] = $matriks_perbandingan_nf[$i][$j] ;
                            $matriks_perbandingan_nf[$i][$j] = round(1/$matriks_perbandingan_nf[$j][$i], 3) ;
                    }
                }
            }
        }
        return $matriks_perbandingan_nf;
    }

    //Main
    public function test(){
        echo "<b>Pengujian jalur 1</b>";        
        $input_perbandingan_nf1 = [];
        $input_dom1 = [];
        $jumlah_nf1 = 0;
        $expected_result = [];
        echo "<br><b>Data uji :</b> <br> - input_perbandingan_nf = ";
        print_r($input_perbandingan_nf1);
        echo "<br> - input_dom = " ;
        print_r($input_dom1);
        echo "<br> - jumlah_nf = " ;
        print_r($jumlah_nf1);
        echo "<br> <b>Hasil : </b><br>";
        $result1 = $this->buatMatriksPerbandinganNF1($input_perbandingan_nf1, $input_dom1, $jumlah_nf1);
        print_r($result1);
        if ($expected_result == $result1){
            echo "<br> Status = <b> Valid </b>";
        }

        echo "<br> ==== ==== ==== <br> <b>Pengujian jalur 2 </b>" ;
        $input_perbandingan_nf2 = [[null,2,5],[null,null,4]];
        $input_dom2 = [[null,null,"dom"], [null, null, "dom"]];
        $jumlah_nf2 = 3;
        $expected_result2 = [[null,2,5],[null,null,4]];
        echo "<br><b>Data uji : </b><br> - input_perbandingan_nf = ";
        print_r($input_perbandingan_nf2);
        echo "<br> - input_dom = " ;
        print_r($input_dom2);
        echo "<br> - jumlah_nf = " ;
        print_r($jumlah_nf2);
        echo "<br> <b>Hasil : </b> <br>";
        $result2 = $this->buatMatriksPerbandinganNF2($input_perbandingan_nf2, $input_dom2, $jumlah_nf2);
        print_r($result2);
        if ($expected_result2 == $result2){            
            echo "<br> Status = <b> Valid </b>";
        }

        echo "<br> ==== ==== ==== <br> <b>Pengujian jalur 3 </b>" ;
        $input_perbandingan_nf3 = [[3]];
        $input_dom3 = [];
        $jumlah_nf3 = 1;
        $expected_result3 = [[1]];
        echo "<br><b>Data uji : </b><br> - input_perbandingan_nf = ";
        print_r($input_perbandingan_nf3);
        echo "<br> - input_dom = " ;
        print_r($input_dom3);
        echo "<br> - jumlah_nf = " ;
        print_r($jumlah_nf3);
        echo "<br> <b>Hasil : </b> <br>";
        $result3 = $this->buatMatriksPerbandinganNF3($input_perbandingan_nf3, $input_dom3, $jumlah_nf3);
        print_r($result3);
        if ($expected_result3 == $result3){            
            echo "<br> Status = <b> Valid </b>";
        }

        echo "<br> ==== ==== ==== <br> <b>Pengujian jalur 4 </b>" ;
        $input_perbandingan_nf4 = array(array(null,2,5), array(null,null,4));
        $input_dom4 = [];
        $jumlah_nf4 = 3;
        $expected_result4 = [[1, 2, 5], [0.5, 1, 4], [0.2, 0.25, 1]];
        echo "<br>Data uji : <br> - input_perbandingan_nf = ";
        print_r($input_perbandingan_nf4);
        echo "<br> - input_dom = " ;
        print_r($input_dom4);
        echo "<br> - jumlah_nf = " ;
        print_r($jumlah_nf4);
        echo "<br> <b>Hasil : </b><br>";
        $result4 = $this->buatMatriksPerbandinganNF4($input_perbandingan_nf4, $input_dom4, 3);
        print_r($result4);
        if ($expected_result4 == $result4){            
            echo "<br> Status = <b> Valid </b>";
        }

        echo "<br> ==== ==== ==== <br> <b>Pengujian jalur 5 </b>" ;
        $input_perbandingan_nf5 = array(array(null,2,5), array(null,null,4));
        $input_dom5 = [[null, "dom", "dom"], [null, null, "dom"]];
        $jumlah_nf5 = 3;
        $expected_result5 = [[1, 0.5, 0.2], [2, 1, 0.25], [5, 4, 1]];
        echo "<br>Data uji : <br> - input_perbandingan_nf = ";
        print_r($input_perbandingan_nf5);
        echo "<br> - input_dom = " ;
        print_r($input_dom5);
        echo "<br> - jumlah_nf = " ;
        print_r($jumlah_nf5);
        echo "<br> <b>Hasil : </b><br>";
        $result5 = $this->buatMatriksPerbandinganNF5($input_perbandingan_nf5, $input_dom5, 3);
        print_r($result5);
        if ($expected_result5 == $result5){            
            echo "<br> Status = <b> Valid </b>";
        }

        echo "<br> ==== ==== ==== <br> <b>Pengujian jalur 6 </b>" ;
        $input_perbandingan_nf6 = array(array(null,2,5), array(null,null,4));
        $input_dom6 = [[null, "d", "d"], [null, null, "d"]];
        $jumlah_nf6 = 3;
        $expected_result6 = [[1, 2, 5], [0.5, 1, 4], [0.2, 0.25, 1]];
        echo "<br>Data uji : <br> - input_perbandingan_nf = ";
        print_r($input_perbandingan_nf6);
        echo "<br> - input_dom = " ;
        print_r($input_dom6);
        echo "<br> - jumlah_nf = " ;
        print_r($jumlah_nf6);
        echo "<br> <b>Hasil : </b><br>";
        $result6 = $this->buatMatriksPerbandinganNF5($input_perbandingan_nf6, $input_dom6, 3);
        print_r($result6);
        if ($expected_result6 == $result6){            
            echo "<br> Status = <b> Valid </b>";
        }
    }
}
