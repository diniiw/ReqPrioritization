<?php
defined('BASEPATH') OR exit('No direct script access allowed');

abstract class NilaiPerbandinganN extends CI_Model {

    protected $nilainilai = 0;

    abstract protected function setNilai($nilai);
    abstract protected function getNilai($id1, $id2);

    abstract protected function getAll();

    abstract protected function tambahData($id1, $id2, $nilai);

    abstract protected function hapusData();
}