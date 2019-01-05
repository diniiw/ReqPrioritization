<?php
defined('BASEPATH') OR exit('No direct script access allowed');

abstract class Kebutuhan extends CI_Model {

    protected $kode = " ";
    protected $deskripsi = " ";
    protected $prioritas = 0.0;

    abstract protected function setKode($kode);
    abstract protected function getKode();
    
    abstract protected function setDeskripsi($deskripsi);
    abstract protected function getDeskripsi();

    abstract protected function setPrioritas($prioritas);
    abstract protected function getPrioritas();

    abstract protected function getKebutuhan($id);

    abstract protected function tambahKebutuhan();

    abstract protected function hapusKebutuhan($id);

    abstract protected function updateKebutuhan($id);

    abstract protected function updatePrioritas($id, $prioritas); //di setPrioritas aja  

}