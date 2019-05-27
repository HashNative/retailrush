<?php 

class MY_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
}

class Admin_Controller extends MY_Controller 
{
	
	var $permission = array();

	public function __construct() 
	{
		parent::__construct();

		if(empty($this->session->userdata('logged_in'))) {
			$session_data = array('logged_in' => FALSE);
			$this->session->set_userdata($session_data);
		}
		else {
			$admin_id = $this->session->userdata('id');

		}

	}

	public function logged_in()
	{
		$session_data = $this->session->userdata();
		if($session_data['logged_in'] == TRUE) {
			redirect('admin', 'refresh');
		}
	}

	public function not_logged_in()
	{
		$session_data = $this->session->userdata();
		if($session_data['logged_in'] == FALSE) {
			redirect('adminauth/login', 'refresh');
		}
	}


    public function render_admin_template($page = null, $data = array())
    {

        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/templates/side_menubar',$data);
        $this->load->view($page, $data);
        $this->load->view('admin/templates/footer',$data);
    }


}


class User_Controller extends MY_Controller
{

    var $permission = array();

    public function __construct()
    {
        parent::__construct();

        if(empty($this->session->userdata('user_logged_in'))) {
            $session_data = array('user_logged_in' => FALSE);
            $this->session->set_userdata($session_data);
        }
        else {
            $user_id = $this->session->userdata('id');

        }
    }


    public function user_logged_in()
    {
        $session_data = $this->session->userdata();
        if($session_data['user_logged_in'] == TRUE) {
            redirect('/', 'refresh');
        }
    }

    public function user_not_logged_in()
    {
        $session_data = $this->session->userdata();
        if($session_data['user_logged_in'] == FALSE) {
            redirect('userauth/login', 'refresh');
        }
    }


    public function render_template($page = null, $data = array())
    {
        if(!empty($_GET["action"])) {


            switch($_GET["action"]) {
                case "add":

                    $productByCode = $this->model_products->getProductData($_GET["id"]);
                    $itemArray = array(
                        $productByCode["id"]=>array(
                            'name'=>$productByCode["name"],
                            'id'=>$productByCode["id"],
                            'quantity'=>'1',
                            'price'=>$productByCode["price"],
                            'image'=>$productByCode["image"]));



                    if(!empty($_SESSION["cart_item"])) {
                        if(in_array($productByCode["id"],array_keys($_SESSION["cart_item"]))) {
                            foreach($_SESSION["cart_item"] as $k => $v) {


                                if($productByCode["id"] == $k) {
                                    if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                                        $_SESSION["cart_item"][$k]["quantity"] = 0;
                                    }
                                    $_SESSION["cart_item"][$k]["quantity"] +=1;
                                }
                            }
                        } else {
                            $_SESSION["cart_item"] = (array)$_SESSION["cart_item"] + $itemArray;

                        }
                    } else {
                        $_SESSION["cart_item"] = $itemArray;
                    }


                    break;
                case "remove":
                    if(!empty($_SESSION["cart_item"])) {
                        foreach($_SESSION["cart_item"] as $k => $v) {

                            if($_GET["id"] == $k)
                                unset($_SESSION["cart_item"][$k]);
                            if(empty($_SESSION["cart_item"]))
                                unset($_SESSION["cart_item"]);
                        }
                    }
                    break;
                case "empty":
                    unset($_SESSION["cart_item"]);
                    break;
            }
        }


        $this->load->view('templates/header',$data);
        $this->load->view('templates/navbar',$data);
        $this->load->view($page, $data);
        $this->load->view('templates/footer',$data);
    }



    public function render_admin_template($page = null, $data = array())
    {

        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/templates/side_menubar',$data);
        $this->load->view($page, $data);
        $this->load->view('admin/templates/footer',$data);
    }


}