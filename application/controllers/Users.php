<?php 

class Users extends User_Controller
{
	public function __construct()
	{
		parent::__construct();


		$this->data['page_title'] = 'Users';
		

		$this->load->model('model_users');
        $this->load->model('model_order');

    }

	public function index()
	{

		$user_data = $this->model_users->getUserData();

		$result = array();
		foreach ($user_data as $k => $v) {

			$result[$k]['user_info'] = $v;

		}

		$this->data['user_data'] = $result;

		$this->render_admin_template('admin/users/index', $this->data);
	}

	public function create()
	{
//
//		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|is_unique[users.username]');
//        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
//        $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]');
//		$this->form_validation->set_rules('address1', 'Address Line 1', 'trim|required');
//        $this->form_validation->set_rules('address2', 'Address Line 2', 'trim|required');
//        $this->form_validation->set_rules('phone', 'Contact Number', 'trim|required|min_length[10]');
//
//
//        if ($this->form_validation->run() == TRUE) {
            // true case
            $password = $this->password_hash($this->input->post('password'));
        	$data = array(
        		'username' => $this->input->post('username'),
        		'password' => $password,
        		'email' => $this->input->post('email'),
        		'address1' => $this->input->post('address1'),
                'address2' => $this->input->post('address2'),
        		'gender' => $this->input->post('gender'),
                'country' => $this->input->post('country'),
                'district' => $this->input->post('district'),
                'city' => $this->input->post('city'),
                'phone' => $this->input->post('phone'),

            );
        	$create = $this->model_users->create($data);
        	if($create == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('userauth/register', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('userauth/register', 'refresh');
        	}
//        }
//        else {
//            // false case
//
//            $this->render_template('users/create', $this->data);
//        }

		
	}

	public function password_hash($pass = '')
	{
		if($pass) {
			$password = password_hash($pass, PASSWORD_DEFAULT);
			return $password;
		}
	}

	public function edit($id = null)
	{

		if(!in_array('updateUser', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		if($id) {
			$this->form_validation->set_rules('groups', 'Group', 'required');
			$this->form_validation->set_rules('store', 'Store', 'trim|required');
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('fname', 'First name', 'trim|required');


			if ($this->form_validation->run() == TRUE) {
	            // true case
		        if(empty($this->input->post('password')) && empty($this->input->post('cpassword'))) {
		        	$data = array(
		        		'username' => $this->input->post('username'),
		        		'email' => $this->input->post('email'),
		        		'firstname' => $this->input->post('fname'),
		        		'lastname' => $this->input->post('lname'),
		        		'phone' => $this->input->post('phone'),
		        		'gender' => $this->input->post('gender'),
		        		'store_id' => $this->input->post('store'),
		        	);

		        	$update = $this->model_users->edit($data, $id, $this->input->post('groups'));
		        	if($update == true) {
		        		$this->session->set_flashdata('success', 'Successfully created');
		        		redirect('users/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('errors', 'Error occurred!!');
		        		redirect('users/edit/'.$id, 'refresh');
		        	}
		        }
		        else {
		        	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
					$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');

					if($this->form_validation->run() == TRUE) {

						$password = $this->password_hash($this->input->post('password'));

						$data = array(
			        		'username' => $this->input->post('username'),
			        		'password' => $password,
			        		'email' => $this->input->post('email'),
			        		'firstname' => $this->input->post('fname'),
			        		'lastname' => $this->input->post('lname'),
			        		'phone' => $this->input->post('phone'),
			        		'gender' => $this->input->post('gender'),
			        		'store_id' => $this->input->post('store'),
			        	);

			        	$update = $this->model_users->edit($data, $id, $this->input->post('groups'));
			        	if($update == true) {
			        		$this->session->set_flashdata('success', 'Successfully updated');
			        		redirect('users/', 'refresh');
			        	}
			        	else {
			        		$this->session->set_flashdata('errors', 'Error occurred!!');
			        		redirect('users/edit/'.$id, 'refresh');
			        	}
					}
			        else {
			            // false case
			        	$user_data = $this->model_users->getUserData($id);
			        	$groups = $this->model_users->getUserGroup($id);

			        	$this->data['user_data'] = $user_data;
			        	$this->data['user_group'] = $groups;

			            $group_data = $this->model_groups->getGroupData();
			        	$this->data['group_data'] = $group_data;

						$this->render_template('users/edit', $this->data);	
			        }	

		        }
	        }
	        else {
	            // false case
	        	$user_data = $this->model_users->getUserData($id);
	        	$groups = $this->model_users->getUserGroup($id);

	        	$this->data['store_data'] = $this->model_stores->getStoresData();

	        	$this->data['user_data'] = $user_data;
	        	$this->data['user_group'] = $groups;

	            $group_data = $this->model_groups->getGroupData();
	        	$this->data['group_data'] = $group_data;

				$this->render_template('users/edit', $this->data);	
	        }	
		}	
	}

    public function remove()
    {

        $user_id = $this->input->post('user_id');

        $response = array();
        if($user_id) {
            $delete = $this->model_users->delete($user_id);
            if($delete == true) {
                $response['success'] = true;
                $response['messages'] = "Successfully removed";
            }
            else {
                $response['success'] = false;
                $response['messages'] = "Error in the database while removing the brand information";
            }
        }
        else {
            $response['success'] = false;
            $response['messages'] = "Refersh the page again!!";
        }

        echo json_encode($response);
    }
	public function profile()
	{
        $this->user_not_logged_in();
		$user_id = $this->session->userdata('id');

        $user_data = $this->model_users->getUserData($user_id);
        $this->data['user_data'] = $user_data;

        $order_data = $this->model_order->getOrderData($user_id);
        $result = array();
        foreach ($order_data as $k => $v) {

            $result[$k]['order_info'] = $v;

        }

        $this->data['order_data'] = $result;


        $this->render_template('profile', $this->data);
	}

    public function fetchUserData()
    {
        $result = array('data' => array());

        $data = $this->model_users->getUserData();

        foreach ($data as $key => $value) {
            // button
            $buttons = '';


            $buttons .= ' <button type="button" class="btn btn-default" onclick="removeFunc('.$value['id'].')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';



            $result['data'][$key] = array(
                $value['username'],
                $value['email'],
                $value['address1'].', '.$value['address2'],
                $value['phone'],
                $value['gender'],
                $buttons
            );
        } // /foreach

        echo json_encode($result);
    }


}