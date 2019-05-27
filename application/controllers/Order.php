<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends User_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_products');
        $this->load->model('model_category');
        $this->load->model('model_users');
        $this->load->model('model_order');


    }

	public function index()
	{

        $order_data = $this->model_order->getOrderData();
        $result = array();
        foreach ($order_data as $k => $v) {

            $result[$k]['order_info'] = $v;

        }

        $this->data['order_data'] = $result;


        $this->render_admin_template('admin/orders/index', $this->data);
    }

    public function checkout(){
        $this->data['page_title'] = 'checkout';

        $session_data = $this->session->userdata();
        if($session_data['user_logged_in'] == TRUE) {

            $user_id = $this->session->userdata('id');
            $is_user = ($user_id == 1) ? true :false;

            $this->data['is_user'] = $is_user;

            $user_id = $this->session->userdata('id');

            $user_data = $this->model_users->getUserData($user_id);
            $this->data['user_data'] = $user_data;
            $this->render_template('checkout', $this->data);
        }else{
            redirect('userauth/login', 'refresh');

        }



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
        $order_id = 'ORD-'.strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 5));

        $data = array(
              'date' => strtotime(date('Y-m-d')),
              'order_id' => $order_id,
              'customer_id' => $this->input->post('customer_id'),
              'customer_name' => $this->session->userdata('username'),
              'delivery_address' => $this->input->post('address1').','.$this->input->post('address2'),
              'items' => $this->input->post('items'),
              //'country' => $this->input->post('country'),
              'district' => $this->input->post('district'),
              'city' => $this->input->post('city'),
              'phone' => $this->input->post('phone'),
              'delivery_charge' => $this->input->post('delivery_charge'),
              'total' => $this->input->post('total'),
              'city' => $this->input->post('city'),
              'method' => $this->input->post('method'),


            'status' => 'Order Placed',


        );
        $create = $this->model_order->create($data);
        if($create == true) {
            unset($_SESSION["cart_item"]);
            $this->session->set_flashdata('success', 'Order Placed Successfully');
            redirect('users/profile', 'refresh');
        }
        else {
            $this->session->set_flashdata('errors', 'Error occurred!!');
            redirect('users/profile', 'refresh');
        }
//        }
//        else {
//            // false case
//
//            $this->render_template('users/create', $this->data);
//        }


    }

    public function update($id)
    {
        // if(!in_array('updateStore', $this->permission)) {
        // 	redirect('dashboard', 'refresh');
        // }

        $response = array();

        if($id) {
            $this->form_validation->set_rules('edit_order_id', 'Order Id', 'trim|required');
            $this->form_validation->set_rules('edit_status', 'Status', 'trim|required');

            $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'status' => $this->input->post('edit_status'),
                );

                $update = $this->model_order->update($id, $data);
                if($update == true) {
                    $response['success'] = true;
                    $response['messages'] = 'Succesfully updated';
                }
                else {
                    $response['success'] = false;
                    $response['messages'] = 'Error in the database while updated the brand information';
                }
            }
            else {
                $response['success'] = false;
                foreach ($_POST as $key => $value) {
                    $response['messages'][$key] = form_error($key);
                }
            }
        }
        else {
            $response['success'] = false;
            $response['messages'] = 'Error please refresh the page again!!';
        }

        echo json_encode($response);
    }


    public function fetchOrderData()
    {
        $result = array('data' => array());

        $data = $this->model_order->getOrderData();

        foreach ($data as $key => $value) {
            // button
            $buttons = '';

            $buttons = '<button type="button" class="btn btn-default" onclick="editFunc('.$value['id'].')" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil"></i></button>';

            $customer='<span>'.$value['customer_id'].'-</span>'.$value['customer_name'];
            $result['data'][$key] = array(
                $value['order_id'],
                $value['items'],
                $value['total'],
                $customer,
                $value['delivery_address'],
                $value['phone'],
                $value['status'],
                $buttons
            );
        } // /foreach

        echo json_encode($result);
    }


    public function fetchOrderDataById($id = null)
    {
        if($id) {
            $data = $this->model_order->getOrderDataById($id);
            echo json_encode($data);
        }

    }
}
