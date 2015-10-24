<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once './Response.php';
$dataFormat = "abcd";
if($dataFormat == "xml"){
   header("Content-Type:text/xml");//如果不这样，就无法显示出xml结构 
}
$arr = array(
    'id' => 1,
    'name' => 'singwa',
    'type' => array(3,4,5),//节点会使用0，1，2作为key，但是key不能为数字，所以会出错，需要在遇到时处理
    'test' => array(1,45,234=>array(123,'testafa'),),
);

echo Response::show(200, "OK", $arr, $dataFormat);


