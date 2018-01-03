<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Selfmsg extends CI_Controller{
		public function __construct(){
            parent::__construct();
            $this->load->model('Users_model');
            $this->load->model('Order_model');

        }
        public function self()
        {
            # code...
            $userid=$this->session->userdata['userid'];
            $orderid=$this->Users_model->getUserOrder($userid);
            
            foreach($orderid as $id):
                $ids[]=$id['orderid'];
            endforeach;
            $datas['a']=$this->Order_model->getShopOrder($ids);
            //$datas['msg']=$this->uri->segment(3);

            $this->load->view('self.html',$datas);

        }


}

?>