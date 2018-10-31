<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DaftarKebutuhanFungsional extends CI_Model {

    private $fungsional;

    public function __construct(){
        parent::__construct();
        $this->load->model('Fungsional');
        $this->fungsional = new Fungsional();
    }

    public function setFungsional($fungsional){
        $this->fungsional = $fungsional;
    }

    public function getFungsional(){
        return $this->fungsional;
    }

    public function getAll(){
        return $this->db->get('fungsionals');
    }

    public function getAllDesc(){
        $this->db->order_by('prioritas', 'DESC');
        return $this->db->get('fungsionals');
    }

    public function getArrayID(){
        $this->db->select('id');
        $query = $this->db->get('fungsionals');
        $id_raw = $query->result_array();
        $id_f = array();
        for($i = 0; $i<$this->getJumlahKebutuhan(); $i++){
            $id_f[$i] = $id_raw[$i]["id"];
        }
        return $id_f;
    }

    public function getJumlahKebutuhan(){
        $fungsionals = $this->db->get('fungsionals');
        return $fungsionals->num_rows();
    }

    public function getKodeMax(){
        //ambil kode maximal
        $this->db->select_max('kode');
        $result = $this->db->get('fungsionals')->row();  
        return $result->kode;
    }
      
    public function getKodeBaru()   {
        $kode_max = $this->getKodeMax();
        $noUrut = (int) substr($kode_max, 6, 3);
        $noUrut++;
        $char = "SRS-F-";
        $kode_baru = $char . sprintf("%03s", $noUrut); //membuat kode kebutuhan baru

        return $kode_baru;
    }

        // public function waktuKumulatif(){
        //         $this->db->select('waktu');
        //         $this->db->from('fungsionals');
        //         $this->db->order_by("prioritas", "DESC");
        //         $query = $this->db->get();
        //         return $query->result(); 
        // }
}