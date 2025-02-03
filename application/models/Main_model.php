<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // Load database
    }
}
?>