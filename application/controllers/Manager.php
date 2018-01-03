<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends CI_Controller{

    public function __construct()
    {
        # code...
        parent::__construct();
        $this->load->model('Goods_model');
        $this->load->helper('form');//上传文件必须

    }
		public function root(){
            $this->load->view('root.html',array('error'=>''));

    	}
        function addsort(){
            $sort=$this->input->post('sort');
            //var_dump($sort);
            if($this->Goods_model->add_sort($sort))
            echo "插入成功";
            else echo "插入失败"; 
        }
        function addgoods(){
            $config['upload_path']='./uploads/';
            $config['allowed_types']='gif|jpg|png';
            $config['max_size']=4000;
            $this->load->library('upload',$config);
            
            $goods['sortid']=$this->input->post('category');
            $goods['goodsName']=$this->input->post('goodsname');
            $goods['price']=$this->input->post('price');
            $goods['desc']=$this->input->post('desc');
            $goods['number']=$this->input->post('number');
            #照片独立读取。
            if ( ! $this->upload->do_upload('photo'))
            {
                $error = array('error' => $this->upload->display_errors());
    
                $this->load->view('root.html', $error);
            }
            else
            {
                // $goods['photo'] 
                $data= array('upload_data' => $this->upload->data());//返回一个多维数组
                
                //$this->load->view('upload_success', $data);
                $goods['photo']=$data['upload_data']['file_name'];

            }
             if($this->Goods_model->add_goods($goods))
             echo "插入成功";
             else echo "插入失败"; 
        }

}
?>