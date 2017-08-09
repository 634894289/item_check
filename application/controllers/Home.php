<?php
/**
 * Created by PhpStorm.
 * User: luolong
 * Date: 2017/8/7
 * Time: 16:15
 * 主页控制器
 */

class Home extends CI_Controller{
    public function index(){
        if(isset($_SESSION['if_login'])){
            $this->load->view('common/common');
            $this->load->view('home');
        }
        else{
            redirect(base_url().'login');
        }
    }
}