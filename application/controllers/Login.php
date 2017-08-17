<?php
/**
 * Created by PhpStorm.
 * User: luolong
 * Date: 2017/8/7
 * Time: 11:21
 * 登陆界面的控制器
 */


class Login extends CI_Controller{
    public function index()
    {
        if (isset($_SESSION['is_login']))
        {
            redirect(base_url().'home');
            return;
        }
        else
        {
            $data = $this->login_common();
            $this->load->view('login',$data);
        }
    }

    public function check_login()
    {
        $user_name = $this->input->post('user_name');
        $user_password = $this->input->post('user_password');
        $this->load->model('Md5_password');
        $password_infomation = $this->Md5_password->get_password($user_name);
        if ($password_infomation['err_message'] === "0")
        {
            if ($password_infomation['content'] == md5($user_password))
            {
                $this->session->set_userdata(array(
                    'user_name' => $user_name,
                    'is_login' =>1
                ));
                redirect(base_url().'home');
                return;
            }
            else
            {
                $this->session->set_userdata(array(
                    'err_message' =>"0"
                ));
                redirect(base_url().'login');
                return;
            }
        }
        elseif ($password_infomation['err_message'] === "1" )
        {
            $this->session->set_userdata(array(
                'err_message' =>"1"
            ));
            redirect(base_url().'login');
            return;
        }
        else
        {
            $this->session->set_userdata(array(
                'err_message' =>$password_infomation['err_message']
            ));
            redirect(base_url().'login');
            return;
        }

    }

    //前端界面点击注销时后台执行的操作
    public function exit_system()
    {
        $this->session->unset_userdata('is_login');
        if (isset($_SESSION['is_login']))
        {
            echo "false";
        }
        else
        {
            echo "success";
        }
    }

    public function login_common()
    {
        $data['head'] = $this->load->view('common/head_content','',true);
        $data['header'] = $this->load->view('common/header_content','',true);
        $data['script'] = $this->load->view('common/script_content','',true);
        return $data;
    }
}