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
        }
        else
        {
            $data['is_err'] = "0";
            $data['head'] = $this->load->view('common/head_content','',true);
            $data['header'] = $this->load->view('common/header_content','',true);
            $data['script'] = $this->load->view('common/script_content','',true);
            $this->load->view('login',$data);
        }
    }

    public function check_login()
    {
        $this->form_validation->set_rules('user_name', '用户名', 'trim|required',
            array('required' => '用户名不能为空 ')
        );
        $this->form_validation->set_rules('user_password', '密码', 'trim|required',
            array('required' => '密码不能为空 '
            )
        );
        if ($this->form_validation->run() == FALSE)
        {
            $data['is_err'] = "0";
            $data['head'] = $this->load->view('common/head_content','',true);
            $data['header'] = $this->load->view('common/header_content','',true);
            $data['script'] = $this->load->view('common/script_content','',true);
            $this->load->view('login',$data);
        }
        else
        {
            $user_name = $this->input->post('user_name');
            $user_password = $this->input->post('user_password');
            $this->load->model('Md5_decrypt');
            $bool = $this->Md5_decrypt->decrypt($user_name);
            if ($bool['is_err'] === "0" && $bool['content'] !== "false")
            {
                if ($bool['content'] == $user_password)
                {
                    $this->session->set_userdata(array(
                        'user_name' => $user_name,
                        'is_login' =>1
                    ));
                    session_write_close();
                    redirect(base_url().'home');
                }
                else
                {
                    $data['is_err'] = "1";
                    $data['err_message'] = "登录失败，密码错误";
                    $data['head'] = $this->load->view('common/head_content','',true);
                    $data['header'] = $this->load->view('common/header_content','',true);
                    $data['script'] = $this->load->view('common/script_content','',true);
                    $this->load->view('login',$data);
                }
            }
            elseif ($bool['is_err'] === "0" && $bool['content'] === "false")
            {
                $data['is_err'] = "1";
                $data['err_message'] = "登录失败，用户名错误";
                $data['head'] = $this->load->view('common/head_content','',true);
                $data['header'] = $this->load->view('common/header_content','',true);
                $data['script'] = $this->load->view('common/script_content','',true);
                $this->load->view('login',$data);
            }
            else
            {
                $data['is_err'] = "1";
                $data['err_message'] = '服务器出错';
                $data['head'] = $this->load->view('common/head_content','',true);
                $data['header'] = $this->load->view('common/header_content','',true);
                $data['script'] = $this->load->view('common/script_content','',true);
                $this->load->view('login',$data);
            }
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
}