<?php
/**
 * Created by PhpStorm.
 * User: luolong
 * Date: 2017/8/7
 * Time: 14:48
 */

class Login_model extends CI_Model{
    public function check_password($user_name){
        $res = $this->db->where('user_name',$user_name)->from('user')->get();
        $result = $res->row();
        if (isset($result))
        {
            return $result;
        }
        return false;

    }
}