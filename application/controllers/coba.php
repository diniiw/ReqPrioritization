<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class coba extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DaftarKebutuhanFungsional');
        $this->load->model('DaftarKebutuhanNonfungsional');
        // $this->load->model('NilaiPerbandingan');
        $this->daftarFungsional = new DaftarKebutuhanFungsional();
        $this->daftarNonfungsional = new DaftarKebutuhanNonfungsional();
        // $this->nilaiPerbandingan = new NilaiPerbandingan();
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
}