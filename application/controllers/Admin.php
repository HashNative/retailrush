<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Admin_Controller{

    public function __construct()
    {
        parent::__construct();

        $this->not_logged_in();


        $this->data['page_title'] = 'Dashboard';

        $this->load->model('model_products');
        $this->load->model('model_users');
    }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $this->data['page_title'] = 'Admin';

        $session_data = $this->session->userdata();
        if($session_data['logged_in'] == TRUE) {
            $this->data['total_products'] = $this->model_products->countTotalProducts();
            $this->data['total_users'] = $this->model_users->countTotalUsers();

            $user_id = $this->session->userdata('id');
            $is_admin = ($user_id == 1) ? true :false;

            $this->data['is_admin'] = $is_admin;
            $this->render_admin_template('admin/dashboard', $this->data);
        }else{
            redirect('adminauth/login', 'refresh');

        }


	}


	public function login(){
	    echo 'test';
    }
}
