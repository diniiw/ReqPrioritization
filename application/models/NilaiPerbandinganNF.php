<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// include "NilaiPerbandingan.php";

class NilaiPerbandinganNF extends NilaiPerbandingan {

    protected $id = 0;
    protected $id_nf_utama = 0;
    protected $id_nf_pembanding = 0;
    protected $nilai = 0;
    protected $dominan = " - ";

    public function setID_NF_utama($id_nf_utama){
        $this->id_nf_utama = $id_nf_utama;
    }

    public function getID_NF_utama(){
        return $this->id_nf_utama;
    }

    public function setID_NF_pembanding($id_nf_pembanding){
        $this->id_nf_pembanding = $id_nf_pembanding;
    }

    public function getID_NF_pembanding(){
        return $this->id_nf_pembanding;
    }

    public function setNilai($nilai){
        $this->nilai = $nilai;
    }

    public function getNilai($id_nf_utama, $id_nf_pembanding){
        $data = array(
            'id_nf_utama' =>$id_nf_utama,
            'id_nf_pembanding' => $id_nf_pembanding
        );
        $where = array('id_nf_utama' => $id_nf_utama , 'id_nf_pembanding' => $id_nf_pembanding);
        $this->db->select('nilai');
        $this->db->where($where);
        return $this->db->get('nilaiperbandingannf');
    }

    public function setDominan($dom){
        $this->dominan = $dom;
    }

    public function getDominan($id_nf_utama, $id_nf_pembanding){
        $data = array(
            'id_nf_utama' =>$id_nf_utama,
            'id_nf_pembanding' => $id_nf_pembanding
        );
        $where = array('id_nf_utama' => $id_nf_utama , 'id_nf_pembanding' => $id_nf_pembanding);
        $this->db->select('dominan');
        $this->db->where($where);
        return $this->db->get('nilaiperbandingannf');
    }

    public function getAll(){
        return $this->db->get('nilaiperbandingannf');
    }

    public function tambahdata(){
        $data = array(
            'id_nf_utama' => $this->id_nf_utama,
            'id_nf_pembanding' => $this->id_nf_pembanding,
            'nilai' => $this->nilai,
            'dominan' => $this->dominan
        );
        $this->db->insert('nilaiperbandingannf', $data);
    }

    public function hapusData(){
        $this->db->empty_table('nilaiperbandingannf');
    }
    
    public function getData($id_nf_utama, $id_nf_pembanding){
        $data = array(
            'id_nf_utama' =>$id_nf_utama,
            'id_nf_pembanding' => $id_nf_pembanding
        );
        $where = array('id_nf_utama' => $id_nf_utama , 'id_nf_pembanding' => $id_nf_pembanding);
        $this->db->where($where);
        return $this->db->get('nilaiperbandingannf');
    }
}