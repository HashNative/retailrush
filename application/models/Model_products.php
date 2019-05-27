<?php 

class Model_products extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/* get the product data */
	public function getProductData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM products where id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}	

			$sql = "SELECT * FROM products ORDER BY id DESC";
			$query = $this->db->query($sql);
			return $query->result_array();
	}


    /* get the product data */
    public function getFeaturedProductData()
    {

        $sql = "SELECT * FROM products WHERE featured = ? ORDER BY id DESC";
        $query = $this->db->query($sql, array(1));
        return $query->result_array();
    }

	/* search and get the product data */
    public function getProductFilteredData($search = null)
    {
        if($search) {
            $sql = "SELECT * FROM products WHERE category_id LIKE ? OR name LIKE ? OR parent_category LIKE ? OR brand LIKE ? ORDER BY id DESC";
            $query = $this->db->query($sql, array('%'.$search.'%','%'.$search.'%','%'.$search.'%','%'.$search.'%'));
            return $query->result_array();
        }

        $sql = "SELECT * FROM products ORDER BY id DESC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
	public function getActiveProductData()
	{
		$user_id = $this->session->userdata('id');

		if($user_id == 1) {
			$sql = "SELECT * FROM products WHERE active = ? ORDER BY id DESC";
			$query = $this->db->query($sql, array(1));
			return $query->result_array();
		}
		else {
			$this->load->model('model_users');
			$user_data = $this->model_users->getUserData($user_id);
			$sql = "SELECT * FROM products WHERE active = ? ORDER BY id DESC";
			$query = $this->db->query($sql, array(1));

			$data = array();
			foreach ($query->result_array() as $k => $v) {
				$store_ids = json_decode($v['store_id']);
				if(in_array($user_data['store_id'], $store_ids)) {
					$data[] = $v;
				}
			}

			return $data;
		}


	}

	public function create($data)
	{
		if($data) {
            $insert = $this->db->insert('products', $data);
            $this->db->insert_id();
			return ($insert == true) ? true : false;
		}
	}

	public function update($data, $id)
	{
		if($data && $id) {
			$this->db->where('id', $id);
			$update = $this->db->update('products', $data);
			return ($update == true) ? true : false;
		}
	}

	public function remove($id)
	{
		if($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('products');
			return ($delete == true) ? true : false;
		}
	}

	public function countTotalProducts()
	{
		$sql = "SELECT * FROM products";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}

}