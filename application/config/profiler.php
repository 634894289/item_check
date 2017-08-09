<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Profiler Sections
| -------------------------------------------------------------------------
| This file lets you determine whether or not various sections of Profiler
| data are displayed when the Profiler is enabled.
| Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/profiling.html
|   程序分析
*/
$config['benchmarks'] = true;                     //在各个计时点花费的时间以及总时间
$config['config'] = true;                         //CodeIgniter配置变量
$config['controller_info'] = true;               //被请求的控制类和调用的方法
$config['get'] = true;                            //请求中的所有GET数据
$config['http_headers'] = true;                  //本次请求的HTTP头部
$config['memory_usage'] = true;                  //本次请求消耗的内存（单位字节）
$config['post'] = true;                           //请求中的所有POST数据
$config['queries'] = true;                        //列出所有执行的数据库查询，以及执行时间
$config['uri_string'] = true;                    //本次请求的URI
$config['session_data'] = true;                  //当前会话中存储的数据
$config['query_toggle_count'] = true;           //指定显示多少个数据库查询，剩下的则默认折叠起来