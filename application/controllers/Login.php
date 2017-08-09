<?php
/**
 * Created by PhpStorm.
 * User: luolong
 * Date: 2017/8/7
 * Time: 11:21
 * 登陆界面的控制器
 */


class Login extends CI_Controller{
    public function index(){
        if(isset($_SESSION['if_login'])){
            redirect(base_url().'home');
        }
        else{
            $this->form_validation->set_rules('user_name', '用户名', 'trim|required',
                array('required' => '用户名不能为空 ')
            );
            $this->form_validation->set_rules('user_password', '密码', 'trim|required',
                array('required' => '密码不能为空 '
                )
            );
            if($this->form_validation->run() == FALSE){
                $data['err_mess'] = "0";
                $this->load->view('common/common.php');
                $this->load->view('login',$data);
            }
            else
            {
                $user_name = trim($this->input->post('user_name'));
                $user_password = trim($this->input->post('user_password'));
                $this->load->model('Md5_decrypt');
                $bool = $this->Md5_decrypt->decrypt($user_name);
                if($bool){
                    if($bool == $user_password){
                        $this->session->set_userdata(array(
                            'user_name' => $user_name,
                            'if_login' =>1
                        ));
                        session_write_close();
                        redirect(base_url().'home');
                    }else{
                        $data['err_mess'] = "1";
                        $this->load->view('common/common.php');
                        $this->load->view('login',$data);
                    }
                }else{
                    $data['err_mess'] = "1";
                    $this->load->view('common/common.php');
                    $this->load->view('login',$data);
                }
            }
        }
    }

    //前端界面点击注销时后台执行的操作
    public function exit_system(){
        header('content-type:application:json;charset=utf8');
        header('Access-Control-Allow-Origin:*');
        header('Access-Control-Allow-Methods:POST');
        header('Access-Control-Allow-Headers:x-requested-with,content-type');
        $this->session->unset_userdata('if_login');
        if(isset($_SESSION['if_login'])){
            echo "false";
        }
        else{
            echo "success";
        }
    }
}