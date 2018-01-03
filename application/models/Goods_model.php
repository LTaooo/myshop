<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Goods_model extends CI_Model{
		public function __construct(){
			parent::__construct();

		}
		public function add_sort($sort)
		{	
			# code...
			$data['sortid']=null;
			$data['sortName']=$sort;
			return $this->db->insert('goodsort',$data);

		}
		public function add_goods($data)
		{	
			# code...
			return $this->db->insert('good',$data);

		}
		public function list_goods($goodid){
			$qur=$this->db->query("select * from good where sortid='$goodid'");
			$user=$qur->result_array();
			return $user;
		}
}

?>