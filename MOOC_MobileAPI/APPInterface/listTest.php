<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once './list.php';
$dataFormat = isset($_GET['format'])?$_GET['format']:'json';
if($dataFormat == "xml"){
   header("Content-Type:text/xml");//如果不这样，就无法显示出xml结构 
}
$page = isset($_GET['page'])?$_GET['page']:1;
$pagesize = isset($_GET['pagesize'])?$_GET['pagesize']:6;

echo index::listIndex($page, $pagesize);