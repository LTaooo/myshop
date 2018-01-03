<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
	public function __construct()
	{
		# code...
		parent::__construct();
		$this->load->helper('captcha');
		$this->load->library('form_validation');
		$this->load->model('Users_model');
	}
	public function login(){

		$vals = array('img_path' => './resources/captcha/',//必备
						'img_url'=> base_url('resources/captcha'),//必备
						'word'=>rand(1000,9999),
						'expiration'=>60,//验证码图片删除时间
						'img_width'=>'150'
		 );
		$data=create_captcha($vals);//数组，其中有个image。
		$code=$data['word'];
		$this->session->set_userdata('code',$code);

		$this->load->view('login.html',$data);
	}

	public function signin()
	{		
		# 设置表单验证规则
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('password','Password','required');

		#读取验证码
		$captcha=strtolower($this->input->post('captcha'));
		$code=strtolower($this->session->userdata('code'));
		if($captcha===$code)
		{
			if($this->form_validation->run()==false){//验证失败
				#validation_errors()可以获取验证错误信息；
			redirect('Login/login');


			}else{
				
				$username=$this->input->post('name');
				$user=$this->Users_model->check($username);
				$password=$this->input->post('password');
				//var_dump($user);
				if($username==$user['userName']&& $password==$user['password'])
				{
					$this->session->set_userdata('name',$username);
					$this->session->set_userdata('password',$password);
					$this->session->set_userdata('userid',$user['userid']);
					if($user['is_root']==1)	
						redirect('Manager/root');//登陆成功
					else redirect('Main/index');//登陆成功

				}
			}

		}else{
			redirect('Login/login');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('Login/login');
	}

}

?>
