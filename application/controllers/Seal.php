<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Seal extends CI_Controller{
   public function __construct(){
   	 parent::__construct();
   	 $this->load->model('seal_model','seal');
   	 $this->load->helper(['form','url']);
   }


	function index(){

  
			//echo $this->d(3);die;	
			//echo strlen($zid);die;13
		    //echo strlen(md5("cjdjsss"));die;32
    $data['title']='index';
    $data['title_c']="首页";
    $data['showcode']=0;
    $this->load->view("header",$data);
    $this->load->view('index');
    $this->load->view('footer');
	}


public function inputpage(){
    $data['zid']=uniqid();
    $data['type']=$this->seal->getAll('ci_type');
    $data['title']='input';
    $data['title_c']="印章登记表";
    $data['showcode']=1;
    $this->load->view("header",$data);
    $this->load->view('inputpage');
    $this->load->view('footer');
}


/*Array
(
    [0] => 1924
    [1] => 04
    [2] => 17
    [3] => 4:4:16
) explode 后得到数组。
sscanf 这一个函数也想到了。
sp



public function _remap($method){
	if($method=='show'){
           $this->show();
	}else{
		//$this->default_method();
		$this->index();
	}
}*/




	function show(){

		echo ltrim('./uploads','.');
		//echo 'this is show method';
		$this->load->library('pagination');
		$config['base_url']=site_url('seal/show');
		$config['total_rows']=$this->db->count_all_results('test');
		$config['per_page']=10;
		$offset=$this->uri->segment(3);
	

		$this->pagination->initialize($config);
		$this->db->limit(10,$offset);
		$data['content'] = $this->db->get('test')->result_array();
		$data['links']   = $this->pagination->create_links();
		$this->load->view('show',$data);
	}

	function showforsearch(){
    $this->load->library('pagination');

 

		$config['total_rows'] = $this->db->like('pname',$k)->count_all_results('seal');
		$config['per_page']   = 10;
		$config['enable_query_strings']=true;
		$config['page_query_string']=true;
		$offset=$this->input->get('per_page');
	

		$this->pagination->initialize($config);
		$this->db->limit(10,$offset);
		$data['content'] = $this->db->like('pname',$k)->get('seal')->result_array();
		$data['links']   = $this->pagination->create_links();

		$this->load->view('showforsearch',$data);
	}






	function datasearchview(){
     $this->load->library('pagination');
    $keywords=$this->input->get('keywords');
    $startDate=is_numeric($this->input->get('startDate'))?$this->input->get('startDate'):strtotime($this->input->get('startDate')."00:00:00");
    $endDate=is_numeric($this->input->get('endDate'))?$this->input->get('endDate'):strtotime($this->input->get('endDate')." 23:59:59");

    $sql="select count(*) as rownum from ci_seal where 1=1";
    $sqld="select * from ci_seal where 1=1";
    $where="";

    if($keywords){
      $where.=" and (applicant like '%{$keywords}%' or description like '%{$keywords}%' or keywords like '%{$keywords}%')";
      $sql.=$where;
      $sqld.=$where;
    }

    if($startDate){
       $where=" and createtime between {$startDate} and {$endDate}";
       $sql.=$where;
       $sqld.=$where;
    }

     p($sql);
    $res=$this->db->query($sql)->result_array();
    $config['total_rows'] =(int)$res[0]['rownum'];
    $config['base_url']=site_url('seal/datasearchview')."?keywords={$keywords}&startDate={$startDate}&endDate={$endDate}";
    $config['per_page']   = 2;
    $config['enable_query_strings']=true;
    $config['page_query_string']=true;
    $offset=$this->input->get('per_page')?$this->input->get('per_page'):0;
	  $this->pagination->initialize($config);
    $data['content'] = $this->db->query($sqld." order by createtime desc limit 2 offset {$offset} ")->result_array();
    $data['links']   = $this->pagination->create_links();

  
 

	
   $data['num']=1;//序号传值
    
    $data['title']='jquery-ui.min';
    $data['title_c']="数据搜索";
    $data['showcode']=4;
    $this->load->view("header",$data);
    $this->load->view('datasearchview');
    $this->load->view('footer');
	}

	function qdform(){
	//echo base_url();die;
		$this->load->view('qdform');
	}

	function qdform1(){
		$this->load->view('qdform1');
	}

	function menutest(){
		$this->load->view('menutest',array('error'=>''));
	}

   function do_upload(){
   	    header("Content-Type:text/html;charset=utf-8");
   		$config['upload_path']='./uploads/';
   		$config['allowed_types']='gif|jpg|png|txt|rar|zip|pdf';
   		$this->load->library('upload',$config);
   		if(!$this->upload->do_upload('userfile')){
   			$error=array('error'=>$this->upload->display_errors());
   			$this->load->view('menutest',$error);
   		}else{
   			$data=array('upload_data'=>$this->upload->data());
   			$this->load->view('upload_success',$data);
   		}
   }

   function ajax_upload(){
   
   	    $name=$this->input->post('who'); //用于判断是那一个分支传入
   	    $zid=$this->input->post('zid');//主ID后期用于清里无效的上传文件内容。
   	    $datedir=date("Ymd");
   	    $config['file_name']=$this->mrn(5);//生成随机文件名
   	    $config['upload_path']='./uploads/'.$datedir;

   	    $config['allowed_types']='gif|jpg|png|doc|docx|rar|zip|pdf';
         is_dir( $config['upload_path']) or (@mkdir( $config['upload_path'],0777));
        //判断路径是否存在。
   		
   		$this->load->library('upload',$config);
   		if(!$this->upload->do_upload($name)){
   			$error=array('error'=>$this->upload->display_errors());
   			echo json_encode($error);
   		}else{
   			$data=$this->upload->data();
   			$data['zid']=$zid;
   			if(!$this->seal->getone(['file_md5'=>$data['file_md5']],'ci_attachment')){
   				$this->seal->add_data($data,"ci_attachment");
   				 echo json_encode($data);
   			}else{
   			$error=array('error'=>"内容一样的文件已经存在！");
   			echo json_encode($error);
   			}
   		   
   		  // exec('control system');
   		}
   }

 private function mrn($l,$source="012345678abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"){
  	    $hash="";
  	    $max=strlen($source)-1;
  	    for($i=0;$i<$l;$i++){
  	    	$hash.=$source[mt_rand(0,$max)];
  	    }
      return $hash;
    }


   function reginfo(){
   	    $data=$this->input->post();

   	    $data['createtime']=time();
        $data['is_del']=0;
      


      // 开始处理二维码
        $str=site_url('seal/detail_single').'/'.$data['zid'];
        $path='qrcodepic/'.date('Ymd');
        is_dir($path) or (@mkdir($path,0777));
        $path=$path.$this->mrn(5).".png";
        if($this->qrcode($str,$path)){
        	$data['qrcode']=$path;
        }
        if($this->seal->add_data($data)){
          header("location:".site_url('seal/detail_single'));
          exit();
         }else{
          unlink($path);//如果数据写入失败就把二维码文件删除。
          show_404();
         }


   }
   
   function qrcode($str,$path){
   		$this->load->library('QRcode');
   		QRcode::png($str,$path,"L",4,2);
   		return file_exists($path);
   }

	function detail_single(){
        $str=$this->uri->segment(3);
        $data['c']=$this->seal->getone(array("zid"=>$str),"ci_detail");
        
        $data['oa']=$this->seal->getone(array('file_md5'=>$data['c']['oamd5']),'ci_attachment');
        $data['pdf']=$this->seal->getone(array('file_md5'=>$data['c']['pdfmd5']),'ci_attachment');

       // var_dump($data['oa']);die;

        $keywords=explode("-",$data["c"]["keywords"]);
        foreach($keywords as $keyword){
        	$data['k'][]=explode(":",$keyword);
        }
     //  var_dump($data['k']);
      
		$this->load->view('detail_single',$data);
		$this->load->view('footer');
	}

	function detail_list(){
		$this->load->library('pagination');
		$config['base_url']=site_url('seal/detail_list');
		$config['total_rows']=$this->db->count_all_results('ci_detail');
		$config['per_page']=10;
		$offset=$this->uri->segment(3);
	

		$this->pagination->initialize($config);
		$this->db->limit(10,$offset);
		$data['content'] = $this->db->order_by('createtime','DESC')->get('ci_detail')->result_array();
		$data['links']   = $this->pagination->create_links();
		$data['num']=1;//序号传值
		$data['title']='detail_list';
		$data['title_c']="印章详细列表";
		$data['showcode']=2;
		$this->load->view("header",$data);
		$this->load->view("detail_list");
		$this->load->view('footer');
	}


  function sealtypeadd(){
    	if (IS_POST) {
    		$data=$this->input->post();
    		echo $this->seal->add_data($data,"ci_type");
    	}
    	$this->load->view('sealtypeadd');
    }


	 function  getdownfile(){

	     $str=$this->uri->segment(3,false);
	     //echo $str;die;
	     if($str){
	     	$data=$this->seal->getonedown("ci_attachment",$str);
	     	 if($data){
	     	 	 // var_dump($data);die;
	     	       $this->load->helper('download');

	     	       force_download($data['full_path'],NULL);
	     	 }
	     	 
	     }
	     
	 }


	  function checkmd5(){
	  $data['title']='checkmd5';
		$data['title_c']="电子文版比对查找";
		$data['showcode']=3;
		$this->load->view("header",$data);
		$this->load->view("checkmd5");
    $this->load->view("footer");
	  }

      function checkmd5result(){
      		$md5=$this->input->post('md5');
      		if($md5){
            $res=$this->seal->getone(['file_md5'=>$md5],"ci_attachment");
      			if($res){
      				 echo "<p class='green'>文件验证成功.";
               echo  "<p>数据定位于：<a href='".site_url('seal/detail_single')."/".$res['zid'] ."'>数据定位</a></p>";
      			}else{
      				echo "<p class='red'>文件验证失败，请仔细核对关键内容!</p>";
      			}
      		}
      }


  function reganerate(){                     //二维码重新生成。
   $str=$this->uri->segment(3,false);
    if ($str) {
      	$result=$this->seal->getone(['zid'=>$str]);
      	if ($result) {
      		@unlink($result['qrcode']);
              $str=site_url('seal/detail_single').'/'.$result['zid'];
              $path='qrcodepic/'.date('Ymd');
              is_dir($path) or (@mkdir($path,0777));
              $path=$path.'/'.$this->mrn(5).".png";
      		if($this->qrcode($str,$path)){
      			if($this->seal->setone(['zid'=>$result['zid']],['qrcode'=>$path])){
      				$this->load->view('message',['type'=>'success','msg'=>"成功啦",'url'=>site_url('seal/detail_list')]);
      			}
      		}
      	}
      }
 }


}




  //   function addin(){
  //   $jsonfiledata=file_get_contents('data/generated.json'); 
  //   $d=json_decode($jsonfiledata);
  //   foreach($d as $v){
  //     $this->seal->padd(array(
  //                   'guid'=>$v->guid,
  //                   'pname'=>$v->pname,
  //                   'phone'=>$v->phone,
  //                   'sex'=>(int)$v->sex,
  //                   'time'=>strtotime($v->birthdate)
  //     ));
  //   }
  // }
  // function change(){
  //   $jsonfiledata=file_get_contents('data/generated.json'); 
  //   $d=json_decode($jsonfiledata);
  //   $num=1;
  //   foreach($d as $v){
  //     $t=explode(' ',$v->birthdate);
  //     $time=$t[0].'-'.$t[1].'-'.$t[2].' '.$t[3];//把字符串重组成YYYY-MM-d H:M:s
  //     $this->seal->update(array(
  //           'id'=>$num,
  //                   'time'=>strtotime($time)
  //     ));
  //     $num++;     
  //   }
  // }