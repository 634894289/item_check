<?php
/**
 * Created by PhpStorm.
 * User: luolong
 * Date: 2017/8/2
 * Time: 14:17
 */
defined('BASEPATH') OR exit('No direct script access allowed');

$config['useragent'] = '';                                                  //用户代理（默认 CodeIgniter）
$config['protocol'] = '';                                                  //邮件发送协议（mail sendmail smtp）（默认 mail）
$config['mailpath'] = '';                                                  //服务器上sendmail的实际路径（默认 /usr/sbin/sendmail）
$config['smtp_host'] = '';                                                  //SMTP服务器地址
$config['smtp_user'] = '';                                                  //SMTP用户名
$config['smtp_pass'] = '';                                                  //SMTP密码
$config['smtp_port'] = '';                                                  //SMTP端口 （默认 25）
$config['smtp_timeout'] = '';                                                  //SMTP超时时间 （默认 5秒）
$config['smtp_keepalive'] = '';                                                  //是否启用SMTP持久连接（TRUE/FALSE） （默认 FALSE）
$config['smtp_crypto'] = '';                                                  //SMTP加密方式（tls/ssl）
$config['wordwrap'] = '';                                                  //是否启用自动换行（TRUE/FALSE） （默认 TRUE）
$config['wrapchars'] = '';                                                  //自动换行时每行的最大字符数（默认 76）
$config['mailtype'] = '';                                                  /**邮件类型，如果发送的是HTML邮件，必须是一个完整的网页，确保网页中
                                                                              *没有使用相对路径的链接和图片地址，它们在邮件中不能正确显示（text/html）
                                                                              *(默认 text)
                                                                              */
$config['charset'] = '';                                                  //字符集（utf-8 iso-8859-1等）
$config['validate'] = '';                                                  //是否验证邮件地址（默认 FALSE）（FALSE/TRUE）
$config['priority'] = '';                                                  //Email优先级（1=最高 5=最低 3=正常）（1 2 3 4 5）（默认 3）
$config['crlf'] = '';                                                  //换行符（使用“rn”以遵守RFC 822）（“\r\n” or "\n" or "\r"）（默认\n）
$config['newline'] = '';                                               //换行符（使用“rn”以遵守RFC 822）（“\r\n” or "\n" or "\r"）（默认\n）
$config['bcc_batch_mode'] = '';                                       //是否启用密送批处理模式（BCC Batch Mode）（FALSE/TRUE）（默认 FALSE）
$config['bcc_batch_size'] = '';                                       //使用密送批处理时每一批邮件的数量（默认 200）
$config['dsn'] = '';                                                  //是否启用服务器提示消息（FALSE/TRUE）（默认 FALSE）