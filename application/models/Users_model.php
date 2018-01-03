<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Users_model extends CI_Model{
		public function __construct(){
			parent::__construct();
		}

		public function check($username)
		{	
			# code...
			$qur=$this->db->query("select * from user where userName='$username'");
			$user=$qur->result_array();
			return $user[0];
			
		}
		public function register($data){
			return $this->db->insert('user',$data);
		}
		public function getMoney($userid){
			$qur= $this->db->query("select money from user where userid='$userid'");
			$money=$qur->result_array();
			return($money[0]);
		}
		public function setMoney($data){
			$this->db->where('userid',$data['userid']);
			return $this->db->update('user',$data);//此处可以去掉data的userid项更好；
		}
		public function getUserOrder($userid){//用户订单信息
			$qur=$this->db->query("select orderid from orders where userid='$userid'");
			return $qur->result_array();
		}
}

?>