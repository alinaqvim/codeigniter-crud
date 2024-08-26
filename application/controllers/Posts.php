<?php
class Posts extends CI_Controller {
	public function index() {
		$data['title'] = 'Latest Posts';
		$data['posts'] = $this->post_model->get_posts();
//		print_r($data['posts']);
		$this->load->view('templates/header', $data);
		$this->load->view('posts/index', $data);
		$this->load->view('templates/footer', $data);
	}
	public function view($slug = NULL) {
		$data['post'] = $this->post_model->get_posts($slug);
		if(empty($data['post'])) {
			show_404();
		}
		$data['title'] = $data['post']['title'];
		$this->load->view('templates/header', $data);
		$this->load->view('posts/view', $data);
		$this->load->view('templates/footer', $data);
	}
	public function create() {
        // Check login
        if(!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }
		$data['title'] = 'Create Post';

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('body', 'Body', 'required');

		if($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header');
			$this->load->view('posts/create', $data);
			$this->load->view('templates/footer');
		}
		else {
			$this->post_model->create_post();
//			$this->load->view('posts/success');
			redirect('posts');
		}

	}
	public function delete($id) {
        // Check login
        if(!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }
		$this->post_model->delete_post($id);
		redirect('posts');
}
public function edit($slug) {
    // Check login
    if(!$this->session->userdata('logged_in')) {
        redirect('users/login');
    }
	$data['post'] = $this->post_model->get_posts($slug);

    // Check User
    if($this->session->userdata('user_id') != $data['post']['user_id']) {
        redirect('posts');
    }

    if(empty($data['post'])) {
		show_404();
	}
	$data['title'] = "Edit Post";
	$this->load->view('templates/header');
	$this->load->view('posts/edit', $data);
	$this->load->view('templates/footer');
}
public function update() {
    // Check login
    if(!$this->session->userdata('logged_in')) {
        redirect('users/login');
    }
//		echo 'SUBMITTED';
	$id = $this->input->post('id');
	$slug = url_title($this->input->post('title'));
	$data = array(
		'title' => $this->input->post('title'),
		'slug' => $slug,
		'body' => $this->input->post('body')
	);
	$this->post_model->update_post($id,$data);
	redirect('posts');
}
}
