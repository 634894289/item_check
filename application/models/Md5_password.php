<?php
/**
 * Created by PhpStorm.
 * User: luolong
 * Date: 2017/8/9
 * Time: 16:06
 */

class Md5_password extends CI_Model{
    public function get_password($user_name)
    {
        $filename = 'data/user.json';
        if (is_file($filename))
        {
            if (is_readable($filename))
            {
                $content = file_get_contents($filename);
                if($content === false)
                {
                    $my_data['err_message'] = "文件读取失败";
                }
                else
                {
                    $content = json_decode($content);
                    foreach ($content as $json)
                    {
                        if ($json->user_name === $user_name)
                        {
                            $my_data['err_message'] = "0";
                            $my_data['content'] = $json->user_password;
                            return $my_data;
                        }
                    }
                    $my_data['err_message'] = "1";
                }

            }
            else
            {
                $my_data['err_message'] = "文件不可读";
            }
        }
        else
        {
            $my_data['err_message'] = "文件不存在";
        }
        return $my_data;
    }
}