<?php
    class User_model extends CI_Model {
        public function __construct(){
            $this->load->database();
        }
        public function register($data) {
            return $this->db->insert('users', $data);
        }
    }