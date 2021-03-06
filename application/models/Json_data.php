<?php
/**
 * Created by PhpStorm.
 * User: luolong
 * Date: 2017/8/9
 * Time: 16:05
 */
class Json_data extends CI_Model{
    public function get_json_data($flag)
    {
        if ($flag === "1")
        {
            $filename = 'data/table.json';
        }
        else if($flag === "0")
        {
            $filename = 'data/tree.json';
        }
        else
        {
            $my_data['err_message'] = "不知道读取哪个文件";
            return  $my_data;
        }
        if (is_file($filename))
        {
            if (is_readable($filename))
            {
                $json = file_get_contents($filename);
                if($json === false)
                {
                    $my_data['err_message'] = "文件读取失败";
                }
                else
                {
                    $my_data['err_message'] = "";
                    $my_data['json'] = $json;
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