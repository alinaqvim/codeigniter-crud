<?php
    class User_model extends CI_Model {
        public function __construct(){
            $this->load->database();
        }
        public function register($data) {
            return $this->db->insert('users', $data);
        }

        public function login($username, $password){
            $query = $this->db->where('username', $username)->get('users');
            if($query->num_rows() > 0){
                $user = $query->row_array();
                $stored_hash = $user['password'];
                if(password_verify($password, $stored_hash)){
                    return $user['id'];
                }
                else {
                    return false;
                }
            }
        }

        public function check_username_exists($username) {
            $query = $this->db->get_where('users', array('username' => $username));
            if(empty($query->row_array())) {
                return true;
            }
            else {
                return false;
            }
        }
        public function check_email_exists($email) {
            $query = $this->db->get_where('users', array('email' => $email));
            if(empty($query->row_array())) {
                return true;
            }
            else {
                return false;
            }
        }
    }