<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Order_model extends CI_Model{
		public function __construct(){
			parent::__construct();

		}

		public function addOrder($data){
			return	$this->db->insert('orders',$data);
		}
		public function getOrderid(){
			$qur=$this->db->query("select max(orderid) from orders");
			$id=$qur->result_array();
			return $id[0]; 

		}
		public function addShoporder($data)
		{
			# code...
			return $this->db->insert('shoporder',$data);

		}
		public function getShopOrder($data)
		{
			# code...
			foreach($data as $id):
			$qur=$this->db->query("select * from shoporder where orderid='$id'");
			$datas[]= $qur->result_array();
			endforeach;
			return $datas;
		}

}

?>