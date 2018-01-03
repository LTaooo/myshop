<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Register extends CI_Controller
{
	
	function __construct()
	{	
			# code...
		parent::__construct();
		$this->load->model('Users_model');
	}
	public function index()
	{
		# code...
		$this->load->view('register.html');

	}
	public function register(){
		$user['userid']=null;
		$user['userName']=$this->input->post('name');
		$user['password']=$this->input->post('password');
		$user['sex']=$this->input->post('sex');
		$user['useremail']=$this->input->post('useremail');
		$user['tel']=$this->input->post('tel');
		$user['address']=$this->input->post('address');
		$user['money']=$this->input->post('money');

		if($this->Users_model->register($user)){
			redirect('Login/login');
		}
		else echo "<script>echo 'error please agin'</script>";

	}
}


?>