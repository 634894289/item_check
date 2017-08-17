<?php
/**
 * Created by PhpStorm.
 * User: luolong
 * Date: 2017/8/7
 * Time: 16:15
 * 主页控制器
 */

class Home extends CI_Controller{
    public function index()
    {
        if (isset($_SESSION['is_login']))
        {
            $data = $this->home_common();
            $this->load->view('home',$data);
        }
        else
        {
            redirect(base_url().'login');
            return;
        }
    }

    public function home_common(){
        $data['head'] = $this->load->view('common/head_content','',true);
        $data['header'] = $this->load->view('common/header_content','',true);
        $data['script'] = $this->load->view('common/script_content','',true);
        return $data;
    }
}