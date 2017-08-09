<?php
/**
 * Created by PhpStorm.
 * User: luolong
 * Date: 2017/8/2
 * Time: 15:53
 */

defined('BASEPATH') OR exit('No direct script access allowed');

$config['upload_path'] = '';              //文件上传的位置，必须是可写的，可以是相对路径或绝对路径

$config['allowed_types'] = '';            //允许上传的文件类型，通常文件的后缀名可作为MIME类型，可以是数组，也可以是以管道符（｜）分割的字符串

$config['file_name'] = '';               /**如果设置了，CodeIgniter将会使用该参数重命名上传的文件，设置的文件名后缀必须也要是允许的文件类型，
                                            *如果没有设置后缀，将使用原文件的后缀名
                                            */

$config['file_ext_tolower'] = '';        //如果设置为TRUE，文件后缀名将转换为小写（FALSE/TRUE）（默认 FALSE）

$config['overwrite'] = '';                /**如果设置为TRUE，上传的文件如果和已有的文件同名，将会覆盖已存在文件，如果设置为FALSE，将会在文件
                                             * 后加上一个数字，（FALSE/TRUE）（默认FASLE）
                                             */

$config['max_size'] = '';                 /**允许文上传文件大小的最大值（单位KB），设置为0表示无限制，注意：大多数PHP会有它们自己的限制值，定义在
                                             * php.ini文件中，通常默认为2MB（默认0）
                                             */

$config['max_width'] = '';                //图片最大宽度（单位为像素），设置为0表示无限制（默认 0）

$config['max_height'] = '';               //图片最大高度（单位为像素），设置为0表示无限制（默认 0）

$config['min_width'] = '';                //图片最小宽度（单位为像素），设置为0表示无限制（默认 0）

$config['min_height'] = '';               //图片最小高度（单位为像素），设置为0表示无限制（默认 0）

$config['max_filename'] = '';             //文件名的最大长度，设置为0表示无限制（默认 0）

$config['max_filename_increment'] = '';  /**当overwrite参数设置为FALSE时，将会在同名文件的后面加上一个自增的数字，这个参数用于设置这个数字
                                             * 的最大值（默认 100）
                                             */

$config['encrypt_name'] = '';             /**如果设置为TRUE，文件名将会转换为一个随机的字符串，如果你不希望撒谎那个穿文件的人知道保存后的文件
                                             * 名，这个参数会很有用（FALSE/TRUE）（默认 FALSE）
                                             */

$config['remove_spaces'] = '';            //如果设置为TRUE，文件名中的所有空格将会转换为下划线，推荐这样做，（TRUE/FALSE）（默认 TRUE）

$config['detect_mime'] = '';              /**如果设置为TRUE，将会在服务端对文件类型进行检测，可以预防代码注入攻击，除非不得已，请不要禁用该选项，
                                             * 这将导致安全风险（TRUE/FALSE）（默认 TRUE）
                                             */

$config['mod_mime_fix'] = '';             /**如果设置为TRUE，那么带有多个后缀名的文件将会添加一个下划线后缀，这样可以避免触发Apache mod_mime。
                                             * 如果你的上传目录是公开的，请不要关闭该选项，这将导致安全风险（TRUE/FALSE）（默认 TRUE）
                                             */