<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestingGetAllDesc extends CI_Controller {

public function getAllDesc(){
        $this->db->order_by('prioritas', 'DESC');
        return $this->db->get('nonfungsionals');
}
}