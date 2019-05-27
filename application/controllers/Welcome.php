<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends User_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_products');
        $this->load->model('model_category');


    }
	public function index()
	{


        $product_data = $this->model_products->getProductData();

        $result = array();
        foreach ($product_data as $k => $v) {

            $result[$k]['product_info'] = $v;

        }

        $this->data['product_data'] = $result;

        $featured_product_data = $this->model_products->getFeaturedProductData();
        $result1 = array();
        foreach ($featured_product_data as $k => $v) {

            $result1[$k]['featured_product_info'] = $v;

        }

        $this->data['featured_product_data'] = $result1;

        $this->data['category'] = $this->model_category->getParentCategory();

        $this->render_template('home', $this->data);

    }

    public function product($id=null){
        if($id){

            $product_data = $this->model_products->getProductData($id);

            $result = array();
            foreach ($product_data as $k => $v) {

                $result[$k]['product_info'] = $v;

            }

            $this->data['product_data'] = $result;

            $this->render_template('product', $this->data);

        }

    }

    public function checkout(){
        $this->data['page_title'] = 'checkout';

        $this->render_template('checkout', $this->data);

    }
}
