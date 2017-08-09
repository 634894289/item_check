<?php
/**
 * Created by PhpStorm.
 * User: luolong
 * Date: 2017/8/9
 * Time: 16:05
 */
class Md5_encryption extends CI_Model{
    public function encrypt($data, $key='ip123'){
        $key = md5($key);
        $x = 0;
        $char = "";
        $str = "";
        $len = strlen($data);
        $l = strlen($key);
        for ($i = 0; $i < $len; $i++)
        {
            if ($x == $l)
            {
                $x = 0;
            }
            $char .= $key{$x};
            $x++;
        }
        for ($i = 0; $i < $len; $i++)
        {
            $str .= chr(ord($data{$i}) + (ord($char{$i})) % 256);
        }
        return base64_encode($str);
    }
}