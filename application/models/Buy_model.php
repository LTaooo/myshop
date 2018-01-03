<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Buy_model extends CI_Model{
		public function __construct(){
			parent::__construct();

		}
    public function getName($id)
    {
        # code...
        $que=$this->db->query("select goodsName from good where goodid='$id';");
        return $que->result_array();
    }
    public function buy($data){
        $que=$this->db->query("select goodsName from good where goodid='';");
        return $que->result_array();
    }        

}

?>