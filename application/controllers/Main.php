<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller{

    public function __construct()
    {
        # code...
        parent::__construct();
        if( !$this->session->userdata('name')){//如果有没有登陆
            redirect('Login/login');
        }
        $this->load->model('Goods_model');


    }
		public function index(){
            $goodid=$this->uri->segment(3);
            if($goodid==null)
                $goodid=1;
            $data['goods'] = $this->Goods_model->list_goods($goodid);
			$this->load->view('main.html',$data);
        }   


}
?>