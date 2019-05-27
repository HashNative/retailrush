<?php 

class Model_order extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getOrderData($userId = null)
	{
		if($userId) {
			$sql = "SELECT * FROM orders WHERE customer_id = ?";
			$query = $this->db->query($sql, array($userId));
            return $query->result_array();
		}

		$sql = "SELECT * FROM orders ORDER BY id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

    public function getOrderDataById($Id = null)
    {
        if($Id) {
            $sql = "SELECT * FROM orders WHERE id = ?";
            $query = $this->db->query($sql, array($Id));
            return $query->row_array();
        }

        $sql = "SELECT * FROM orders ORDER BY id DESC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }


    public function create($data = '')
	{

		if($data) {
			$create = $this->db->insert('orders', $data);

			$user_id = $this->db->insert_id();

			return ($create == true) ? true : false;
		}
	}

	public function edit($data = array(), $id = null, $group_id = null)
	{
		$this->db->where('id', $id);
		$update = $this->db->update('users', $data);

		if($group_id) {
			// user group
			$update_user_group = array('group_id' => $group_id);
			$this->db->where('user_id', $id);
			$user_group = $this->db->update('user_group', $update_user_group);
			return ($update == true && $user_group == true) ? true : false;	
		}
			
		return ($update == true) ? true : false;	
	}

    public function update($id = null, $data = array())
    {
        if($id && $data) {
            $this->db->where('id', $id);
            $update = $this->db->update('orders', $data);
            return ($update == true) ? true : false;
        }
    }
	public function delete($id)
	{
		$this->db->where('id', $id);
		$delete = $this->db->delete('users');
		return ($delete == true) ? true : false;
	}

	public function countTotalOrders()
	{
		$sql = "SELECT * FROM users WHERE id != ?";
		$query = $this->db->query($sql, array(1));
		return $query->num_rows();
	}
	
}