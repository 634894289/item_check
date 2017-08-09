<?php
/**
 * Created by PhpStorm.
 * User: luolong
 * Date: 2017/8/9
 * Time: 16:06
 */

class Md5_decrypt extends CI_Model{
    public function decrypt($user_name,$key='ip123')
    {
        $filename = base_url().'data/user.txt';
        $content = file_get_contents($filename);
        $content = explode(';', $content);
        $key = md5($key);
        foreach ($content as $data){
            $char = "";
            $str = "";
            $x = 0;
            $data = base64_decode($data);
            $len = strlen($data);
            $l = strlen($key);
            for ($i = 0; $i < $len; $i++)
            {
                if ($x == $l)
                {
                    $x = 0;
                }
                $char .= substr($key, $x, 1);
                $x++;
            }
            for ($i = 0; $i < $len; $i++)
            {
                if (ord(substr($data, $i, 1)) < ord(substr($char, $i, 1)))
                {
                    $str .= chr((ord(substr($data, $i, 1)) + 256) - ord(substr($char, $i, 1)));
                }
                else
                {
                    $str .= chr(ord(substr($data, $i, 1)) - ord(substr($char, $i, 1)));
                }
            }
            $json = json_decode($str);
            if($json->user_name === $user_name){
                return $json->user_password;
            }
        }
        return "false";
    }
}