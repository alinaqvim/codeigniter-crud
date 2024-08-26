<?php
class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }
    public function register() {
        $data['title'] = 'Sign Up';
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
        if($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('users/register', $data);
            $this->load->view('templates/footer');
        }
        else {
//            die('Continue');
            $enc_password = md5($this->input->post('password'));
            $data = array(
                'name' => $this->input->post('name'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => $enc_password,
                'zipcode' => $this->input->post('zipcode'),
            );
            $this->user_model->register($data);
            $this->session->set_flashdata('user_registered', 'You are now registered and can log in');
            redirect('posts');
        }
    }
}