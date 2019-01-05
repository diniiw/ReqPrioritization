<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include "Kebutuhan.php";

class Kebutuhanfungsional extends Kebutuhan {

        protected $id = 0;
        protected $kode = " ";
        protected $deskripsi = " ";
        protected $waktu = 0.0;
        protected $biaya = 0.0;
        protected $prioritas = 0.0;

        public function getKebutuhan($id){
                $this->db->where('id', $id);
                return $this->db->get('fungsional');
        }

        public function setKode($kode){
                $this->kode = $kode;
        }

        public function getKode(){
                return $this->kode;
        }

        public function setDeskripsi($deskripsi){
                $this->deskripsi = $deskripsi;
        }

        public function getDeskripsi(){
                return $this->deskripsi;
        }

        public function setWaktu($waktu){
                $this->waktu = $waktu;
        }

        public function getWaktu(){
                return $this->waktu;
        }

        public function setBiaya($biaya){
                $this->biaya = $biaya;
        }

        public function getBiaya(){
                return $this->biaya;
        }

        public function setPrioritas($prioritas){
                $this->prioritas = $prioritas;
        }

        public function getPrioritas(){
                return $this->prioritas;
        }

        public function tambahKebutuhan(){
                $data = array(
                        'kode' => $this->kode,
                        'deskripsi' => $this->deskripsi,
                        'waktu' => $this->waktu,
                        'biaya' => $this->biaya
                );

                $this->db->insert('fungsional', $data);
                // return true;
        }

        public function updateKebutuhan($id){
                $data = array(
                        'kode' => $this->kode,
                        'deskripsi' => $this->deskripsi,
                        'waktu' => $this->waktu,
                        'biaya' => $this->biaya
                );
                $this->db->where('id', $id);
                $this->db->update('fungsional', $data);
        }

        public function hapusKebutuhan($id){
                $this->db->where('id', $id);
                $this->db->delete('fungsional');
        }

        public function updatePrioritas($id, $prioritas){
                $data = array('prioritas'=> $prioritas);
                $this->db->where('id', $id);
                $this->db->update('fungsional', $data);
        }

}