<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AnalisController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DaftarKebutuhanFungsional');
        $this->load->model('DaftarKebutuhanNonfungsional');
        $this->daftarFungsional = new DaftarKebutuhanFungsional();
        $this->daftarNonfungsional = new DaftarKebutuhanNonfungsional();
    }

	public function index()
	{
        $this->load->view('elements/headerMtr');
        $this->load->view('kebutuhan/tutorial');
        $this->load->view('elements/footerMtr');
    }	
    
    public function showFungsional()
	{        
        $data['fungsionals'] = $this->daftarFungsional->getAllDesc();
        $data['kodeBaru'] = $this->daftarFungsional->getKodeBaru();
        $this->load->view('elements/headerMtr');
        $this->load->view('kebutuhan/kebutuhanfMtr', $data);
        $this->load->view('elements/footerMtr');
    }

    public function showNonfungsional()
	{    
        $data['nonfungsionals'] = $this->daftarNonfungsional->getAllDesc();
        $data['kodeBaru'] = $this->daftarNonfungsional->getKodeBaru();
        $this->load->view('elements/headerMtr');
        $this->load->view('kebutuhan/kebutuhannfMtr', $data);
        $this->load->view('elements/footerMtr');
    }

    public function storeFungsional()
    {
        $this->daftarFungsional->getFungsional()->setKode($this->input->post('kode_f'));
        $this->daftarFungsional->getFungsional()->setDeskripsi($this->input->post('deskripsi_f'));
        $this->daftarFungsional->getFungsional()->setWaktu($this->input->post('waktu_f'));
        $this->daftarFungsional->getFungsional()->setBiaya($this->input->post('biaya_f'));
        $this->daftarFungsional->getFungsional()->tambahKebutuhan();

        redirect ('kebutuhanFungsional');
    }
    
    public function storeNonfungsional()
    {
        $this->daftarNonfungsional->getNonfungsional()->setKode($this->input->post('kode_nf'));
        $this->daftarNonfungsional->getNonfungsional()->setDeskripsi($this->input->post('deskripsi_nf'));
        $this->daftarNonfungsional->getNonfungsional()->tambahKebutuhan();
        redirect ('kebutuhanNonfungsional');
    }
    
    public function editFungsional($id)
    {
        $data['fungsional'] = $this->daftarFungsional->getFungsional()->getKebutuhan($id);
        $this->load->view('elements/headerMtr');
        $this->load->view('kebutuhan/editFMtr', $data);
        $this->load->view('elements/footerMtr');
    }
    
    public function editNonfungsional($id)
    {
        $data['nonfungsional'] = $this->daftarNonfungsional->getNonfungsional()->getKebutuhan($id);
        $this->load->view('elements/headerMtr');
        $this->load->view('kebutuhan/editNFMtr', $data);
        $this->load->view('elements/footerMtr');
    }

    public function updateFungsional($id)
    {
        $this->daftarFungsional->getFungsional()->setKode($this->input->post('kode_f'));
        $this->daftarFungsional->getFungsional()->setDeskripsi($this->input->post('deskripsi_f'));
        $this->daftarFungsional->getFungsional()->setWaktu($this->input->post('waktu_f'));
        $this->daftarFungsional->getFungsional()->setBiaya($this->input->post('biaya_f'));
        $this->daftarFungsional->getFungsional()->updateKebutuhan($id);
        redirect ('kebutuhanFungsional');
    }
    
    public function updateNonfungsional($id)
    {
        $this->daftarNonfungsional->getNonfungsional()->setKode($this->input->post('kode_nf'));
        $this->daftarNonfungsional->getNonfungsional()->setDeskripsi($this->input->post('deskripsi_nf'));
        $this->daftarNonfungsional->getNonfungsional()->updateKebutuhan($id);
        redirect ('kebutuhanNonfungsional');
    }

    public function deleteFungsional($id)
    {
        $this->daftarFungsional->getFungsional()->hapusKebutuhan($id);
        redirect ('kebutuhanFungsional');
    }

    public function deleteNonfungsional($id)
    {
        $this->daftarNonfungsional->getNonfungsional()->hapusKebutuhan($id);
        redirect ('kebutuhanNonfungsional');
    }

    public function showHalamanPrioritasiNF()
    {
        $data['nonfungsionals'] = $this->daftarNonfungsional->getAll();
        $data['warning'] = "Tidak ada kebutuhan Non-fungsional. <br> Masukkan kebutuhan Non-fungsional terlebih dahulu. ";
        $this->load->view('elements/headerMtr');
        $this->load->view('prioritasi/prioritasinfMtr', $data);
        $this->load->view('elements/footerMtr');
    }

    public function prosesPrioritasiNF()
    {
        $jumlah_nf = $this->daftarNonfungsional->getJumlahKebutuhan();
        $id_nf = $this->daftarNonfungsional->getArrayID();  

        $input_perbandingan_nf = $this->input->post('kepentingan');
        $input_dom = $this->input->post('dom');

        $prioritas_nf = $this->hitungPrioritasNF($input_perbandingan_nf, $input_dom, $jumlah_nf);

        //untuk update nilai prioritas pada database
        for($x=0; $x<$jumlah_nf; $x++){
            $this->daftarNonfungsional->getNonfungsional()->updatePrioritas($id_nf[$x], $prioritas_nf[$x]);
        }

        //load view untuk menampilkan hasil prioritas
        $nf['nonfungsionals'] = $this->daftarNonfungsional->getAllDesc();
        $this->load->view('elements/headerMtr');
        $this->load->view('prioritasi/hasilnfMtr', $nf);
        $this->load->view('elements/footerMtr');
    }

    public function showHalamanPrioritasiF()
    {
        $data['nonfungsionals'] = $this->daftarNonfungsional->getAll();
        $data['fungsionals'] = $this->daftarFungsional->getAll();
        $data['warning'] = "Tidak ada kebutuhan Fungsional. <br> Masukkan kebutuhan Fungsional terlebih dahulu. ";
        $this->load->view('elements/headerMtr');
        $this->load->view('prioritasi/prioritasifMtr', $data);
        $this->load->view('elements/footerMtr');
    }

    public function prosesPrioritasiF()
    {
        $prioritas_nf = $this->daftarNonfungsional->getArrayProritasNF();
        $jumlah_nf = $this->daftarNonfungsional->getJumlahKebutuhan();
        $jumlah_f = $this->daftarFungsional->getJumlahKebutuhan();
        $id_f = $this->daftarFungsional->getArrayID();

        $nilai_perbandingan_f = $this->input->post('kepentingan');

        $prioritas_f = $this->hitungPrioritasF($nilai_perbandingan_f, $prioritas_nf, $jumlah_nf, $jumlah_f);

        //untuk update nilai prioritas ke database
        for($x=0; $x<$jumlah_f; $x++){
            $this->daftarFungsional->getFungsional()->updatePrioritas($id_f[$x], $prioritas_f[$x]);
        }
        
        //load view untuk menampilkan hasil prioritas 
        $f['fungsionals'] = $this->daftarFungsional->getAllDesc();
        $this->load->view('elements/headerMtr');
        $this->load->view('prioritasi/hasilfMtr', $f);
        $this->load->view('elements/footerMtr');
    }

    private function buatMatriksPerbandinganNF($input_perbandingan_nf, $input_dom, $jumlah_nf)
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

    private function hitungPrioritasNF($input_perbandingan_nf, $input_dom, $jumlah_nf)
    {
        $matriks_perbandingan_nf = $this->buatMatriksPerbandinganNF($input_perbandingan_nf, $input_dom, $jumlah_nf);
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

    private function hitungPrioritasF($matriks_perbandingan_f, $prioritas_nf, $jumlah_nf, $jumlah_f)
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
}
