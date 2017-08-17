<?php
/**
 * Created by PhpStorm.
 * User: luolong
 * Date: 2017/8/7
 * Time: 17:54
 * 列表视图和树视图获取读取并发送数据到前端
 */

class Get_content extends CI_Controller{
    public function get_json_content()
    {
       if (isset($_SESSION['is_login']))
       {
           header("Content-type:text/html;charset=utf-8");
           $this->load->model('Json_data');
           $flag = $this->input->post('flag');
           $data = $this->Json_data->get_json_data($flag);
           if(!$data["err_message"])
           {
              echo $data["json"];
           }
           if($data["err_message"])
           {
                echo json_encode(array('err_message'=>$data["err_message"]));
           }
       }
    }

}