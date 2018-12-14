<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include "NilaiPerbandingan.php";

class NilaiPerbandinganF extends NilaiPerbandingan {

    protected $id = 0;
    protected $id_f = 0;
    protected $id_nf = 0;
    protected $nilai = 0;

    public function setID_F($id_f){
        $this->id_f = $id_f;
    }

    public function getID_F(){
        return $this->id_f;
    }

    public function setID_NF($id_nf){
        $this->id_nf = $id_nf;
    }

    public function getID_NF(){
        return $this->id_nf;
    }

    public function set_nilai($nilai){
        $this->nilai = $nilai;
    }

    public function getNilai($id_f, $id_nf){
        $data = array(
            'id_f' =>$id_f,
            'id_nf' => $id_nf
        );
        $where = array('id_f' => $id_f , 'id_nf' => $id_nf);
        $this->db->where($where);
        return $this->db->get('nilaiperbandinganf');
    }

    public function getAll(){
        return $this->db->get('NilaiPerbandinganF');
    }

    public function tambahData($id_f, $id_nf, $nilai){
        $data = array(
            'id_f' => $id_f,
            'id_nf' => $id_nf,
            'nilai' => $nilai
        );
        $this->db->insert('nilaiperbandinganf', $data);
    }
    
    public function hapusData(){
        $this->db->empty_table('nilaiperbandinganf');
    }
}