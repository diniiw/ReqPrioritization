<?php
defined('BASEPATH') OR exit('No direct script access allowed');

abstract class NilaiPerbandingan extends CI_Model {

    protected $nilai = 0;

    abstract protected function setNilai($nilai);
    abstract protected function getNilai($id1, $id2);
    abstract protected function getAll();
    abstract protected function tambahData();
    abstract protected function hapusData();
}