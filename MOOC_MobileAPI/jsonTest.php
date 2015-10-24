<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//$arr = array(
//    'id' => 1,
//    'name' => 'singwa'
//);
//
//$data = "输出json数据";
//$newData = iconv('UTF-8', 'GBK', $data);//$data转为GBK
//echo $newData;
//echo json_encode($newData);//json_encode只能接收utf-8编码

require_once './response.php';
$arr = array(
    'id' => 1,
    'name' => 'singwa',
);

echo '<br/>';
Response::json(200, "成功", $arr);
echo '<br/>';
