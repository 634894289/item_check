<?php
/**
 * Created by PhpStorm.
 * User: luolong
 * Date: 2017/8/16
 * Time: 17:21
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Globals
{

    function __construct($config = array() ){
        foreach ($config as $key => $value) {
            $data[$key] = $value;
        }

        $CI =& get_instance();//这一行必须加

        $CI->load->vars($data);
    }
}