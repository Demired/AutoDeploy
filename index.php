<?php
// +----------------------------------------------------------------
// | BG [ No News Is Good News ]
// +----------------------------------------------------------------
// | Copyright (c) 2015-2016 http://thinknet.cc All right reserved
// +----------------------------------------------------------------
// | Time : 2016/7/2 20:13
// +----------------------------------------------------------------
// | Author： 0x8c <zhangyuan@thinknet.cc>
// +----------------------------------------------------------------

$secret = '密钥';
$headers = array();
foreach ($_SERVER as $name => $value) {
    if (substr($name, 0, 5) == 'HTTP_') {
        $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
    }
}

//github发送过来的签名
$hubSignature = $headers['X-Hub-Signature'];
list($algo, $hash) = explode('=', $hubSignature, 2);

// 获取body内容
$payload = file_get_contents('php://input');

// 计算签名
$payloadHash = hash_hmac($algo, $payload, $secret);
// 判断签名是否匹配
if ($hash === $payloadHash) {
    //判断是否为主分支更改

    //是
    //调用shell执行拉去

    //记录这次钩子请求

}else{
    //记录这次意外请求
}