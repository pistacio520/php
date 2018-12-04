<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Seal_model extends CI_Model{
	function __construct(){
        parent::__construct();
		$this->load->database();
	}

    //数据增加arr为要推入的数据 ，name 为数据表名;
    function add_data($arr,$name="ci_seal"){
        if(!empty($arr['keywords'])){
            $arr['keywords']=str_replace("：",":",$arr['keywords']);
        }
        return $this->db->insert($name,$arr);
    }


    // function update($arr){
    // 	$this->db->where('id',$arr['id']);
    // 	$this->db->update('test',array('time'=>$arr['time']));
    // } 测试用无意
    function rowsnum($name){
    	return $this->db->get($name)->result_array();
    }


    function getAll($name){
        return $this->db->get($name)->result_array();
    }
   

   //  $arr 为条件数据， $name 为数据库名
    function getone($arr,$name="ci_seal"){
        return $this->db->get_where($name,$arr)->row_array(0);
    }

       /*$str 为zid 更新数据库
    $this->db->set('field', 'field+1');
    $this->db->where('id', 2);
    $this->db->update('mytable'); */
    function setone($carr,$sstr,$name="ci_seal"){
   
     return  $this->db->update($name,$sstr,$carr);

    }

    function getonedown($name,$str){
       $this->db->select("full_path");
       $data=$this->db->get_where($name,array("file_md5"=>$str))->result_array();
        return $data[0];
    }



 

 }
