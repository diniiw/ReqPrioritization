<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DaftarKebutuhanNonfungsional extends CI_Model {

    private $nonfungsional;

    public function __construct(){
        parent::__construct();
        $this->load->model('Kebutuhannonfungsional');
        $this->nonfungsional = new Kebutuhannonfungsional();
    }

    public function setNonFungsional($nonfungsional){
        $this->nonfungsional = $nonfungsional;
    }

    public function getNonFungsional(){
        return $this->nonfungsional;
    }

    public function getAll(){
        return $this->db->get('Kebutuhannonfungsional');
    }

    public function getJumlahKebutuhan(){
        $nf = $this->db->get('Kebutuhannonfungsional');
        return $nf->num_rows();
    }

    public function getAllDesc(){
        $this->db->order_by('prioritas', 'DESC');
        return $this->db->get('Kebutuhannonfungsional');
        // return true;
    }

    public function getArrayID(){
        $this->db->select('id');
        $query = $this->db->get('Kebutuhannonfungsional');
        $id_raw = $query->result_array();
        $id_f = array();
        for($i = 0; $i<$this->getJumlahKebutuhan(); $i++){
            $id_f[$i] = $id_raw[$i]["id"];
        }
        return $id_f;
    }

    public function getArrayProritasNF(){
        $this->db->select('prioritas');
        $query = $this->db->get('Kebutuhannonfungsional');
        $pri_raw = $query->result_array();
        $prioritas_nf = array();
        for($i = 0; $i<$this->getJumlahKebutuhan(); $i++){
            $prioritas_nf[$i] = $pri_raw[$i]["prioritas"];
        }
        return $prioritas_nf;
    }

    public function getKodeMax(){
        //ambil kode maximal
        $this->db->select_max('kode');
        $result = $this->db->get('Kebutuhannonfungsional')->row();  
        return $result->kode;
    }

    public function getKodeBaru(){
        $kode_max = $this->getKodeMax();
        $noUrut = (int) substr($kode_max, 7, 3);
        $noUrut++;
        $char = "SRS-NF-";
        $kode_baru = $char . sprintf("%03s", $noUrut); //membuat kode kebutuhan baru

        return $kode_baru;
    }

}