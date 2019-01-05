<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AnalisController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DaftarKebutuhanFungsional');
        $this->load->model('DaftarKebutuhanNonfungsional');
        $this->load->model('NilaiPerbandinganF');
        $this->load->model('NilaiPerbandinganNF');
        $this->daftarFungsional = new DaftarKebutuhanFungsional();
        $this->daftarNonfungsional = new DaftarKebutuhanNonfungsional();
        $this->nilaiPerbandinganF = new NilaiPerbandinganF();
        $this->nilaiPerbandinganNF = new NilaiPerbandinganNF();
    }

	public function index()
	{
        $this->load->view('elements/header');
        $this->load->view('index');
        $this->load->view('elements/footer');
    }	
    
    public function showFungsional()
	{        
        $data['fungsionals'] = $this->daftarFungsional->getAllDesc();
        $data['kodeBaru'] = $this->daftarFungsional->getKodeBaru();
        $this->load->view('elements/header');
        $this->load->view('kebutuhan/kebutuhanf', $data);
        $this->load->view('elements/footer');
    }

    public function showNonfungsional()
	{    
        $data['nonfungsionals'] = $this->daftarNonfungsional->getAllDesc();
        $data['kodeBaru'] = $this->daftarNonfungsional->getKodeBaru();
        $this->load->view('elements/header');
        $this->load->view('kebutuhan/kebutuhannf', $data);
        $this->load->view('elements/footer');
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
        $this->load->view('elements/header');
        $this->load->view('kebutuhan/editF', $data);
        $this->load->view('elements/footer');
    }
    
    public function editNonfungsional($id)
    {
        $data['nonfungsional'] = $this->daftarNonfungsional->getNonfungsional()->getKebutuhan($id);
        $this->load->view('elements/header');
        $this->load->view('kebutuhan/editNF', $data);
        $this->load->view('elements/footer');
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
        $data['nilai_perbandingan_nf'] = $this->nilaiPerbandinganNF->getAll();
        $this->load->view('elements/header');
        $this->load->view('prioritasi/prioritasinf', $data);
        $this->load->view('elements/footer');
    }

    public function prosesPrioritasiNF()
    {
        $jumlah_nf = $this->daftarNonfungsional->getJumlahKebutuhan();
        $id_nf = $this->daftarNonfungsional->getArrayID();  

        $input_perbandingan_nf = $this->input->post('kepentingan');
        $input_dom = $this->input->post('dom');

        $id_nf_utama = $this->input->post('id_nf_utama');
        $id_nf_pembanding = $this->input->post('id_nf_pembanding');

        $np = array_reduce($input_perbandingan_nf, 'array_merge', array());
        $dom = array_reduce($input_dom, 'array_merge', array());

        $this->simpanPerbandinganNF($id_nf_utama, $id_nf_pembanding, $np, $dom);

        $prioritas_nf = $this->hitungPrioritasNF($input_perbandingan_nf, $input_dom, $jumlah_nf);

        //untuk update nilai prioritas pada database
        for($x=0; $x<$jumlah_nf; $x++){
            $this->daftarNonfungsional->getNonfungsional()->updatePrioritas($id_nf[$x], $prioritas_nf[$x]);
        }

        // load view untuk menampilkan hasil prioritas
        $nf['nonfungsionals'] = $this->daftarNonfungsional->getAllDesc();
        $this->load->view('elements/header');
        $this->load->view('prioritasi/hasilnf', $nf);
        $this->load->view('elements/footer');
    }

    public function simpanPerbandinganNF($id_nf_utama, $id_nf_pembanding, $nilaiperbandingan, $dom){
        $this->nilaiPerbandinganNF->hapusData();
        for($x = 0; $x < count($nilaiperbandingan); $x++){
            $this->nilaiPerbandinganNF->setID_NF_utama($id_nf_utama[$x]);
            $this->nilaiPerbandinganNF->setID_NF_pembanding($id_nf_pembanding[$x]);
            $this->nilaiPerbandinganNF->setNilai($nilaiperbandingan[$x]);
            $this->nilaiPerbandinganNF->setDominan($dom[$x]);
            $this->nilaiPerbandinganNF->tambahdata();
        }
    }

    public function showHalamanPrioritasiF()
    {
        $data['nonfungsionals'] = $this->daftarNonfungsional->getAll();
        $data['fungsionals'] = $this->daftarFungsional->getAll();
        $data['warning'] = "Tidak ada kebutuhan Fungsional. <br> Masukkan kebutuhan Fungsional terlebih dahulu. ";
        $data['npfs'] = $this->nilaiPerbandinganF->getAll();
        $this->load->view('elements/header');
        $this->load->view('prioritasi/prioritasif', $data);
        $this->load->view('elements/footer');
    }

    public function prosesPrioritasiF()
    {
        $prioritas_nf = $this->daftarNonfungsional->getArrayProritasNF();
        $jumlah_nf = $this->daftarNonfungsional->getJumlahKebutuhan();
        $jumlah_f = $this->daftarFungsional->getJumlahKebutuhan();
        $id_f = $this->daftarFungsional->getArrayID();

        $nilai_perbandingan_f = $this->input->post('kepentingan');
        $idf = $this->input->post('idf');
        $idnf = $this->input->post('idnf');
        $np = array_reduce($nilai_perbandingan_f, 'array_merge', array());

        $this->nilaiPerbandinganF->hapusData();
        for($x = 0; $x < count($np); $x++){
            $this->nilaiPerbandinganF->setID_F($idf[$x]);
            $this->nilaiPerbandinganF->setID_NF($idnf[$x]);
            $this->nilaiPerbandinganF->setNilai($np[$x]);
            $this->nilaiPerbandinganF->tambahdata();
        }

        $prioritas_f = $this->hitungPrioritasF($nilai_perbandingan_f, $prioritas_nf, $jumlah_nf, $jumlah_f);

        //untuk update nilai prioritas ke database
        for($x=0; $x<$jumlah_f; $x++){
            $this->daftarFungsional->getFungsional()->updatePrioritas($id_f[$x], $prioritas_f[$x]);
        }
        
        //load view untuk menampilkan hasil prioritas 
        $f['fungsionals'] = $this->daftarFungsional->getAllDesc();
        $this->load->view('elements/header');
        $this->load->view('prioritasi/hasilf', $f);
        $this->load->view('elements/footer');
    }

    public function simpanPerbandinganF(){
        $nilai_perbandingan_f = $this->input->post('kepentingan');
        $idf = $this->input->post('idf');
        $idnf = $this->input->post('idnf');
        $np = array_reduce($nilai_perbandingan_f, 'array_merge', array());

        $this->nilaiPerbandinganF->hapusData();
        for($x = 0; $x < count($np); $x++){
            $this->nilaiPerbandinganF->setID_F($idf[$x]);
            $this->nilaiPerbandinganF->setID_NF($idnf[$x]);
            $this->nilaiPerbandinganF->setNilai($np[$x]);
            $this->nilaiPerbandinganF->tambahdata();
        }
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
