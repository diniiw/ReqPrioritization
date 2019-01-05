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

    public function setNilai($nilai){
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
        $this->db->select('nilaiperbandinganf.* , fungsional.id, nonfungsional.id');
        $this->db->from('nilaiperbandinganf');
        $this->db->join('fungsional', "fungsional.id = nilaiperbandinganf.id_f", 'left');
        $this->db->join('nonfungsional', "nonfungsional.id = nilaiperbandinganf.id_nf", 'left');
        return $this->db->get();
    }

    public function tambahData(){
        $data = array(
            'id_f' => $this->id_f,
            'id_nf' => $this->id_nf,
            'nilai' => $this->nilai
        );
        $this->db->insert('nilaiperbandinganf', $data);
    }
    
    public function hapusData(){
        $this->db->empty_table('nilaiperbandinganf');
    }
}