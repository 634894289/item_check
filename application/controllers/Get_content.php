<?php
/**
 * Created by PhpStorm.
 * User: luolong
 * Date: 2017/8/7
 * Time: 17:54
 * 列表视图和树视图获取读取并发送数据到前端
 */

class Get_content extends CI_Controller{
    public function get_json_content(){
        header("Content-type:text/html;charset=utf-8");
//        header('content-type:application:json');
        header('Access-Control-Allow-Origin:*');
        header('Access-Control-Allow-Methods:POST');
        header('Access-Control-Allow-Headers:x-requested-with,content-type');
        $flag = $this->input->post('flag');
        if($flag === "1"){
            $filename = base_url().'data/table.json';
        }
        else{
            $filename = base_url().'/data/tree.json';
        }
        $json = file_get_contents($filename);
        echo $json;
    }

}