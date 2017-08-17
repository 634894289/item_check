<?php
/**
 * Created by PhpStorm.
 * User: luolong
 * Date: 2017/8/16
 * Time: 17:22
 */
defined('BASEPATH') OR exit('No direct script access allowed');

//$config['globals_common'] = (function()
//{
//    $data['head'] = $this->load->view('common/head_content','',true);
//    $data['header'] = $this->load->view('common/header_content','',true);
//    $data['script'] = $this->load->view('common/script_content','',true);
//    return $data;
//}) ;


//$config['globals_text'] = "test text";


function common_content() {
    $CI =& get_instance();
    $data['head'] = $CI->load->view('common/head_content','',true);
    $data['header'] = $CI->load->view('common/header_content','',true);
    $data['script'] = $CI->load->view('common/script_content','',true);
    return $data;
}

