<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Buy extends CI_Controller{
    public function __construct()
    {       
        # code...
        parent::__construct();
        $this->load->model('Buy_model');
        $this->load->model('Users_model');
        $this->load->model('Order_model');
    }
    public function confirm()
    {   
        $data['goodsid']=$this->uri->segment(3);
        $data['price']=$this->uri->segment(4);
        $name=$this->Buy_model->getName($data['goodsid'])[0];
        $data['goodsname']=$name['goodsName'];//必须通过键才能取出来
        $this->load->view('confirm.html',$data);

    }
    public function buy(){
        $goodsid=$this->input->post('goodsid');
        $total=floatval($this->input->post('total'));
        $userid=$this->session->userdata['userid'];//读取登陆时保存的session数据即可
        $money=floatval($this->Users_model->getMoney($userid)['money']);
        $number=$this->input->post('number');
        if($total>$money){
            echo "你的余额已不足";
        }
        else{
            $money=$money-$total;
            $data['money']=$money;
            $data['userid']=$userid;
            if($this->Users_model->setMoney($data))
            {
                $orderdata['userid']=$userid;
                if(!$this->Order_model->addOrder($orderdata)){//添加order表数据
                    echo "order表插入数据失败";
                }
                $sodata['goodid']=$goodsid;
                $sodata['orderid']=$this->Order_model->getOrderid()['max(orderid)'];
                $sodata['goodscount']=$number;
                date_default_timezone_set("PRC");//设置时区为中国
                $sodata['shoppingdate']=date('Y-m-d H:i:s');
                if(!$this->Order_model->addShoporder($sodata)){
                    echo "Shoporder表插入失败";
                }
                
                redirect("Selfmsg/self/Success");//参数1意味着购买成功
                
            }
            else echo "购买失败";
        }
    }
    
}
  



?>